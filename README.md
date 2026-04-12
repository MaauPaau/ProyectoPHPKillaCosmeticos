# Killa Cosméticos

Proyecto web académico desarrollado con PHP, MySQL, HTML y CSS. Simula una tienda de cosméticos con páginas públicas, autenticación, panel de registros y formularios CRUD.

El objetivo de este proyecto es mostrar la estructura de una aplicación full stack básica. El contenido, imágenes y datos son de demostración y no corresponden a información real.

## Características

- Página principal con secciones informativas y banners.
- Páginas de contacto, nosotros, publicidad y compras.
- Login y registro de usuarios.
- Panel de administración con CRUD para usuarios, productos, ventas, pedidos, categorías, tiendas, almacén, empleados y clientes.
- Uso de sesiones para controlar el acceso a páginas privadas.
- Separación del proyecto por módulos para mantener el código organizado.

## Tecnologías

- PHP
- MySQL
- HTML5
- CSS3
- XAMPP / Apache

## Estructura del proyecto

```text
CSS/
HTML/
img/
PHP/
```

### Carpetas principales

- `CSS/`: estilos del sitio.
- `HTML/`: vistas, formularios y páginas públicas.
- `PHP/`: lógica del backend, autenticación y operaciones con la base de datos.
- `img/`: imágenes y banners del proyecto.

## Requisitos

- XAMPP instalado.
- Apache y MySQL activos.
- PHP 8 o superior recomendado.
- Una base de datos local configurada.

## Instalación y ejecución

1. Copia la carpeta del proyecto dentro de `htdocs`.
2. Crea la base de datos local con el nombre `basekilla2`.
3. Importa las tablas y datos si tienes el script SQL del proyecto.
4. Revisa `PHP/conectar.php` y ajusta el usuario, contraseña o nombre de la base de datos si tu entorno es diferente.
5. Inicia Apache y MySQL desde XAMPP.
6. Abre el proyecto en el navegador con la ruta:
   `http://localhost/Killa%20Cosmeticos/HTML/index.php`

## Notas

- Este proyecto es una demo académica, no una aplicación de producción.
- No utiliza datos reales.
- Se recomienda mantener la estructura de carpetas para que las rutas relativas funcionen correctamente.
- Si vas a publicar el repositorio de forma pública, revisa los datos sensibles de configuración antes de subirlo.

## Autor

Proyecto escolar final desarrollado con herramientas IA por mi persona.
