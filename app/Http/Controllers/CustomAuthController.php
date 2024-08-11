<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomAuthController extends Controller
{
    public function login(){
        return view("login");
    }
    public function signup(){
        return view("signup");
    } 

    public function registerUser(Request $request){   // step 1  to check and ensure input field is withing the bounds
        $validator = Validator::make($request->all(),[
            'first' => 'required|string|max:255',
            'last' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if($validator->fails()){  // step 1 fails here
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([  //step 2 create user if info is validated
            'first' => $request->first,
            'last' => $request->last,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Successfully registered');   //transferred back to login page
    } 

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(),[ // step 1 checking and validation user info
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if($validator->fails()){  // step 1 fails here
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);  // Log in the user
            return redirect()->route('product');  // Redirect to the products page where user profile is seen
        } else {
            return back()->with('fail', 'Invalid email or password');
        }
    }

    // public function profileNproduct(){
    //     $user = Auth::user();
    //     if ($user) {
    //         return view('product', compact('user'));
    //     } else {
    //         return redirect()->route('login')->with('fail', 'You must be logged in to view this page.');
    //     }
    // }
    public function profileNproduct()
    {
        $user = Auth::user();
        if ($user) {
            $products = Product::where('user_id', $user->id)->get();
            return view('product', compact('products', 'user'));
        } else {
            return redirect()->route('login')->with('fail', 'You must be logged in to view this page.');
        }
    }


    public function logout(Request $request){
        $user = Auth::user();
        if ($user) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('fail', 'You are not logged in.');
        }
    }

    public function edit(Request $request){
        $user = Auth::user();
        if($user){
            return view('edit-profile',compact('user'));
        }
        return redirect()->route('login')->with('fail', 'You must be logged in to view this page.');
    }
    
    public function updateEdit(Request $request){
        $userId  = Auth::id();
        $user = User::findOrFail($userId);
        if ($user) {    
            $validator = Validator::make($request->all(), [
                'first' => 'required|string|max:255',
                'last' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $userId,
                'password' => 'nullable|string|min:8|confirmed',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user ->update([
                'first' => $request->first,
                'last' => $request->last,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $user->password,
            ]);   
           

            return redirect()->route('product')->with('success', 'Profile updated successfully!');
        }
        return redirect()->route('login')->with('fail', 'You must be logged in to view this page.');
    }

    public function destroy(){
        $userId  = Auth::id();
        $user = User::findOrFail($userId);
        
        if ($user) {
            $user->delete();
            Auth::logout();
            return redirect()->route('home')->with('success', 'Profile deleted successfully!');
        }
        return redirect()->route('login')->with('fail', 'You must be logged in to perform this action.');
    }

    
}
