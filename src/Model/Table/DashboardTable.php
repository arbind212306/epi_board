<?php
namespace App\Model\Table;
use Cake\ORM\Query;
use Cake\ORM\Table;

class DashboardTable extends Table {
    
    public function initialize(array $config){
        parent::initialize($config);
        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }
    
    //query for fetching cities from city column in users table
    public function fetchCity(){
	$query = $this->find();
	$query->select(['city']);
	$query->distinct(['city']);
	$query->where(['city <>' => '']);
//                if(!empty($year)){
//                $query->where(['YEAR(complaint_id_genrate_date)' => $year]);
//                }
	$query->order(['city']);
	$city = $query->toArray();
	return $city;
        
    }
    
    //query to count total onboard month wise
    public function countTotalOnBoard($agoDate){
        $query = $this->find();
        $query->select(['count' => $query->func()->count('id')]);
        $query->where(['ob_status' => 1, 'DATE(created)' => "$agoDate"]);
//        if(!empty($today && $lastSevenDays)){
//            $query->where(['created <=' => $today, 'created >=' => $lastSevenDays]);
//        }
//        echo $query;
        $total = $query->toArray();
        return $result = $total[0]->count;
                
    }
    
    //query for counting onbord based on filter
    public function CountBasedOnFilter($business_unit='',$department='',$sub_department='',$city='',$daysAgo=''){
        $query = $this->find();
        $query->select(['count' => $query->func()->count('id')]);
        $query->where(['ob_status' => 1]);
        if(!empty($business_unit)){
            $query->where(['businees_unit' => $business_unit]);
        }
        if(!empty($department)){
            $query->where(['department' => $department]);
        }
        if(!empty($sub_department)){
            $query->where(['sub_department' => $sub_department]);
        }
        if(!empty($city)){
            $query->where(['city' => $city]);
        }
        if(!empty($daysAgo)){
            $query->where(['DATE(created)' => $daysAgo]);
        }
        $total = $query->toArray();
        return $result = $total[0]->count; 
    }
    
    //query to count total confirmation month wise
    public function countTotalConfirmation($agoDate=''){
        $query = $this->find();
        $query->select(['count' => $query->func()->count('id')]);
        $query->where(['ob_status' => 1,'status' => 2 ,'DATE(created)' => "$agoDate"]);
//        $query->$query->where(['status' => 1]);
        $total = $query->toArray();
        return $result = $total[0]->count;
                
    }
    
    //query for counting toatl confirmed 
    public function getConfirmation($business_unit='',$department='',$sub_department='',$city='',$daysAgo=''){
        $query = $this->find();
        $query->select(['count' => $query->func()->count('id')]);
        $query->where(['ob_status' => 1]);
        $query->where(['status' => 2]);
        if(!empty($business_unit)){
            $query->where(['businees_unit' => $business_unit]);
        }
        if(!empty($department)){
            $query->where(['department' => $department]);
        }
        if(!empty($sub_department)){
            $query->where(['sub_department' => $sub_department]);
        }
        if(!empty($city)){
            $query->where(['city' => $city]);
        }
        if(!empty($daysAgo)){
            $query->where(['DATE(created)' => $daysAgo]);
        }
//        echo $query;exit;
        $toatl = $query->toArray();
        return $result = $toatl[0]->count;
    }
    
    //query for counting total pending logistics
    public function countPendingLogistics($arr){
        $query = $this->find();
        $query->select(['count' => $query->func()->count('id')]);
        $query->where(['ob_status' => 1]);
        $query->where(['id NOT IN' => $arr]);
        $total = $query->toArray();
        $result = $total[0]->count;
        return $result;
    }
    
    //query for counting in progress logistics
//    public function countInProgress(){
//        $query = $this->find();
//        $query->select(['count' => $query->func()->count('id')]);
//    }
}