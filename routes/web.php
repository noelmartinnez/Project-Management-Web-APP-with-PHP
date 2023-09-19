<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\IssueController;

Route::get('/', function () {
    return view('index');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::middleware('login')->group(function () {
    Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');
    Route::middleware('project-boss')->group(function () {
        Route::get('projects/create', [ProjectsController::class, 'create']);
        Route::post('projects', [ProjectsController::class, 'store']);
        Route::get('projects/edit/{id}', [ProjectsController::class, 'edit']);
        Route::put('projects/{id}', [ProjectsController::class, 'update']);
        Route::delete('/projects/delete/{id}', [ProjectsController::class, 'delete']);
        Route::get('/dashboard', [TaskController::class, 'dashboard']);
    });
    Route::get('/projects/order-by-name', [ProjectsController::class, 'orderByName'])->name('projects.order-by-name');
    Route::get('/projects/order-by-description', [ProjectsController::class, 'orderByDescription'])->name('projects.order-by-description');

    Route::get('/tasks', [TaskController::class, 'index']);
    Route::get('/tasks/create', [TaskController::class, 'create']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/tasks/{task_id}/edit', [TaskController::class, 'edit']);
    Route::put('/tasks/{task_id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{task_id}', [TaskController::class, 'delete']);

    Route::get('/issues', [IssueController::class, 'index']);
    Route::get('/issues/create', [IssueController::class, 'create']);
    Route::post('/issues', [IssueController::class, 'store']);
    Route::get('/issues/{issues_id}/edit', [IssueController::class, 'edit']);
    Route::put('/issues/{issues_id}', [IssueController::class, 'update']);
    Route::delete('/issues/{issues_id}', [IssueController::class, 'delete']);
});

//PANEL DE ADMINISTRACIÓN

Route::middleware('login', 'admin')->group(function () {

    // Administrador de users
    Route::get('/admin/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/admin/users/search-name', [UsersController::class, 'searchByName'])->name('users.search-name');
    Route::get('/admin/users/search-email', [UsersController::class, 'searchByEmail'])->name('users.search-email');
    Route::get('/admin/users/order-by-name', [UsersController::class, 'orderByName'])->name('users.order-by-name');
    Route::get('/admin/users/order-by-email', [UsersController::class, 'orderByEmail'])->name('users.order-by-email');
    Route::get('/admin/users/order-by-rol', [UsersController::class, 'orderByRol'])->name('users.order-by-rol');
    Route::get('/admin/users/create', [UsersController::class, 'create']);
    Route::post('/admin/users', [UsersController::class, 'store']);
    Route::get('/admin/users/{id}/edit', [UsersController::class, 'edit']);
    Route::put('/admin/users/{id}', [UsersController::class, 'update']);
    Route::delete('/admin/users/{id}', [UsersController::class, 'delete']);

    // Administracion de roles
    Route::get('/admin/roles', [RolesController::class, 'list'])->name('roles.list');
    Route::get('/admin/roles/create', [RolesController::class, 'create']);
    Route::get('/admin/roles/update/{id}', [RolesController::class, 'update']);
    Route::post('/admin/roles', [RolesController::class, 'save_new']);
    Route::put('/admin/roles', [RolesController::class, 'save_updated']);
    Route::delete('/admin/roles/delete/{id}', [RolesController::class, 'delete']);

    // Administracion de tareas
    Route::get('/admin/tasks', [TaskController::class, 'index']);
    Route::get('/admin/tasks/create', [TaskController::class, 'create']);
    Route::post('/admin/tasks', [TaskController::class, 'store']);
    Route::get('/admin/tasks/{task_id}/edit', [TaskController::class, 'edit']);
    Route::put('/admin/tasks/{task_id}', [TaskController::class, 'update']);
    Route::delete('/admin/tasks/{task_id}', [TaskController::class, 'delete']);

    // Administracion de issues
    Route::get('/admin/issues', [IssueController::class, 'index']);
    Route::get('/admin/issues/create', [IssueController::class, 'create']);
    Route::post('/admin/issues', [IssueController::class, 'store']);
    Route::get('/admin/issues/{issues_id}/edit', [IssueController::class, 'edit']);
    Route::put('/admin/issues/{issues_id}', [IssueController::class, 'update']);
    Route::delete('/admin/issues/{issues_id}', [IssueController::class, 'delete']);
});

Auth::routes();
