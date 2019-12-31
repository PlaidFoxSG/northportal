<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Project;
use App\Purchases;
use App\Categorys;
use App\expenses;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB;

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
        if(auth()->user()->user_type == 'is_admin'){
                $expence= Expenses::where(['delete_status'=> NULL , 'status' => NULL])->get();
                foreach ($expence as $expence_list){
            ?>
                <tr style="margin-bottom:10px;">
                    <td><?php echo $expence_list->date ?></td>
                    <td><?php echo $expence_list->description ?></td>
                    <td><?php echo $expence_list->total ?></td>
                    <td>
                        <a href="javascript:void(0)" onclick="expence_approve(<?= $expence_list->id ?>)"><i class="fa fa-check-circle" title="Approved"></i></a>
                        <a href="javascript:void(0)" title="Reject!" onclick="expence_reject(<?= $expence_list->id ?>)"><i class="fa fa-ban"></i></a>                        
                    </td>
                    <td class="action-box"><a href="javascript:void(0);" onclick="edit_view_ajax(<?= $expence_list->id ?>)" >EDIT</a><a href="javascript:void(0);" class="down" onclick="delete_expence(<?= $expence_list->id ?>)">DELETE</a></td>
                </tr>
                <tr class="spacer"></tr>
            <?php
            }  
            $data=ob_get_clean();
        }
        else{
        $expence= Expenses::where([ 'emp_id' => auth()->user()->id , 'delete_status'=> NULL , 'status' => NULL])->get();
        foreach ($expence as $expence_list){
        ?>
            <tr style="margin-bottom:10px;">
                <td><?php echo $expence_list->date ?></td>
                <td><?php echo $expence_list->description ?></td>
                <td><?php echo $expence_list->total ?></td>
                <td class="action-box"><a href="javascript:void(0);" onclick="edit_view_ajax(<?= $expence_list->id ?>)" >EDIT</a><a href="javascript:void(0);" class="down" onclick="delete_expence(<?= $expence_list->id ?>)">DELETE</a></td>
            </tr>
            <tr class="spacer"></tr>
        <?php
        }  
        $data=ob_get_clean();
        }
        
        echo json_encode(array(
            "data" => $data, 
        ));
    }

    public function edit_view_expences(Request $request){
        ob_start();
        $expence   =   DB::table('expenses')->where('id',$request->id)->first();
        $companies =   Company::all();
        $project   =   Project::all();
        $purchases =   Purchases::all();
        $category  =   Categorys::all();
        $company   =   DB::table('companies')->where('id',$expence->company)->first();
        $projects  =   DB::table('projects')->where('id',$expence->project)->first();
        $purchase  =   DB::table('purchases')->where('id',$expence->purchase)->first();
        $category1 =   DB::table('categorys')->where('id',$expence->category)->first();
    ?>
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-md-12" style="margin-top:40px;margin-bottom:20px;">
                    <form class="expences_edit1" id="expences_edit1" action="#" >
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Company</label>
                                    <select class="select_status form-control" name="company">
                                        <option value="<?= $company->id; ?>"><?= $company->companyname; ?></option>
                                      <?php foreach($companies as $company_ex_report){ ?>
                                        <option value="<?= $company_ex_report->id ?>"><?= $company_ex_report->companyname ?></option> 
                                      <?php }  ?>                                     
                                    </select>
                                </div>                                
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Date</label>
                                    <input type="date"  placeholder = "" value="<?= $expence->date; ?>" class = "form-control" name="date">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Category</label>
                                    <select class="select_status form-control" name="category">
                                        <option value="<?= $category1->id ?>"><?= $category1->categoryname ?></option>
                                      <?php foreach($category as $category_ex_report) { ?>
                                        <option value="<?= $category_ex_report->id ?>"><?= $category_ex_report->categoryname ?></option> 
                                      <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Purchase via</label>
                                    <select class="select_status form-control" name="purchase">
                                        <option value="<?= $purchase->id ?>"><?= $purchase->purchasename ?></option>
                                       <?php foreach($purchases as $purchases_ex_report){ ?>
                                        <option value="<?= $purchases_ex_report->id ?>"><?= $purchases_ex_report->purchasename ?></option> 
                                       <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Project</label>
                                    <select class="select_status form-control" name="project">
                                        <option value="<?= $projects->id ?>"><?= $projects->projectname ?></option>
                                      <?php foreach($project as $project_ex_report){ ?>
                                        <option value="<?= $project_ex_report->id ?>"><?= $project_ex_report->projectname ?></option> 
                                      <?php } ?>  
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Select Receipt</label>
                                    <select class="select_status form-control" name="receipt">
                                        <option value="<?= $expence->receipt ?>"><?= $expence->receipt ?></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>            
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Description</label>
                                    <input type="text" id="name" name="description" class="form-control" value="<?= $expence->description ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="col-md-12 col-sm-12">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" name="billable" <?php if($expence->billable =="on"){ echo"checked"; } ?>> Billable
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="display:inline-flex;">
                                        <div class="col-md-7 col-sm-7">                                         
                                            <label class="form-check-label">
                                              <input class="form-check-input" type="checkbox" name=""> Received authorization
                                            </label>                                            
                                        </div>
                                        <div class="col-md-5 col-sm-5">                                         
                                            <input type="text" id="name" name="received_auth" class="form-control" vale="<?= $expence->received_auth; ?>" style="border:0px; border-bottom:1px solid;padding: 0px;background-color: #fff !important;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>                        
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Subtotal</label>
                                    <input type="text" id="name" name="subtotal" class="form-control" value="<?= $expence->subtotal ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">GST</label>
                                    <input type="text" id="name" name="gst" class="form-control" value="<?= $expence->gst ?>">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">PST</label>
                                    <input type="text" id="name" name="pst" class="form-control" value="<?= $expence->pst ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Total</label>
                                    <input type="text" id="name" name="total" class="form-control" value="<?= $expence->total ?>">
                                </div>
                            </div>
                        </div>
                        </hr>               
                        <div class="row margin-top-30">
                            <div class="form-group" style="width:100%;">
                                <div class="col-md-12 col-sm-12">
                                    <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                    <input type="hidden" name="emp_id" value="<?= auth()->user()->id ?>">
                                    <input type="hidden" name="id" value="<?= $expence->id ?>">
                                    <input type="button" class="btn-dark contact_btn" onclick="edit_expences()" value="Save">                                    
                                    <span class="close close-span" data-dismiss="modal" aria-label="Close"><i class="fa fa-arrow-left"></i> Return to Expense Reports</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
       </div>
    </div>
    <?php
        $data=ob_get_clean();
        echo json_encode(array(
                "data" => $data, 
        ));
    }

    public function expences_edit(Request $request){
       $data = $request->all();
       $id   = $data['id'];
       Expenses::where('id',$id)->update($data);
    }

    public function delete_expence(Request $request){
        $id=$request->id;
        Expenses::where('id',$id)->update(['delete_status' => '1']);
    }
    public function expence_approve(Request $request){
        $id=$request->id;
        Expenses::where('id',$id)->update(['status'=>'1']);
    }
    public function expence_reject(Request $request){
        $id=$request->id;
        Expenses::where('id',$id)->update(['status'=>'2']);
    }

    public function expences_histocial(){
        ob_start(); 
        if(auth()->user()->user_type == 'is_admin'){
                $expence= Expenses::where(['delete_status'=> NULL , 'status' => 1])->orWhere(['status' => 2])->get();
                foreach ($expence as $expence_list){
            ?>
                <tr style="margin-bottom:10px;">
                    <td><?php echo $expence_list->date ?></td>
                    <td><?php echo $expence_list->description ?></td>
                    <td><?php echo $expence_list->total ?></td>
                    <td class="action-box"><!--<a href="javascript:void(0);" onclick="edit_view_ajax(<?= $expence_list->id ?>)" >EDIT</a>--><a href="javascript:void(0);" class="down" onclick="delete_expence(<?= $expence_list->id ?>)">DELETE</a></td>
                </tr>
                <tr class="spacer"></tr>
            <?php
            }  
            $data=ob_get_clean();
        }
        else{
        $expence= Expenses::where([ 'emp_id' => auth()->user()->id , 'delete_status'=> NULL , 'status' => 1])->orWhere(['status' => 2])->get();
        foreach ($expence as $expence_list){
        ?>
            <tr style="margin-bottom:10px;">
                <td><?php echo $expence_list->date ?></td>
                <td><?php echo $expence_list->description ?></td>
                <td><?php echo $expence_list->total ?></td>
                <td class="action-box"><!--<a href="javascript:void(0);" onclick="edit_view_ajax(<?= $expence_list->id ?>)" >EDIT</a>--><a href="javascript:void(0);" class="down" onclick="delete_expence(<?= $expence_list->id ?>)">DELETE</a></td>
            </tr>
            <tr class="spacer"></tr>
        <?php
        }  
        $data=ob_get_clean();
        }
        
        echo json_encode(array(
            "data" => $data, 
        ));
    
    }



    public function agreement_list()
    {
$employee = DB::table('employee_details as ed')
            ->leftjoin('agreements as a', 'ed.id', '=', 'a.emp_id') 
            ->leftjoin('codeofconduct as coc','ed.id', '=', 'coc.emp_id')           
            ->select('ed.id','ed.firstname','ed.created_at','ed.lastname','ed.personalemail','a.agreement','coc.coc_agreement')
            //->where(array('a.status'=>'A','coc.status'=>'A'))
            ->get();
            return view('admin.agreement_list')->with('employee', $employee);
            
    }

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

    function employee_agreementlist()
    {
        $employee = DB::table('employee_details as ed')
            ->leftjoin('agreements as a', 'ed.id', '=', 'a.emp_id') 
            ->leftjoin('codeofconduct as coc','ed.id', '=', 'coc.emp_id')           
            ->select('ed.id','ed.firstname','ed.created_at','ed.lastname','ed.personalemail','a.agreement','coc.coc_agreement')
            ->where(array('ed.id'=>auth()->user()->emp_id))
            ->get();
            return view('admin.agreement_list')->with('employee', $employee);
    }


}
