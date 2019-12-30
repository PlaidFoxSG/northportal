<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Employee_detail;
use App\User;
use App\Agreeement;
use Auth;
//use App\Mileage;
class MileageController extends Controller
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
    public function mileagelist(Request $request)
    {   ob_start();
        $emp_id  =  auth()->user()->emp_id;
        $type  =  auth()->user()->user_type;
       if($type== 'is_admin')$mileage_list = DB::table('mileages')->get();       
       else  $mileage_list = DB::table('mileages')->where('emp_id','=',$emp_id)->get();
        foreach($mileage_list as $mlist)
        {
        ?>
            <tr style="margin-bottom:10px;">
                <td><?= $mlist->date?></td>
                <td><?= $mlist->reasonmileage?></td>
                <td><?= $mlist->kilometers?></td>
                <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#mileage-modal" data="<?= $mlist->id?>" class="edit_mileage" onclick="edit_mileage(<?= $mlist->id?>)">EDIT</a><a href="#" class="down">DELETE</a></td>
            </tr>
            <tr class="spacer"></tr>

        <?php 
        }

        $data=ob_get_clean();
        echo json_encode(array(
            "data" => $data, 
        ));
    }

    public function addmileage(Request $request)
    {  
            $mileagearray = array(
                            'emp_id' =>auth()->user()->emp_id,
                            'company' => $request->companyname, 
                            'date' => $request->date, 
                            'vehicle' => $request->vehicle,
                            'kilometers' =>$request->kilometers,
                            'reasonmileage' =>$request->reasonformileage,
                            );

                DB::table('mileages')->insert($mileagearray);
        

    }


    function get_mileage($id)
    {
        echo $id;
    }

    

}
