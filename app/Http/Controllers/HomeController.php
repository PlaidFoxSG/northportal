<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Project;
use App\Purchases;
use App\Categorys;
use App\expenses;
use DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
       $data['companies'] =   Company::all();
       $data['project']   =   Project::all();
       $data['purchases'] =   Purchases::all();
       $data['category']  =   Categorys::all();
       $emp_id  =  auth()->user()->emp_id;
       $data['companies'] = Company::all();
       /// Employee details auto populate
       $data['employee_details'] = DB::table('users as u')
                                        ->join('employee_details as ed','u.emp_id','=','ed.id')
                                        ->select('ed.*')->where('u.emp_id','=',$emp_id)
                                        ->first();
        return view('home',$data);
    }

    public function expences(Request $request){
        $data=$request->all();
        Expenses::insert($data);
    }

    public function expences_list(){
        ob_start(); 
        $expence= Expenses::get();
        foreach ($expence as $expence_list){
        ?>
            <tr style="margin-bottom:10px;">
                <td><?php echo $expence_list->date ?></td>
                <td><?php echo $expence_list->description ?></td>
                <td><?php echo $expence_list->total ?></td>
                <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#expense-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
            </tr>
            <tr class="spacer"></tr>
        <?php
        }  
        $data=ob_get_clean();
        echo json_encode(array(
            "data" => $data, 
        ));
    }



}
