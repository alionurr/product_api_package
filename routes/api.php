<?php

use Illuminate\Support\Facades\Route;
use Product\ProductApi\Http\Controller\ProductController;

Route::get('api/search/{provider}', [ProductController::class, 'search']);