<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categorys = Category::all();

        return view('category.index', compact('categorys'));
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $categorys = new Category;
        $categorys->nama = $request->nama;
        $categorys->save();

        return redirect()->route('category.index');
    }

    public function edit($id){
        $categorys = Category::findOrFail($id);

        return view('category.edit', compact('categorys'));
    }

    public function update(Request $request, $id){
        $categorys = Category::findOrFail($id);
        $categorys->nama = $request->nama;
        $categorys->save();

        return redirect()->route('category.index');
    }

    public function destroy($id){
        $categorys = Category::findOrFail($id);
        $categorys->delete();

        return redirect()->route('category.index');
    }
}
