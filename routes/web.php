<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ('HELLO WORLD HELLO PHP PROFESSOR');
});
Route::get('/module2a/price_engine_refactored', function () {
    include public_path('module2a/price_engine_refactored.php');
});
Route::get('/module2b/cosmic_calendar', function () {
    include public_path('module2b/cosmic_calendar.php');
});
Route::get('/module3a/contact_form', function () {
    include public_path('module3a/ContactForm.php');
});


