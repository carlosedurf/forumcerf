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

Route::get('/', function () {
    return redirect()->route('threads.index');
});

Route::middleware(['access.control.list'])->group(function (){

    Route::resource('threads', \App\Http\Controllers\ThreadController::class);

});

Route::post('/replies/store', [\App\Http\Controllers\ReplyController::class, 'store'])->name('replies.store');

Auth::routes();

Route::middleware(['auth', 'access.control.list'])->prefix('manager')->group(function (){

    Route::get('/', function (){
        return redirect()->route('users.index');
    });

    Route::resource('roles', \App\Http\Controllers\Manager\RoleController::class);
    Route::get('roles/{role}/resources', [\App\Http\Controllers\Manager\RoleController::class, 'syncResources'])->name('roles.resources');
    Route::put('roles/{role}/resources', [\App\Http\Controllers\Manager\RoleController::class, 'updateSyncResources'])->name('roles.resources.update');

    Route::resource('users', \App\Http\Controllers\Manager\UserController::class);
    Route::resource('resources', \App\Http\Controllers\Manager\ResourceController::class);

});

//Coloque dentro do group do manager logo após as rotas de recursos e papeis.

Route::resource('modules', \App\Http\Controllers\Manager\ModuleController::class);

Route::get('modules/{module}/resources', [\App\Http\Controllers\Manager\ModuleController::class, 'syncResources'])->name('modules.resources');

Route::put('modules/{module}/resources', [\App\Http\Controllers\Manager\ModuleController::class, 'updateSyncResources'])->name('modules.resources.update');

//Route::get('routes', function (){
//    foreach (Route::getRoutes() as $route){
//        if(!empty($route->getName())){
//            print $route->getName() . "<hr/>";
//        }
//    }
//});
