
<aside data-sidebar>
    <div class="padding-bottom-md container-fluid">
        <div class="row">
            <div class="col-xs-12 bg-dark">
                <div class="padding-md">
                    <div class="panel-close-btn" data-sidebar-button><i class="fa fa-times fa-lg text-white"></i></div>
                    <h3 class="margin-0">Joinee Details</h3>
                </div>
            </div>
            <div class="col-xs-12 margin-top-md">
                <div class="nav-center">
                    <ul class="nav nav-pills text-center" style="margin-top:35px;">
                        <li class="active"><a data-toggle="pill" href="#joinee_information" id="joinee_tab">Joinee Information</a></li>
                        <!--<li><a data-toggle="pill" href="#interval_feedback" id="interval_tab">Interval Feedback</a></li>
                        <li><a data-toggle="pill" href="#roadmap" id="roadmap_tab">Roadmap</a></li>  -->
                    </ul>
                </div>
                <hr class="margin-top-0"/>
                <div class="tab-content">


                    <div id="joinee_information" class="tab-pane fade in active">
					
                        <div id="joinee-details-outer">
						<div class="success-msg" id="send_requirments" style="display:none;">
				<i class="fa fa-check"></i>Logistics requirments sucessfully send.
</div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="panel panel-danger joinee-blocks" onclick="dashboard.toggleLogistics()">
                                        <div class="panel-body">
                                            <div class="panel-proceed-btn"><i class="fa fa-angle-double-right fa-lg"></i></div>
                                            <strong>Logistics Arrangements</strong>
                                        <p class="margin-bottom-0 text-muted logistic_date"></p>
                                             <p class="margin-bottom-0 text-green" id="logistic_count"></p>
											 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-success joinee-blocks" onclick="dashboard.toggle15DayChecklist()">
                                        <div class="panel-body">
                                            <div class="panel-proceed-btn"><i class="fa fa-angle-double-right fa-lg"></i></div>
                                            <strong>15 Day Checklist</strong>
                                            <p class="margin-bottom-0 text-muted">15/01/2017</p>
                                            <p class="margin-bottom-0 text-green">Done</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-danger joinee-blocks" onclick="dashboard.toggle45DayMeeting()">
                                        <div class="panel-body">
                                            <div class="panel-proceed-btn"><i class="fa fa-angle-double-right fa-lg"></i></div>
                                            <strong>BHR 45 Day Meeting</strong>
                                            <p class="margin-bottom-0 text-muted">-</p>
                                            <p class="margin-bottom-0 text-danger">Pending</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-danger joinee-blocks" onclick="dashboard.toggle90dayMeeting()">
                                        <div class="panel-body">
                                            <div class="panel-proceed-btn"><i class="fa fa-angle-double-right fa-lg"></i></div>
                                            <strong>BHR 90 Day Meeting</strong>
                                            <p class="margin-bottom-0 text-muted">-</p>
                                            <p class="margin-bottom-0 text-danger">Pending</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-success joinee-blocks" onclick="dashboard.toggleConfirmationStatus()">
                                        <div class="panel-body">
                                            <div class="panel-proceed-btn"><i class="fa fa-angle-double-right fa-lg"></i></div>
                                            <strong>Confirmation Status</strong>
                                            <p class="margin-bottom-0 text-muted">15/05/2017</p>
                                            <p class="margin-bottom-0 text-green">Done</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="margin-top-0"/>
                            <!-- <form id="joinee_details">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="name" class="padding-top-md">Name</label>
                                            </div>
                                            <div class="col-md-9">
                                              <span id="name"></span>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="doj" class="padding-top-md">DOJ</label>
                                            </div>
                                            <div class="col-md-9">
                                           <span id="doj"></span>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="emp_id" class="padding-top-sm">Employee ID</label>
                                            </div>
                                            <div class="col-md-9">
                                         <span id="emp_id"></span>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="emp_email" class="padding-top-sm">Employee Email</label>
                                            </div>
                                            <div class="col-md-9">
                                         <span id="email"></span>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="business" class="padding-top-md">Business</label>
                                            </div>
                                            <div class="col-md-9">
                                          <span id="businees_unit"></span>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="location" class="padding-top-md">City</label>
                                            </div>
                                            <div class="col-md-9">
                                      <span id="city"></span>
                                                      </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="dept" class="padding-top-md">Department</label>
                                            </div>
                                            <div class="col-md-9">
                                               <span id="department"></span>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="sub_dept" class="padding-top-sm">Sub Department</label>
                                            </div>
                                            <div class="col-md-9">
                                         <span id="sub_department"></span>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="designation" class="padding-top-md">Designation</label>
                                            </div>
                                            <div class="col-md-9">
                                            <span id="designation"></span>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="supervisor" class="padding-top-md">Supervisor</label>
                                            </div>
                                            <div class="col-md-9">
                                             <span id="supervisor_name"></span>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="spoc" class="padding-top-md">SPOC</label>
                                            </div>
                                            <div class="col-md-9">
                                           <span id="spoc"></span>
                                                 </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="business_hr" class="padding-top-sm">Business HR</label>
                                            </div>
                                            <div class="col-md-9">
                                                   <span id="bhr_emp_id"></span>
                                             
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 hidden">
                                        <div class="text-center">
                                            <button class="btn btn-danger btn-block"><i class="fa fa-pencil"></i> Modify</button>
                                        </div>
                                    </div>
                                </div>
                            </form> -->
                            
                        </div>
                        <div id="logistics_arrangements" class="hidden">
                            <ol class="breadcrumb">
                                <li class="text-blue pointer" onclick="dashboard.toggleLogistics()">Joinee Information</li>
                                <li class="active">Logistics Arrangements</li>
                            </ol>
                            <div class="margin-top-sm">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span id="">Name : </span>
                                        <strong id="username"></strong>
                                    </div>
                                    <div class="col-md-3">
                                        <span>Emp Id : </span>
                                        <strong id="empid"></strong>
                                    </div>
                                    <div class="col-md-3">
                                        <span>DOJ : </span>
                                        <strong id="logdoj"></strong>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <i class="fa fa-share text-red pointer fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
<?php echo $this->Form->create();?>
<?php 
$i=1;
$j=1;
foreach($logistics as $logistic){
$cstatus = $logistic['department_id'];
$location_id = $logistic['location_id'];
$location_name=$locationarr[$location_id];
 @$cstatusTxt=$cstatusData[$cstatus];
  ?>
                                <div class="col-md-4">
                                    <div class="panel panel-primary joinee-blocks" onclick="dashboard.panelCheckboxToggle(this)">
                                        <div class="panel-body">
                                            <div class="panel-proceed-btn"  >
<input  id="logistic_id_<?php echo $i++;?>" type="checkbox" class="checkbox log_check" name="logistic_id[]" value="<?= $logistic->id ?>" multiple>
<span class=" user_logistic_done" id ="user_logistic_done_<?php echo $j++;?>" style="display:none;"> In process</span>

</div>
                                            
 

<strong><?= $logistic->title ?></strong>
                                            <p class="margin-bottom-0 text-muted"><?= $location_name ?></p>
                                            <p class="margin-bottom-0 text-primary"><?= @$cstatusTxt ?></p>
                                        </div>
                                    </div>
                                </div>

<?php   } ?>
                 <?php echo $this->Form->input('userid',(['name'=>'userid','type'=>'hidden','id'=>'userid'])); ?>               
                        
                      
                                
                            </div>
                            <hr class="margin-top-0"/>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
 <?php echo $this->Form->button('<i class="fa fa-paper-plane-o"></i> Send Requirements',(['class'=>'btn btn-danger btn-block','type'=>'button','onclick'=>'return logisticinsert();','id'=>''])); ?>  
                                  
                                </div>
                            </div>
  <?php echo $this->Form->end(); ?>      
                        </div>
                        <div id="15_day_checklist" class="hidden">
                            <ol class="breadcrumb">
                                <li class="text-blue pointer" onclick="dashboard.toggle15DayChecklist()">Joinee Information</li>
                                <li class="active">15 Day Checklist</li>
                            </ol>
                            <div class="margin-top-sm">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Name : </span>
                                        <strong>Dhanya Menon</strong>
                                    </div>
                                    <div class="col-md-3">
                                        <span>Emp Id : </span>
                                        <strong>QA110231</strong>
                                    </div>
                                    <div class="col-md-3">
                                        <span>DOJ : </span>
                                        <strong>13/01/18</strong>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <i class="fa fa-share text-red pointer fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <h5>Organisation Overview</h5>
                            <div class="well well-sm">
                                <p>Q. I am aware of Quatrro values and its journey</p>
                                <p class="margin-bottom-0">A. I am almost certain</p>
                                <hr class="margin-top-sm margin-bottom-sm"/>
                                <p>Q. I am aware of Quatrro values and its journey</p>
                                <p class="margin-bottom-0">A. I am almost certain</p>
                                <hr class="margin-top-sm margin-bottom-sm"/>
                                <p>Q. I am aware of Quatrro values and its journey</p>
                                <p class="margin-bottom-0">A. I am almost certain</p>
                                <hr class="margin-top-sm margin-bottom-sm"/>
                                <p>Q. I am aware of Quatrro values and its journey</p>
                                <p class="margin-bottom-0">A. I am almost certain</p>
                            </div>
                            <h5>Process Overview</h5>
                            <div class="well well-sm">
                                <p>Q. I am aware of Quatrro values and its journey</p>
                                <p class="margin-bottom-0">A. I am almost certain</p>
                                <hr class="margin-top-sm margin-bottom-sm"/>
                                <p>Q. I am aware of Quatrro values and its journey</p>
                                <p class="margin-bottom-0">A. I am almost certain</p>
                                <hr class="margin-top-sm margin-bottom-sm"/>
                                <p>Q. I am aware of Quatrro values and its journey</p>
                                <p class="margin-bottom-0">A. I am almost certain</p>
                                <hr class="margin-top-sm margin-bottom-sm"/>
                                <p>Q. I am aware of Quatrro values and its journey</p>
                                <p class="margin-bottom-0">A. I am almost certain</p>
                            </div>
                            <h5>Learning Overview</h5>
                            <div class="well well-sm">
                                <p>Q. I am aware of Quatrro values and its journey</p>
                                <p class="margin-bottom-0">A. I am almost certain</p>
                                <hr class="margin-top-sm margin-bottom-sm"/>
                                <p>Q. I am aware of Quatrro values and its journey</p>
                                <p class="margin-bottom-0">A. I am almost certain</p>
                                <hr class="margin-top-sm margin-bottom-sm"/>
                                <p>Q. I am aware of Quatrro values and its journey</p>
                                <p class="margin-bottom-0">A. I am almost certain</p>
                                <hr class="margin-top-sm margin-bottom-sm"/>
                                <p>Q. I am aware of Quatrro values and its journey</p>
                                <p class="margin-bottom-0">A. I am almost certain</p>
                            </div>
                        </div>
                        <div id="bhr_45_day_meeting" class="hidden">
                            <ol class="breadcrumb">
                                <li class="text-blue pointer" onclick="dashboard.toggle45DayMeeting()">Joinee Information</li>
                                <li class="active">BHR 45 Day Meeting</li>
                            </ol>
                            <div class="margin-top-sm">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Name : </span>
                                        <strong>Dhanya Menon</strong>
                                    </div>
                                    <div class="col-md-3">
                                        <span>Emp Id : </span>
                                        <strong>QA110231</strong>
                                    </div>
                                    <div class="col-md-3">
                                        <span>DOJ : </span>
                                        <strong>13/01/18</strong>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <i class="fa fa-share text-red pointer fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label for="session_date" class="padding-top-md">Session Date</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="date" id="session_date" class="form-control" placeholder="Date">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label for="session_time" class="padding-top-md">Session Time</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="time" id="session_time" class="form-control" placeholder="Time">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label for="session_interval" class="padding-top-md">Session Interval</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select class="form-control" id="session_interval" name="session_interval">
                                                            <option value="1 Hour">1 Hour</option>
                                                            <option value="2 Hour">2 Hour</option>
                                                            <option value="3 Hour">3 Hour</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label for="session_comments" class="padding-top-md">Comments</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" id="session_comments" rows="10"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12 text-right">
                                                        <button class="btn btn-danger btn-block">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="bhr_90_day_meeting" class="hidden">
                            <ol class="breadcrumb">
                                <li class="text-blue pointer" onclick="dashboard.toggle90dayMeeting()">Joinee Information</li>
                                <li class="active">BHR 90 Day Meeting</li>
                            </ol>
                            <div class="margin-top-sm">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Name : </span>
                                        <strong>Dhanya Menon</strong>
                                    </div>
                                    <div class="col-md-3">
                                        <span>Emp Id : </span>
                                        <strong>QA110231</strong>
                                    </div>
                                    <div class="col-md-3">
                                        <span>DOJ : </span>
                                        <strong>13/01/18</strong>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <i class="fa fa-share text-red pointer fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label for="90_session_date" class="padding-top-md">Session Date</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="date" id="90_session_date" class="form-control" placeholder="Date">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label for="90_session_time" class="padding-top-md">Session Time</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="time" id="90_session_time" class="form-control" placeholder="Time">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label for="90_session_interval" class="padding-top-md">Session Interval</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select class="form-control" id="90_session_interval" name="session_interval">
                                                            <option value="1 Hour">1 Hour</option>
                                                            <option value="2 Hour">2 Hour</option>
                                                            <option value="3 Hour">3 Hour</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label for="90_session_comments" class="padding-top-md">Comments</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" id="90_session_comments" rows="10"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12 text-right">
                                                        <button class="btn btn-danger btn-block">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="confirmation_status" class="hidden">
                            <ol class="breadcrumb">
                                <li class="text-blue pointer" onclick="dashboard.toggleConfirmationStatus()">Joinee Information</li>
                                <li class="active">Confirmation Status</li>
                            </ol>
                            <div class="margin-top-sm">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Name : </span>
                                        <strong>Dhanya Menon</strong>
                                    </div>
                                    <div class="col-md-3">
                                        <span>Emp Id : </span>
                                        <strong>QA110231</strong>
                                    </div>
                                    <div class="col-md-3">
                                        <span>DOJ : </span>
                                        <strong>13/01/18</strong>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <i class="fa fa-share text-red pointer fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="well well-sm">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong>BHR 45 Day Session</strong>
                                                <p class="margin-0">10/01/2018</p>
                                                <p class="margin-0">4:00 PM</p>
                                                <p class="margin-0">Anil</p>
                                            </div>
                                            <div class="col-md-5">
                                                <strong>Joinee Feedback</strong>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <small class="text-muted">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <strong>BHR Feedback</strong>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <small class="text-muted">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="well well-sm">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong>BHR 90 Day Session</strong>
                                                <p class="margin-0">10/01/2018</p>
                                                <p class="margin-0">4:00 PM</p>
                                                <p class="margin-0">Anil</p>
                                            </div>
                                            <div class="col-md-5">
                                                <strong>Joinee Feedback</strong>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <small class="text-muted">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <strong>BHR Feedback</strong>
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <small class="text-muted">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="interval_feedback" class="tab-pane fade">
                        <div id="interval_feedback_outer">
                            <div class="margin-top-sm">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span>Name : </span>
                                        <strong id="i_username"></strong>
                                    </div>
                                    <div class="col-md-4">
                                        <span>Emp Id : </span>
                                        <strong id="i_emp_id">QA110231</strong>
                                    </div>
                                    <div class="col-md-4">
                                        <span>DOJ : </span>
                                        <strong id="i_doj">13/01/18</strong>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="panel panel-success joinee-blocks" onclick="dashboard.supervisorMonthlyFeedback()">
                                        <div class="panel-body">
                                            <div class="panel-proceed-btn"><i class="fa fa-angle-double-right fa-lg"></i></div>
                                            <strong>Supervisor Monthly Feedback</strong>
                                            <p class="margin-bottom-0 text-muted">15/01/18</p>
                                            <p class="margin-bottom-0 text-green">Completed</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-danger joinee-blocks disabled-pointer" onclick="dashboard.intervalFeedback()">
                                        <div class="panel-body">
                                            <div class="panel-proceed-btn"><i class="fa fa-angle-double-right fa-lg"></i></div>
                                            <strong>BHR Bi-Monthly Feedback</strong>
                                            <p class="margin-bottom-0 text-muted">-</p>
                                            <p class="margin-bottom-0 text-red">Pending</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-success joinee-blocks" onclick="dashboard.toggleBHRBiAnnualFeedback()">
                                        <div class="panel-body">
                                            <div class="panel-proceed-btn"><i class="fa fa-angle-double-right fa-lg"></i></div>
                                            <strong>BHR Bi-Annual Feedback</strong>
                                            <p class="margin-bottom-0 text-muted">02/05/18</p>
                                            <p class="margin-bottom-0 text-green">Completed</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-success joinee-blocks" onclick="dashboard.toggleBHRAnnualFeedback()">
                                        <div class="panel-body">
                                            <div class="panel-proceed-btn"><i class="fa fa-angle-double-right fa-lg"></i></div>
                                            <strong>BHR Annual Feedback</strong>
                                            <p class="margin-bottom-0 text-muted">25/10/18</p>
                                            <p class="margin-bottom-0 text-green">Completed</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
					
					
					
					
                    <div id="roadmap" class="tab-pane fade">
                        <div id="roadmap_arrange" class="hidden">
                            <ol class="breadcrumb">
                                <li>Roadmap</li>
                                <li class="active">Arrange</li>
                            </ol>
                            <div class="margin-top-sm">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span>Name : </span>
                                        <strong>Dhanya Menon</strong>
                                    </div>
                                    <div class="col-md-4">
                                        <span>Emp Id : </span>
                                        <strong>QA110231</strong>
                                    </div>
                                    <div class="col-md-4">
                                        <span>DOJ : </span>
                                        <strong>13/01/18</strong>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row" id="session_blocks">
                                <div class="col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="session_title">Session Title</label>
                                                        <input class="form-control" id="session_title" value="BHR Connect">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="session_business">Business</label>
                                                        <input class="form-control" id="session_business" value="Quatrro Glow">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="session_department">Department</label>
                                                        <input class="form-control" id="session_department" value="Technical Solution">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="session_sub_department">Sub Department</label>
                                                        <input class="form-control" id="session_sub_department" value="Technologies">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="session_band">Band</label>
                                                        <input class="form-control" id="session_band" value="Band 1">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="session_meeting_with">Meeting With</label>
                                                        <input class="form-control" id="session_meeting_with" value="Technical Solution">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="session_meeting_date">Date</label>
                                                                <input type="date" class="form-control" id="session_meeting_date">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="session_meeting_time">Time</label>
                                                                <input type="time" class="form-control" id="session_meeting_time">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="session_meeting_interval">Interval</label>
                                                        <select class="form-control" id="session_meeting_interval">
                                                            <option value="1">1 Hour</option>
                                                            <option value="2">2 Hours</option>
                                                            <option value="3">3 Hours</option>
                                                            <option value="4">4 Hours</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <button class="btn btn-danger margin-top-lg"><i class="fa fa-check"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn btn-primary" onclick="dashboard.roadmapSessionAdd()"><i class="fa fa-plus"></i> Add Session</button>
                                </div>
                            </div>
                        </div>
                        <div id="roadmap_recommend" class="hidden">
                            <ol class="breadcrumb">
                                <li>Roadmap</li>
                                <li class="active">Recommend</li>
                            </ol>
                            <div class="margin-top-sm">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Name : </span>
                                        <strong>Dhanya Menon</strong>
                                    </div>
                                    <div class="col-md-3">
                                        <span>Emp Id : </span>
                                        <strong>QA110231</strong>
                                    </div>
                                    <div class="col-md-3">
                                        <span>DOJ : </span>
                                        <strong>13/01/18</strong>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <i class="fa fa-share text-red pointer fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5 class="margin-0">Roadmap Training 1</h5>
                                                    <small class="margin-top-lg text-muted">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                    </small>
                                                </div>
                                                <div class="col-md-3">
                                                    <strong>6 hours</strong>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="checkbox">
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5 class="margin-0">Roadmap Training 2</h5>
                                                    <small class="margin-top-lg text-muted">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                    </small>
                                                </div>
                                                <div class="col-md-3">
                                                    <strong>12 hours</strong>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="checkbox">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn btn-danger"><i class="fa fa-check"></i> Recommend</button>
                                </div>
                            </div>
                        </div>
                     
                </div>
            </div>
        </div>
    </div>
</aside>
<div class="overlay" data-sidebar-overlay></div>

<div class="container-fluid container-padding-top">
    <div class="row">
        <div class="col-xs-12 text-center">
            <h4>Manage Logistics</h4>
        </div>
        <div class="col-xs-12 margin-top-lg overflow-scroll">
            <table class="table table-bordered table-striped" id="report_table">
                <thead>
                <tr>
                    <th><div data-toggle="tooltip" data-placement="bottom" data-original-title="List of all the employees" class="red-tooltip">Employee Name</div></th>
                  
                    <th><div data-toggle="tooltip" data-placement="bottom" data-original-title="Employee ID" class="red-tooltip">Emp ID</div></th>
                    <th><div data-toggle="tooltip" data-placement="bottom" data-original-title="Date of joining of the employee" class="red-tooltip">DOJ</div></th>
                    <th><div data-toggle="tooltip" data-placement="bottom" data-original-title="Confirmation status of employees" class="red-tooltip">Confirm</div></th>
<th><div data-toggle="tooltip" data-placement="bottom" data-original-title="Status of logistics" class="red-tooltip">Logistics</div></th>
                </tr>
                </thead>
                <tbody>
				
				<?php 

foreach($userrecord as $userrecords) :
				@$log_userid= @$userrecords->logistics_arrangement[0]['user_id']; ?>
                    <tr>
                        <td><div class="text-blue logistic_user_arrangements" data-sidebar-button data-panel-type="logistics" id="<?= 'user_'.$userrecords['id'] ?>" onclick="return displayIdBasedData('<?= $userrecords['id'] ?>');"><?= $userrecords['first_name']; ?> <?= $userrecords['last_name']; ?>

</div></td>
                      
                        <td><?= $userrecords['emp_id']; ?></td>
                        <td><?= $userrecords['doj']; ?></td>
  <td><i class="fa fa-check text-green"></i></td>
                        <td>
<?php if(!empty(@$log_userid)){ ?>
<i class="fa fa-check text-green"></i>
<?php } else { ?>
<i class="fa fa-times text-red"></i>
<?php } ?>
</td>
                    </tr>
					<?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php echo $this->Html->script(['jquery-1.12.4', 'bootstrap.min', 'sidebar','jquery-ui','dashboard']); ?>
<?php $logistic_data = $this->Url->build(['controller'=>'Users','action'=>'userlogistic_data']) ?>
<?php $fetchlogisticsPopup = $this->Url->build(['controller'=>'Users','action'=>'fetchlogisticsPopup']) ?>
<?php $insertlogistics = $this->Url->build(['controller'=>'Users','action'=>'logisticinsert']) ?>

<script>
    $('[data-toggle="tooltip"]').tooltip();
</script>

<script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
    $('#report_table').DataTable({
       "aaSorting" : [] 
         
    });
});
</script>

<script>

function displayIdBasedData(id){
    $.ajax({
        url: '<?= $fetchlogisticsPopup ?>',
        method: 'POST',
        data: {id:id},
        success: function(data){
           var parsData = JSON.parse(data);
           var name = parsData[0].first_name + ' ' + parsData[0].last_name;
      
      $('#userid').val(parsData[0].id);
           $('#username').html(name);
 $('#i_username').html(name);
$('#r_username').html(name);
 $('#name').html(parsData[0].first_name + ' ' + parsData[0].last_name);
        $('#empid').html(parsData[0].emp_id);
 $('#emp_id').html(parsData[0].emp_id);
$('#i_emp_id').html(parsData[0].emp_id);
$('#r_emp_id').html(parsData[0].emp_id);
            $('#logdoj').html(parsData[0].doj.substring(0,10));
$('#doj').html(parsData[0].doj.substring(0,10));
$('#i_doj').html(parsData[0].doj.substring(0,10));
$('#r_doj').html(parsData[0].doj.substring(0,10));

$('#smf_empid,#bhr_empid,#bhr_af_empid').html(parsData[0].emp_id);
$('#smf_username,#bhr_username,#bhr_af_username').html(name);
$('#smf_doj,#bhr_doj,#bhr_af_doj').html(parsData[0].doj.substring(0,10));
             $('#email').html(parsData[0].email);
		$('#mobile').html(parsData[0].mobile);
		$('#city').html(parsData[0].city);
		$('#bhr_emp_id').html(parsData[0].bhr_emp_id);
		$('#businees_unit').html(parsData[0].businees_unit);
		$('#department').html(parsData[0].department);
		$('#sub_department').html(parsData[0].sub_department);
		$('#designation').html(parsData[0].designation);
               $('#supervisor_name').html(parsData[0].supervisor_name);
		   
        
        }
    });

 $.ajax({
        url: '<?= $logistic_data ?>',
        method: 'POST',

        data: {'user_id':id
                },
        success: function(data){
       
     $('.logstmsg').remove();
        $('.log_check').show();
        var assigned = 0;
        var recvd = 0;
        data = $.parseJSON(data);

      
        console.log(data.length);
        if (data.length > 0) {
            $(data).each(function (i, u) {
                if (u.logistic.id != undefined) {
                    var ik = u.logistic.id;
                    assigned++;
                    if (u.r_status == 1) {
                        recvd++;                        
                        $('#logistic_id_' + ik ).parent().append('<p class="margin-bottom-0 text-green logstmsg">Received</p>');
                        $('#logistic_id_' + ik).hide();
                    } else if (u.r_status == 0) {
                        $('#logistic_id_' + ik).hide();
                        $('#logistic_id_' + ik).parent().append('<p class="margin-bottom-0 text-orange logstmsg">In Process</p>');
                    }
                }
            });
        }
        var stHtml = '<span class="text-green">' + recvd + '</span>/' + '<span class="text-orange">' + assigned + '</span>';
        $('#logistic_count').html(stHtml);
  $('.logistic_date').html(data[0].time_created.substring(0,10));

}
});





} 
</script>

<script>
function logisticinsert(){

var userid= $("#userid").val();
var logistic_id = new Array();
        $('input:checkbox[name="logistic_id[]"]:checked').each(function() {
           logistic_id.push($(this).val());
        });
   
    $.ajax({
        url: '<?= $insertlogistics ?>',
        method: 'POST',
        data: {userid:userid,
               logistic_id:logistic_id },
        success: function(data){
         $("#send_requirments").show();
		 
		 dashboard.toggleLogistics();
		  setTimeout(function(){
        $("#send_requirments").fadeOut();
    },6000);
	  $("#logistic_user_id").show();
           $("#pending").hide();	 
}
 });
} 
</script>


<style>
  
   .dataTables_info{width: 220px;}
    .paging_simple_numbers{width: 220px;float: right;margin-top: -44px;margin-top: -15px;}
    .dataTables_filter{float: right;}
    .form-control input-sm{width: 71px;}
    /*.col-sm-12{margin-top: -12px;}*/
    .col-xs-12{margin-bottom: -40px;}
</style>

