<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class ApiController extends Controller
{
    public function categoriesLyst()
    {
        $categories = Category::all();

        return response()->json([
            'categories' => $categories,
        ]);
    }
}
