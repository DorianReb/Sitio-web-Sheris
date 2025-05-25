<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AsignaPromocionController;



Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::resource('categorias', App\Http\Controllers\CategoriaController::class);

Route::resource('clientes', App\Http\Controllers\ClienteController::class);

Route::resource('contactos', App\Http\Controllers\ContactoController::class);

Route::resource('devoluciones', App\Http\Controllers\DevolucionController::class);

Route::resource('detalle_ventas', App\Http\Controllers\DetalleVentaController::class);

Route::resource('empleados', App\Http\Controllers\EmpleadoController::class);

Route::resource('estado_reparto', App\Http\Controllers\EstadoRepartoController::class);

Route::resource('facturas', App\Http\Controllers\FacturaController::class);

Route::resource('inventarios', App\Http\Controllers\InventarioController::class);

Route::resource('metodo_pago', App\Http\Controllers\MetodoPagoController::class);

Route::resource('pagos', App\Http\Controllers\PagoController::class);

Route::resource('productos', App\Http\Controllers\ProductoController::class);

Route::resource('promociones', App\Http\Controllers\PromocionController::class);

Route::resource('proveedor_contacto', App\Http\Controllers\ProveedorContactoController::class);

Route::resource('proveedores', App\Http\Controllers\ProveedorController::class);

Route::resource('puestos', App\Http\Controllers\PuestoController::class);

Route::resource('repartos', App\Http\Controllers\RepartoController::class);

Route::resource('usuarios', App\Http\Controllers\UsuarioController::class);

Route::resource('ventas', App\Http\Controllers\VentaController::class);

Route::resource('detalle_venta', App\Http\Controllers\DetalleVentaController::class);

Route::resource('asignapromocion', App\Http\Controllers\AsignaPromocionController::class);

Route::get('/productos-cliente', [ProductoController::class, 'mostrarTodos'])->name('productos.todos');

Route::get('/promociones/{id}/productos', [App\Http\Controllers\AsignaPromocionController::class, 'verProductos'])->name('promocion.productos');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

