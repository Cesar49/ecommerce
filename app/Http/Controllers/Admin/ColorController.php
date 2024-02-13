<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ColorModel;
use Auth;

class ColorController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ColorModel::getRecord();
        $data['header_title'] = "Color";
        return view('admin.color.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Agregar Nuevo Color";
        return view('admin.color.add', $data);
    }

     public function insert(Request $request)
    {
        //dd($request->all());

        
        $color = new ColorModel;
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->created_by = Auth::user()->id;
        $color->save();

        return redirect('admin/color/list')->with('success', "Color creado satisfactoriamente");
    }

    public function edit($id)
    {
        $data['getRecord'] = ColorModel::getSingle($id);
        $data['header_title'] = "Editar Color";
        return view('admin.color.edit', $data);
    }


    public function update($id, Request $request)
    {
       
        $color = ColorModel::getSingle($id);
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->save();

        return redirect('admin/color/list')->with('success', "Color actualizado satisfactoriamente");
    }


     public function delete($id)
    {
        $brand = ColorModel::getSingle($id);
        $brand->is_delete = 1;
        $brand->save();

        return redirect()->back()->with('success', "Color borrado satisfactoriamente");
    }
}
