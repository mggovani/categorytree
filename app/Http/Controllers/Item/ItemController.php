<?php

namespace App\Http\Controllers\Item;

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

class ItemController extends Controller
{
   public function view() {
        $subcategory = Subcategory::where('parent_id','=',Auth::User()->id)->pluck('subcategory', 'id');
         return view('item.item',compact('subcategory'));
   }
  public function item_data() {
      $item = DB::table('item')->join('subcategory','subcategory.id','item.subcategory_id')->select('item.id','item.item','subcategory.subcategory')->where('item.parent_id',Auth::User()->id)->get();
       return Datatables::of($item)->addIndexColumn()->addColumn('action', function ($item) {
                    return '<a href="#edit" id="edit_item" title="Edit"  class="btn btn-sm btn-info margin-left-5" data-id="' . $item->id . '"  data-target="#edit" data-toggle="modal" > EDIT</a> &nbsp;'
                            . '<a href="#delete"  title="Delete" data-target="#delete"  data-toggle="modal"  data-id="' . $item->id . '" id="delete_item" item-name="'.$item->item.'" class="btn btn-sm btn-danger margin-left-5"> DELETE</a>';
                })->make(true);
   }

   public function store(Request $request) {
      $all = $request->all();
      $all['parent_id'] = Auth::User()->id;
      Item::create($all);
    return response()->json([
                  'status' => 'success',
                  'message' => $all['item'].' created',
                  'url' => route('item'),
      ]);
     
   }

   public function edit($Item) {
      $item = Item::find($Item);
      return $item;
   }
    public function update(Request $request, $Item) {
      $item=Item::findOrFail($Item);
      $item_name=Item::where('id',$Item)->get();
      $all = $request->all();
      Item::find($Item)->update($all);
      return response()->json([
                  'status' => 'success',
                  'message' => $item_name[0]['item'].' updated ',
                  'url' => route('item'),
      ]);
      
   }

   public function delete($id) {
         $item=Item::where('id',$id)->get();
         Item::findOrFail($id)->delete();
         return response()->json([
                     'status' => 'success',
                     'message' => $item[0]['item']. ' deleted',
         ]);
   }

}
