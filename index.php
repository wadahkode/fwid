<?php
/**
 * Bootstraped
 * 
 * @return object $app
 */
$app = require_once __DIR__.'/lib/bootstrap/app.php';

$test = $app->require('Wadahkode/Test/Test');

// Tanpa composer kalian dapat menambahkan, mengubah, atau menghapus kelas
// di lib/Wadahkode dan jika kalian menjalankan contoh dibawah ini
// kalian akan mendapat pesan Hello world!
// Sangat disarankan tanpa menggunakan composer karena versi library
// yang telah saya release masih belum stabil.
return $test->say("Hello world!");

// Jika kalian menggunakan composer dan kalian menjalankan contoh dibawah ini
// sudah pasti kalian akan mendapatkan error.
// $name = "Ayus irfang filaras";
// echo $test->myName($name);