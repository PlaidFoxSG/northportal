<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Employee_detail;
//use Illuminate\Foundation\Auth\User;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RegisterController extends Controller
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
    public function index(Request $request)
    {
       print_r($request->all());
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'personalemail' => ['required|string|email|max:255'],
        ]);
    }

    protected function store(Request $request)
    {   
        //  auth()->user()->givePermissionTo('Employe Panel');
        //  auth()->user()->assignRole('Employe');die;
        //  $users= \App\User::with('roles')->get();
        //  $nonmembers = $users->reject(function ($user, $key) {
        //     return $user->hasRole('Admin');
        //  });
        //  echo "string";die;
        //  $request->validate([
        //     'personalemail' =>  ['required|string|email|max:255'],
        //  ]);
        $check_email=user::where(['email' => $request->personalemail])->count();
        if($check_email == 1){
          return back()->with('error', 'This Email Already Available Please Try Another EMail !!');
        }
        $name = '';
        if($request->hasFile('profilepic')) { 

        $file = $request->file('profilepic');
        $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
        $request->file('profilepic')->move("public/profile", $name);
       }
        $Employee_detail = Employee_detail::create([
            'firstname'=> $request->firstname,
            'lastname' => $request->lastname,
            'personalemail' => $request->personalemail,
            'dob' => $request->dob,
            'phone_no'=> $request->phone,
            'address' => $request->address,
            'profile_pic' => $name, 
            'no_ofchildren'=> $request->noofchildren,
            'family_inarea' => $request->familyinarea,
            'spclfamilycircumstace' => $request->familycircum,
            'prsnl_belief' => $request->personal_belief,
            'known_medical_conditions'=> $request->medical_conditions,
            'allergies' => $request->allergies,
            'dietiary_restricons' => $request->dietary,
            'known_health_concerns' => $request->mental_concerns,
            'aversion_phyactivity'=> $request->aversion_phyactivity,
            'emergency_contact_name' => $request->emergency_contact_name,
            'reltn_emergency_contact' => $request->rel_emer_contact,
            'emergency_contact_email' => $request->emergency_email, 
            'emergency_contact_phone' => $request->emer_contact_phone,
        ]); 
        $last_id=$Employee_detail->id;
        $user_detail = User::create([
            'emp_id' =>$last_id,
            'name' =>$request->firstname.' '.$request->lastname,
            'password' =>Hash::make($request->password),
            'email' =>$request->personalemail,
            'user_type' => 'employe'
        ]);
        if($user_detail){
           //$role = Role::create(['name' => 'Employe']);
           //$permission = Permission::create(['name' => 'Employe Panel']);
            $role = Role::findByid(2);
            $permission = Permission::findByid(2);
            $role->givePermissionTo($permission);
            $permission->assignRole($role);
            $user_detail->givePermissionTo('Employee Panel');
            $user_detail->assignRole('Employee');
        }

         return back()->with('message', 'Your information is submitted Successfully');
    }
  
    public function reset_apssword(Request $request){

        $this->validate($request, [
            'password' =>'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ]);
        if(isset($errors)){
            return back();
        }
        $id=auth()->user()->id;
        $password=Hash::make($request->password);
        User::where('id',$id)->update(['password' => $password]);

        return back()->with('message', 'Your Passwrd Edit Successfully');
    }

}
