<?php

use Wadahkode\Http\Route;

Route::get("/", "Welcome@index");
Route::get("/admin", "Admin@index");
Route::get("/home", "Home@index");