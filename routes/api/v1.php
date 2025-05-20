<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('setLocale')->group(function(){

    require base_path('routes/user.php');
    require base_path('routes/admin.php');

});
