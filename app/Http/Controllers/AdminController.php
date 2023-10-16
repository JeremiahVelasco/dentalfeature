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
    public function dashboard()
    {
        $data = Records::all();
        return view('admin/dashboard');
    }

    public function records()
    {
        $data = Records::all();
        return view('admin/records', ['records' => $data]);
    }

    public function addRecord()
    {
        return view('admin/addrecord');
    }

    public function patients()
    {
        //return view('admin/adminusers');
        $data = Patients::all();
        return view('admin/patients', ['users' => $data]);
    }

    public function mouth()
    {
        return view('admin/mouth');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'studentid' => ['required'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)) {

            $user = Auth::user(); // Get the authenticated user

            // Store user information in the session
            $request->session()->put('studentid', $user->studentid);
            return response()->json([
                "success" => true,
                "message" => $user
            ]);
        }
        return response()->json(["success" => false]);
    }

    public function success()
    {
        if (Auth::check()) {
            return view('main.home');
        }

        return redirect("login")->withSuccess('are not allowed to access');
    }

    public function signOut()
    {
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
            'firstname' => 'required',
            'lastname' => 'required',
            'description' => 'required',
            'amount' => 'required',
        ]);

        // Extract data from the request
        $data = [
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'tooth' => $request->input('tooth'),
            'description' => $request->input('description'),
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'amount' => $request->input('amount'),
        ];

        // Add the record to the database
        $result = $this->insertRecord($data); // Assuming you have a function to add the record

        if ($result) {
            // Return a success response if the record was added successfully
            return response()->json(['message' => 'Record added successfully'], 200);
        } else {
            // Return an error response if there was an issue adding the record
            return response()->json(['message' => 'Failed to add record'], 500);
        }
    }

    public function storePatient(Request $request)
    {
        // Validate the request data if needed
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'contactno' => 'required'
        ]);

        // Extract data from the request
        $data = [
            'firstname' => $request->input('firstname'),
            'middlename' => $request->input('middlename'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'age' => $request->input('age'),
            'sex' => $request->input('sex'),
            'contactno' => $request->input('contactno'),
        ];

        // Add the record to the database
        $result = $this->insertPatient($data); // Assuming you have a function to add the record

        if ($result) {
            // Return a success response if the record was added successfully
            return response()->json(['message' => 'Record added successfully'], 200);
        } else {
            // Return an error response if there was an issue adding the record
            return response()->json(['message' => 'Failed to add record'], 500);
        }
    }


    public function insertRecord(array $data)
    {
        return DB::table('records')
            ->insert([
                'date' => $data['date'],
                'time' => $data['time'],
                'tooth' => $data['tooth'],
                'description' => $data['description'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'amount' => $data['amount'],
            ]);
    }

    public function insertPatient(array $data)
    {
        return DB::table('patients')
            ->insert([
                'firstname' => $data['firstname'],
                'middlename' => $data['middlename'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'address' => $data['address'],
                'age' => $data['age'],
                'sex' => $data['sex'],
                'contactno' => $data['contactno'],
            ]);
    }

    public function deletePatient(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');

        // Check if the patient exists
        $patient = DB::table('patients')
            ->where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->first();

        if ($patient) {
            // Delete the patient
            $result = DB::table('patients')
                ->where('firstname', $firstname)
                ->where('lastname', $lastname)
                ->delete();

            if ($result) {
                // Return a success response if the patient was deleted successfully
                return response()->json(['success' => true]);
            } else {
                // Return an error response if there was an issue deleting the patient
                return response()->json(['message' => 'Failed to delete patient'], 500);
            }
        } else {
            // Return an error response if the patient doesn't exist
            return response()->json(['message' => 'Patient not found'], 404);
        }
    }


    public function getRecords(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');

        // Use a query to fetch records for the specified user
        $data = Records::where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->get();

        $toothArray = [];

        foreach ($data as $record) {
            $toothArray[] = $record->tooth; // Storing 'tooth' values in the array
        }

        if ($data->isEmpty()) {
            // If no records are found, redirect with a message using the with method
            return view('admin/mouth')->with(['records' => $data, 'success' => false]);
        } else {
            // If records are found, redirect with the data and success set to true
            session(['records' => $data, 'toothArray' => $toothArray]);
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function getPatients(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');

        // Use a query to fetch records for the specified user
        $data = Records::where('firstname', $firstname)
            ->where('lastname', $lastname)
            ->get();
        session(['records' => $data]);
        return response()->json([
            'success' => true
        ]);
    }
}
