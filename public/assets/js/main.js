// ========== MENU HAMBURGUESA ==========
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-alternar');
    const navMenu = document.querySelector('nav ul');

    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('activo');
        });

        // Cerrar menú al hacer clic en un enlace
        document.querySelectorAll('nav a').forEach(link => {
            link.addEventListener('click', function() {
                navMenu.classList.remove('activo');
            });
        });
    }
});

// ========== VALIDACIÓN DE FORMULARIOS ==========
function validateForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return false;

    const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
    let isValid = true;

    inputs.forEach(input => {
        if (input.value.trim() === '') {
            input.classList.add('error');
            isValid = false;
        } else {
            input.classList.remove('error');
        }
    });

    return isValid;
}

// ========== BÚSQUEDA DE PRODUCTOS ==========
function searchProducts() {
    const searchInput = document.getElementById('searchInput');
    const products = document.querySelectorAll('.articuloProducto');

    if (!searchInput) return;

    searchInput.addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();

        products.forEach(product => {
            const productName = product.querySelector('h3').textContent.toLowerCase();
            const productDesc = product.querySelector('p').textContent.toLowerCase();

            if (productName.includes(searchTerm) || productDesc.includes(searchTerm)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    });
}

// ========== PAGINACIÓN ==========
function setupPagination(itemsPerPage = 12) {
    const items = document.querySelectorAll('[data-paginate]');
    if (items.length === 0) return;

    const totalPages = Math.ceil(items.length / itemsPerPage);
    const paginationContainer = document.getElementById('pagination');

    if (!paginationContainer) return;

    function showPage(pageNum) {
        items.forEach(item => item.style.display = 'none');
        const startIdx = (pageNum - 1) * itemsPerPage;
        const endIdx = startIdx + itemsPerPage;

        for (let i = startIdx; i < endIdx && i < items.length; i++) {
            items[i].style.display = 'block';
        }
    }

    // Crear botones de paginación
    paginationContainer.innerHTML = '';
    for (let i = 1; i <= totalPages; i++) {
        const btn = document.createElement('button');
        btn.textContent = i;
        btn.className = i === 1 ? 'active' : '';
        btn.addEventListener('click', function() {
            document.querySelectorAll('#pagination button').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            showPage(i);
        });
        paginationContainer.appendChild(btn);
    }

    showPage(1);
}

// ========== DASHBOARD TOGGLE ==========
function setupDashboard() {
    const toggleBtn = document.querySelector('.dashboard-toggle');
    const panel = document.querySelector('.dashboard-panel');
    const overlay = document.querySelector('.dashboard-overlay');
    const closeBtn = document.querySelector('.dashboard-close');

    if (toggleBtn && panel && overlay) {
        toggleBtn.addEventListener('click', function(e) {
            e.preventDefault();
            panel.classList.add('active');
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        [overlay, closeBtn].forEach(el => {
            if (el) {
                el.addEventListener('click', function() {
                    panel.classList.remove('active');
                    overlay.classList.remove('active');
                    document.body.style.overflow = 'auto';
                });
            }
        });
    }
}

// ========== CONFIRMACIÓN DE ELIMINACIÓN ==========
function confirmDelete(message = '¿Está seguro de que desea eliminar este elemento?') {
    return confirm(message);
}

// ========== EXPORTAR A PDF ==========
async function exportToPDF(filename = 'export.pdf') {
    const element = document.getElementById('exportContent');
    if (!element) {
        alert('No hay contenido para exportar.');
        return;
    }

    try {
        const response = await fetch('/api/export-pdf', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ html: element.innerHTML })
        });

        if (response.ok) {
            const blob = await response.blob();
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = filename;
            a.click();
        }
    } catch (error) {
        console.error('Error al exportar PDF:', error);
    }
}

// ========== INICIALIZAR AL CARGAR ==========
document.addEventListener('DOMContentLoaded', function() {
    searchProducts();
    setupPagination();
    setupDashboard();
});
