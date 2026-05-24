<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;
use App\Core\Validator;
use App\Services\ExportService;

class ProductController extends Controller {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        $this->checkAuth();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $search = isset($_GET['search']) ? Validator::clean($_GET['search']) : '';

        if ($search) {
            $products = $this->productModel->search($search, $limit, $offset);
            $total = $this->productModel->countSearch($search);
        } else {
            $products = $this->productModel->getPaginated($limit, $offset);
            $total = $this->productModel->countAll();
        }

        $totalPages = ceil($total / $limit);

        $this->render('products/list', [
            'title' => 'Lista de Productos',
            'products' => $products,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'search' => $search
        ]);
    }

    public function create() {
        $this->checkRole(['admin', 'encargadoAlmacen']);
        $this->render('products/form', ['title' => 'Nuevo Producto']);
    }

    public function store() {
        $this->checkRole(['admin', 'encargadoAlmacen']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre' => Validator::clean($_POST['nombre']),
                'descripcion' => Validator::clean($_POST['descripcion']),
                'precio' => (float)$_POST['precio'],
                'stock' => (int)$_POST['stock'],
                'id_categoria' => (int)$_POST['id_categoria'],
                'imagen' => null
            ];

            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $imgName = time() . '_' . $_FILES['imagen']['name'];
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], __DIR__ . '/../../public/img/' . $imgName)) {
                    $data['imagen'] = $imgName;
                }
            }

            if ($this->productModel->create($data)) {
                $this->redirect('/products?msg=success');
            } else {
                $this->render('products/form', [
                    'title' => 'Nuevo Producto',
                    'error' => 'Error al crear el producto',
                    'product' => $data
                ]);
            }
        }
    }

    public function edit() {
        $this->checkRole(['admin', 'encargadoAlmacen']);
        $id = (int)($_GET['id'] ?? 0);
        $product = $this->productModel->getById($id, 'id_producto');

        if (!$product) {
            $this->redirect('/products?error=notfound');
        }

        $this->render('products/form', [
            'title' => 'Editar Producto',
            'product' => $product
        ]);
    }

    public function update() {
        $this->checkRole(['admin', 'encargadoAlmacen']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)$_POST['id_producto'];
            $data = [
                'nombre' => Validator::clean($_POST['nombre']),
                'descripcion' => Validator::clean($_POST['descripcion']),
                'precio' => (float)$_POST['precio'],
                'stock' => (int)$_POST['stock'],
                'id_categoria' => (int)$_POST['id_categoria']
            ];

            if ($this->productModel->update($id, $data)) {
                $this->redirect('/products?msg=updated');
            } else {
                $this->render('products/form', [
                    'title' => 'Editar Producto',
                    'error' => 'Error al actualizar el producto',
                    'product' => array_merge($data, ['id_producto' => $id])
                ]);
            }
        }
    }

    public function delete() {
        $this->checkRole(['admin']);
        $id = (int)($_GET['id'] ?? 0);
        if ($this->productModel->delete($id, 'id_producto')) {
            $this->redirect('/products?msg=deleted');
        } else {
            $this->redirect('/products?error=deletefail');
        }
    }

    public function exportPDF() {
        $this->checkAuth();
        $products = $this->productModel->getAll();
        ExportService::exportToPDF($products, 'productos.pdf');
    }

    public function exportExcel() {
        $this->checkAuth();
        $products = $this->productModel->getAll();
        ExportService::exportToExcel($products, 'productos.xlsx');
    }

    public function exportCSV() {
        $this->checkAuth();
        $products = $this->productModel->getAll();
        ExportService::exportToCSV($products, 'productos.csv');
    }
}
