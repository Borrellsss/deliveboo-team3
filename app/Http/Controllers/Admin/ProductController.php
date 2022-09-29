<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // salvo in una variabile l'utente al momento loggato
        $user = Auth::user();

        // salvo in $products tutta la lista dei prodotti associati all'utente loggato
        $products = $user->product;

        // dd($products);

        $data = [
            'products' => $products
        ];

        return view('admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validiamo i dati ottenuti dal form
        $request->validate($this->getValidationRules());

        // una volta validati se sono corretti li salviamo in $form_data
        $form_data = $request->all();
        $form_data['cooking_time'] = intval($form_data['cooking_time']);
        $form_data['price'] = floatval($form_data['price']);

        // dd($form_data);

        $user = Auth::user();
        
        // se la chiave $form_data['cover'] è settata salviamo l'immagine nella cartella dishes-cover e salviamo il path dell'immagine in $form_data['cover'] 
        if(isset($form_data['cover'])) {
            $cover_path = Storage::put('dishes-cover', $form_data['cover']);
            $form_data['cover'] = $cover_path;

            $user->product()->create([
                'name' => $form_data['name'],
                'cover' => $form_data['cover'],
                'description' => $form_data['description'],
                'ingredients' => $form_data['ingredients'],
                'cooking_time' => $form_data['cooking_time'],
                'price' => $form_data['price'],
            ]);
        } else {
            $user->product()->create([
                'name' => $form_data['name'],
                'description' => $form_data['description'],
                'ingredients' => $form_data['ingredients'],
                'cooking_time' => $form_data['cooking_time'],
                'price' => $form_data['price'],
            ]);
        }

        // converto la collection $user->product in un array tramite la funzione getArrayFromCollection()
        $new_array = $this->getArrayFromCollection($user->product);

        // mi calcolo l'ultima key(index) dell'array $new_array
        $last_array_key = count($new_array) - 1;

        // passo nel return l'ultimo prodotto creato presente nell'array $new_array
        return redirect()->route('admin.products.show', ['product' => $new_array[$last_array_key]['id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();

        // converto la collection $user->product in un array tramite la funzione getArrayFromCollection()
        $new_array = $this->getArrayFromCollection($user->product);

        // definisco un array vuoto $ids_array
        $ids_array = [];

        // tramite un ciclo foreach mi salvo l'id di ogni $item nell'array $ids_array
        foreach($new_array as $item) {
            $ids_array[] = $item['id'];
        }

        // mi prendo tramite findOrFail il prodotto da mostrare in pagina tramite $id e lo salvo in $product
        $product = Product::findOrFail($id);

        // se $product->id è presente in $ids_array salvo $product nei $data e lo passo alla view altrimenti ritorno la pagina 404
        if(in_array($product->id, $ids_array)) {
            $data = [
                'product' => $product
            ];
        } else {
            return abort('404');
        }

        return view('admin.products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $data = [
            'product' => $product
        ];

        return view('admin.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // funzione per validare i dati del form
    public function getValidationRules() {
        return [
            'name' => ['required', 'string', 'max:255'],
            'cover' => ['image', 'max:1024', 'nullable'],
            'description' => ['max:60000', 'nullable'],
            'ingredients' => ['max:60000', 'nullable'],
            'cooking_time' => ['max:2', 'nullable'],
            'price' => ['required', 'numeric', 'between: 0.01, 999.99'],
        ];
    }

    // funzione per convertire una collection in un array
    public function getArrayFromCollection($collection) {
        return $collection->toArray();
    }
}
