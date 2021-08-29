<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      
        $categories = Category::all();
        return view('admin.categories.index', [ 'categories'=> $categories]);
    }

    //Guardar Datos
    public function store(Request $request)
    {
      //dd ( \App\Models\Models\Category::all() ); 
      $newCategory = new Category();
      $newCategory->name = $request->name;
       $newCategory->save();
      
       return redirect()->back();
    }
    
    //Actualizar Datos
    public function update(Request $request, $categoryId)
    {
      
        $category = Category::find($categoryId);
      
      $category->name = $request->name;
       $category->save();
      
       return redirect()->back();
    }

    //Eliminar Datos
    public function delete(Request $request, $categoryId)
    {
      
       $category = Category::find($categoryId);
       $category->delete();
      
       return redirect()->back();
    }

}   
