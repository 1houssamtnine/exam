<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;

Route::middleware('auth')->group(function () {
    Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes.index');
    Route::get('/commandes/create', [CommandeController::class, 'create'])->name('commandes.create');
    Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store');
    Route::get('/commandes/{id}/edit', [CommandeController::class, 'edit'])->name('commandes.edit');
    Route::put('/commandes/{id}', [CommandeController::class, 'update'])->name('commandes.update');
    Route::delete('/commandes/{id}', [CommandeController::class, 'destroy'])->name('commandes.destroy');
    Route::get('commandes/{id}/details', [CommandeController::class, 'show'])->name('commandes.show');
    Route::post('commandes/{id}/add-produit', [CommandeController::class, 'addProduit'])->name('commandes.addProduit');
    Route::get('/stats', [CommandeController::class, 'stats'])->name('commandes.stats');
});