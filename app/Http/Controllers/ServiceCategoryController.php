<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceCategory;

class ServiceCategoryController extends Controller
{
    public static function category()
    {
    	return ServiceCategory::get();
    }
}
