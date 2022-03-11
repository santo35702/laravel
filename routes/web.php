<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Frontend\HomePage;
use App\Http\Livewire\Frontend\Product\IndexPage;
use App\Http\Livewire\Frontend\Product\ListPage;
use App\Http\Livewire\Frontend\Product\ByCategoryPage;
use App\Http\Livewire\Frontend\Product\ListByCategoryPage;
use App\Http\Livewire\Frontend\Product\DetailsPage;
use App\Http\Livewire\Frontend\AboutUsPage;
use App\Http\Livewire\Frontend\ComparePage;
use App\Http\Livewire\Frontend\FAQPage;
use App\Http\Livewire\Frontend\NotFoundPage;
use App\Http\Livewire\Frontend\ContactUsPage;
use App\Http\Livewire\Frontend\Cart\IndexPage as CartPage;
use App\Http\Livewire\Frontend\CheckoutPage;
use App\Http\Livewire\Frontend\Wishlist\IndexPage as WishlistPage;

// For Admin__
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\Category\IndexPage as AdminCategoryPage;
use App\Http\Livewire\Admin\Category\AddNewPage as AddCategoryPage;
use App\Http\Livewire\Admin\Category\EditPage as EditCategoryPage;

// For Users__
use App\Http\Livewire\User\UserDashboard;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/', HomePage::class)->name('home');

Route::get('/about-us', AboutUsPage::class)->name('about');

Route::prefix('products')->name('products.')->group(function ()
{
    Route::get('/', IndexPage::class)->name('index');
    Route::prefix('list')->name('list.')->group(function ()
    {
        Route::get('/', ListPage::class)->name('index');
        Route::get('/categories/{slug}', ListByCategoryPage::class)->name('by_category');
    });
    Route::get('/{slug}', DetailsPage::class)->name('details');
    Route::get('/categories/{slug}', ByCategoryPage::class)->name('by_category');
});

Route::get('/faqs', FAQPage::class)->name('faq');

Route::get('/cart', CartPage::class)->name('cart');

Route::get('/checkout', CheckoutPage::class)->name('checkout');

Route::get('/compare', ComparePage::class)->name('compare');

Route::get('/wishlist', WishlistPage::class)->name('wishlist');

Route::get('/contact-us', ContactUsPage::class)->name('contact');

Route::get('/404', NotFoundPage::class)->name('not_found');

// For User / Customer Route__
Route::middleware(['auth:sanctum', 'verified'])->prefix('/users')->name('users.')->group(function ()
{
    Route::get('/dashboard', UserDashboard::class)->name('dashboard');
});

// For Admin user Route__
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->prefix('admin')->name('admin.')->group(function ()
{
    Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
    Route::prefix('categories')->name('categories.')->group(function ()
    {
        Route::get('/', AdminCategoryPage::class)->name('index');
        Route::get('/add-new', AddCategoryPage::class)->name('add');
        Route::get('/edit/{id}', EditCategoryPage::class)->name('edit');
    });
});
