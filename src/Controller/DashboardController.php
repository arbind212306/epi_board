<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;
use Cake\Http\Exception\NotFoundException;


class DashboardController extends AppController {
    
    public function initialize() {
        parent::initialize();
        $this->viewBuilder()->layout('admin_layout');
        $this->loadModel('Dashboard');
    }
    
    //query for displaying charts
    public function dashboard(){
        //code for fething all business unit from table business_unit
        $business_units_table = TableRegistry::get('BusinessUnits');
        $business_units = $business_units_table->find('all', array('fields' => array('id', 'title'),
            'conditions' => array('BusinessUnits.status' => 1)))->toArray();
        //code for counting total in progress from logistics arrangement
        $logistics_arrangement_table = TableRegistry::get('LogisticsArrangement');
        $query = $logistics_arrangement_table->find();
        $toatl = $query->select(['count' => $query->func()->count('id')])->where(['r_status' => 0])->toArray();
        $inProgress = $toatl[0]->count;
        //code for counting total recevied from logistics arrangement
        $logistic_received = $logistics_arrangement_table->find();
        $result = $logistic_received->select(['count' => $query->func()->count('id')])
                ->where(['r_status' => 1])->toArray();
        $received = $result[0]->count;
        //query for getting distinct user id from logistics arrangement
        $unique_useid_log = $logistics_arrangement_table->find();
        $uniqueId = $unique_useid_log->find('all')->select(['user_id'])->distinct(['user_id'])->toArray();
        $arr = [];
        foreach ($uniqueId as $valarr){
            $arr[] = $valarr['user_id'];
        }
        //query for getting total pending from logistics by calling model
        $pending = $this->Dashboard->countPendingLogistics($arr);
        
        $location = $this->Dashboard->fetchCity();
//       $today = date_create()->format("Y/m/d");
       //code for getting date seven days ago
       $date7daysAgo = date('Y/m/d', strtotime('-7 days'));
       $bu_unit = '';
       $department ='';
       $sub_department ='';
       $city ='';
       
       $onBoardPerDay = [];
       $confirmed = [];
       $active = [];
       $inactive = [];
       $allConfirmationData = [];
       $counter = 1;
       
           for($i=1; $i<=90; $i++){
                $agoDate =  date('Y-m-d', strtotime("-$counter days"));
                $countAugust = $this->Dashboard->countTotalOnBoard($agoDate);
                $data =["date"=>$agoDate,"value"=>$countAugust];//.'"'.'}';
                array_push($onBoardPerDay, $data);
                $confirmation = $this->Dashboard->countTotalConfirmation($agoDate);
                $data2 = ["date"=>$agoDate,"value"=>$confirmation];
                array_push($confirmed, $data2);
                $activeConfirmation = $this->Dashboard->countTotalActive($agoDate);
                $data3 = ["date"=>$agoDate,"value"=>$activeConfirmation];
//                 $data3 = ["date"=>$agoDate,"value"=>$confirmation,"value2"=>$activeConfirmation];
                array_push($active, $data3);
                $inActiveConfirmation = $this->Dashboard->countTotalInactive($agoDate);
                $data4 = ["date"=>$agoDate,"value"=>$inActiveConfirmation];
                array_push($inactive, $data4);
                $data5 = ["date"=>$agoDate,"value"=>$confirmation,"value2"=>$activeConfirmation,"value3"=>$inActiveConfirmation];
                array_push($allConfirmationData, $data5);
                $counter++;
              }
       //code to reverse array according to graph that accepts value
        $onBoardPerDay = array_reverse($onBoardPerDay);
        if(!empty($onBoardPerDay)){
            //code to convert the array to json string that graph accepts for displaying value
           $onBoardPerDay = json_encode($onBoardPerDay);
        }
        //code to reverse array according to graph that accepts value
        $confirmed = array_reverse($confirmed);
        if(!empty($confirmed)){
            //code to convert the array to json string that graph accepts for displaying value
           $confirmed = json_encode($confirmed);
        }
        //code to reverse array according to graph that accepts value
        $active = array_reverse($active);
        if(!empty($active)){
            //code to convert the array to json string that graph accepts for displaying value
            $active = json_encode($active);
        }
        //code to reverse array according to graph that accepts value
        $inactive = array_reverse($inactive);
        if(!empty($inactive)){
            //code to convert the array to json string that graph accepts for displaying value
            $inactive = json_encode($inactive);
        }
        
        $allConfirmationData = array_reverse($allConfirmationData);
        if(!empty($allConfirmationData)){
            $allConfirmationData = json_encode($allConfirmationData);
        }
       $this->set(compact('business_units','location','onBoardPerDay','bu_unit','department','sub_department','city',
               'daysAgo', 'confirmed','active','inactive','allConfirmationData','inProgress','received','pending'));
    }
    
    //query for getting department based on business unit selection with ajax
    public function getdepartments(){
        $this->autoRender = false;
        if($this->request->is('ajax')){
            $business_unit = $this->request->data('business_unit_id');
            $department_table = TableRegistry::get('Departments');
            $department = $department_table->find('all', array('fields' => array('id','title'),
                    'conditions' => array('Departments.status' => 1, 'business_unit_id' => $business_unit,
                        'sub_department_id' => 0)))->toArray();
            $html  = '';
            $html .= '<select class="form-control" name="department" id="department">';
            $html .= '<option selected="" value="All">All</option>';
            foreach ($department as $value_department):
                $html .= '<option value="'.$value_department['id'].'">'.$value_department['title'].'</option>';
            endforeach;
            $html .= '</select>';
            echo $html;
        }
    }
    
    //query for getting sub department based on selected department with ajax
    public function getSubDepartments(){
        $this->autoRender = false;
        if($this->request->is('ajax')){
            $department_id = $this->request->data('department_id');
            $subdepartment_table = TableRegistry::get('Departments');
            $subdepartment = $subdepartment_table->find('all', array('fields' => array('id','title'),
                    'conditions' => array('Departments.status' => 1, 'business_unit_id' => $department_id,
                        'sub_department_id <>' => 0)))->toArray();
            $html  = '';
            $html .= '<select name="sub_department" id="sub_department">';
            $html .= '<option selected="" value="All">All</option>';
            foreach ($subdepartment as $val):
                $html .= '<option value="'.$val['id'].'">'.$val['title'].'</option>';
            endforeach;
            $html .= '</select>';
            echo $html;
        }
    }
    
    
    //code for fetching onboard data according to filter and displaying it on dashbord page with ajax
    public function getFilterDashbordData(){
        $this->autoRender = false;
        if($this->request->is('post')){
            $business_units = $this->request->data('business_unit');
            $department = $this->request->data('department');
            $sub_department = $this->request->data('sub_department');
            $location = $this->request->data('location');
            $daysAgo = $this->request->data('days');
            
            if(trim($business_units) == 'All'){
                $business_units = '';
            }
            if(trim($department) == 'All'){
                $department = '';
            }
            if(trim($sub_department) == 'All'){
                $sub_department = '';
            }
            if(trim($location) == 'All'){
                $location = '';
            }
            if(trim($daysAgo) == 'All'){
                $daysAgo = '7';
            }
           
            if(!empty($daysAgo)){
                $onBoard = [];
                $counter = 1;
                //code for getting previous 7 days data
                if($daysAgo == 7){
                    for($i=1; $i<=7; $i++){
                        $agoDate =  date('Y-m-d', strtotime("-$counter days"));
                        $confirmation = $this->Dashboard->CountBasedOnFilter($business_units,$department,
                                $sub_department,$location,$agoDate);
                        $data =["date"=>$agoDate,"value"=> $confirmation];
                        array_push($onBoard, $data);
                        $counter++;
                    }
                }
                //code for getting previous 30 days data
                if($daysAgo == 30){
                    for($i=1; $i<=30; $i++){
                        $agoDate =  date('Y-m-d', strtotime("-$counter days"));
                        $confirmation = $this->Dashboard->CountBasedOnFilter($business_units,$department,
                                $sub_department,$location,$agoDate);
                        $data =["date"=>$agoDate,"value"=>$confirmation];
                        array_push($onBoard, $data);
                        $counter++;
                    }
                }
                //code for getting previous 90 days data
                if($daysAgo == 90){
                    for($i=1; $i<=90; $i++){
                        $agoDate =  date('Y-m-d', strtotime("-$counter days"));
                        $confirmation = $this->Dashboard->CountBasedOnFilter($business_units,$department,
                                $sub_department,$location,$agoDate);
                        $data =["date"=>$agoDate,"value"=>$confirmation];
                        array_push($onBoard, $data);
                        $counter++;
                    }
                }
                //code for getting previous 180 days data. i.e., 6 months
                if($daysAgo == 180){
                    for($i=1; $i<=6; $i++){
                        $agoDate =  date('Y-m', strtotime("-$counter months"));
                        $year = date('Y-m-d', strtotime("-$counter months"));
                        $month = date('m', strtotime("-$counter months"));
                        $confirmation = $this->Dashboard->CountBasedOnMonth($business_units,$department,
                                $sub_department,$location,$month,$year);
                        $data =["date"=>$agoDate,"value"=>$confirmation];
                        array_push($onBoard, $data);
                        $counter++;
                    }
                }
                //code for getting previous 365 days data. i.e., 1 year months wise
                if($daysAgo == 180){
                    for($i=1; $i<=12; $i++){
                        $agoDate =  date('Y-m', strtotime("-$counter months"));
                        $year = date('Y-m-d', strtotime("-$counter months"));
                        $month = date('m', strtotime("-$counter months"));
                        $confirmation = $this->Dashboard->CountBasedOnMonth($business_units,$department,
                                $sub_department,$location,$month,$year);
                        $data =["date"=>$agoDate,"value"=>$confirmation];
                        array_push($onBoard, $data);
                        $counter++;
                    }
                }
                $onBoard = array_reverse($onBoard);
                if(!empty($onBoard)){
                    $onBoard = json_encode($onBoard);
                }
                echo $onBoard;
            }
        }
    }
    
    //code for fetching confirmation data according to filter and displaying it on dashbord page with ajax
    public function getFilterConfirmation(){
        $this->autoRender = false;
        if($this->request->is('post')){
            $business_units = $this->request->data('business_unit');
            $department = $this->request->data('department');
            $sub_department = $this->request->data('sub_department');
            $location = $this->request->data('location');
            $daysAgo = $this->request->data('days');
            
            if(trim($business_units) == 'All'){
                $business_units = '';
            }
            if(trim($department) == 'All'){
                $department = '';
            }
            if(trim($sub_department) == 'All'){
                $sub_department = '';
            }
            if(trim($location) == 'All'){
                $location = '';
            }
            if(trim($daysAgo) == 'All'){
                $daysAgo = '7';
            }
           
            if(!empty($daysAgo)){
                $onBoard = [];
                $counter = 1;
                //code for getting previous 7 days data
                if($daysAgo == 7){
                    for($i=1; $i<=7; $i++){
                        $agoDate =  date('Y-m-d', strtotime("-$counter days"));
                        $getCounted = $this->Dashboard->getConfirmation($business_units,$department,$sub_department,
                        $location,$agoDate,$status=2);
                        $getActive = $this->Dashboard->getConfirmation($business_units,$department,$sub_department,
                        $location,$agoDate,$status=1);
                        $getInActive = $this->Dashboard->getConfirmation($business_units,$department,$sub_department,
                        $location,$agoDate,$status=0);
                        $data =["date"=>$agoDate,"value1"=> $getCounted,"value2"=>$getActive,"value3"=>$getInActive];
                        array_push($onBoard, $data);
                        $counter++;
                    }
                }
                //code for getting previous 30 days data
                if($daysAgo == 30){
                    for($i=1; $i<=30; $i++){
                        $agoDate =  date('Y-m-d', strtotime("-$counter days"));
                        $getCounted = $this->Dashboard->getConfirmation($business_units,$department,$sub_department,
                        $location,$agoDate,$status=2);
                        $getActive = $this->Dashboard->getConfirmation($business_units,$department,$sub_department,
                        $location,$agoDate,$status=1);
                        $getInActive = $this->Dashboard->getConfirmation($business_units,$department,$sub_department,
                        $location,$agoDate,$status=0);
                        $data =["date"=>$agoDate,"value1"=> $getCounted,"value2"=>$getActive,"value3"=>$getInActive];
                        array_push($onBoard, $data);
                        $counter++;
                    }
                }
                //code for getting previous 90 days data
                if($daysAgo == 90){
                    for($i=1; $i<=90; $i++){
                        $agoDate =  date('Y-m-d', strtotime("-$counter days"));
                        $getCounted = $this->Dashboard->getConfirmation($business_units,$department,$sub_department,
                        $location,$agoDate,$status=2);
                        $getActive = $this->Dashboard->getConfirmation($business_units,$department,$sub_department,
                        $location,$agoDate,$status=1);
                        $getInActive = $this->Dashboard->getConfirmation($business_units,$department,$sub_department,
                        $location,$agoDate,$status=0);
                        $data =["date"=>$agoDate,"value1"=> $getCounted,"value2"=>$getActive,"value3"=>$getInActive];
                        array_push($onBoard, $data);
                        $counter++;
                    }
                }
                //code for getting previous 180 days data i.e, 6 months
                if($daysAgo == 180){
                    for($i=1; $i<=6; $i++){
//                        $currentDate = date('Y-m-d');
                        $agoDate =  date('Y-m', strtotime("-$counter months"));
                        $year = date('Y-m-d', strtotime("-$counter months"));
                        $month = date('m', strtotime("-$counter months"));
                        $getCounted = $this->Dashboard->getConfirmationMonthWise($business_units,$department,
                                $sub_department,$location,$month,$status=2,$year);
                        $getActive = $this->Dashboard->getConfirmationMonthWise($business_units,$department,
                                $sub_department,$location,$month,$status=1,$year);
                        $getInActive = $this->Dashboard->getConfirmationMonthWise($business_units,$department,
                                $sub_department,$location,$month,$status=0,$year);
                        $data =["date"=>$agoDate,"value1"=> $getCounted,"value2"=>$getActive,"value3"=>$getInActive];
                        array_push($onBoard, $data);
                        $counter++;
                    }
                }
                //code for getting previous 365 days data i.e, i year, month wise
                if($daysAgo == 365){
                    for($i=1; $i<=12; $i++){
//                        $currentDate = date('Y-m-d');
                        $agoDate =  date('Y-m', strtotime("-$counter months"));
                        $year = date('Y-m-d', strtotime("-$counter months"));
                        $month = date('m', strtotime("-$counter months"));
                        $getCounted = $this->Dashboard->getConfirmationMonthWise($business_units,$department,
                                $sub_department,$location,$month,$status=2,$year);
                        $getActive = $this->Dashboard->getConfirmationMonthWise($business_units,$department,
                                $sub_department,$location,$month,$status=1,$year);
                        $getInActive = $this->Dashboard->getConfirmationMonthWise($business_units,$department,
                                $sub_department,$location,$month,$status=0,$year);
                        $data =["date"=>$agoDate,"value1"=> $getCounted,"value2"=>$getActive,"value3"=>$getInActive];
                        array_push($onBoard, $data);
                        $counter++;
                    }
                }
                $onBoard = array_reverse($onBoard);
                if(!empty($onBoard)){
                    $onBoard = json_encode($onBoard);
                }
                echo $onBoard;exit;
            }
        }
    }
}
