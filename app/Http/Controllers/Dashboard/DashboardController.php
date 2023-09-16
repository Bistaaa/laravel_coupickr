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
        $categories = Category::all(); // Aggiungi questa riga per ottenere tutte le categorie

        return view('dashboard.dashboard', compact('category', 'categories'));
    }


    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();

        return view('category-edit', compact('category', 'categories'));
    }

    public function toggleVisibility($id)
    {
        $category = Category::findOrFail($id);

        // Cambia lo stato di 'is_hidden' e salva.
        $category->is_hidden = !$category->is_hidden;
        $category->save();

        return redirect()->route('dashboard.home')->with('success', 'Visibilità della categoria aggiornata con successo!');
    }

    public function storeCategory(Request $request)
    {
        // Metodo per salvare una nuova categoria nel database
        $data = $request->validate([
            'name' => 'required|string|max:64',
            'img' => 'sometimes|image|max:5000', // validazione come immagine con un max di 5MB, "sometimes" significa che non è sempre richiesto
            'visibility' => 'required|boolean'
        ]);

        // Controlla se c'è un'immagine e salvala nella cartella "uploads"
        if (array_key_exists('img', $data) && $data['img'] !== null) {
            $data['img'] = Storage::put('uploads', $data['img']);
        } else {
            $data['img'] = null;
        }

        // Converti il valore "visibility" in "is_hidden"
        $data['is_hidden'] = !$request->input('visibility');

        // Crea una nuova categoria con i dati validati
        $category = Category::create($data);

        return redirect()->route('category.show', $category->id);
    }






    /////////////////////////
    //CRUD CATEGORIE
    /////////////////////////

    public function updateCategory(Request $request, $id)
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

        return redirect()->route('category.edit', $category->id);

    }

    public function createCategory()
    {
        // Metodo per visualizzare il formulario di creazione dei piatti
        $category = Category::all();

        return view('dashboard.section.category-create', compact('category'));
    }
}
