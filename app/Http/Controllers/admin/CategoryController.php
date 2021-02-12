<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required'
        ],[
            'name.required'=>'Se debe especificar el nombre de la categoria'
        ]);
        Category::create($request->all());
        return back();
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'=>'required'
        ],[
            'name.required'=>'Se debe especificar el nombre de la categoria'
        ]);

        $category_id = $request->input('category_id');
        $category = Category::find($category_id);
        $category->name = $request->input('name');
        $category->save();
        return back();

    }

    public function delete($id)
    {
        Category::find($id)->delete();
        return back();
    }
}
