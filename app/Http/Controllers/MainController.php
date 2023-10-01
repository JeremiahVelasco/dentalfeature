<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patients;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class MainController extends Controller
{
   
    public function registerpage()
    {
        return view('main/registerpage');
    }

    public function registerSuccess()
    {
        return view('success/registersuccess');
    }

    public function loginpage()
    {
        return view('main/loginpage');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);
    
        $user = DB::table('patients')->where('email', $credentials['email'])->first();
    
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::loginUsingId($user->email);
            return response()->json([
                "success" => true,
                "message" => "Logged in as " . $user->email
            ]);
        } else {
            return response()->json(["success" => false, "message" => "Authentication failed"]);
        }
    }
    

    public function emailExists(Request $request){
        $data=$request->all();
        $email=$data['email'];
        $result=DB::table('patients')
            ->where('email',$email)
            ->first();
        if(empty($result)){
            return response()->json(["success"=>false]);   
        }
        return response()->json(["success"=>true]);
    }

    public function register(Request $request)
    {  
        $data = $request->all();
        $check = $this->create($data);  
        return response()->json(["success"=>true]);
    }

    public function create(array $data)
    {
        return DB::table('patients')
        ->insert([
            'email' => $data['email'],
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'address' => $data['address'],
            'age' => $data['age'],
            'contactno' => $data['contactno'],
            'occupation' => $data['occupation'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function success()
    {
        if(Auth::check()){
            return view('main.home');
        }
   
        return redirect("login")->withSuccess('are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
    }
}
