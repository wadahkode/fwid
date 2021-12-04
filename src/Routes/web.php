<?php

use Wadahkode\Http\Route;

Route::get("/", "Welcome@index");
Route::get("/contact", "Contact@index");
Route::get("/about", "About@index");

Route::get("/tutorial", "Tutorial@index");

Route::get("/admin", "Admin@index");
Route::get("/admin/login", "Auth/Login@index");
Route::get("/admin/register", "Auth/Register@index");
Route::post("/admin/signin", "Auth/Authenticated@index");

Route::get("/admin/dashboard", "Dashboard@index");
Route::get("/admin/dashboard/posts", "Dashboard@getPost");
Route::get("/admin/dashboard/newpost", "Dashboard@createNewPost");
Route::get("/admin/dashboard/posts/edit/{id}", "Dashboard@editPost");
Route::get("/admin/dashboard/profile/{id}", "Dashboard@profile");
Route::get("/admin/logout", "Dashboard@logout");

Route::get("/admin/help/password", "Help@index");
Route::get("/admin/help/password/s/modify/{id}", "Help@confirmChangePassword");
Route::post("/admin/help/password/save", "Help@updatePassword");
Route::post("/admin/help/password/request", "Help@changePassword");

Route::post("/admin/dashboard/posts/delete/{id}", "Tutorial@delete");
Route::post("/api/posts/publish", "Postingan@publish");
Route::post("/api/posts/update", "Postingan@update");

Route::get("/pages", "Pages@index");

Route::get("/api/posts/tutorial", "Tutorial@getTutorial");
Route::get("/api/visitor", "Visitor@index");


Route::get("/home", "Home@index");