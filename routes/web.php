<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

// Customer routes
Route::get('/', [App\Http\Controllers\WebControllers\HomePageController::class, 'HomePage'])->name('home-page');
Route::prefix('customer')->group(function() {
    Route::get('/login', [App\Http\Controllers\CustomerLoginController::class, 'showLoginForm'])->name('customer.login');
    Route::post('/login', [App\Http\Controllers\CustomerLoginController::class, 'login'])->name('customer.login.submit');
    Route::get('/home-page', [App\Http\Controllers\WebControllers\HomePageController::class, 'HomePage'])->name('home')->middleware('auth:customer');
    Route::post('/logout', [App\Http\Controllers\CustomerLoginController::class, 'logout'])->name('customer.logout');
    Route::get('/register', [App\Http\Controllers\CustomerRegisterController::class, 'showRegistrationForm'])->name('customer.register');
    Route::post('/register', [App\Http\Controllers\CustomerRegisterController::class, 'register'])->name('customer.register.submit');
});
// web application 

Route::get('/', [App\Http\Controllers\WebControllers\HomePageController::class, 'HomePage'])->name('home-page');
// page 
Route::get('/product-shop', [App\Http\Controllers\WebControllers\ProductController::class, 'Product'])->name('product-shop');
Route::get('/detail-prouct-quick-view/{id}', [App\Http\Controllers\WebControllers\ProductController::class, 'quickView'])->name('detail-product-quick-view');
Route::get('/product-detail/{id}', [App\Http\Controllers\WebControllers\ProductController::class, 'ProductDetail'])->name('product-detail');
Route::get('blog', [App\Http\Controllers\WebControllers\BlogController::class, 'Blog'])->name('blog');
Route::get('/blog-detail/{id}', [App\Http\Controllers\WebControllers\BlogController::class, 'BlogDetail'])->name('blog-detail');
Route::get('/contact', [App\Http\Controllers\WebControllers\ContactController::class, 'Contact'])->name('contact');
// add to cart and place order
Route::get('/cart', [App\Http\Controllers\WebControllers\CartController::class, 'Cart'])->name('cart');
Route::get('/add-to-cart/{id}', [App\Http\Controllers\WebControllers\CartController::class, 'addToCart'])->name('cart.add');
Route::put('/update-cart/{id}', [App\Http\Controllers\WebControllers\CartController::class, 'UpdateCart'])->name('update-cart');
Route::delete('/remove-from-cart/{id}', [App\Http\Controllers\WebControllers\CartController::class, 'RemoveCart'])->name('remove-from-cart');
Route::get('/checkout', [App\Http\Controllers\WebControllers\CheckoutController::class, 'Checkout'])->name('checkout');
Route::post('/place-order', [App\Http\Controllers\WebControllers\CheckoutController::class, 'PlaceOrder'])->name('place-order');
// profile setting 
Route::get('/account/profile', [App\Http\Controllers\WebControllers\ProfileController::class, 'Profile'])->name('profile');
Route::put('//account/profile/update-data', [App\Http\Controllers\WebControllers\ProfileController::class, 'UpdateData'])->name('profile-update-data-setting');
Route::get('/account/my-order', [App\Http\Controllers\WebControllers\MyOrderController::class, 'MyOrder'])->name('my-order');
Route::get('/account/favorite', [App\Http\Controllers\WebControllers\FavoriteController::class, 'Favorite'])->name('favorite');
Route::get('/account/favorite-add/{id}', [App\Http\Controllers\WebControllers\FavoriteController::class, 'FavoriteAdd'])->name('favorite-add');
Route::delete('/remove-from-favorite/{id}', [App\Http\Controllers\WebControllers\FavoriteController::class, 'RemoveFav'])->name('remove-from-favorite');
Route::get('/account/change-password', [App\Http\Controllers\WebControllers\ChangePasswordController::class, 'ChangePassword'])->name('change-password');
Route::put('/account/update-password', [App\Http\Controllers\WebControllers\ChangePasswordController::class, 'UpdatePassword'])->name('update-password');
Route::get('/account/coupon', [App\Http\Controllers\WebControllers\CouponController::class, 'Coupon'])->name('coupon');
// modal view 
Route::get('/quick-view', [App\Http\Controllers\WebControllers\ModalViewController::class, 'QuickView'])->name('quick-view');

// admin 
// Admin routes
Route::prefix('admin')->group(function() {
    Route::get('/login', [App\Http\Controllers\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/dashboad', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard')->middleware('auth:admin');
    Route::post('/logout', [App\Http\Controllers\AdminLoginController::class, 'logout'])->name('admin.logout');
});

// Route::get('/sign-in', [App\Http\Controllers\AuthController::class, 'SignIn'])->name('sign-in');
// Route::post('/sign-out', [App\Http\Controllers\AuthController::class, 'signOut'])->name('sign-out');
Route::get('/dashboad', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboad');
// accessaries type
Route::get('/accessaries', [App\Http\Controllers\AccessaryController::class, 'Accessaries'])->name('accessaries');
Route::get('/insert-accessaries', [App\Http\Controllers\AccessaryController::class, 'Insert'])->name('insert-accessaries');
Route::post('/insert-data-accessaries', [App\Http\Controllers\AccessaryController::class, 'InsertData'])->name('insert-data-accessaries');
Route::get('/edit-accessaries/{id}', [App\Http\Controllers\AccessaryController::class, 'Update'])->name('update-accessaries');
Route::put('/edit-data-accessaries/{id}', [App\Http\Controllers\AccessaryController::class, 'DataUpdate'])->name('update-data-accessaries');
Route::get('/delete-accessaries/{id}', [App\Http\Controllers\AccessaryController::class, 'Delete'])->name('delete-accessaries');
// blog
Route::get('/blog-ad', [App\Http\Controllers\BlogController::class, 'Blog'])->name('blog-ad');
Route::get('/insert-blog', [App\Http\Controllers\BlogController::class, 'Insert'])->name('insert-blog');
Route::post('/insert-data-blog', [App\Http\Controllers\BlogController::class, 'InsertData'])->name('data-insert-blog');;
Route::get('/edit-blog/{id}', [App\Http\Controllers\BlogController::class, 'Update'])->name('update-blog');
Route::put('/edit-data-blog/{id}', [App\Http\Controllers\BlogController::class, 'DataUpdate'])->name('data-update-blog');;
Route::get('/delete-blog/{id}', [App\Http\Controllers\BlogController::class, 'Delete'])->name('delete-blog');;
// brands
Route::get('/brand', [App\Http\Controllers\BrandController::class, 'Brand'])->name('brand');
Route::get('/insert-brand', [App\Http\Controllers\BrandController::class, 'Insert'])->name('insert.brand');
Route::post('/insert-data-brand', [App\Http\Controllers\BrandController::class, 'InsertData']);
Route::get('/edit-brand/{id}', [App\Http\Controllers\BrandController::class, 'Update'])->name('update.brand');
Route::put('/edit-data-brand/{id}', [App\Http\Controllers\BrandController::class, 'DataUpdate']);
Route::get('/delete-brand/{id}', [App\Http\Controllers\BrandController::class, 'Delete'])->name('delete-brand');
// category
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'Category'])->name('category');
Route::get('/insert-category', [App\Http\Controllers\CategoryController::class, 'Insert'])->name('insert.category');
Route::post('/insert-data-category', [App\Http\Controllers\CategoryController::class, 'InsertData']);
Route::get('/edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'Update'])->name('update-category');
Route::put('/edit-data-category/{id}', [App\Http\Controllers\CategoryController::class, 'DataUpdate'])->name('update-data-category');
Route::get('/delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'Delete'])->name('delete-category');
// product type
Route::get('/product-type', [App\Http\Controllers\ProductTypeController::class, 'ProductType'])->name('product-type');
Route::get('/insert-product-type', [App\Http\Controllers\ProductTypeController::class, 'Insert'])->name('insert-product-type');
Route::post('/insert-data-product-type', [App\Http\Controllers\ProductTypeController::class, 'InsertData'])->name('insert-data-product-type');
Route::get('/edit-product-type/{id}', [App\Http\Controllers\ProductTypeController::class, 'Update'])->name('update-product-type');
Route::put('/edit-data-product-type/{id}', [App\Http\Controllers\ProductTypeController::class, 'DataUpdate'])->name('update-data-product-type');
Route::get('/delete-product-type/{id}', [App\Http\Controllers\ProductTypeController::class, 'Delete'])->name('delete-product-type');
// banner
Route::get('/banner', [App\Http\Controllers\BannersController::class, 'Banner'])->name('banner');
Route::get('/insert-banner', [App\Http\Controllers\BannersController::class, 'Insert'])->name('insert.banner');
Route::post('/insert-data-banner', [App\Http\Controllers\BannersController::class, 'InsertData']);
Route::get('/edit-banner/{id}', [App\Http\Controllers\BannersController::class, 'Update'])->name('update.banner');
Route::put('/edit-data-banner/{id}', [App\Http\Controllers\BannersController::class, 'DataUpdate']);
Route::get('/delete-banner/{id}', [App\Http\Controllers\BannersController::class, 'Delete']);

// product
Route::get('/product', [App\Http\Controllers\ProductController::class, 'Product'])->name('product');
Route::get('/insert-product', [App\Http\Controllers\ProductController::class, 'Insert'])->name('insert.product');
Route::post('/insert-data-product', [App\Http\Controllers\ProductController::class, 'InsertData'])->name('insert-data-product');
Route::get('/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'Update'])->name('update.product');
Route::put('/edit-data-product/{id}', [App\Http\Controllers\ProductController::class, 'DataUpdate'])->name('edit-data-product');
Route::get('/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'Delete'])->name('delete-product');

// specification
Route::get('/specification', [App\Http\Controllers\SpecificationController::class, 'Specification'])->name('specification');
Route::get('/insert-specification', [App\Http\Controllers\SpecificationController::class, 'Insert'])->name('insert-specification');
Route::post('/insert-data-specification', [App\Http\Controllers\SpecificationController::class, 'InsertData'])->name('insert-data-specification');
Route::get('/edit-specification/{id}', [App\Http\Controllers\SpecificationController::class, 'Update'])->name('update-specification');
Route::put('/edit-data-specification/{id}', [App\Http\Controllers\SpecificationController::class, 'DataUpdate'])->name('edit-data-specification');
Route::get('/delete-specification/{id}', [App\Http\Controllers\SpecificationController::class, 'Delete'])->name('delete-specification');
// soft info
Route::get('/soft-info', [App\Http\Controllers\SoftInfoController::class, 'SoftInfo'])->name('soft-info');
Route::get('/insert-soft-info', [App\Http\Controllers\SoftInfoController::class, 'Insert'])->name('insert-soft-info');
Route::post('/insert-data-soft-info', [App\Http\Controllers\SoftInfoController::class, 'InsertData'])->name('insert-data-soft-info');
Route::get('/edit-soft-info/{id}', [App\Http\Controllers\SoftInfoController::class, 'Update'])->name('update-soft-info');
Route::put('/edit-data-soft-info/{id}', [App\Http\Controllers\SoftInfoController::class, 'DataUpdate'])->name('edit-data-soft-info');
Route::get('/delete-soft-info/{id}', [App\Http\Controllers\SoftInfoController::class, 'Delete'])->name('delete-soft-info');
// ram
Route::get('/ram', [App\Http\Controllers\RamController::class, 'Ram'])->name('ram');
Route::get('/insert-ram', [App\Http\Controllers\RamController::class, 'Insert'])->name('insert-ram');
Route::post('/insert-data-ram', [App\Http\Controllers\RamController::class, 'InsertData'])->name('insert-data-ram');
Route::get('/edit-ram/{id}', [App\Http\Controllers\RamController::class, 'Update'])->name('update-ram');
Route::put('/edit-data-ram/{id}', [App\Http\Controllers\RamController::class, 'DataUpdate'])->name('edit-data-ram');
Route::get('/delete-ram/{id}', [App\Http\Controllers\RamController::class, 'Delete'])->name('delete-ram');
// ram
Route::get('/storage', [App\Http\Controllers\StorageController::class, 'Storage'])->name('storage');
Route::get('/insert-storage', [App\Http\Controllers\StorageController::class, 'Insert'])->name('insert-storage');
Route::post('/insert-data-storage', [App\Http\Controllers\StorageController::class, 'InsertData'])->name('insert-data-storage');
Route::get('/edit-storage/{id}', [App\Http\Controllers\StorageController::class, 'Update'])->name('update-storage');
Route::put('/edit-data-storage/{id}', [App\Http\Controllers\StorageController::class, 'DataUpdate'])->name('edit-data-storage');
Route::get('/delete-storage/{id}', [App\Http\Controllers\StorageController::class, 'Delete'])->name('delete-storage');
// color
Route::get('/color', [App\Http\Controllers\ColorController::class, 'Color'])->name('color');
Route::get('/insert-color', [App\Http\Controllers\ColorController::class, 'Insert'])->name('insert-color');
Route::post('/insert-data-color', [App\Http\Controllers\ColorController::class, 'InsertData'])->name('insert-data-color');
Route::get('/edit-color/{id}', [App\Http\Controllers\ColorController::class, 'Update'])->name('update-color');
Route::put('/edit-data-color/{id}', [App\Http\Controllers\ColorController::class, 'DataUpdate'])->name('edit-data-color');
Route::get('/delete-color/{id}', [App\Http\Controllers\ColorController::class, 'Delete'])->name('delete-color');
// stock
Route::get('/stock', [App\Http\Controllers\StockController::class, 'Stock'])->name('stock');
Route::get('/insert-stock', [App\Http\Controllers\StockController::class, 'Insert'])->name('insert-stock');
Route::post('/insert-data-stock', [App\Http\Controllers\StockController::class, 'InsertData'])->name('insert-data-stock');
Route::get('/update-stock/{id}', [App\Http\Controllers\StockController::class, 'Update'])->name('update-stock');
Route::put('/update-data-stock/{id}', [App\Http\Controllers\StockController::class, 'DataUpdate'])->name('update-data-stock');
Route::get('/delete-stock/{id}', [App\Http\Controllers\StockController::class, 'Delete'])->name('delete-stock');
// coupon
Route::get('/admin-coupon', [App\Http\Controllers\CouponController::class, 'Coupon'])->name('admin-coupon');
Route::get('/insert-admin-coupon', [App\Http\Controllers\CouponController::class, 'Insert'])->name('insert-admin-coupon');
Route::post('/insert-data-admin-coupon', [App\Http\Controllers\CouponController::class, 'InsertData'])->name('insert-data-admin-coupon');
Route::get('/edit-admin-coupon/{id}', [App\Http\Controllers\CouponController::class, 'Update'])->name('update-admin-coupon');
Route::put('/edit-data-admin-coupon/{id}', [App\Http\Controllers\CouponController::class, 'DataUpdate'])->name('edit-data-admin-coupon');
Route::get('/delete-admin-coupon/{id}', [App\Http\Controllers\CouponController::class, 'Delete'])->name('delete-admin-coupon');
//report stock
Route::get('/report-stock', [App\Http\Controllers\ReportStockController::class, 'ReportStock'])->name('report-stock');
Route::get('/export-stock', [App\Http\Controllers\ReportStockController::class, 'ExportCSV'])->name('export-stock');
// report sale 
Route::get('/report-sale', [App\Http\Controllers\ReportSaleController::class, 'ReportSale'])->name('report-sale');
Route::get('/export-sale', [App\Http\Controllers\ReportSaleController::class, 'ExportCSV'])->name('export-sale');
// user
Route::get('/user', [App\Http\Controllers\UserController::class, 'User'])->name('user');
Route::get('/insert-user', [App\Http\Controllers\UserController::class, 'Insert'])->name('insert-user');
Route::post('/insert-data-user', [App\Http\Controllers\UserController::class, 'InsertData'])->name('insert-data-user');
Route::get('/edit-user/{id}', [App\Http\Controllers\UserController::class, 'Update'])->name('update-user');
Route::put('/edit-data-user/{id}', [App\Http\Controllers\UserController::class, 'DataUpdate'])->name('edit-data-user');
Route::get('/delete-user/{id}', [App\Http\Controllers\UserController::class, 'Delete'])->name('delete-user');
//role
Route::get('/role', [App\Http\Controllers\RoleController::class, 'Role'])->name('role');
Route::get('/insert-role', [App\Http\Controllers\RoleController::class, 'Insert'])->name('insert-role');
Route::post('/insert-data-role', [App\Http\Controllers\RoleController::class, 'InsertData'])->name('insert-data-role');
Route::get('/edit-role/{id}', [App\Http\Controllers\RoleController::class, 'Update'])->name('update-role');
Route::put('/edit-data-role/{id}', [App\Http\Controllers\RoleController::class, 'DataUpdate'])->name('update-data-role');
Route::get('/delete-role/{id}', [App\Http\Controllers\RoleController::class, 'Delete'])->name('delete-role');
//permission
Route::get('/permission', [App\Http\Controllers\PermissionController::class, 'Permission'])->name('permission');
Route::get('/insert-permission', [App\Http\Controllers\PermissionController::class, 'Insert'])->name('insert-permission');
Route::post('/insert-data-permission', [App\Http\Controllers\PermissionController::class, 'InsertData'])->name('insert-data-permission');
Route::get('/edit-permission/{id}', [App\Http\Controllers\PermissionController::class, 'Update'])->name('update-permission');
Route::put('/edit-data-permission/{id}', [App\Http\Controllers\PermissionController::class, 'DataUpdate'])->name('update-data-permission');
Route::get('/delete-permission/{id}', [App\Http\Controllers\PermissionController::class, 'Delete'])->name('delete-permission');
// account setting 
Route::get('/account-setting', [App\Http\Controllers\SettingController::class, 'account'])->name('account');
Route::put('/update-data-setting', [App\Http\Controllers\SettingController::class, 'UpdateData'])->name('update-data-setting');
Route::get('/delete-account', [App\Http\Controllers\SettingController::class, 'DeleteAccount'])->name('delete-account');



