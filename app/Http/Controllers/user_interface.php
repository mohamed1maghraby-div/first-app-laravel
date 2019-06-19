<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Item;
use App\Reequest;
use Illuminate\Support\Facades\Auth;
use App\User;
class user_interface extends Controller
{
    // for creating items
    public function create_items(Request $request){
        if($request->isMethod('post')){
                $newitem = new Item();
                $newitem->item_name=$request->input('item_name');
                $newitem->quantity=$request->input('quantity');
                $newitem->price=$request->input('price');
                $newitem->save();
        }
        $items= Item::all();
        return view('user_interface.items', compact('items'));
    }
    //for deleting items
    public function item_delete($id){
            $item_delete=Item::find($id);
            $item_delete->delete();
            return redirect("items");
    }
    //for editing items
    public function item_edit(Request $request,$id){
        if($request->isMethod('post')){
                $newitem =Item::find($id);
                $newitem->item_name=$request->input('item_name');
                $newitem->quantity=$request->input('quantity');
                $newitem->price=$request->input('price');
                $newitem->save();
            return redirect("items");
        }else{
                $items= Item::find($id);
                return view('user_interface.item_edit', compact('items'));
        }
    }
  //for creating requests
    public function requests(Request $request){
        $items= Item::all();
        $show_req = Reequest::all();
       if($request->isMethod('post')){
           foreach($items as $item){
               if(!empty($request->input('items'.$item->id))){
               $this->validate($request,[
                   'quantities'.$item->id => 'required|min:0|max:'.$item->quantity,
                   'items'.$item->id => 'required'
               ]);
                $req = new Reequest();
                $req->rdate= date("Y-m-d");
                $req->customer_name= auth()->user()->name;
                $req->items=$request->input('items'.$item->id);
                $req->quantities=$request->input('quantities'.$item->id);
                $req->save();
                   
               $new_quantity = $item->quantity - $request->input('quantities'.$item->id);
                   
                $edting_item =Item::find($item->id);
                $edting_item->quantity= $new_quantity;
                $edting_item->save();
                   
               $new_quantity=0;
               }
            }
           return redirect("requests");
        }
        
        return view('user_interface.requests', compact('items','show_req'));
    }
        //for deleting requests
    public function request_delete($id,$items){
            
                $request_delete=Reequest::find($id);
                    
                $delete_item =Item::find($id);
                $delete_item = Item::where('item_name', $items)->first();
                $new_delete_quantity = $delete_item->quantity + $request_delete->quantities;
                $delete_item->quantity=$new_delete_quantity;
                $delete_item->save();
                $request_delete->delete();
        
                return redirect("requests");
    }
    
   public function user_profile(Request $request, $id){
       $user_id = auth()->user()->id;
        $user = User::find($id);
       
        if($request->isMethod('patch')){
            
              $this->validate($request,[
                    'name' => 'required|max:255',
                    'user_name' => 'required|min:6',
                    'email' => 'required|email|max:255|unique:users,id,'.$user->id,
                    'password' => 'required|min:6|confirmed',
                ]);
        $user->name = $request->input('name');;
        $user->email = $request->input('email');;
        $user->user_name = $request->input('user_name');
        $user->password = bcrypt($request->input('password')); 
        $user->save();
        }
       
        return view('user_interface.user_profile', compact('user',  'user_id'));
  
    }
    public function user_profilee(){
             $user_id = auth()->user()->id;
        $user =  User::find($user_id);
        return view('user_interface.user_profile', compact('user',  'user_id'));
    
    }

}
