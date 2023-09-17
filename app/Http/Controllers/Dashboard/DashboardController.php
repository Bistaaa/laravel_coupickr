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









    public function showStores($id)
    {
        $stores = Store::where('category_id', $id)->get();

        return view('dashboard.section.store-show', compact('stores'));
    }

    public function editStore($category_id, $store_id)
    {
        $store = Store::findOrFail($store_id);
        $category = Category::findOrFail($category_id);  // Recupera la categoria dal database
        $stores = Store::all();

        return view('dashboard.section.store-edit', compact('store', 'stores', 'category'));
    }

    public function toggleVisibilityStore(Request $request, $category_id, $store_id)
    {
        $store = Store::findOrFail($store_id);

        $store->is_hidden = !$store->is_hidden;
        $store->save();

        return redirect()->back()->with('success', 'Visibility toggled successfully!');
    }

    public function storeStore(Request $request, $category_id)
    {
        $data = $request->validate([
            'store_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'required|url|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'logo' => 'nullable|image',
            'affiliation_code' => 'nullable|string|max:255',
            'discount' => 'required|numeric',
            'commission' => 'required|numeric',
            'is_hidden' => 'nullable|boolean'
        ]);


        /* if (array_key_exists('img', $data) && $data['img'] !== null) {
            $data['img'] = Storage::put('uploads', $data['img']);
        } else {
            $data['img'] = null;
        } */

        // Se la chiave "visibility" esiste e il suo valore è true o "on",
        // imposta "is_hidden" a false, altrimenti imposta "is_hidden" a true.
        $data['is_hidden'] = $request->input('visibility') === true || $request->input('visibility') === 'on' ? false : true;

        // Crea un nuovo negozio con i dati validati
        $store = Store::create($data);

        // Recupera l'ID della categoria dal negozio appena creato
        $category_id = $store->category_id;

        // Reindirizza alla pagina appropriata con un messaggio di successo
        return redirect()->route('store.show', ['id' => $category_id]);
    }









    /////////////////////////
    //CRUD CATEGORIE
    /////////////////////////

    public function updateCategory(Request $request, $id)
    {

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

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('store.show');
    }








    public function updateStore(Request $request, $id)
    {
        // Valida i dati inviati nel form
        $data = $request->validate([
            'store_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'required|url|max:255',
            'category_id' => 'required|integer|exists:categories,id', // assicuriamoci che category_id esista nella tabella delle categorie
            'logo' => 'nullable|string|max:255', // o 'image' se carichi un file immagine
            'affiliation_code' => 'nullable|string|max:255',
            'discount' => 'required|numeric',
            'commission' => 'required|numeric'
        ]);

        // Trova lo store nel database o ritorna un errore 404 se non trovato
        $store = Store::findOrFail($id);

        // Aggiorna lo store con i dati validati
        $store->update($data);


        // Reindirizza alla pagina di modifica dello store con un messaggio di successo
        return redirect()->route('store.edit', ['category_id' => $store->category_id, 'store_id' => $store->id]);
    }

    public function createStore(Request $request, $category_id)
    {
        return view('dashboard.section.store-create', compact('category_id'));
    }




    public function deleteStore($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();

        return redirect()->back();
    }

}
