<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Store;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function editCategories($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();

        return view('category-edit', compact('category', 'categories'));
    }




    /////////////////////////
    //CRUD CATEGORIE
    /////////////////////////

    public function updateCategories(Request $request, $id)
    {

        // Metodo per aggiornare i dati di un piatto esistente
        $data = $request->validate(
            [
            'name' => 'required|string|max:64',
            /* 'img' => 'required|string|max:255', */
            ]
        );

        $category = Category::findOrFail($id);

        $category->update($data);

        return redirect()->route('categories.edit', $category->id);

    }
}
