<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

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

        // se la chiave $form_data['cover'] è settata salviamo l'immagine nella cartella dishes-cover e salviamo il path dell'immagine in $form_data['cover'] 
        if(isset($form_data['cover'])) {
            $cover_path = Storage::put('dishes-cover', $form_data['cover']);
            $form_data['cover'] = $cover_path;
        }

        // creiamo una nuova istanza di products e la salviamo nel database
        $new_product = new Product();
        $new_product->fill($form_data);
        $new_product->save();   

        // dd($new_product);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
