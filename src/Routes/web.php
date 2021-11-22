<?php

use Wadahkode\Http\Route;

Route::get("/", "Welcome@index");
Route::get("/contact", "Contact@index");
Route::get("/about", "About@index");

Route::get("/tutorial", "Tutorial@index");

Route::get("/admin", "Admin@index");
Route::get("/admin/login", "Auth/Login@index");
Route::get("/admin/register", "Auth/Register@index");

Route::get("/admin/dashboard", "Dashboard@index");

Route::post("/admin/signin", "Auth/Authenticated@index");


Route::get("/home", "Home@index");