<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
 
    public function Register(){
        return view('Backend.register');
    }
    public function RegisterSubmit(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|regex:/(.+)@(.+)\.(.+)/i',
            'password'=>'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@]).*$/',
            'profile'=>'required'
        ]);
    $input=$request->all();
        if($filename=$request->file('profile')){
            $image=$this->moveUpload($filename);
            $input['profile']=$image;
        }
        $input['password']=Hash::make($request->password);
        $res=User::create($input);
        $res->save();
        if($res){
            return redirect('/signin');
        }
    }
    public function SignIn(){
        return view('Backend.login');
    }
    public function SignInSubmit(Request $request){

        $request->validate([
            'name_email'=>'required',
            'password'=>'required'
        ]);
        if(Auth::attempt(['name' => $request->name_email,'password' =>$request->password])){
            return redirect('/admin');
        }elseif(Auth::attempt(['email'=>$request->name_email, 'password' => $request->password])){
            return redirect('/admin');
        }else {
            return redirect('/signin');
        }
    }
    public function Logout(){
        Auth::logout();
        return redirect('/signin');
    }
    public function editProfile(User $user){
        return view('Backend.edit-profile',compact('user'));
    }
    public function editProfileSubmit(Request $request, User $user){
        $input=$request->all();
        if($filename=$request->file('profile')){
            $image=$this->moveUpload($filename);
            $input['profile']=$image;
        }
        $user->update($input);
        $user->save();
        return redirect('/admin');
    }

}
