<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;

class ProductController extends Controller
{
    public function getCategory($slug, $subslug = '')
    {     
      
      $getCategory = CategoryModel::getSingleSlug($slug);
      $getSubCategory = SubCategoryModel::getSingleSlug($subslug);

      if (!empty($getCategory) && !empty($getSubCategory))
      {
        
        $data['meta_title'] = $getSubCategory->meta_title;
        $data['meta_keywords'] = $getSubCategory->meta_keywords;
        $data['meta_description'] = $getSubCategory->meta_description;

        $data['getSubCategory'] = $getSubCategory;
        $data['getCategory'] = $getCategory;
        return view('product.list', $data);
        
      }elseif (!empty($getCategory)) 
      {

        $data['getCategory'] = $getCategory;

        $data['meta_title'] = $getCategory->meta_title;
        $data['meta_keywords'] = $getCategory->meta_keywords;
        $data['meta_description'] = $getCategory->meta_description;
        
        return view('product.list', $data);

      } else 
      {
          abort(404);
      }
        
    }
}
