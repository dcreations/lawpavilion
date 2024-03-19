<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use App\Mail\sendmail;
use Carbon\Carbon;
use Browser;
use Session;
use Image;
use Redirect;

class AdminController extends Controller
{
    
    public function dashboard() {
        $data['users'] = User::orderBy('id', 'DESC')->limit(10)->get();
        
        return view('/admin/dashboard', $data);
    }

    public function users() {
        $data['users'] = User::orderBy('id', 'DESC')->get();
        return view('/admin/users', $data);   
    }
    

    public function addusers(Request $request) {
        $ch = User::whereemail($request->email)->count();
        if($ch<1) {
            $user = new User();
            $user->email = $request->email;
            $user->details = $request->details;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->counsel = $request->counsel;
            $user->dob = $request->dob;
            if ($request->hasFile('image')) {
                if($request->file('image')->getClientOriginalExtension() == 'jpg' || $request->file('image')->getClientOriginalExtension() == 'png' || $request->file('image')->getClientOriginalExtension() == 'jpeg' || $request->file('image')->getClientOriginalExtension() == 'webp' || $request->file('image')->getClientOriginalExtension() == 'gif') {
                $image = $request->file('image');
                $filename = time() . '_'.$request->first_name.'.png';
                $location = 'images/clients/' . $filename;
                $image->move('images/clients', $filename);
                $user->image = $location;
                }
            }
            $user->save();
            $subject = 'Welcome to LawPavilion';
            $msg = 'Hello '.$user->first_name.', Welcome to lawPavilion. We have successfully profiled your details and attached you to a lead counsel. You are a top priority to us and we are doing our best to get you the best results. Once again, welcome!';
            
            Mail::to($user->email)->send(new sendmail($msg, $subject));

        return back()->with('success', 'Client Profile created successfully');
        }
        else {
            return back()->with('alert', 'client email exists');
        }
    }

    public function updateusers(Request $request) {
        $ch = User::whereid($request->sid)->count();
        if($ch>0) {
        
            $user = User::whereid($request->sid)->first();
            $user->email = $request->email;
            $user->details = $request->details;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->counsel = $request->counsel;
            $user->dob = $request->dob;
            if ($request->hasFile('image')) {
                if($request->file('image')->getClientOriginalExtension() == 'jpg' || $request->file('image')->getClientOriginalExtension() == 'png' || $request->file('image')->getClientOriginalExtension() == 'jpeg' || $request->file('image')->getClientOriginalExtension() == 'webp' || $request->file('image')->getClientOriginalExtension() == 'gif') {
                $image = $request->file('image');
                $filename = time() . '_'.$request->first_name.'.png';
                $location = 'images/clients/' . $filename;
                $image->move('images/clients', $filename);
                $user->image = $location;
                }
            }
            $user->save();

        return back()->with('success', 'Client Details updated successfully');
        }
        else {
            return back()->with('alert', 'Invalid Client');
        }
    }

    public function viewusers($id) {
        $ch = User::whereid($id)->count();
        if($ch>0) {
           $data['user'] = User::whereid($id)->first();
            return view('/admin/details', $data);   
        }
        else {
            return back()->with('alert', 'Invalid Client');
        }
        
    }
    
    public function delusers($id) {
        $ch = User::whereid($id)->count();
        if($ch>0) {
             User::whereid($id)->delete();
            return back()->with('success', 'Client Details deleted successfully');
        }
        else {
            return back()->with('alert', 'Invalid Client');
        }
        
    }
    
}
