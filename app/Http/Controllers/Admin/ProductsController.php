<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Models\Category;
use App\Models\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      
        $products = Product::all();
        $categories = Category::all();

        return view('admin.products.index',[ 
        'products'=> $products,
        'categories'=> $categories]);
    }

    //Guardar Datos
    public function store(Request $request)
    {
      //dd ( \App\Models\Models\Category::all() ); 
      $newProducts = new Product();
      $newProducts->name = $request->name;
      $newProducts->stock = $request->stock;
      $newProducts->category_id = $request->category_id;
       $newProducts->save();
      
       return redirect()->back();
    }
    
    //Actualizar Datos
    public function update(Request $request, $productsId)
    {
        $products = Product::find($productsId);

        $products->name = $request->name;
        $products->category_id = $request->category_id;
        $products->stock = $request->stock;
               

        $products->save();

       return redirect()->back();
    }


    //Eliminar Datos
    public function delete(Request $request, $productsId)
    {
      
       $products = Product::find($productsId);
       $products->delete();
      
       return redirect()->back();
    }

}
  