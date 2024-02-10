<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Auth;

class CategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = CategoryModel::getRecord();
        $data['header_title'] = "Categorias";
        return view('admin.category.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Agregar Nueva Categoria";
        return view('admin.category.add', $data);
    }

     public function insert(Request $request)
    {
        //dd($request->all());

        request()->validate([
          'slug' => 'required|unique:category'
        ]);

        $category = new CategoryModel;
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->status = trim($request->status);
        $category->meta_title = trim($request->meta_title);
        $category->meta_description = trim($request->meta_description);
        $category->meta_keywords = trim($request->meta_keywords);
        $category->created_by = Auth::user()->id;
        $category->save();

        return redirect('admin/category/list')->with('success', "Categoria creada satisfactoriamente");
    }

    public function edit($id)
    {
        $data['getRecord'] = CategoryModel::getSingle($id);
        $data['header_title'] = "Editar Categoria";
        return view('admin.category.edit', $data);
    }


    public function update($id, Request $request)
    {
        request()->validate([
          'slug' => 'required|unique:category,slug,'.$id
        ]);

        $category = CategoryModel::getSingle($id);
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->status = trim($request->status);
        $category->meta_title = trim($request->meta_title);
        $category->meta_description = trim($request->meta_description);
        $category->meta_keywords = trim($request->meta_keywords);
        $category->save();

        return redirect('admin/category/list')->with('success', "Categoria actualizada satisfactoriamente");
    }

    public function delete($id)
    {
        $category = CategoryModel::getSingle($id);
        $category->is_delete = 1;
        $category->save();

        return redirect()->back()->with('success', "Categoria borrada satisfactoriamente");
    }
}
