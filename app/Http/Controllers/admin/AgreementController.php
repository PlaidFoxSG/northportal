<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Employee_detail;
use App\User;
class AgreementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function agreementlist(Request $request)
    {
       $employee = DB::table('employee_details')->select('id','firstname','lastname','personalemail')->get();
       dd($employee);
      // print_r($employee);

           // echo 'wqedwd'; die();
        //return view('agreement_list')->with('employee', $employee);
    }

  
    


}
