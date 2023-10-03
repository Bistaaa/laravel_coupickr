<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Store;

class ApiController extends Controller
{
    public function categoriesList()
    {
        $categories = Category::all();

        return response()->json([
            'categories' => $categories,
        ]);
    }

    public function storesList($id)
    {
        $stores = Store::where('category_id', $id)->get();
        $categorySelected = Category::findOrFail($id);
        return response()->json([
            'stores' => $stores,
            'categorySelected' => $categorySelected,
        ]);
    }

    public function getStoreById($id)
    {
        $StoreById = Store::findOrFail($id);

        return response()->json(['StoreById' => $StoreById]);
    }
}
