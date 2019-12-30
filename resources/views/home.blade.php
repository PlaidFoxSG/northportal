@extends('layouts.main')
@include('modal')  
@section('content1') 
  <!-- section -->
  <section class="page-section" id="user_part">
        <div class="profile_section_text">
            <div class="tab-content" id="myTabContent">
            
              <!-------------Profile--------------->    
              <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <nav class="top_tab_details">
                  <div class="container-fluid">
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-employee-tab" data-toggle="tab" href="#nav-employee" role="tab" aria-controls="nav-employee" aria-selected="true">Employee Information</a>
                        <a class="nav-item nav-link" id="nav-agreements-tab" data-toggle="tab" href="#nav-agreements" role="tab" aria-controls="nav-agreements" aria-selected="false" onclick="employee_agreement()">Agreements</a>
                        <a class="nav-item nav-link" id="nav-statements-tab" data-toggle="tab" href="#nav-statements" role="tab" aria-controls="nav-statements" aria-selected="false">Pay Statements</a>
                        <a class="nav-item nav-link" id="nav-mileage-tab" data-toggle="tab" href="#nav-mileageemployee" role="tab" aria-controls="nav-mileage" aria-selected="false" onclick="get_mileagelist()">Mileage Book</a>
                      </div>
                  </div><!--------------container--------------->
                </nav>
                <div class="container-fluid">
                     @if ($errors->any())
             <div class="alert alert-danger all_errors">
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
                    <div class="tab-content" id="nav-tabContent">
                    
                      <!--------------employee-------------->
                      
                      <div class="tab-pane fade show active" id="nav-employee" role="tabpanel" aria-labelledby="nav-employee-tab">
                    <form id="contacts_form" method="POST" name="contact-form" action="{{url('registration')}}" enctype="multipart/form-data">
                            @csrf
                          <div class="personal">
                            <h2 class="form_title">Personal Information</h2>
                            <div class="row">
                                
                                <div class="col-md-3">
                                    <div class="text_outer">
                                        <label for="name" class="">First name</label>
                                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First Name" value={{isset($employee_details->firstname) ?  $employee_details->firstname : ''}}>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="text_outer">
                                        <label for="name" class="">Last name</label>
                                        <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last Name" value={{isset($employee_details->lastname) ?  $employee_details->lastname : ''}}>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="text_outer">
                                        <label for="name" class="">Date of birth</label>
                                        <input type="date" id="dob" name="dob" class="form-control" value={{isset($employee_details->dob) ?  $employee_details->dob : ''}}>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="text_outer">
                                        <label for="name" class="">Phone</label>
                                        <input type="number" id="phone" name="phone" class="form-control" placeholder="000 000 0000" value={{isset($employee_details->phone_no) ?  $employee_details->phone_no : ''}}>
                                    </div>
                                </div>
            
                            </div>
                            
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="text_outer">
                                        <label for="name" class="">Address</label>
                                        <input type="text" id="address" name="address" class="form-control" placeholder="Address" value={{isset($employee_details->address) ?  $employee_details->address : ''}}> 
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="text_outer">
                                        <label for="name" class="">Personal email</label>
                                        <input type="email" id="personalemail" name="personalemail" class="form-control" placeholder="Personal Email" value={{isset($employee_details->personalemail) ?  $employee_details->personalemail : ''}}>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="text_outer">
                                        <label for="name" class="">Work email</label>
                                        <input type="email" id="workemail" name="workemail" class="form-control" placeholder="Work email" value={{isset($employee_details->workemail) ?  $employee_details->workemail : ''}}>
                                    </div>
                                </div>
                                
                            </div>
                            
                             <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="text_outer file_upload">
                                        <label for="name" class="">Profile photo</label>
                                        <input type="file" id="profilepic" name="profilepic" class="form-control" >
                                    </div>
                                </div>
                               

                                <div class="col-md-3">
                                    <div class="text_outer">
                                        <label for="name" class="">Password*</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="xxxxxxx" >
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <p>**Only required if you are changing your password. Your password must
                                         be more than 6 characters long, should contain at least 1 uppercase, 1
                                         lowercase, 1 numeric and 1 special character.
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#upload-modal1">Click Reset</a>
                                     </p>
                                </div>
                                
                            </div>
                            </div><!--------Personal Information----------->
                            
                          <div class="circumstances">
                            <h2 class="form_title">Personal Circumstances</h2>
                            <div class="row">
                                
                                <div class="col-md-3">
                                    <div class="text_outer">
                                        <label for="name" class="">Marital status</label>
                                        <select class="select_status form-control" name="marital_status">
                                            <option value="">Select</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="text_outer">
                                        <label for="name" class="">Number of children</label>
                                        <input type="number" id="noofchildren" name="noofchildren" class="form-control" placeholder="0"value={{isset($employee_details->no_ofchildren) ?  $employee_details->no_ofchildren : ''}}>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="text_outer">
                                        <label for="name" class="">Family in the area</label>
                                        <input type="text" id="familyinarea" name="familyinarea" class="form-control" placeholder="Insert text here" value={{isset($employee_details->family_inarea) ?  $employee_details->family_inarea : ''}}>
                                    </div>
                                </div>
                                
                               
                            </div>
                            
                             <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="text_outer">
                                        <label for="name" class="">Special family circumstances</label>
                                        <input type="text" id="familycircum" name="familycircum" class="form-control" placeholder="Insert text here" value={{isset($employee_details->spclfamilycircumstace) ?  $employee_details->spclfamilycircumstace : ''}}>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="text_outer">
                                        <label for="name" class="">Personal belief/religious requirements</label>
                                        <input type="text" id="personal_belief" name="personal_belief" class="form-control" placeholder="Insert text here" value={{isset($employee_details->prsnl_belief) ?  $employee_details->prsnl_belief : ''}}>
                                    </div>
                                </div>

                            </div>
                            </div><!--------Personal Circumstances----------->
                            
                            <div class="health">
                            <h2 class="form_title">Health Concerns</h2>
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="text_outer">
                                        <label for="name" class="">Known medical condions</label>
                                        <input type="text" id="medical_conditions" name="medical_conditions" class="form-control" placeholder="Insert text here">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="text_outer">
                                        <label for="name" class="">Allergies</label>
                                        <input type="text" id="allergies" name="allergies" class="form-control" placeholder="Insert text here">
                                    </div>
                                </div>
                                
                               
                               
                            </div>
                            
                             <div class="row">
                             
                                 <div class="col-md-3">
                                    <div class="text_outer">
                                        <label for="name" class="">Dietary restricons</label>
                                        <input type="text" id="dietary" name="dietary" class="form-control" placeholder="Insert text here">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="text_outer">
                                        <label for="name" class="">Known mental health concerns</label>
                                        <input type="text" id="mental_concerns" name="mental_concerns" class="form-control" placeholder="Insert text here">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="text_outer">
                                        <label for="name" class="">Aversion to physical acvity</label>
                                        <input type="text" id="aversion_phyactivity" name="aversion_phyactivity" class="form-control" placeholder="Insert text here">
                                    </div>
                                </div>

                            </div>
                            </div><!--------Health Concerns----------->
                            
                           <div class="emergency">
                            <h2 class="form_title">Emergency Contact Information</h2>
                            <div class="row">
                                
                                <div class="col-md-3">
                                    <div class="text_outer">
                                        <label for="name" class="">Emergency contact name</label>
                                        <input type="text" id="emergency_contact_name" name="emergency_contact_name" class="form-control" placeholder="Insert text here">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="text_outer">
                                        <label for="name" class="">Relaonship to emergency contact</label>
                                        <input type="text" id="rel_emer_contact" name="rel_emer_contact" class="form-control" placeholder="Insert text here">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="text_outer">
                                        <label for="name" class="">Emergency contact phone</label>
                                        <input type="text" id="emer_contact_phone" name="emer_contact_phone" class="form-control" placeholder="Insert text here">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="text_outer">
                                        <label for="name" class="">Emergency contact email</label>
                                        <input type="text" id="emergency_email" name="emergency_email" class="form-control" placeholder="Insert text here">
                                    </div>
                                </div>

                            </div>
                            </div><!--------Emergency Contact Information----------->
                            
                                <button type="submit" class="btn-dark contact_btn">Save</button>
            
                        </form>
                      </div><!-------------end--------->
                      
                      <!--------------agreements-------------->
                      <div class="tab-pane fade employeeagreements" id="nav-agreements" role="tabpanel" aria-labelledby="nav-agreements-tab">
                        
                        <!--- employee agreement   -->
                      
                      </div><!-------------end--------->
                      
                      <!--------------statements-------------->
                      <div class="tab-pane fade" id="nav-statements" role="tabpanel" aria-labelledby="nav-statements-tab">
                        <div class="agreements">
                            
                            
                            
                            <h3><span  class="active-span" id="active_contracts_span">Active Contracts </span> | <span  id="old_contracts_span"> Old Contracts</span></h3>
                            <div id="active_contracts_div">
                                <div class="top_part_">
                                    <ul>
                                        <li>Date</li>
                                        <li>Descripon</li>
                                    </ul>
                                </div>
                                <div class="download_file">
                                    <div class="left_part">
                                        <p>12/09/2019</p>
                                        <p>John Doe Contract of Employment</p>
                                    </div>
                                    <div class="right_part">
                                        <a href="#">VIEW</a>
                                        <a href="#" class="down">DOWNLOAD</a>
                                    </div>
                                </div><!------------------>
                                <div class="download_file">
                                    <div class="left_part">
                                        <p>12/09/2019</p>
                                        <p>John Doe Contract of Employment</p>
                                    </div>
                                    <div class="right_part">
                                        <a href="#">VIEW</a>
                                        <a href="#" class="down">DOWNLOAD</a>
                                    </div>
                                </div><!------------------>
                            </div>
                            <div id="old_contracts_div" style="display:none;">
                                <div class="top_part_">
                                    <ul>
                                        <li>Date</li>
                                        <li>Descripon</li>
                                    </ul>
                                </div>
                                <div class="download_file">
                                    <div class="left_part">
                                        <p>12/09/2019</p>
                                        <p>John Doe Contract of Employment</p>
                                    </div>
                                    <div class="right_part">
                                        <a href="#">VIEW</a>
                                        
                                    </div>
                                </div><!------------------>
                                <div class="download_file">
                                    <div class="left_part">
                                        <p>12/09/2019</p>
                                        <p>John Doe Contract of Employment</p>
                                    </div>
                                    <div class="right_part">
                                        <a href="#">VIEW</a>
                                        
                                    </div>
                                </div><!------------------>
                            </div>
                            
                        </div>
                      </div>

                       

                      
                    </div><!----------tab-content------------->
                </div> <!--------------container--------------->
              </div><!-----------------end---profile-------->
              
              <!--------------Admin-------------->
            
            <!-------------Admin--------------->    
            <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                <nav class="top_tab_details">
                  <div class="container-fluid">
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link nav_agreement active" id="nav-agree-tab" data-toggle="tab" href="#nav-agree" role="tab" aria-controls="nav-agree" aria-selected="true" >Agreement</a>
                        <a class="nav-item nav-link nav_expense" id="nav-expense-tab" data-toggle="tab" href="#nav-expense" role="tab" aria-controls="nav-expense" aria-selected="true">Expense Report</a>
                        <a class="nav-item nav-link nav_mileage" id="nav-mileage-tab" data-toggle="tab" href="#nav-mileage" role="tab" aria-controls="nav-mileage" aria-selected="false" >Mileage Book</a>
                        <a class="nav-item nav-link" id="nav-maintenance-tab" data-toggle="tab" href="#nav-maintenance" role="tab" aria-controls="nav-maintenance" aria-selected="false">Tech Maintenance</a>
                        <a class="nav-item nav-link" id="nav-time-tab" data-toggle="tab" href="#nav-time" role="tab" aria-controls="nav-time" aria-selected="false">Time Off</a>
                        <a class="nav-item nav-link" id="nav-concern_report-tab" data-toggle="tab" href="#nav-concern_report" role="tab" aria-controls="nav-concern_report" aria-selected="false">Report a Concern</a>
                      </div>
                  </div><!--------------container--------------->
                </nav>
                <div class="container-fluid">
                    <div class="tab-content " id="nav-tabContent">
                        <!--------------Upload agreemnet-------------->
                           <div class="tab-pane fade show active" id="nav-agree" role="tabpanel" aria-labelledby="nav-employee-tab">
                            <div class="agree inner-tab-box total_agreement_list">


                            </div>
                            </div>  
                      <!--------------employee-------------->
                        <div class="tab-pane fade" id="nav-expense" role="tabpanel" aria-labelledby="nav-employee-tab">
                            <div class="expense inner-tab-box">
                                <h3><span  class="active-span" id="pending_span">Pending </span> | <span  id="historical_span"> Historical</span><span><i class="fa fa-plus" data-toggle="modal" data-target="#expense-modal" style="background-color:#cecece; font-size:11px; padding:5px; border-radius:50%;color:#fff; float:right;"></i></span></h3>
                                <!--<div class="top_part_">
                                    <ul>
                                        <li>Date</li>
                                        <li>Descripon</li>
                                        <li>Total</li>
                                    </ul>
                                </div>
                                <div class="download_file">
                                    <div class="left_part">
                                        <p>12/09/2019</p>
                                        <p>Paper purchased for office printer</p>
                                        <p>$7.50</p>
                                    </div>
                                    <div class="right_part">
                                        <a href="#">EDIT</a>
                                        <a href="#" class="down">DELETE</a>
                                    </div>
                                </div>
                                <div class="download_file">
                                    <div class="left_part">
                                        <p>12/09/2019</p>
                                        <p>Beverages purchased for PlaidFox clients</p>
                                        <p>$5.00</p>
                                    </div>
                                    <div class="right_part">
                                        <a href="#">EDIT</a>
                                        <a href="#" class="down">DELETE</a>
                                    </div>
                                </div>
                                <div class="download_file">
                                    <div class="left_part">
                                        <p>12/09/2019</p>
                                        <p>Mailing fees paid for PlaidFox challenge invitations</p>
                                        <p>$37.00</p>
                                    </div>
                                    <div class="right_part">
                                        <a href="#">EDIT</a>
                                        <a href="#" class="down">DELETE</a>
                                    </div>
                                </div>-->
                                <div id="pending_div">
                                    <table style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="return_expence_ajax">
                                            
                                            
                                        <tbody>
                                    </table>
                                </div>
                                <div id="historical_div" style="display:none;">
                                    <table style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="margin-bottom:10px;">
                                                <td>12/09/2019</td>
                                                <td>Paper purchased for office printer</td>
                                                <td>$7.50</td>
                                                <td class="action-box"><a href="#">View</a></td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr>
                                                <td>12/09/2019</td>
                                                <td>Paper purchased for office printer</td>
                                                <td>$5.00</td>
                                                <td class="action-box"><a href="#">View</a></td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr>
                                                <td>12/09/2019</td>
                                                <td>Paper purchased for office printer</td>
                                                <td>$5.00</td>
                                                <td class="action-box"><a href="#">View</a></td>
                                            </tr>
                                            
                                        <tbody>
                                    </table>

                                </div>
                                
                             </div>
                        </div><!-------------end--------->
                      
                      <!--------------agreements-------------->
                      <div class="tab-pane fade total_mileage_list" id="nav-mileage" role="tabpanel" aria-labelledby="nav-mileage-tab">

                        <!--- mileage List  -->
                            <div class="mileage inner-tab-box">

                            <h3><span  class="active-span" id=active_mileage_span"">Pending </span>
                                <!--<span  id="old_mileage_span" >Old Contracts</span>
                                <span>-->
                                <i class="fa fa-plus" data-toggle="modal" data-target="#mileage-modal" style="background-color:#cecece; font-size:11px; padding:5px; border-radius:50%;color:#fff; float:right;"></i></span></h3>

                            <div id="active_mileage_div">
                            <table style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Reason for mileage</th>
                                        <th>Total Km</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="return_mileagelist">
                                    
                                </tbody>
                            </table>
                                </div>

                             <!--   <div id="old_mileage_div" style="display:none;">
                            <table style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Reason for mileage</th>
                                        <th>Total Km</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="margin-bottom:10px;">
                                        <td>12/09/2019</td>
                                        <td>Client site visit</td>
                                        <td>10km</td>
                                        <td class="action-box"><a href="javascript:void();" >view</a></td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <tr>
                                        <td>12/09/2019</td>
                                        <td>Client site visit</td>
                                        <td>20km</td>
                                        <td class="action-box"><a href="javascript:void();" >view</a></td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <tr>
                                        <td>12/09/2019</td>
                                        <td>Client site visit</td>
                                        <td>10km</td>
                                        <td class="action-box"><a href="javascript:void();" >view</a></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                                </div>-->
                                
                        </div>



                        
                      </div><!-------------end--------->
                      
                      <!--------------statements-------------->
                      <div class="tab-pane fade" id="nav-maintenance" role="tabpanel" aria-labelledby="nav-maintenance-tab">
                        <div class="maintenance inner-tab-box">
                            <h3>Active Tickets | <span>Completed Tickets</span></h3>
                            <!--<div class="top_part_">
                                <ul>
                                    <li>#</li>
                                    <li>Subject</li>
                                    <li>Status</li>
                                    <li>Last updated</li>
                                    <li>Submited by</li>
                                </ul>
                            </div>
                            <div class="download_file">
                                <div class="left_part">
                                    <p>#101</p>
                                    <p>Updates to plaidfox.com</p>
                                    <p>Not completed</p>
                                    <p>MM/DD/YYYY</p>
                                    <p>John</p>
                                </div>
                                <div class="right_part">
                                    <a href="#">EDIT</a>
                                    <a href="#" class="down">DELETE</a>
                                </div>
                            </div>
                            <div class="download_file">
                                <div class="left_part">
                                    <p>#102</p>
                                    <p>Updates to plaidfox.com</p>
                                    <p>Not completed</p>
                                    <p>MM/DD/YYYY</p>
                                    <p>John</p>
                                </div>
                                <div class="right_part">
                                    <a href="#">EDIT</a>
                                    <a href="#" class="down">DELETE</a>
                                </div>
                            </div>
                            <div class="download_file">
                                <div class="left_part">
                                    <p>#103</p>
                                    <p>Updates to plaidfox.com</p>
                                    <p>Not completed</p>
                                    <p>MM/DD/YYYY</p>
                                    <p>John</p>
                                </div>
                                <div class="right_part">
                                    <a href="#">EDIT</a>
                                    <a href="#" class="down">DELETE</a>
                                </div>
                            </div>
                            <div class="download_file">
                                <div class="left_part">
                                    <p>#104</p>
                                    <p>Updates to plaidfox.com</p>
                                    <p>Not completed</p>
                                    <p>MM/DD/YYYY</p>
                                    <p>John</p>
                                </div>
                                <div class="right_part">
                                    <a href="#">EDIT</a>
                                    <a href="#" class="down">DELETE</a>
                                </div>
                            </div>
                            <div class="download_file">
                                <div class="left_part">
                                    <p>#105</p>
                                    <p>Updates to plaidfox.com</p>
                                    <p>Not completed</p>
                                    <p>MM/DD/YYYY</p>
                                    <p>John</p>
                                </div>
                                <div class="right_part">
                                    <a href="#">EDIT</a>
                                    <a href="#" class="down">DELETE</a>
                                </div>
                            </div>-->
                            <table style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Last Updated</th>
                                        <th>Submited by</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="margin-bottom:10px;">
                                        <td>#101</td>
                                        <td>Updates to plaidfox.com</td>
                                        <td>Not completed</td>
                                        <td>MM/DD/YYYY</td>
                                        <td>John</td>
                                        <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#maintenance-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <tr>
                                        <td>#102</td>
                                        <td>Updates to plaidfox.com</td>
                                        <td>Not completed</td>
                                        <td>MM/DD/YYYY</td>
                                        <td>John</td>
                                        <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#maintenance-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <tr>
                                        <td>#103</td>
                                        <td>Updates to plaidfox.com</td>
                                        <td>Not completed</td>
                                        <td>MM/DD/YYYY</td>
                                        <td>John</td>
                                        <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#maintenance-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <tr>
                                        <td>#104</td>
                                        <td>Updates to plaidfox.com</td>
                                        <td>Not completed</td>
                                        <td>MM/DD/YYYY</td>
                                        <td>John</td>
                                        <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#maintenance-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <tr>
                                        <td>#105</td>
                                        <td>Updates to plaidfox.com</td>
                                        <td>Not completed</td>
                                        <td>MM/DD/YYYY</td>
                                        <td>John</td>
                                        <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#maintenance-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                    </tr>
                                    
                                <tbody>
                            </table>
                        </div>
                      </div><!-------------end--------->
                      <!--------------statements-------------->
                      <div class="tab-pane fade" id="nav-time" role="tabpanel" aria-labelledby="nav-time-tab">
                        <div class="time inner-tab-box">
                            <div class="col-md-12" style="text-align:center">
                                <h3>Requests | <span>Team Calendar</span></h3>
                            </div>
                            <div class="request">
                                <h3>Pending | <span>Historical</span></h3>
                                <!--<div class="top_part_">
                                    <ul>
                                        <li>Requested by</li>
                                        <li>Type</li>
                                        <li>Start date</li>
                                        <li>End date</li>
                                        <li>Total no. days</li>
                                        <li>Description</li>
                                    </ul>
                                </div>
                                <div class="download_file">
                                    <div class="left_part">
                                        <p>John Doe</p>
                                        <p>Time off</p>
                                        <p>MM/DD/YYYY</p>
                                        <p>MM/DD/YYYY</p>
                                        <p>2</p>
                                        <p>Time off for vacation</p>
                                    </div>
                                    <div class="right_part">
                                        <a href="#">EDIT</a>
                                        <a href="#" class="down">DELETE</a>
                                    </div>
                                </div><!------------------>
                                <table style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Requested by</th>
                                            <th>Type</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            <th>Total no. days</th>
                                            <th>Description</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="margin-bottom:10px;">
                                            <td>John Doe</td>
                                            <td>Time off</td>
                                            <td>MM/DD/YYYY</td>
                                            <td>MM/DD/YYYY</td>
                                            <td>2</td>
                                            <td>Time off for vacation</td>
                                            <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#time-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        
                                    <tbody>
                                </table>
                            </div>
                            <div class="calender">
                            </div>
                             
                        </div>
                      </div><!-------------end--------->
                      <!--------------statements-------------->
                      <div class="tab-pane fade" id="nav-concern_report" role="tabpanel" aria-labelledby="nav-concern-tab">
                        <div class="concern_report inner-tab-box">
                            <h3>Pending | <span>Historical</span></h3>
                            <!--<div class="top_part_">
                                <ul>
                                    <li>Date</li>
                                    <li>Subject</li>
                                    
                                </ul>
                            </div>
                            <div class="download_file">
                                <div class="left_part">
                                    <p>MM/DD/YYYY</p>
                                    <p>Subject line here</p>
                                    
                                </div>
                                <div class="right_part">
                                    <a href="#">EDIT</a>
                                    <a href="#" class="down">DELETE</a>
                                </div>
                            </div>
                            <div class="download_file">
                                <div class="left_part">
                                    <p>MM/DD/YYYY</p>
                                    <p>Subject line here</p>
                                    
                                </div>
                                <div class="right_part">
                                    <a href="#">EDIT</a>
                                    <a href="#" class="down">DELETE</a>
                                </div>
                            </div><!------------------>
                            <table style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Subject</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="margin-bottom:10px;">
                                        <td>MM/DD/YYYY</td>
                                        <td>Subject line here</td>
                                        <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#concern-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <tr style="margin-bottom:10px;">
                                        <td>MM/DD/YYYY</td>
                                        <td>Subject line here</td>
                                        <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#concern-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <tr style="margin-bottom:10px;">
                                        <td>MM/DD/YYYY</td>
                                        <td>Subject line here</td>
                                        <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#concern-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <tr style="margin-bottom:10px;">
                                        <td>MM/DD/YYYY</td>
                                        <td>Subject line here</td>
                                        <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#concern-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    
                                <tbody>
                            </table>
                            
                        </div>
                      </div><!-------------end--------->
                      
                      
                    </div><!----------tab-content------------->
                </div> <!--------------container--------------->
            </div><!-------------admin------------>
                
            <!--------------Benefits-------------->
            <div class="tab-pane fade" id="benefits" role="tabpanel" aria-labelledby="benefits-tab">
                <div class="container-fluid">
                    
                    <nav class="top_tab_details">
                      <div class="container-fluid">
                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-plan-tab" data-toggle="tab" href="#nav-plan" role="tab" aria-controls="nav-plan" aria-selected="true">Plan Overview</a>
                            <a class="nav-item nav-link" id="nav-additional-tab" data-toggle="tab" href="#nav-additional" role="tab" aria-controls="nav-additional" aria-selected="false">Additional Benefits Spending</a>
                            <a class="nav-item nav-link" id="nav-meal-tab" data-toggle="tab" href="#nav-meal" role="tab" aria-controls="nav-meal" aria-selected="false">Meals</a>
                            
                          </div>
                      </div><!--------------container--------------->
                    </nav>
                    <div class="container-fluid">
                        <div class="tab-content" id="nav-tabContent">
                                
                            <!--------------employee-------------->
                            <div class="tab-pane fade show active" id="nav-plan" role="tabpanel" aria-labelledby="nav-plan-tab">
                                <div class="plan inner-tab-box">
                                    <h3><span  class="active-span" id="plans_span">Active Plans </span></h3>
                                    
                                    <div id="plans_div">
                                        <table style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Description</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="margin-bottom:10px;">
                                                    <td>12/09/2019</td>
                                                    <td>John Doe Benefits Plan</td>
                                                    <td class="action-box"></td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                                
                                                
                                            <tbody>
                                        </table>
                                    </div>
                                    
                                    
                                 </div>
                            </div><!-------------end--------->
                                  
                            <!--------------additional-------------->
                            <div class="tab-pane fade" id="nav-additional" role="tabpanel" aria-labelledby="nav-additional-tab">
                                <div class="additional inner-tab-box">
                                    <h3>Pending | <span>History</span></h3>
                                    
                                    <table style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="margin-bottom:10px;">
                                                <td>12/09/2019</td>
                                                <td>Brief description here</td>
                                                <td>$50</td>
                                                <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#additional-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr>
                                                <td>12/09/2019</td>
                                                <td>Brief description here</td>
                                                <td>$50</td>
                                                <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#additional-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr>
                                                <td>12/09/2019</td>
                                                <td>Brief description here</td>
                                                <td>$50</td>
                                                <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#additional-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                            </tr>
                                            
                                        <tbody>
                                    </table>
                                    
                                </div>
                            </div><!-------------end--------->
                            
                            <!--------------Meal-------------->
                            <div class="tab-pane fade" id="nav-meal" role="tabpanel" aria-labelledby="nav-meal-tab">
                                <div class="meal inner-tab-box">
                                    <h3>Current Orders | <span>Order History</span></h3>
                                    
                                    <table style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Total </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="margin-bottom:10px;">
                                                <tr style="margin-bottom:10px;">
                                                <td>12/09/2019</td>
                                                <td>Brief description here</td>
                                                <td>$50</td>
                                                <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#meal-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr>
                                                <td>12/09/2019</td>
                                                <td>Brief description here</td>
                                                <td>$50</td>
                                                <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#meal-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr>
                                                <td>12/09/2019</td>
                                                <td>Brief description here</td>
                                                <td>$50</td>
                                                <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#meal-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                            </tr>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            
                                        <tbody>
                                    </table>
                                    
                                </div>
                            </div><!-------------end--------->
                                
                            
                        </div>
                    </div>
                    
                </div><!--------------container--------------->
            </div><!-------------end---benefits------>
              
              <!--------------Classroom-------------->
            <div class="tab-pane fade" id="classroom" role="tabpanel" aria-labelledby="classroom-tab">
                <div class="container-fluid">
                    <nav class="top_tab_details">
                      <div class="container-fluid">
                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-mission-tab" data-toggle="tab" href="#nav-mission" role="tab" aria-controls="nav-mission" aria-selected="true">49 North Mission</a>
                            <a class="nav-item nav-link" id="nav-development-tab" data-toggle="tab" href="#nav-development" role="tab" aria-controls="nav-development" aria-selected="false">Personal Development Plan</a>
                            <a class="nav-item nav-link" id="nav-courses-tab" data-toggle="tab" href="#nav-courses" role="tab" aria-controls="nav-courses" aria-selected="false">Courses</a>
                            <a class="nav-item nav-link" id="nav-journal-tab" data-toggle="tab" href="#nav-journal" role="tab" aria-controls="nav-journal" aria-selected="false">Journal</a>
                          </div>
                      </div><!--------------container--------------->
                    </nav>
                    <div class="container-fluid">
                        <div class="tab-content" id="nav-tabContent">
                                
                            <!--------------employee-------------->
                            <div class="tab-pane fade show active" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <div class="mission inner-tab-box">
                                    
                                    
                                    
                                 </div>
                            </div><!-------------end--------->
                                  
                            <!--------------additional-------------->
                            <div class="tab-pane fade" id="nav-development" role="tabpanel" aria-labelledby="nav-development-tab">
                                <div class="development inner-tab-box">
                                    <h3><span  class="active-span" id="current_span">Current </span> | <span  id="archived_span"> Archived</span></h3>
                                    <div id="current-div">
                                        <div class="col-md-12" style=" border:1px solid #cecece;text-align:center;padding:10px;border-radius:5px;">
                                            <h3>John Doe Personal Development Plan</h3>
                                            <p><span>Start Date: MM/DD/YYYY</span>&nbsp;&nbsp;<span>Last Date: MM/DD/YYYY</span></p>
                                        </div>
                                    </div>
                                    <div id="archived-div" style="display:none;">
                                        <table style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Description</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="margin-bottom:10px;">
                                                    <td>12/09/2019</td>
                                                    <td>Brief description here</td>
                                                    <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#development-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                                <tr>
                                                    <td>12/09/2019</td>
                                                    <td>Brief description here</td>
                                                    <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#development-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                                <tr>
                                                    <td>12/09/2019</td>
                                                    <td>Brief description here</td>
                                                    <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#development-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                                </tr>
                                                
                                            <tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div><!-------------end--------->
                            
                            <!--------------courses-------------->
                            <div class="tab-pane fade" id="nav-courses" role="tabpanel" aria-labelledby="nav-courses-tab">
                                <div class="courses inner-tab-box" style="text-align:center;">
                                    <h3 style="margin-bottom:20px;"><span  class="active-span" id="current_courses_span">Current Courses </span> | <span  id="historical_courses_span"> Historical Courses</span></h3>
                                    <div class="courses-div">
                                        <div id="current-courses-div">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="cureses_text">
                                                        <img src="img/loginbg.jpg" alt="" width="100%">
                                                        <div class="inner_c">
                                                            <h2>Sales Strategy</h2>
                                                            <a href="javascript:void();" class="enter-btn">Enter</a>
                                                        </div>
                                                    </div><!------------>
                                                </div><!---col-sm-4---------------->
                                                <div class="col-sm-4">
                                                    <div class="cureses_text">
                                                        <img src="img/loginbg.jpg" alt="" width="100%">
                                                        <div class="inner_c">
                                                            <h2>7 habits</h2>
                                                            <a href="javascript:void();" class="enter-btn">Enter</a>
                                                        </div>
                                                    </div><!------------>
                                                </div><!---col-sm-4---------------->
                                                <div class="col-sm-4">
                                                    <div class="cureses_text">
                                                        <img src="img/loginbg.jpg" alt="" width="100%">
                                                        <div class="inner_c">
                                                            <h2>Course C</h2>
                                                            <a href="javascript:void();" class="enter-btn">Enter</a>
                                                        </div>
                                                    </div><!------------>
                                                </div><!---col-sm-4---------------->
                                                <div class="col-sm-4">
                                                    <div class="cureses_text">
                                                        <img src="img/loginbg.jpg" alt="" width="100%">
                                                        <div class="inner_c">
                                                            <h2>Course D</h2>
                                                            <a href="javascript:void();" class="enter-btn">Enter</a>
                                                        </div>
                                                    </div><!------------>
                                                </div><!---col-sm-4---------------->
                                                <div class="col-sm-4">
                                                    <div class="cureses_text">
                                                        <img src="img/loginbg.jpg" alt="" width="100%">
                                                        <div class="inner_c">
                                                            <h2>Course E</h2>
                                                            <a href="javascript:void();" class="enter-btn">Enter</a>
                                                        </div>
                                                    </div><!------------>
                                                </div><!---col-sm-4---------------->
                                                <div class="col-sm-4">
                                                    <div class="cureses_text">
                                                        <img src="img/loginbg.jpg" alt="" width="100%">
                                                        <div class="inner_c">
                                                            <h2>Course F</h2>
                                                            <a href="javascript:void();" class="enter-btn">Enter</a>
                                                        </div>
                                                    </div><!------------>
                                                </div><!---col-sm-4---------------->
                                               
                                            </div><!---------row------------->
                                        </div>
                                        <div id="historical-courses-span">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="cureses_text">
                                                        <img src="img/loginbg.jpg" alt="" width="100%">
                                                        <div class="inner_c">
                                                            <h2>Sales Strategy</h2>
                                                            <a href="#">Enter</a>
                                                        </div>
                                                    </div><!------------>
                                                </div><!---col-sm-4---------------->
                                                <div class="col-sm-4">
                                                    <div class="cureses_text">
                                                        <img src="img/loginbg.jpg" alt="" width="100%">
                                                        <div class="inner_c">
                                                            <h2>7 habits</h2>
                                                            <a href="#">Enter</a>
                                                        </div>
                                                    </div><!------------>
                                                </div><!---col-sm-4---------------->
                                                
                                                
                                               
                                            </div><!---------row------------->
                                        </div>
                                    </div>
                                    <div id="courses_details_div" style="display:none">
                                        <div class="col-md-12" style=" margin-bottom:20px;">
                                            <img src="img/loginbg.jpg" alt="" style="width:100%; height:200px !important;">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="chapter-box">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p><span class="colordot"></span> Chapter1</p>
                                                        
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p>Inside Out</p>
                                                    </div>
                                                    <div class="col-md-4 btn-div">
                                                        <a class="bg-btn" href="javascript:void();" data-toggle="modal" data-target="#courses-modal">Review</a><a href="javascript:void();" data-toggle="modal" data-target="#courses-modal" class="default-btn">REDO</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 ">
                                            <div class="chapter-box">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p><span class="colordot"></span> Chapter 2</p>
                                                        
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p>Habit 1: Be Proactive</p>
                                                    </div>
                                                    <div class="col-md-4 btn-div">
                                                        <a class="bg-btn" href="javascript:void();" data-toggle="modal" data-target="#courses-modal">Review</a><a href="javascript:void();" data-toggle="modal" data-target="#courses-modal" class="default-btn">REDO</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 ">
                                            <div class="chapter-box">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p><span class="colordot"></span> Chapter3</p>
                                                        
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p>Habit 2: Begin With The End in Mind</p>
                                                    </div>
                                                    <div class="col-md-4 btn-div">
                                                        <a class="bg-btn" href="javascript:void();" data-toggle="modal" data-target="#courses-modal">Review</a><a href="javascript:void();" data-toggle="modal" data-target="#courses-modal" class="default-btn">REDO</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 ">
                                            <div class="chapter-box">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p><span class="dot"></span> Chapter4</p>
                                                        
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p>Habit 3: Put First Things First</p>
                                                    </div>
                                                    <div class="col-md-4 btn-div">
                                                        <a href="javascript:void();" data-toggle="modal" data-target="#courses-modal" class="default-btn">Start</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 ">
                                            <div class="chapter-box">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p><span class="dot"></span> Chapter5</p>
                                                        
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p>Paradigms Of Interdependence</p>
                                                    </div>
                                                    <div class="col-md-4 btn-div">
                                                        <a href="javascript:void();" data-toggle="modal" data-target="#courses-modal" class="default-btn">Start</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 ">
                                            <div class="chapter-box">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p><span class="dot"></span> Chapter6</p>
                                                        
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p>Habit 4: Think Win-Win</p>
                                                    </div>
                                                    <div class="col-md-4 btn-div">
                                                        <a href="javascript:void();" data-toggle="modal" data-target="#courses-modal" class="default-btn">Start</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 ">
                                            <div class="chapter-box">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p><span class="dot"></span> Chapter6</p>
                                                        
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p>Habit 4: Think Win-Win</p>
                                                    </div>
                                                    <div class="col-md-4 btn-div">
                                                        <a href="#" class="default-btn">Start</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 ">
                                            <div class="chapter-box">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p><span class="dot"></span> Chapter7</p>
                                                        
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p>Habit 5: Seek First To Understand Then To Be Understood</p>
                                                    </div>
                                                    <div class="col-md-4 btn-div">
                                                        <a href="#" class="grey-btn">Unavailable</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 ">
                                            <div class="chapter-box">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p><span class="dot"></span> Chapter8</p>
                                                        
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p>Habit 6: Synergize</p>
                                                    </div>
                                                    <div class="col-md-4 btn-div">
                                                        <a href="#" class="grey-btn">Unavailable</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div><!-------------end--------->
                            
                            <!--------------courses-------------->
                            <div class="tab-pane fade" id="nav-journal" role="tabpanel" aria-labelledby="nav-journal-tab">
                                <div class="journal inner-tab-box">
                                    <h3>Current Orders | <span>Order History</span></h3>
                                    
                                    <table style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Total </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="margin-bottom:10px;">
                                                <tr style="margin-bottom:10px;">
                                                <td>12/09/2019</td>
                                                <td>Brief description here</td>
                                                <td>$50</td>
                                                <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#meal-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr>
                                                <td>12/09/2019</td>
                                                <td>Brief description here</td>
                                                <td>$50</td>
                                                <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#meal-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr>
                                                <td>12/09/2019</td>
                                                <td>Brief description here</td>
                                                <td>$50</td>
                                                <td class="action-box"><a href="javascript:void();" data-toggle="modal" data-target="#meal-modal">EDIT</a><a href="#" class="down">DELETE</a></td>
                                            </tr>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            
                                        <tbody>
                                    </table>
                                    
                                </div>
                            </div><!-------------end--------->
                                
                            
                        </div>
                    </div>
                </div><!--------------container--------------->
            </div><!-------------end----classroom----->
              
        </div><!-----------------myTabContent--------------->
            
            
    </div><!---------profile_section_text------->
   
</section>


 <script>
$(document).ready(function() {
    $("#active_contracts_span").click(function() {
            $("#active_contracts_span").addClass("active-span");
            $("#old_contracts_span").removeClass("active-span");
            $("#active_contracts_div").show();
            $("#old_contracts_div").hide();
        
    });
    $("#old_contracts_span").click(function() {
            $("#old_contracts_span").addClass("active-span");
            $("#active_contracts_span").removeClass("active-span");
            $("#active_contracts_agreediv").hide();
            $("#old_contracts_agreediv").show();
        
    });
    /********************************/
    $("#active_contracts_agree").click(function() {
            $("#active_contracts_agree").addClass("active-span");
            $("#old_contracts_agree").removeClass("active-span");
            $("#active_contracts_agreediv").show();
            $("#old_contracts_agreediv").hide();
        
    });
    $("#old_contracts_agree").click(function() {
        
            $("#old_contracts_agree").addClass("active-span");
            $("#active_contracts_agree").removeClass("active-span");
            $("#active_contracts_agreediv").hide();
            $("#old_contracts_agreediv").show();
    });
    /********************************/
    $("#pending_span").click(function() {
            $("#pending_span").addClass("active-span");
            $("#historical_span").removeClass("active-span");
            $("#pending_div").show();
            $("#historical_div").hide();
        
    });
    $("#historical_span").click(function() {
            $("#historical_span").addClass("active-span");
            $("#pending_span").removeClass("active-span");
            $("#pending_div").hide();
            $("#historical_div").show();
    });
    
    /********************************/
    $("#current_span").click(function() {
            $("#current_span").addClass("active-span");
            $("#archived_span").removeClass("active-span");
            $("#current-div").show();
            $("#archived-div").hide();
        
    });
    $("#archived_span").click(function() {
            $("#archived_span").addClass("active-span");
            $("#current_span").removeClass("active-span");
            $("#current-div").hide();
            $("#archived-div").show();
    });
    
    /********************************/
    $("#current_courses_span").click(function() {
            $("#current_courses_span").addClass("active-span");
            $("#historical_courses_span").removeClass("active-span");
            $("#current-courses-div").show();
            $("#historical-courses-div").hide();
        
    });
    $("#historical_courses_span").click(function() {
            $("#current_courses_span").addClass("active-span");
            $("#historical_courses_span").removeClass("active-span");
            $("#current-courses-div").hide();
            $("#historical-courses-div").show();
    });
    $(".enter-btn").click(function() {
            
            $(".courses-div").hide();
            $("#courses_details_div").show();
    });
});
</script>

<!----------Modals----------------->
<!----------Modals----------------->
<div id="expense-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- body modal -->
            <div class="modal-body">
                <div class="col-md-12" style="margin-top:40px;margin-bottom:20px;">
                    <form class="expences" action="" method="POST">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Company</label>
                                    <select class="select_status form-control" name="company">
                                        <option value="">Select</option>
                                      @foreach($companies as $company_ex_report)
                                        <option value="{{ $company_ex_report->id }}">{{ $company_ex_report->companyname }}</option> 
                                      @endforeach                                       
                                    </select>
                                </div>                                
                            </div>
                            
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Date</label>
                                    <input type="date"  placeholder = "" class = "form-control" name="date">
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Category</label>
                                    <select class="select_status form-control" name="category">
                                        <option value="">Select</option>
                                      @foreach($category as $category_ex_report)
                                        <option value="{{ $category_ex_report->id }}">{{ $category_ex_report->categoryname }}</option> 
                                      @endforeach  
                                    </select>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Purchase via</label>
                                    <select class="select_status form-control" name="purchase">
                                        <option value="">Select</option>
                                       @foreach($purchases as $purchases_ex_report)
                                        <option value="{{ $purchases_ex_report->id }}">{{ $purchases_ex_report->purchasename }}</option> 
                                      @endforeach  
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
                                        <option value="">Select</option>
                                      @foreach($project as $project_ex_report)
                                        <option value="{{ $project_ex_report->id }}">{{ $project_ex_report->projectname }}</option> 
                                      @endforeach  
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Select Receipt</label>
                                    <select class="select_status form-control" name="receipt">
                                        <option value="">Select</option>
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
                                    <input type="text" id="name" name="description" class="form-control" placeholder="Insert text here">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="col-md-12 col-sm-12">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" name="billable"> Billable
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="display:inline-flex;">
                                        <div class="col-md-7 col-sm-7">
                                            
                                            <label class="form-check-label">
                                              <input class="form-check-input" type="checkbox" name="    "> Received authorization
                                            </label>
                                            
                                        </div>
                                        <div class="col-md-5 col-sm-5">                                               
                                            <input type="text" id="name" name="received_auth" class="form-control" placeholder="" style="border:0px; border-bottom:1px solid;padding: 0px;background-color: #fff !important;">
                                            
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
                                    <input type="text" id="name" name="subtotal" class="form-control" placeholder="Insert text here">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">GST</label>
                                    <input type="text" id="name" name="gst" class="form-control" placeholder="Insert Figure here">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">PST</label>
                                    <input type="text" id="name" name="pst" class="form-control" placeholder="Insert Figure here">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Total</label>
                                    <input type="text" id="name" name="total" class="form-control" placeholder="Insert Figure here">
                                </div>
                            </div>
                        </div>
                        </hr>               
                        <div class="row margin-top-30">
                            <div class="form-group" style="width:100%;">
                                <div class="col-md-12 col-sm-12">
                                    {{ csrf_field() }} 
                                    <input type="hidden" name="emp_id" value="{{ auth()->user()->id }}">
                                    <input type="submit" class="btn-dark contact_btn" value="Save" data-form="expences">                                    
                                    <span class="close close-span" data-dismiss="modal" aria-label="Close"><i class="fa fa-arrow-left"></i> Return to Expense Reports</span>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>

        </div>
    </div>
</div>
<div id="mileage-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="col-md-12" style="margin-top:40px;margin-bottom:20px;">
                    <form id="employee_mileage" >

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Company</label>
                                    <select class="select_status form-control" name="companyname">
                                        <option>Select</option>
                                        @foreach($companies as $company)
                                        <option value="{{$company->companyname}}">{{$company->companyname}}</option>
                                       @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Date</label>
                                    <input type="date"  placeholder = "" name="date" class = "form-control"  >
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Vehicle</label>
                                    <input type="text" id="vehicle" name="vehicle" class="form-control" placeholder="Insert text here">
                                </div>
                                
                                
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">No of kilometers</label>
                                    <input type="text" id="kilometers" name="kilometers" class="form-control" placeholder="Insert figure here">
                                </div>
                                
                                
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="text_outer">
                                    <label for="name" class="">Reason for mileage</label>
                                    <input type="text" id="reasonformileage" name="reasonformileage" class="form-control" placeholder="Insert text here">
                                </div>
                            </div>
                            
                        </div>
                        </hr>               
                        <div class="row margin-top-30">
                            <div class="form-group" style="width:100%;">
                                <div class="col-md-12 col-sm-12">
                                    <button type="button" onclick="addmileage_details();" class="btn-dark contact_btn">Save</button>
                                    <span class="close close-span" data-dismiss="modal" aria-label="Close"><i class="fa fa-arrow-left"></i> Return to Mileage</span>
                                    
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                
            </div>

        </div>
    </div>
</div>
<div id="maintenance-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="col-md-12" style="margin-top:40px;margin-bottom:20px;">
                    <form id="" action="" >
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Subject</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Insert text here">
                                </div>
                                
                            </div>
                            
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Website</label>
                                    <select class="select_status form-control">
                                        <option>Select</option>
                                        <option>Website1</option>
                                        <option>Website2</option>
                                    </select>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                A brief description of your ticket
                                <div class="text_outer">
                                    <label for="name" class="">Description</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Insert text here">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Priority</label>
                                    <select class="select_status form-control">
                                        <option>Select</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Category</label>
                                    <select class="select_status form-control">
                                        <option>Select</option>
                                        <option>Category1</option>
                                        <option>Category2</option>
                                    </select>
                                </div>
                                
                                
                            </div>
                        </div>
                        
                        
                        </hr>               
                        <div class="row margin-top-30">
                            <div class="form-group" style="width:100%;">
                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" class="btn-dark contact_btn">Save</button>
                                    <span class="close close-span" data-dismiss="modal" aria-label="Close"><i class="fa fa-arrow-left"></i> Return to Maintenance</span>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>

        </div>
    </div>
</div>

<div id="time-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="col-md-12" style="margin-top:40px;margin-bottom:20px;">
                    <form id="" action="" >
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="col-md-12 col-sm-12">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox"> Vacation
                                    </label>
                                </div>
                                
                            </div>
                            
                            <div class="col-md-4 col-sm-4">
                                <div class="col-md-12 col-sm-12">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox"> Sick Day
                                    </label>
                                </div>
                                
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="col-md-12 col-sm-12">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox"> All Day
                                    </label>
                                </div>
                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Start Date</label>
                                    <input type="date"  class="form-control datepicker" placeholder="Select">
                                </div>
                                
                            </div>
                            
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">Start Time</label>
                                    <input type="text"  class="form-control timepicker" placeholder="Select">
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">End Date</label>
                                    <input type="date"  class="form-control datepicker" placeholder="Select">
                                </div>
                                
                            </div>
                            
                            <div class="col-md-6 col-sm-6">
                                <div class="text_outer">
                                    <label for="name" class="">End Time</label>
                                    <input type="text"  class="form-control timepicker" placeholder="Select">
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                *Dates are available.
                                <div class="text_outer">
                                    <label for="name" class="">Notes</label>
                                    <input type="text" class="form-control" placeholder="Insert text here">
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                *Dates are available.
                                <div class="text_outer">
                                    <label for="name" class="">Notes</label>
                                    <input type="text" class="form-control" placeholder="Insert text here">
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12" style="display:inline-flex;">
                                <div class="col-md-7 col-sm-7">
                                    
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox"> Number of days taken to date:
                                    </label>
                                    
                                </div>
                                <div class="col-md-5 col-sm-5">
                                        
                                    <input type="text" id="name" name="name" class="form-control" placeholder="" style="border:0px; border-bottom:1px solid;padding: 0px;background-color: #fff !important;">
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                        
                        </hr>               
                        <div class="row margin-top-30">
                            <div class="form-group" style="width:100%;">
                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" class="btn-dark contact_btn">Save</button>
                                    <span class="close close-span" data-dismiss="modal" aria-label="Close"><i class="fa fa-arrow-left"></i> Return to Time Off</span>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>

        </div>
    </div>
</div>

<div id="concern-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="col-md-12" style="margin-top:40px;margin-bottom:20px;">
                    <form id="" action="" >
                        
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="text_outer">
                                    <label for="name" class="">Subject Line</label>
                                    <input type="text"  class="form-control" placeholder="Insert text here">
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="text_outer">
                                    <label for="name" class="">Description</label>
                                    <input type="text" style="height:70px;" class="form-control" placeholder="Insert text here">
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-12">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox"> I want to remain anonymous from my co-workers
                                    </label>
                                </div>
                                
                            </div>
                            
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-12">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox"> I do not want to be contacted about this
                                    </label>
                                </div>
                                
                            </div>
                            
                            
                        </div>
                        
                        <div class="clearfix"></div>
                        </hr>               
                        <div class="row margin-top-30">
                            <div class="form-group" style="width:100%;margin-top:20px;">
                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" class="btn-dark contact_btn">Save</button>
                                    <span class="close close-span" data-dismiss="modal" aria-label="Close"><i class="fa fa-arrow-left"></i> Return to Report a Concern</span>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>

        </div>
    </div>
</div>

<div id="meal-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="col-md-12" style="margin-top:40px;margin-bottom:20px;">
                    <form id="" action="" >
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <div class="text_outer">
                                    <label  class="">Delivery Date</label>
                                    <input type="date"  class="form-control datepicker" >
                                </div>
                                
                            </div>
                            
                            <div class="col-md-3 col-sm-3">
                                <div class="text_outer">
                                    <label for="name" class="">Base</label>
                                    <select class="select_status form-control">
                                        <option>Select</option>
                                        <option>Base1</option>
                                        <option>Base2</option>
                                    </select>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="text_outer">
                                    <label for="name" class="">Protein</label>
                                    <select class="select_status form-control">
                                        <option>Select</option>
                                        <option>Protein1</option>
                                        <option>Protein2</option>
                                    </select>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="text_outer">
                                    <label for="name" class="">Carb</label>
                                    <select class="select_status form-control">
                                        <option>Select</option>
                                        <option>Carb1</option>
                                        <option>Carb2</option>
                                    </select>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <div class="text_outer">
                                    <label  class="">Veggies 1</label>
                                    <select class="select_status form-control">
                                        <option>Select</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                                
                            </div>
                            
                            <div class="col-md-3 col-sm-3">
                                <div class="text_outer">
                                    <label for="name" class="">Veggies 2</label>
                                    <select class="select_status form-control">
                                        <option>Select</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="text_outer">
                                    <label for="name" class="">Sauce</label>
                                    <select class="select_status form-control">
                                        <option>Select</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="text_outer">
                                    <label for="name" class="">Quan</label>
                                    <select class="select_status form-control">
                                        <option>Select</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                                
                                
                            </div>
                            
                        </div>
                        
                        
                        </hr>               
                        <div class="row margin-top-30">
                            <div class="form-group" style="width:100%;">
                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" class="btn-dark contact_btn">Save</button>
                                    <span class="close close-span" data-dismiss="modal" aria-label="Close"><i class="fa fa-arrow-left"></i> Return to Meals</span>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>

        </div>
    </div>
</div>




<div id="courses-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <form action="" id="wizard">
                        <!-- SECTION 1 -->
                        <h4>7 Habits</h4>
                        <section>
                            <h3>Habit 1: Be Proactive</h3>
                            <span>Reading Summary</span>
                            <div class="row"  style="margin-top:30px">
                                <div class="col-md-12">
                                    <label for="">
                                        Did you read the entire chapter entitled ‘Habit 1: Be Proactive’?
                                    </label>
                                    <div class="col-md-12 col-sm-12">
                                        <label class="containers">Yes
                                          <input type="radio" checked="checked" name="radio">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="containers">No
                                          <input type="radio" name="radio">
                                          <span class="checkmark"></span>
                                        </label>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                        </section>
                        
                        <!-- SECTION 2 -->
                        <h4></h4>
                        <section>
                            <h3>Habit 1: Be Proactive</h3>
                            <span>Reading Summary</span>
                            <div class="row" style="margin-top:30px">
                                <div class="col-md-12">
                                    <label for="">
                                        Please list the top three points that stood out to you from the reading.
                                    </label>
                                    <textarea rows="4" class="form-control" style="background: #f5f0f000 !important;border: 1px solid #a9a9a9 !important;height:200px;"></textarea>
                                </div>
                                
                            </div>
                            
                        </section>

                        <!-- SECTION 3 -->
                        <h4></h4>
                        <section>
                            <h3>Habit 1: Be Proactive</h3>
                            <span>Reading Summary</span>
                            <div class="row" style="margin-top:30px">
                                <div class="col-md-12">
                                    <label for="">
                                        Please list the top three points that stood out to you from the reading.
                                    </label>
                                    <textarea rows="4" class="form-control" style="background: #f5f0f000 !important;border: 1px solid #a9a9a9 !important;height:200px;"></textarea>
                                </div>
                                
                            </div>
                            <div class="row" style="margin-top:30px">
                                <div class="col-md-12">
                                    <label for="">
                                        Administrator’s Comments:
                                    </label>
                                    <textarea rows="4" class="form-control" style="background: #f5f0f000 !important;border: 1px solid #a9a9a9 !important;height:200px;"></textarea>
                                </div>
                                
                            </div>
                            
                        </section>
                        
                    </form>
                    <div class="col-md-12" style="padding-bottom:30px;">
                        <span class="close close-span" data-dismiss="modal" aria-label="Close"><i class="fa fa-arrow-left"></i> Return to 7 Habits</span>
                    </div>
                    
                </div>
                
            </div>

        </div>
    </div>
</div>
<script src="{{asset('js/custom_function.js')}}"></script>

<script>
$(document).ready(function() {
    $("#active_contracts_span").click(function() {
            $("#active_contracts_span").addClass("active-span");
            $("#old_contracts_span").removeClass("active-span");
            $("#active_contracts_div").show();
            $("#old_contracts_div").hide();
        
    });
    $("#old_contracts_span").click(function() {
            $("#old_contracts_span").addClass("active-span");
            $("#active_contracts_span").removeClass("active-span");
            $("#active_contracts_agreediv").hide();
            $("#old_contracts_agreediv").show();
        
    });
    /********************************/
    $("#active_contracts_agree").click(function() {
            $("#active_contracts_agree").addClass("active-span");
            $("#old_contracts_agree").removeClass("active-span");
            $("#active_contracts_agreediv").show();
            $("#old_contracts_agreediv").hide();
        
    });
    $("#old_contracts_agree").click(function() {
            $("#old_contracts_agree").addClass("active-span");
            $("#active_contracts_agree").removeClass("active-span");
            $("#active_contracts_agreediv").hide();
            $("#old_contracts_agreediv").show();
    });
    /********************************/
    $("#pending_span").click(function() {
            $("#pending_span").addClass("active-span");
            $("#historical_span").removeClass("active-span");
            $("#pending_div").show();
            $("#historical_div").hide();
        
    });
    $("#historical_span").click(function() {
            $("#historical_span").addClass("active-span");
            $("#pending_span").removeClass("active-span");
            $("#pending_div").hide();
            $("#historical_div").show();
    });
    
    /********************************/
    $("#current_span").click(function() {
            $("#current_span").addClass("active-span");
            $("#archived_span").removeClass("active-span");
            $("#current-div").show();
            $("#archived-div").hide();
        
    });
    $("#archived_span").click(function() {
            $("#archived_span").addClass("active-span");
            $("#current_span").removeClass("active-span");
            $("#current-div").hide();
            $("#archived-div").show();
    });
    
    /********************************/
    $("#current_courses_span").click(function() {
            $("#current_courses_span").addClass("active-span");
            $("#historical_courses_span").removeClass("active-span");
            $("#current-courses-div").show();
            $("#historical-courses-div").hide();
        
    });
    $("#historical_courses_span").click(function() {
            $("#current_courses_span").addClass("active-span");
            $("#historical_courses_span").removeClass("active-span");
            $("#current-courses-div").hide();
            $("#historical-courses-div").show();
    });
    $(".enter-btn").click(function() {
            
            $(".courses-div").hide();
            $("#courses_details_div").show();
    });



     /********************************/
    $("#active_mileage_span").click(function() {
            $("#active_mileage_span").addClass("active-span");
            $("#old_mileage_span").removeClass("active-span");
            $("#active_mileage_div").show();
            $("#active_mileage_div").hide();
        
    });
    $("#old_mileage_span").click(function() {
        alert('dsf');
            $("#old_mileage_span").addClass("active-span");
            $("#active_mileage_span").removeClass("active-span");
            $("#active_mileage_div").hide();
            $("#old_mileage_div").show();
    });

 



});


</script>
<script type="text/javascript">
    setTimeout(function(){
        $(".all_errors").fadeOut( "slow");
    }, 3000);
</script>


@if (session('message'))
    <script>
        $(document).ready(function(){
            swal("{{Session::get('message')}}","", "success");
        });
    </script>
@endif
@if (session('error'))
    <script>
        $(document).ready(function(){
            swal("{{Session::get('error')}}","", "danger");
        });
    </script>
@endif
@if (session('messagemileage'))
    <script>
        $(document).ready(function(){
            swal("{{Session::get('messagemileage')}}","", "success");
        });
    </script>
@endif


@endsection