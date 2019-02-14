<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Subcategory;
use App\Item;
use App\User;
use DataTables;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
   public function view() {
         return view('category.category');
   }
   public function tree() {
      $category = Category::where('parent_id',Auth::User()->id)->get();
      $subcategory = Subcategory::where('parent_id',Auth::User()->id)->get();
      $item = Item::where('parent_id',Auth::User()->id)->get();
         return view('category.tree', compact('category','subcategory','item'));
   }
  public function category_data() {
      $category = Category::select('id','category')->where('parent_id',Auth::User()->id)->get();
       return Datatables::of($category)->addIndexColumn()->addColumn('action', function ($category) {
                    return '<a href="#edit" id="edit_category" title="Edit"  class="btn btn-sm btn-info margin-left-5" data-id="' . $category->id . '"  data-target="#edit" data-toggle="modal" > EDIT</a> &nbsp;'
                            . '<a href="#delete"  title="Delete" data-target="#delete"  data-toggle="modal"  data-id="' . $category->id . '" id="delete_category" category-name="'.$category->category.'" class="btn btn-sm btn-danger margin-left-5"> DELETE</a>';
                })->make(true);
   }

   public function store(Request $request) {
      $all = $request->all();
      $all['parent_id'] = Auth::User()->id;
      Category::create($all);
    return response()->json([
                  'status' => 'success',
                  'message' => $all['category'].' created',
                  'url' => route('category'),
      ]);
     
   }

   public function edit($Category) {
      $category = Category::find($Category);
      return $category;
   }
    public function update(Request $request, $Category) {
      $category=Category::findOrFail($Category);
      $category_name=Category::where('id',$Category)->get();
      $all = $request->all();
      Category::find($Category)->update($all);
      return response()->json([
                  'status' => 'success',
                  'message' => $category_name[0]['category'].' updated ',
                  'url' => route('category'),
      ]);
      
   }

   public function delete($id) {
         $category=Category::where('id',$id)->get();
         Category::findOrFail($id)->delete();
         return response()->json([
                     'status' => 'success',
                     'message' => $category[0]['category']. ' deleted',
         ]);
   }

}
