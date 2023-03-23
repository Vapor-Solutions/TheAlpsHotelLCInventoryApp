<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'admin/dashboard', 301);
Route::redirect('admin', 'admin/dashboard', 301);
Route::redirect('dashboard', 'admin/dashboard', 301);


Route::prefix('admin')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', Admin\Dashboard::class)->name('admin.dashboard');
    Route::get('/settings', Admin\Settings::class)->name('admin.settings');

    // Roles
    Route::prefix('roles')->group(function () {
        Route::get('/', Admin\Roles\Index::class)->name('admin.roles.index');
        Route::get('/create', Admin\Roles\Create::class)->name('admin.roles.create');
        Route::get('/{id}/edit', Admin\Roles\Edit::class)->name('admin.roles.edit');
    });
    // Permissions
    Route::prefix('permissions')->group(function () {
        Route::get('/', Admin\Permissions\Index::class)->name('admin.permissions.index');
        Route::get('/create', Admin\Permissions\Create::class)->name('admin.permissions.create');
        Route::get('/{id}/edit', Admin\Permissions\Edit::class)->name('admin.permissions.edit');
    });
    // Users
    Route::prefix('users')->group(function () {
        Route::get('/', Admin\Users\Index::class)->name('admin.users.index');
        Route::get('/create', Admin\Users\Create::class)->name('admin.users.create');
        Route::get('/{id}/edit', Admin\Users\Edit::class)->name('admin.users.edit');
    });
    // Customers
    Route::prefix('customers')->group(function () {
        Route::get('/', Admin\Customers\Index::class)->name('admin.customers.index');
        Route::get('/create', Admin\Customers\Create::class)->name('admin.customers.create');
        Route::get('/{id}/edit', Admin\Customers\Edit::class)->name('admin.customers.edit');
    });
    // Brands
    Route::prefix('brands')->group(function () {
        Route::get('/', Admin\Brands\Index::class)->name('admin.brands.index');
        Route::get('/create', Admin\Brands\Create::class)->name('admin.brands.create');
        Route::get('/{id}/edit', Admin\Brands\Edit::class)->name('admin.brands.edit');
    });
    // Suppliers
    Route::prefix('suppliers')->group(function () {
        Route::get('/', Admin\Suppliers\Index::class)->name('admin.suppliers.index');
        Route::get('/create', Admin\Suppliers\Create::class)->name('admin.suppliers.create');
        Route::get('/{id}/edit', Admin\Suppliers\Edit::class)->name('admin.suppliers.edit');
    });
    // UnitTypes
    Route::prefix('unit-types')->group(function () {
        Route::get('/', Admin\UnitTypes\Index::class)->name('admin.unit-types.index');
        Route::get('/create', Admin\UnitTypes\Create::class)->name('admin.unit-types.create');
        Route::get('/{id}/edit', Admin\UnitTypes\Edit::class)->name('admin.unit-types.edit');
    });
    // Units
    Route::prefix('units')->group(function () {
        Route::get('/', Admin\Units\Index::class)->name('admin.units.index');
        Route::get('/create', Admin\Units\Create::class)->name('admin.units.create');
        Route::get('/{id}/edit', Admin\Units\Edit::class)->name('admin.units.edit');
    });
    // Product Categories
    Route::prefix('product-categories')->group(function () {
        Route::get('/', Admin\ProductCategories\Index::class)->name('admin.product-categories.index');
        Route::get('/create', Admin\ProductCategories\Create::class)->name('admin.product-categories.create');
        Route::get('/{id}/edit', Admin\ProductCategories\Edit::class)->name('admin.product-categories.edit');
    });
    // Product Descriptions
    Route::prefix('product-descriptions')->group(function () {
        Route::get('/', Admin\ProductDescriptions\Index::class)->name('admin.product-descriptions.index');
        Route::get('/create', Admin\ProductDescriptions\Create::class)->name('admin.product-descriptions.create');
        Route::get('/{id}/edit', Admin\ProductDescriptions\Edit::class)->name('admin.product-descriptions.edit');
        Route::get('/{id}/show', Admin\ProductDescriptions\Show::class)->name('admin.product-descriptions.show');
    });
    // Product Items
    Route::prefix('product-items')->group(function () {
        Route::get('/', Admin\ProductItems\Index::class)->name('admin.product-items.index');
        Route::get('/create', Admin\ProductItems\Create::class)->name('admin.product-items.create');
        Route::get('/{id}/edit', Admin\ProductItems\Edit::class)->name('admin.product-items.edit');
    });
    // Payment Methods
    Route::prefix('payment-methods')->group(function () {
        Route::get('/', Admin\PaymentMethods\Index::class)->name('admin.payment-methods.index');
        Route::get('/create', Admin\PaymentMethods\Create::class)->name('admin.payment-methods.create');
        Route::get('/{id}/edit', Admin\PaymentMethods\Edit::class)->name('admin.payment-methods.edit');
    });
    // Sales Payments
    Route::prefix('sales-payments')->group(function () {
        Route::get('/', Admin\SalesPayments\Index::class)->name('admin.sales-payments.index');
        Route::get('/create', Admin\SalesPayments\Create::class)->name('admin.sales-payments.create');
        Route::get('/{id}/edit', Admin\SalesPayments\Edit::class)->name('admin.sales-payments.edit');
    });

    // Purchase Payments
    Route::prefix('purchase-payments')->group(function () {
        Route::get('/', Admin\PurchasePayments\Index::class)->name('admin.purchase-payments.index');
        Route::get('/create', Admin\PurchasePayments\Create::class)->name('admin.purchase-payments.create');
        Route::get('/{id}/edit', Admin\PurchasePayments\Edit::class)->name('admin.purchase-payments.edit');
    });
    // Quotations
    Route::prefix('quotations')->group(function () {
        Route::get('/', Admin\Quotations\Index::class)->name('admin.quotations.index');
        Route::get('/create', Admin\Quotations\Create::class)->name('admin.quotations.create');
        Route::get('/{id}/edit', Admin\Quotations\Edit::class)->name('admin.quotations.edit');
    });
    // Invoices
    Route::prefix('invoices')->group(function () {
        Route::get('/', Admin\Invoices\Index::class)->name('admin.invoices.index');
        Route::get('/create', Admin\Invoices\Create::class)->name('admin.invoices.create');
        Route::get('/{id}/show', function ($id) {
            $pdf = Pdf::loadView('documents.invoice', [
                'invoice' => Invoice::find($id)
            ]);

            $date = Carbon::parse(Invoice::find($id)->created_at)->toDateString();
            return $pdf->download($date . '-Invoice#' . $id . '.pdf');
        })->name('admin.invoices.show');
    });
    // Purchases
    Route::prefix('purchases')->group(function () {
        Route::get('/', Admin\Purchases\Index::class)->name('admin.purchases.index');
        Route::get('/create', Admin\Purchases\Create::class)->name('admin.purchases.create');
        Route::get('/{id}/edit', Admin\Purchases\Edit::class)->name('admin.purchases.edit');
        Route::get('/{id}/show', Admin\Purchases\Show::class)->name('admin.purchases.show');
    });
    // Sales
    Route::prefix('sales')->group(function () {
        Route::get('/', Admin\Sales\Index::class)->name('admin.sales.index');
        Route::get('/create', Admin\Sales\Create::class)->name('admin.sales.create');
        Route::get('/{id}/edit', Admin\Sales\Edit::class)->name('admin.sales.edit');
        Route::get('/{id}/show', Admin\Sales\Show::class)->name('admin.sales.show');
    });
});
