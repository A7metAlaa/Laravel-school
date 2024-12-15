<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserView(){
 
        $data  = User::all();
        // $trasheddata = User::withTrashed()->get();
        // $trasheddata  = User::onlyTrashed()->latest();
        $trasheddata = User::onlyTrashed()->get();


         return view('backend.user.view_user',get_defined_vars());
           
   }
    public function UserAdd(){
 
            return view('backend.user.add_user');
       
   }
   public function UserStore(Request $request){
       
       $this->validate($request,[
            'email'=>'required |unique:users',
            'name'=>'required|max:255',
            "password"=>'required|min:5| max:25'
        ]);
        
        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        $notification =array(
            'message'=>'User Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('user.view')->with($notification);
    }



    public function UserEdit($id){     
     $editData = User::find($id);
     return view('backend.user.edit_user', compact('editData'));
    }


    public function UserUpdate(Request $request ,$id){

         $data = User::find($id);
         $data->usertype = $request->usertype;
         $data->name = $request->name;
         $data->email = $request->email;
         $data->save();
         $notification =array(
             'message'=>'User updated Successfully',
             'alert-type'=>'info'
         );
         return redirect()->route('user.view')->with($notification);
     }

    public function UserSoftDelete($id){
         $user = User::find($id);
         $user->delete();
        $notification =array(
             'message'=>'User Temporarly Deleted ',
             'alert-type'=>'warning'
         );
         return redirect()->route('user.view')->with($notification);
     }
 




    public function UserRestore($id){
        User::onlyTrashed()->where('id', $id)->restore();
        //  $user = User::find($id);
        //  $user->delete();
        $notification =array(
             'message'=>'User Restored Successfully ',
             'alert-type'=>'info'
         );
         return redirect()->route('user.view')->with($notification);
     }

    public function UserForceDelete($id){
        User::onlyTrashed()->where('id', $id)->forceDelete();
        //  $user = User::find($id);
        //  $user->delete();
        $notification =array(
             'message'=>'User Deleted Permanent',
             'alert-type'=>'error'
         );
         return redirect()->route('user.view')->with($notification);
     }

           


 
   





    }
