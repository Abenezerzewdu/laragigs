<?php

use App\Http\Controllers\ListingController;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Name as NodeName;
use App\Models\Listing;

Route::get('/', [ListingController::class,'index']);

//show create form
Route::get('/listings/create',[ListingController::class,'create']);

Route::post('/listings',[ListingController::class,'store']);

//single listing
Route::get('/listing/{listing}',[ListingController::class,'show']);