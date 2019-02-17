<?php

namespace App\Http\Controllers\Subcategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Subcategory;
use App\User;
use App\Item;
use DataTables;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;

class SubcategoryController extends Controller
{
   public function view() {
        $category = Category::where('parent_id','=',Auth::User()->id)->pluck('category', 'id');
         return view('subcategory.subcategory',compact('category'));
   }
  public function subcategory_data() {
      $subcategory = DB::table('subcategory')->join('category','category.id','subcategory.category_id')->select('subcategory.id','subcategory.subcategory','category.category')->where('subcategory.parent_id',Auth::User()->id)->get();
       return Datatables::of($subcategory)->addIndexColumn()->addColumn('action', function ($subcategory) {
                    return '<a href="#edit" id="edit_subcategory" title="Edit"  class="btn btn-sm btn-info margin-left-5" data-id="' . $subcategory->id . '"  data-target="#edit" data-toggle="modal" > EDIT</a> &nbsp;'
                            . '<a href="#delete"  title="Delete" data-target="#delete"  data-toggle="modal"  data-id="' . $subcategory->id . '" id="delete_subcategory" subcategory-name="'.$subcategory->subcategory.'" class="btn btn-sm btn-danger margin-left-5"> DELETE</a>';
                })->make(true);
   }

   public function store(Request $request) {
      $all = $request->all();
      $all['parent_id'] = Auth::User()->id;
      Subcategory::create($all);
    return response()->json([
                  'status' => 'success',
                  'message' => $all['subcategory'].' created',
                  'url' => route('subcategory'),
      ]);
     
   }

   public function edit($Subcategory) {
      $subcategory = Subcategory::find($Subcategory);
      return $subcategory;
   }
    public function update(Request $request, $Subcategory) {
      $subcategory=Subcategory::findOrFail($Subcategory);
      $subcategory_name=Subcategory::where('id',$Subcategory)->get();
      $all = $request->all();
      Subcategory::find($Subcategory)->update($all);
      return response()->json([
                  'status' => 'success',
                  'message' => $subcategory_name[0]['subcategory'].' updated ',
                  'url' => route('subcategory'),
      ]);
      
   }

   public function delete($id) {
         $subcategory=Subcategory::where('id',$id)->get();
         Item::where('subcategory_id', $id)->delete();
         Subcategory::findOrFail($id)->delete();
         return response()->json([
                     'status' => 'success',
                     'message' => $subcategory[0]['subcategory']. ' deleted',
         ]);
   }

}
