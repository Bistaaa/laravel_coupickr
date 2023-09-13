<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Store;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.dashboard', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::find($id);

        return view('dashboard.category.show', compact('category'));
    }
}
