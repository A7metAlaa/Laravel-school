<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
   public function ProfileView(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.user.view_profile' ,get_defined_vars());
   }
   public function profileEdit(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('backend.user.edit_profile' ,get_defined_vars());
   }
   public function profileStore(Request $request){
   

         $data = User::find(Auth::user()->id);
         $data->name =$request->name;
         $data->email =$request->email;
         $data->mobile =$request->mobile;
         $data->address =$request->address;
         $data->gender =$request->gender;
         //Replace Imag if Exist
            if ($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/user_images/'.$data->image));
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/user_images'),$filename);
                $data['image'] = $filename;
            } 
            $data->save();

            $notification = array(
                'message' =>'user updated successfully',
                'alert-type' =>'success',
            );

            return redirect()->route('profile.view')->with($notification);
   }

   public function Passwordview(){
    return view ('backend.user.edit_password');
   }
   public function PasswordUpdate(Request $request){

    //    dd($request->all());
        $request->validate([
        'current_password' => 'required',
        "newpassword" => "required|string|min:8|confirmed",
        "password_confirmation" => "required"
    ]);
    
    // $current_password = $request->current_password,
    
    //update hashed password   
    // dd(Auth::user()->password);
    
    $hashedPassword = Auth::user()->password;
    //current password hashed "$2a$12$lLL4k3sA9Qmecvq/nW4XpuUEhB8ldFhsH5Uh1YtgzguF05Y.LPynW" // app\Http\Controllers\Backend\ProfileController.php:68
    
    // if(hash::check($request->current_password,$hashedPassword)){
    //     dd('ok');
    // }else{
    //     dd('no');
    // }
    if(Hash::check($request->current_password,$hashedPassword)){
        $user  = User::find(Auth::id());
        $user->password = Hash::make($request->newpassword);
        $user->save();
        Auth::logout();
        return redirect()->route('login');
    
    }else{
        echo 'sorry';
        return redirect()->back();
    }
   }
   
}
