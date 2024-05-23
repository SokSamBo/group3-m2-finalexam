<?php

use Group3M2\ContactForm\Http\Controllers\ContactFormController;
use Illuminate\Support\Facades\Route;

Route::get('/contact', [ContactFormController::class, 'showForm']);
Route::post('/contact', [ContactFormController::class, 'submitForm'])->name('contact.submit');
Route::get('/thank-you', [ContactFormController::class, 'thankYou'])->name('contact.thank-you');

Route::middleware(['auth'])->group(function () {
    Route::get('admin/contacts', [ContactFormController::class, 'listContacts'])->name('admin.contacts');
});