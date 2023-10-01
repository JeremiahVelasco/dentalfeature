<?php

namespace App\Http\Controllers;

use App\Models\Records;
use App\Models\Patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminController extends Controller
{

    public function records()
    {
        return view('admin/records');
    }

    public function addpatient()
    {
        return view('admin/addpatient');
    }

    public function create(array $data)
    {
        return DB::table('news')
        ->insert([
            'title' => $data['title'],
            'content' => $data['content'],
            'author' => $data['author'],
        ]);
    }

    public function patients()
    {
        //return view('admin/adminusers');
        $data = Patients::all();
        return view('admin/patients', ['users'=>$data]);
    }

    public function login(Request $request)
    {
        $credentials=$request->validate([
            'studentid'=>['required'],
            'password'=>['required']
        ]);
        if(Auth::attempt($credentials)){

            $user = Auth::user(); // Get the authenticated user

            // Store user information in the session
            $request->session()->put('studentid', $user->studentid);
            return response()->json([
                "success"=>true,
                "message"=>$user
            ]);
        }
        return response()->json(["success"=>false]); 
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

    public function storeRecord(Request $request)
    {
        // Validate the request data if needed
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'tooth' => 'required',
            'description' => 'required',
            'amount' => 'required',
        ]);

        // Extract data from the request
        $data = [
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'tooth' => $request->input('tooth'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
        ];

        // Add the record to the database
        $result = $this->addRecord($data); // Assuming you have a function to add the record

        if ($result) {
            // Return a success response if the record was added successfully
            return response()->json(['message' => 'Record added successfully'], 200);
        } else {
            // Return an error response if there was an issue adding the record
            return response()->json(['message' => 'Failed to add record'], 500);
        }
    }


    public function addRecord(array $data)
    {
        return DB::table('records')
        ->insert([
            'date' => $data['date'],
            'time' => $data['time'],
            'tooth' => $data['tooth'],
            'description' => $data['description'],
            'amount' => $data['amount'],
        ]);
    }

}


