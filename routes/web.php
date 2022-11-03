<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\guitarController;

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

Route::get('/',[homeController::class, 'index']) -> name('home.index');

Route::get('/about',[homeController::class, 'about']) -> name('home.about');

Route::get('/contact',[homeController::class, 'contact']) -> name('home.contact');

Route::resource ('guitars', guitarController::class);

// Route::get('/store', function () {
//     $category = request ('category');

//     if (isset($category)) {
//         return 'You are viewing a store for ' . strip_tags ($category);
//     }
//     return 'You are viewing all instruments';
// });

Route::get('/store/{category?}/{item?}', function ($category=null, $item =null) {

    if (isset($category)) {

        if (isset($item)) {
            return "You are viewing a store for {$category} for {$item}";
        }
        return 'You are viewing a store for ' . strip_tags ($category);
    }
    return 'You are viewing all instruments';
});