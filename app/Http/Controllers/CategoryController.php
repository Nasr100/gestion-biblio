<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function getCategoriesView(){
        $categories=Category::orderBy('id','asc')->paginate(7);
        return view('pages.categories.categories',compact('categories'));
    }
    function storeCategory(Request $request){
        // dd($request->categoryName);
        $request->validate([
            'categoryName'=>'required|string',
        ]);

        $category=new Category ;
        $category->Category_Name=$request->categoryName;

        $category->save();

        return response()->json([
            'status'=>'success',
        ]);
    }
    function updateCategory(Request $request){
        $request->validate([
            'categoryName'=>'required|string',
        ]);
        $category=Category::find($request->id);
        $category->Category_Name=$request->categoryName;
        $category->save();

        return response()->json([
            'status'=>'success',
        ]);
    }

    function deleteCategory(Request $request){
        Category::find($request->up_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);

    }
}
