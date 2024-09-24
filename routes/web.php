<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

// Route to display the page with the form (using app.blade.php)
Route::get('/', function () {
    return view('app'); // This will load resources/views/app.blade.php
});
