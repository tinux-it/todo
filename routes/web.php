<?php

use App\Livewire\TaskList;
use Illuminate\Support\Facades\Route;

Route::get('/test', TaskList::class);
Route::get('/', function () {
    return view('welcome');
});
