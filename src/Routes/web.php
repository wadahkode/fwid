<?php

use Wadahkode\Http\Route;

Route::get("/", "Welcome@index");

Route::get("/tutorial", "Tutorial@index");

Route::get("/admin", "Admin@index");
Route::get("/admin/login", "Auth/Login@index");
Route::get("/admin/register", "Auth/Register@index");


Route::get("/home", "Home@index");