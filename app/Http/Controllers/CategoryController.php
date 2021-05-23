<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::select('id', 'parent_id','cat_name')->where('parent_id', '0')->with('childrencategories')->get();
        return view('home', compact('categories', $categories) );
    }

    public function addCategories(Request $request) {
        
        for($i = 1; $i <=2 ; $i++ ) {
            $cat = new Category();
            $cat->parent_id = $request->parentId;
            $cat->cat_name  = 'SUB ' . $request->selectedCatValue . '-' . $i;

            $cat->save();
        }
        $added_cats = Category::latest()->take(2)->get();
        return response()->json($added_cats);
    }

    public function deleteCategories() {
        $keep = Category::where('id', '>', 2)->get();
        foreach($keep as $k) {
            $k->delete();
        }

        return redirect()->back();
    }
}
