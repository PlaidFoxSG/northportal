<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Employee_detail;
use App\User;
use App\Agreeement;
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
$employee = DB::table('employee_details as ed')
            ->leftjoin('agreements as a', 'ed.id', '=', 'a.emp_id') 
            ->leftjoin('codeofconduct as coc','ed.id', '=', 'coc.emp_id')           
            ->select('ed.id','ed.firstname','ed.created_at','ed.lastname','ed.personalemail','a.agreement','coc.coc_agreement')
            //->where(array('a.status'=>'A','coc.status'=>'A'))
            ->get();
            return view('admin.agreement_list')->with('employee', $employee);
   
    }



   /* public function add_empagreement(Request $request)
    {    
         $conditions = array('emp_id'=>$request->employee_id,'agreement_type'=>$request->agtype);             
        $agreement_details = DB::table('agreements')->where($conditions)->first();  
        //print_r();
            if($request->hasFile('agreement_file')) { 
            $file = $request->file('agreement_file');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $request->file('agreement_file')->move("public/agreement", $name);
           }   
        if(isset($agreement_details->emp_id) && $agreement_details->emp_id !='')
        {  
           $old_contract = ($agreement_details->old_contract !=NULL) ? $agreement_details->old_contract : '';

                DB::table('agreements')->where($conditions)->update(
                ['emp_id' => $request->employee_id, 
                'agreement_type' => $request->agtype,
                'agreement' => $name,
                'old_contract' => $agreement_details->agreement,
                ]
            );
        }else
        {
            DB::table('agreements')->insert(
                ['emp_id' => $request->employee_id, 
                'agreement_type' => $request->agtype,
                'agreement' => $name,
                'old_contract' => $name,
                ]
            );
        }

         
    }*/


    function add_empagreement(Request $request)
    {
            if($request->hasFile('agreement_file')) 
            { 
                $file = $request->file('agreement_file');
                $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            }  
                 $conditions = array('emp_id'=>$request->employee_id);    
            if($request->agreement_type == 'EA')
            {   
                $request->file('agreement_file')->move("public/agreement", $name);
                $agreement_details = DB::table('agreements')->where($conditions)->first();
                if($agreement_details)
                {
                    DB::table('agreements')->where($conditions)->update(
                    [   'emp_id' => $request->employee_id,                     
                        'agreement' => $name,
                        'old_agreement' => $agreement_details->agreement,
                    ]);
                }  
                else
                {
                        DB::table('agreements')->insert(
                        ['emp_id' => $request->employee_id,
                        'agreement' => $name,
                        'old_agreement' => $name,
                        ]
                    );
                }


            }
            else
            {   
                $request->file('agreement_file')->move("public/codeofconduct", $name);
                $agreement_details = DB::table('codeofconduct')->where($conditions)->first();
                if($agreement_details)
                {
                    DB::table('codeofconduct')->where($conditions)->update(
                    [   'emp_id' => $request->employee_id,                     
                        'coc_agreement' => $name,
                        'old_coc' => $agreement_details->coc_agreement,
                    ]);
                }
                else
                {
                        DB::table('codeofconduct')->insert(
                        ['emp_id' => $request->employee_id,
                        'coc_agreement' => $name,
                        'old_coc' => '',
                        ]
                    );
                }
            }
    }




    function destroy($id,$type)
    {
        if($type == 'EA')$queries = DB::table('agreements')->update('emp_id', '=', $id)->delete(['status'=>'D']);
        if($type == 'COC')$queries = DB::table('codeofconduct')->where('emp_id', '=', $id)->update(['status'=>'D']);
        
        return response()->json([
            'success' => 'Agreement deleted successfully!'
        ]);
       
    }


}
