<?php

use App\Http\Controllers\AttendenceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskprogressController;
use App\Http\Controllers\TestController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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



Route::middleware('auth')->get('/', [HomeController::class, 'dashboard'])->name('dashboard');


/**
 * 
 * Auth Module
 * 
 */


Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginPage')->name('showLoginPage');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegisterPage')->name('showRegisterPage');
    Route::post('/register', 'register')->name('register');
});


/**
 * 
 * Client Module
 * 
 */

Route::prefix('clients')->name('client.')->controller(ClientController::class)->group(function () {

    Route::get('/', 'getAllClient')->name('index');
    Route::get('/create', 'createClient')->name('create');
    Route::post('/', 'storeClient')->name('store');
    Route::get('/{client_id}/edit', 'editClient')->name('edit');
    Route::get('/{client_id}/show', 'showClient')->name('show');
    Route::put('/{client_id}', 'updateClient')->name('update');
    Route::post('/{client_id}', 'deleteClient')->name('delete');
});

/**
 * 
 * Developer Module
 * 
 */

Route::prefix('developers')->name('developer.')->controller(DeveloperController::class)->group(function () {

    Route::get('/', 'getAllDeveloper')->name('index');
    Route::get('/create', 'createDeveloper')->name('create');
    Route::post('/', 'storeDeveloper')->name('store');
    Route::get('/{developer_id}/edit', 'editDeveloper')->name('edit');
    Route::put('/{developer_id}', 'updateDeveloper')->name('update');
    Route::post('/{developer_id}', 'deleteDeveloper')->name('delete');
});

/**
 * 
 * Project Module
 * 
 */

Route::prefix('projects')->name('project.')->controller(ProjectController::class)->group(function () {

    Route::get('/', 'getAllProject')->name('index');
    Route::get('/create', 'createProject')->name('create');
    Route::post('/', 'storeProject')->name('store');
    Route::get('/{project_id}/edit', 'editProject')->name('edit');
    Route::post('/{project_id}', 'updateProject')->name('update');
    Route::post('/{project_id}', 'deleteProject')->name('delete');
});

/**
 * 
 * Task Module
 * 
 */

Route::prefix('tasks')->name('task.')->controller(TaskController::class)->group(function () {

    Route::get('/', 'getAllTask')->name('index');
    Route::get('/create', 'createTask')->name('create');
    Route::post('/', 'storeTask')->name('store');
    Route::get('/{task_id}/edit', 'editTask')->name('edit');
    Route::put('/{task_id}', 'updateTask')->name('update');
    Route::post('/{task_id}', 'deleteTask')->name('delete');

   // Route::get('/{project_id}','projectWiseTasks')->name('projectWiseTask');
});


Route::get('/project/{project_id}/tasks',[TaskController::class,'projectWiseTasks'])->name('projectWiseTask');
Route::get('/project/{project_id}/tasks/create',[TaskController::class,'projectWiseTaskCreate'])->name('projectWiseTaskCreate');
Route::post('/project/tasks/store',[TaskController::class,'projectWiseTaskStore'])->name('projectWiseTaskStore');
Route::delete('/project/{project_id}/tasks/delete',[TaskController::class,'projectWiseTaskDelete'])->name('projectWiseTaskDelete');


/**
 * 
 * Taskprogress Module
 */

Route::prefix('taskprogress')->name('taskprogress.')->controller(TaskprogressController::class)->group(function () {
    Route::get('/all', 'getAllTaskProgress')->name('index');
    Route::get('/create', 'createTaskProgress')->name('create');
    Route::get('/{taskprogress_id}/show', 'getAllTaskProgressByTaskId')->name('show');
    Route::post('/', 'storeTaskProgress')->name('store');
    Route::get('/{taskprogress_id}/edit', 'editTaskProgress')->name('edit');
    Route::put('/{taskprogress_id}', 'updateTaskProgress')->name('update');
    Route::post('/{taskprogress_id}', 'deleteTaskProgress')->name('delete');
});





/**
 * 
 * Attendence Module
 * 
 */


Route::prefix('attendence')->name('attendence.')->controller(AttendenceController::class)->group(function () {

    Route::get('/', 'index');
    Route::get('/login', 'login')->name('login');
    Route::get('/breakin', 'breakin')->name('breakin');
    Route::get('/breakout', 'breakout')->name('breakout');
    Route::get('/logout', 'logout')->name('logout');
});


//route file

Route::resource('tests', TestController::class);
