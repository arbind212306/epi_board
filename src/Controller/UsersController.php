<?php

namespace App\Controller;

ob_start();

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\View\Form\EntityContext;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;
use Cake\Http\Exception\NotFoundException;
use Cake\Mailer\Email;

//use Cake\Controller\Controller;
//use Cake\Auth\DefaultPasswordHasher;
/**
 * All User management
 */
class UsersController extends AppController {

    public function beforeFilter(Event $event) {
        $this->loadComponent('Flash');
        parent::beforeFilter($event);
        $this->Auth->allow(['login', 'searchuser', 'addUser', 'updatesearchuser', 'logisticinsert']);
    }

//query for login via post method
    public function login() {
        $this->viewBuilder()->layout('login');
        $this->loadModel('Users');
        $user = '';
        if ($this->request->is('post')) {
            $user = $this->Auth->identify($this->request->data);
            if ($user) {
                $roleTbl = TableRegistry::getTableLocator()->get('Roles');
                $aCatTbl = TableRegistry::getTableLocator()->get('AccessCategories');
                $rInfo = $roleTbl->get($user['user_type']);
                $access = [];
                if (!empty($rInfo['access'])) {
                    $access = $rInfo['access'];
                    $access = json_decode($access, true);
                    $accessData = [];
                    $q1 = $aCatTbl->find('all')
                            ->where(['id IN' => $access]);
                    foreach ($q1 as $rw) {
                        if (!empty($rw)) {
                            $accessData[] = $rw->toArray();
                        }
                    }
                }
                $user['access'] = $accessData;
                $this->Auth->setUser($user);
                $this->redirecturlafterlogin();
            } else {
                $this->Flash->set('Invalid Username or Password, try again.', [
                    'element' => 'error'
                ]);
            }
        }
        $this->set(compact('user'));
    }

//method for fetching data based on id of selected row with ajax for logistics page
    public function userlogisticData() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $user_id = $this->request->data('user_id');
            $logArgmntTbl = TableRegistry::getTableLocator()->get('LogisticsArrangement');
            $query = $logArgmntTbl->find('all')
                    ->where(['user_id' => $user_id])
                    ->contain(['Logistics']);
            $logData = [];
            foreach ($query as $rw) {
                if (!empty($rw)) {
                    $logData[] = $rw->toArray();
                }
            }
            echo json_encode($logData);
            die;
        }
    }

//query to redirect to page after successfull login
    public function redirecturlafterlogin() {
        $user = $this->Auth->user();
        $session = $this->request->session();
        $session_data = $session->read();
        $user_type = $session_data["Auth"]["User"]["user_type"];

        if ($user_type == 1) {
            return $this->redirect(['controller' => 'Users', 'action' => 'manageUser']);
        } else if ($user_type == 4) {
            return $this->redirect(['controller' => 'Users', 'action' => 'employeeDashboard']);
        } else if ($user_type == 2) {  // Supervisor
            return $this->redirect(['controller' => 'Supervisor', 'action' => 'dashboard']);
        } else if ($user_type == 3) {
            return $this->redirect(['controller' => 'Spoc', 'action' => 'dashboard']);
        }
    }

//method for displaying users details on dashboard page
    public function manageUser() {
 $this->set('active', '1');
        $this->checkAccess();
        $this->viewBuilder()->layout('admin_layout');
    
        $userTbl = TableRegistry::getTableLocator()->get('Users');
        // Get joinee
        $users = [];
        $query1 = $userTbl->find('all')
                ->where(['user_type' => 4, 'ob_status' => 1])->order(['id' => 'DESC']);
        foreach ($query1 as $rw) {
            if (!empty($rw)) {
                $users[] = $rw->toArray();
            }
        }
    $feedbacks=TableRegistry::get('feedbacks');
   $feedbacksfetch=$feedbacks->find('all')->where(['status'=>'1'])->toArray();
      $userTbl = TableRegistry::getTableLocator()->get('logistics');
     $query2 = $userTbl->find('all')->where(['status'=>'1'])->toArray();
           
		  
	   $cstatusTable = TableRegistry::getTableLocator()->get('departments');
        $query4 = $cstatusTable->find('all')->where(['status' => 1]);
        $cstatusData = [];
        foreach ($query4 as $stts) {
            if (!empty($stts)) {
                $cstatusData[$stts->id] = $stts->title;
            }
        }
	   	   $locationTable=TableRegistry::getTableLocator()->get('locations');
	   $locationrecord=$locationTable->find()->where(['status'=>'1']);
	   $locationarr= [];
	   foreach($locationrecord as $locationrecords){
		   if(!empty($locationrecords)) {
		    $locationarr[$locationrecords->id]=$locationrecords->title;
	   }
	   }
		  		   
        $this->set(compact('users','query2','cstatusData','locationarr','feedbacksfetch'));
    }

//method for fetching data based on id of selected row with ajax for dashboard page
    public function fetchDashboardPopup() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $id = $this->request->data['id'];
            //$users = TableRegistry::get('Users')->find()
            //->where(['id' => $id])
            //->contain(['LogisticsArrangement'])
            // ->toArray();
            $connection = ConnectionManager::get('default');
            $sql = "select u.*, d.title as department, d1.title as sub_department, bu.title as businees_unit from users as u inner join departments as d on u.department = d.id  left join departments as d1 on u.sub_department = d1.id left join business_units as bu on bu.id = u.businees_unit where u.id = '" . $id . "'";
            $users = $connection->execute($sql)->fetchAll('assoc');
            if (!empty($users)) {
                $arrData = json_encode($users);
            }
            echo $arrData;
        }
    }

    public function searchuser() {
        $this->autoRender = false;

        if ($this->request->is('ajax')) {
            $search_data = $this->request->data('search');
            $connection = ConnectionManager::get('default');
            $sql = "select u.*, d.title as department, d1.title as sub_department, bu.title as businees_unit, r.title as user_type from users as u inner join departments as d on u.department = d.id  left join departments as d1 on u.sub_department = d1.id left join business_units as bu on bu.id = u.businees_unit left join roles as r on    u.user_type = r.id where email = '" . $search_data . "' or emp_id = '" . $search_data . "'  or doj = '" . $search_data . "'  ";
            $userresult = $connection->execute($sql)->fetchAll('assoc');

            $resultArr = [];
            foreach ($userresult as $result) {

                $resultArr[] = $result;
            }
            if (!empty($resultArr)) {
                echo json_encode($resultArr);
            }
        }
        $this->set(compact('userrecord', 'userresult'));
    }

    public function updatesearchuser() {
        if ($this->request->is('post')) {

            $ob_status = $this->request->data('ob_status');
            $empid = $this->request->data('emp_id');
            $update_query = TableRegistry::get('users');
            $query = $update_query->query();
            $result = $query->update()
                    ->set(['users.ob_status' => '1'])
                    ->where(['users.emp_id' => $empid])
                    ->execute();


            //$this->Flash->set('employee is onboarding' );
            $this->Flash->set('');
            return $this->redirect(['controller' => 'Users', 'action' => 'addUser']);
        }
        $this->set(compact(''));
        exit;
    }

    public function userManagement() {
$this->set('active','7');
        $this->viewBuilder()->layout('admin_layout');
        $usersTable = TableRegistry::get('users');
        $business_units_table = TableRegistry::get('BusinessUnits');
        $department_table = TableRegistry::get('Departments');
        $roles_table = TableRegistry::get('roles');

        $roles = $roles_table->find('all', array('fields' => array('id', 'title')))->toArray();

        $business_units = $business_units_table->find('all', array('fields' => array('id', 'title'), 'conditions' => array('BusinessUnits.status' => 1)))->toArray();

        $departments = $department_table->find('all', array('fields' => array('id', 'title'), 'conditions' => array('Departments.sub_department_id' => 0)))->toArray();

        $sub_departments = $department_table->find('all', array('fields' => array('id', 'title'), 'conditions' => array('Departments.sub_department_id !=' => 0)))->toArray();

        $conn = ConnectionManager::get('default');
        $query = "select u.*, d.title as department from users as u inner join departments as d on u.department = d.id order by u.id desc ";
        $userrecord = $conn->execute($query)->fetchAll('assoc');
        $this->set(compact('userrecord', 'business_units', 'departments', 'sub_departments', 'roles'));
        if ($this->request->is('ajax')) {
            $id = $this->request->data('id');
            $userrecords = $this->Users->find('all')->where(['Users.id' => $id])->toArray();
            echo(json_encode($userrecords));
            exit;
        }
    }

    public function manageRole() {
        $this->viewBuilder()->layout('admin_layout');
    $this->set('active','6');
        $accessCatTbl = TableRegistry::getTableLocator()->get('AccessCategories');
        $roleTbl = TableRegistry::getTableLocator()->get('Roles');

        if ($this->request->is('post')) {
            $requestData = $this->request->data;
            if (!empty($requestData['hid_id'])) {
                $role = $roleTbl->get($requestData['hid_id']);
            } else {
                $role = $roleTbl->newEntity();
            }

            $role->title = $requestData['name'];
            $role->description = $requestData['description'];
            $accesDt = "";
            if (!empty($requestData['access-cat'])) {
                $accesDt = json_encode($requestData['access-cat']);
            }
            $role->access = $accesDt;
            $role->status = 1;
            $roleTbl->save($role);
        }

        // Get category list
        $query1 = $accessCatTbl->find('threaded');
        $aCatData = [];
        foreach ($query1 as $rw) {
            if (!empty($rw)) {
                $aCatData[] = $rw->toArray();
            }
        }
        // Get role data
        $query2 = $roleTbl->find('all')
                ->where(['status' => 1]);
        $roleData = [];
        foreach ($query2 as $rw) {
            if (!empty($rw)) {
                $roleData[] = $rw->toArray();
            }
        }
        // pr($aCatData);die;
        $this->set(compact('aCatData', 'roleData'));
    }

    public function roadmap() {
        $this->viewBuilder()->layout('admin_layout');
    
  $this->set('active', '4');
        $this->loadModel('Departments');
        $usertable = TableRegistry::getTableLocator()->get('Users'); //MeetingWithUsers
        $roadmaplisting = $usertable->find('all', array('order' => array('Users.id' => 'desc')))->contain(['Departments'])->where(['ob_status' => '1', 'user_type' => '4'])->toArray();
        //pr($roadmaplisting);die;
        $departmentdata = TableRegistry::getTableLocator()->get('departments');
        $departmentrecord = $departmentdata->find()->where(['status' => 1])->toArray();
        $departmentarray = [];
        foreach ($departmentrecord as $departmentarrays) {
            if (!empty($departmentarrays)) {
                $departmentarray[$departmentarrays->id] = $departmentarrays->title;
            }
        }


        $business_units_table = TableRegistry::get('BusinessUnits');
        $business_units = $business_units_table->find('all', array('fields' => array('id', 'title'), 'conditions' => array('BusinessUnits.status' => 1)))->toArray();

        $departments = $this->Departments->find('all')->select(['id', 'sub_department_id', 'title'])->where(['AND' => ['Departments.status' => 1, 'Departments.sub_department_id' => 0]])->toArray();

        $sub_departments = $this->Departments->find('all')->select(['id', 'title'])->where(['AND' => ['Departments.status' => 1, 'Departments.sub_department_id >' => 0]])->toArray();

        $users_data = $this->Users->find('all')->select(['id', 'first_name', 'last_name'])->where(['Users.ob_status' => 1])->toArray();

        $this->set(compact('roadmaplisting', 'business_units', 'departments', 'sub_departments', 'users_data'));
    }

    public function addsession() {
        if ($this->request->is('post')) {
            $message = "";
            foreach ($this->request->data('bu_name') as $k => $bu_name) {
                $add_sessionsTable = TableRegistry::get('add_sessions');
                $time = Time::now();
                $joinee_id = $this->request->data('as_id_0');
                $bu_name_0 = $this->request->data('bu_name')[$k];
                $dept_0 = $this->request->data('dept')[$k];
                $sub_dept_0 = $this->request->data('sub_dept')[$k];
                $user_id_0 = $this->request->data('user_id')[$k];
                $note_0 = $this->request->data('note')[$k];
                $session_date_0 = $this->request->data('session_date')[$k];
                $start_time_0 = $this->request->data('start_time')[$k];
                $end_time_0 = $this->request->data('end_time')[$k];
                //pr("$joinee_id - ".$joinee_id);die;
                //pr("bu_name_0 - ".$bu_name_0."dept_0 - ".$dept_0."sub_dept_0 - ".$sub_dept_0."user_id_0 - ".$user_id_0."note_0 - ".$note_0."session_date_0 - ".$session_date_0."start_time_0 - ".$start_time_0."end_time_0 - ".$end_time_0);

                $add_sessionsdata = $add_sessionsTable->newEntity();
                $add_sessionsdata->joinee_id = $joinee_id;
                $add_sessionsdata->business_unit_id = $bu_name_0;
                $add_sessionsdata->department_id = $dept_0;
                $add_sessionsdata->sub_department_id = $sub_dept_0;
                $add_sessionsdata->user_id = $user_id_0;
                $add_sessionsdata->note = $note_0;
                $add_sessionsdata->session_date = $session_date_0;
                $add_sessionsdata->start_time = $start_time_0;
                $add_sessionsdata->end_time = $end_time_0;
                $add_sessionsdata->time_created = $time;

                if ($add_sessionsTable->save($add_sessionsdata)) {
                    $message = "Session added Sucessfully";
                } else {
                    $message = "Error in data insertion";
                }
            }
            $class = 'alert alert-success alert-dismissible fade in';
            $iclass = 'fa fa-check';
            $close = '&times';
            $this->Flash->set($message, ['element' => 'success']);
            return $this->redirect(['controller' => 'Users', 'action' => 'roadmap']);
        }
    }

    /* function used for roadmap page edit */

    public function fetchuserbyid() {
        if ($this->request->is('ajax')) {
            $id = $this->request->data('id');
            $usertable = TableRegistry::getTableLocator()->get('Users');
            $userbyid['user_data'] = $usertable->find('all')->select(['id', 'user_type', 'username', 'user_type', 'emp_id', 'first_name', 'last_name', 'doj'])->where(['id' => $id])->toArray();
            //pr($userbyid);die;
            echo(json_encode($userbyid));
            exit;
        }
    }

    /* fetch sessionlist of user on roadmap page  */

    public function fetchusersessionbyid() {
        if ($this->request->is('ajax')) {
            $id = $this->request->data('id');
            $add_sessions_table = TableRegistry::getTableLocator()->get('add_sessions');
            $sessions_data = $add_sessions_table->find('all')->contain(['Departments', 'BusinessUnits'])->where(['AND' => ['add_sessions.joinee_id' => $id, 'add_sessions.status' => 1]])->toArray();
            //pr($sessions_data);die;
            $html = '';
            if (!empty($sessions_data)) {
                foreach ($sessions_data as $ses_data) {
                    $diff = date_diff($ses_data['end_time'], $ses_data['start_time']);
                    $hours = $diff->h;
                    $minute = $diff->i;
                    $dur = $hours . "Hr " . $minute . " Min";
                    $edit_session = "edit_session";
                    //pr($note);die;
                    if ($ses_data['is_accepted'] == 1) {
                        $status = 'fa fa-check text-green';
                    } else {
                        $status = 'fa fa-circle text-orange';
                    }
                    $note = substr($ses_data['note'], 0, 20) . '...';
                    //<a href='editSession/".$ses_data['id']."'></a>
                    $html .= "<tr><td><div data-panel-type='roadmap'>" . $ses_data['business_unit']['title'] . "</div></td><td>" . $ses_data['department']['title'] . "</td><td>Raghav</td><td title='" . $ses_data['note'] . "'>" . $note . "</td><td>" . $ses_data['session_date'] . "</td><td>" . $ses_data['start_time'] . "</td><td>" . $ses_data['end_time'] . "</td><td>" . $dur . "</td><td><i class='" . $status . "'></i></td><td><div data-sidebar-button data-panel-type='edit_session' id='es_btn' onclick='open_edit_mode(" . $edit_session . ");editsessiondata(" . $ses_data['id'] . ");'><i class='fa fa-edit'></i></div> <button style='border: 0px;background-color: #dddddd;' onclick='return inactivesession(" . $ses_data['id'] . ");'><i class='fa fa-trash'></i></button></td></tr>";
                }
            }
            //echo(json_encode(array($sessions_data)));
            echo(json_encode($html));
            //echo(json_encode(array($html)));
            exit;
        }
    }

    public function fetchusersessionbyidcommon() {
        if ($this->request->is('ajax')) {
            $id = $this->request->data('id');
            $add_sessions_table = TableRegistry::getTableLocator()->get('add_sessions');
            $sessions_data = $add_sessions_table->find('all')->contain(['Departments', 'BusinessUnits'])->where(['AND' => ['add_sessions.joinee_id' => $id, 'add_sessions.status' => 1]])->toArray();
            //pr($sessions_data);die;
            $html = '';
            if (!empty($sessions_data)) {
                foreach ($sessions_data as $ses_data) {
                    $diff = date_diff($ses_data['end_time'], $ses_data['start_time']);
                    $hours = $diff->h;
                    $minute = $diff->i;
                    $dur = $hours . "Hr " . $minute . " Min";
                    $edit_session = "edit_session";
                    //pr($note);die;
                    if ($ses_data['is_accepted'] == 1) {
                        $status = 'fa fa-check text-green';
                    } else {
                        $status = 'fa fa-circle text-orange';
                    }
                    $note = substr($ses_data['note'], 0, 20) . '...';
                    //<a href='editSession/".$ses_data['id']."'></a>
                    $html .= "<tr><td><div data-panel-type='roadmap'>" . $ses_data['business_unit']['title'] . "</div></td><td>" . $ses_data['department']['title'] . "</td><td>Raghav</td><td title='" . $ses_data['note'] . "'>" . $note . "</td><td>" . $ses_data['session_date'] . "</td><td>" . $ses_data['start_time'] . "</td><td>" . $ses_data['end_time'] . "</td><td>" . $dur . "</td><td><i class='" . $status . "'></i></td></tr>";
                }
            }
            //echo(json_encode(array($sessions_data)));
            echo(json_encode($html));
            //echo(json_encode(array($html)));
            exit;
        }
    }

    public function editSession() {
        if ($this->request->is('ajax')) {
            $id = $this->request->data('id');
            $this->loadModel('Departments');
            $this->loadModel('Users');
            $this->loadModel('BusinessUnits');
            $sessions_table = TableRegistry::getTableLocator()->get('add_sessions');
            $sess_data['sess_data'] = $sessions_table->find('all')->contain(['Departments', 'BusinessUnits', 'Users'])->where(['AND' => ['add_sessions.id' => $id, 'add_sessions.status' => 1]])->toArray();
            $department_id = $sess_data['sess_data'][0]['department_id'];
            $sub_department_id = $sess_data['sess_data'][0]['sub_department_id'];
            $meeting_with_id = $sess_data['sess_data'][0]['user_id'];
            //pr($sess_data);die;
            $sess_data['session_date'] = date("Y-m-d", strtotime($sess_data['sess_data'][0]['session_date']));
            $sess_data['start_time'] = date("h:i", strtotime($sess_data['sess_data'][0]['start_time']));
            $sess_data['end_time'] = date("h:i", strtotime($sess_data['sess_data'][0]['end_time']));


            $datetime1 = new \DateTime($sess_data['sess_data'][0]['end_time']);
            $datetime2 = new \DateTime($sess_data['sess_data'][0]['start_time']);
            $interval = $datetime1->diff($datetime2);
            $sess_data['duration'] = $interval->format('%h') . " Hr " . $interval->format('%i') . " Min";

            $sess_data['business_units'] = $this->BusinessUnits->find('all')->select(['id', 'title'])->where(['AND' => ['BusinessUnits.status' => 1]])->toArray();

            $sess_data['departments'] = $this->Departments->find('all')->select(['id', 'title'])->where(['AND' => ['Departments.status' => 1, 'Departments.id' => $department_id]])->toArray();
            //pr($departments);die;

            $sess_data['sub_departments'] = $this->Departments->find('all')->select(['id', 'title'])->where(['AND' => ['Departments.status' => 1, 'Departments.id' => $sub_department_id]])->toArray();


            $sess_data['meeting_with'] = $this->Users->find('all')->select(['id', 'first_name', 'last_name'])->where(['AND' => ['Users.ob_status' => 1, 'Users.id' => $meeting_with_id]])->toArray();
            //pr($sess_data);die;
            echo(json_encode($sess_data));
            exit;
        }
    }

    public function updateSession() {
        /* to update session */
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $time = Time::now();
            $sessions_table = TableRegistry::get('add_sessions');
            $session_id = $this->request->data('es_id');
            $joinee_id = $this->request->data('joinee_id_es');
            $bu_name = $this->request->data('bu_name_es');
            $dept = $this->request->data('dept_es');
            $sub_dept = $this->request->data('sub_dept_es');
            $user_id = $this->request->data('user_id_es');
            $note = $this->request->data('note_es');
            $session_date = $this->request->data('session_date_es');
            $start_time = $this->request->data('start_time_es');
            $end_time = $this->request->data('end_time_es');
            $updatequery = $sessions_table->query();
            $update_result = $updatequery->update()
                            ->set(['user_id' => $user_id, 'business_unit_id' => $bu_name, 'department_id' => $dept, 'sub_department_id' => $sub_dept, 'note' => $note, 'session_date' => $session_date, 'start_time' => $start_time, 'end_time' => $end_time, 'time_modified' => $time])
                            ->where(['AND' => ['joinee_id' => $joinee_id, 'id' => $session_id]])->execute();
            if ($update_result) {
                $success = "success";
                header('Content-Type: application/json');
                echo json_encode(array($success));
                die;
            }
        }
    }

    public function inactivesession() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $id = $this->request->data('id');
            $status = $this->request->data('status');
            $logisticsTable = TableRegistry::get('add_sessions');
            $conditions = array('id' => $id);
            $fields = array('status' => $status);
            $logisticsTable->updateAll($fields, $conditions);
        }
    }

    /* function used for getting user name on basis of subdepartment */

    public function getmeetingwithuser() {
        if ($this->request->is(array('ajax'))) {
            $this->autoRender = false;
        }
        if ($this->request->isPost()) {
            $business_unit_id = $this->request->data['business_unit_id'];
            $department_id = $this->request->data['department_id'];
            $sub_department_id = $this->request->data['sub_department_id'];
            $users_table = TableRegistry::get('Users');
            $meeting_with_username = $users_table->find('all', array(
                        'fields' => array('id', 'first_name', 'last_name'),
                        'conditions' => array('AND' => ['Users.businees_unit' => $business_unit_id, 'Users.department' => $department_id, 'Users.sub_department' => $sub_department_id])))->toArray();

            $html = '';
            foreach ($meeting_with_username as $key => $value) {
                $html .= '<option value="' . $value->id . '" >' . $value->first_name . ' ' . $value->last_name . '</option>';
            }
            header('Content-Type: application/json');
            echo json_encode(array($html));
        }
    }

//method for fetching data based on id of selected row with ajax for logistics page
    public function fetchroadmapPopup() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $id = $this->request->data['id'];
            $connection = ConnectionManager::get('default');
            $sql = "SELECT users.* ,l.user_id,l.logistic_id from users LEFT JOIN logistics_arrangement as l on l.user_id=users.id where  users.id = '" . $id . "'   ";
            $users = $connection->execute($sql)->fetchAll('assoc');
            if (!empty($users)) {
                $arrData = json_encode($users);
            }
            echo $arrData;
        }
    }

    public function addbussiness() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $business_units_table = TableRegistry::get('BusinessUnits');
            $business_units = $business_units_table->find('all', array('fields' => array('id', 'title'), 'conditions' => array('BusinessUnits.status' => 1)))->toArray();

            $html = '';
            foreach ($business_units as $value) {
                $html .= '<option value="' . $value->id . '" >' . $value->title . '</option>';
            }
            header('Content-Type: application/json');
            echo json_encode(array($html));
        }
    }

    public function report() {
        $this->viewBuilder()->layout('admin_layout');
    }

    public function logistics() {
        $this->checkAccess();
        $time1 = Time::now();
        $this->set('active', '2');
        $this->loadModel('Users');
        $this->loadModel('LogisticsArrangement');
        $this->viewBuilder()->layout('admin_layout');

        $userrecord = $this->Users->find('all', array('order' => array('id' => 'desc')))->where(['ob_status' => '1', 'user_type' => '4'])->contain(['LogisticsArrangement'])->toArray();
        $logisticsTable = TableRegistry::get('logistics');
        $logistics = $logisticsTable->find()->where(['status' => '1'])->toArray();
        $cstatusTable = TableRegistry::getTableLocator()->get('departments');
        $query4 = $cstatusTable->find('all')->where(['status' => 1]);
        $cstatusData = [];
        foreach ($query4 as $stts) {
            if (!empty($stts)) {
                $cstatusData[$stts->id] = $stts->title;
            }
        }
        $locationTable = TableRegistry::getTableLocator()->get('locations');
        $locationrecord = $locationTable->find()->where(['status' => '1']);
        $locationarr = [];
        foreach ($locationrecord as $locationrecords) {
            if (!empty($locationrecords)) {
                $locationarr[$locationrecords->id] = $locationrecords->title;
            }
        }

        $this->set(compact('userrecord', 'logistics', 'cstatusData', 'locationarr'));
    }

//method for fetching data based on id of selected row with ajax for logistics page
    public function fetchlogisticsPopup() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $id = $this->request->data['id'];
            $connection = ConnectionManager::get('default');
            $sql = "SELECT users.* ,l.user_id,l.logistic_id,l.r_status from users LEFT JOIN logistics_arrangement as l on l.user_id=users.id where  users.id = '" . $id . "'   ";
            $users = $connection->execute($sql)->fetchAll('assoc');
            //$users = TableRegistry::get('Users')->find()
            // ->where(['id' => $id])
            // ->toArray();
            if (!empty($users)) {
                $arrData = json_encode($users);
            }
            echo $arrData;
        }
    }

    //method for matching fetching user and sub_department data based on id of selected row with ajax for roadmap page
    public function matchingusers() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $sub_dept = $this->request->data('sub_dept');

            //$connection = ConnectionManager::get('default');
            //$sql = "SELECT emp_id,sub_department from users where  sub_department = '" . $id . "'   ";
            //$users  = $connection->execute($sql)->fetchAll('assoc');
            $user_table = TableRegistry::get('Users');
            $users = $user_table->find('all')->where(['sub_department' => $sub_dept])->toArray();


            $html = '';
            foreach ($users as $value) {
                $html .= '<option value="' . $value->id . '" >' . $value->first_name . ' ' . $value->last_name . '&nbsp(' . $value->emp_id . ')</option>';
            }
            header('Content-Type: application/json');
            echo json_encode(array($html));
        }
    }

//method for insert logistic arrangement  data based on id of selected row with ajax for logistics page
    public function logisticinsert() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $time1 = Time::now();
            $userid = $this->request->data('userid');
            $userTable = TableRegistry::get('users');
            $userfetch = $userTable->find('all')->where(['id' => $userid])->toArray();
            $userfetchname = $userfetch['first_name'];
            $userfetchlastname = $userfetch['last_name'];
            $userfetchdesignation = $userfetch['designation'];
            $userfetchdoj = $userfetch['doj'];
            $userfetchemail = $userfetch['email'];

            $logistic_id = $this->request->data('logistic_id');
            $logisticsarrangementTable = TableRegistry::get('logistics_arrangement');

            foreach ($logistic_id as $logistic_ids) {
                $logdata = $logisticsarrangementTable->newEntity();
                $logdata->logistic_id = $logistic_ids;
                $logdata->user_id = $userid;
                $logdata->time_created = $time1;
                if ($logisticsarrangementTable->save($logdata)) {
                    
                }
            }
            /* if($logistic_id == '6'){
              $email = new Email();
              //$email->viewVars(['first_name' => $userfetchname,'last_name' => $userfetchlastname,'user_email'=>$userfetchemail,'doj'=>$userfetchdoj,'designation'=>$userfetchdesignation]);
              //$email->from(['learning@quatrro.com' => 'Spring Board'])
              // ->to($userfetchemail)
              //->template('logistics_arrangements', 'mail')
              //->emailFormat('html')
              //->subject('Joinee System Arrangement')
              //->send(); } */

            /* if($logistic_id == '5'){
              $email = new Email();
              //$email->viewVars(['first_name' => $userfetchname,'last_name' => $userfetchlastname,'user_email'=>$userfetchemail,'doj'=>$userfetchdoj,'designation'=>$userfetchdesignation]);
              //$email->from(['learning@quatrro.com' => 'Spring Board'])
              // ->to($user_email)
              //->template('arrange_access_photo', 'mail')
              //->emailFormat('html')
              //->subject('Arrange access card/photo Id card (Gurgaon,Plot -119)for new joinee ')
              //->send();} */


            /* if($logistic_id == '4'){
              $email = new Email();
              //$email->viewVars(['first_name' => $userfetchname,'last_name' => $userfetchlastname,'user_email'=>$userfetchemail,'doj'=>$userfetchdoj,'designation'=>$userfetchdesignation]);
              //$email->from(['learning@quatrro.com' => 'Spring Board'])
              // ->to($userfetchemail)
              //->template('carparking_sticker_arrangements', 'mail')
              //->emailFormat('html')
              //->subject('Arrange Car Parking Sticker (Gurgaon,Plot -119)for new joinee')
              //->send(); } */

            /* else if($logistic_id == '1'){
              $email = new Email();
              //$email->viewVars(['first_name' => $userfetchname,'last_name' => $userfetchlastname,'user_email'=>$userfetchemail,'doj'=>$userfetchdoj,'designation'=>$userfetchdesignation]);
              //$email->from(['learning@quatrro.com' => 'Spring Board'])
              // ->to($user_email)
              //->template('lanid_creation', 'mail')
              //->emailFormat('html')
              //->subject('Lan Id Creation (Gurgaon,Plot -119)for new joinee ')
              //->send(); } */


            /* else if($logistic_id == '2'){
              $email = new Email();
              //$email->viewVars(['first_name' => $userfetchname,'last_name' => $userfetchlastname,'user_email'=>$userfetchemail,'doj'=>$userfetchdoj,'designation'=>$userfetchdesignation]);
              //$email->from(['learning@quatrro.com' => 'Spring Board'])
              // ->to($userfetchemail)
              //->template('bussiness_card', 'mail')
              //->emailFormat('html')
              //->subject('Bussiness Card (Gurgaon,Plot -119)for new joinee')
              //->send(); } */

            /* else if($logistic_id == '3'){
              $email = new Email();
              //$email->viewVars(['first_name' => $userfetchname,'last_name' => $userfetchlastname,'user_email'=>$userfetchemail,'doj'=>$userfetchdoj,'designation'=>$userfetchdesignation]);
              //$email->from(['learning@quatrro.com' => 'Spring Board'])
              // ->to($user_email)
              //->template('voice_support', 'mail')
              //->emailFormat('html')
              //->subject('Voice Support (Gurgaon,Plot -119)for new joinee ')
              //->send();
              }       else {   } */
        }
        exit;
    }

    public function viewUsers() {
        $this->viewBuilder()->layout('admin_layout');
    }

    public function employee() {
        $this->viewBuilder()->layout('admin_layout');
    }

    public function changepassword() {
        $this->viewBuilder()->layout('admin_layout');
        if ($this->request->is('post')) {
            $oldpassword = $this->request->data['old_password'];
            $password1 = $this->request->data['new_password'];
            $password2 = $this->request->data['confirm_password'];
            $user_id = $this->request->data['userid'];
            $hasher = new DefaultPasswordHasher();
            $password = $hasher->hash($password1);
            $connection = ConnectionManager::get('default');
            $connection->update('users', ['password' => $password], ['id' => $user_id]);
            $sucessful = 'Password changed sucessfully';
            $class = 'alert alert-success alert-dismissible fade in';
            $iclass = 'fa fa-check';
            $close = '&times';
        }
        $this->set(compact('sucessful', 'class', 'iclass', 'close'));
    }

    public function forgotpassword() {
        $this->viewBuilder()->layout('');
    }

    public function supervisorManageUser() {
        $this->viewBuilder()->layout('admin_layout');
    }

    public function confirmation() {
    $this->set('active','3');
        $this->viewBuilder()->layout('admin_layout');
        $usersTable = TableRegistry::get('Users');
        $conn = ConnectionManager::get('default');
        $query2 = "select u.*, d.title as department from users as u inner join departments as d on u.department = d.id where u.ob_status = '1' order by u.id desc";
        $usersdata = $conn->execute($query2)->fetchAll('assoc');

        $this->set(compact('usersdata'));
    }

// method for logout
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function addUser() {
        $this->checkAccess();
        $this->viewBuilder()->layout('admin_layout');
        $this->loadModel('Users');
       $search= $this->request->data('search');
 
          
    
        if ($this->request->is('post')) {
          
                    return $this->redirect(['controller' => 'Users', 'action' => 'addUser']);
                if(!empty($search)){
                $searcherror= "Please Click on search icon";
                   } 
        }


        $this->set(compact('sucessful','searcherror'));
    }

// function for adding user when user is not in the database

    public function addUsers() {
        $this->viewBuilder()->layout('admin_layout');
        $this->loadModel('Users');
        $business_units_table = TableRegistry::get('BusinessUnits');
        $roles_table = TableRegistry::get('roles');
        $roles = $roles_table->find('all', array('fields' => array('id', 'title')))->toArray();

        $business_units = $business_units_table->find('all', array('fields' => array('id', 'title'), 'conditions' => array('BusinessUnits.status' => 1)))->toArray();


        if ($this->request->is('post')) {
            $time = Time::now();

            $id = $this->request->data('id');
            $username = $this->request->data('username');
            $user_type = $this->request->data('user_type');
            $auth_type = $this->request->data('auth_type');
            $first_name = $this->request->data('first_name');
            $last_name = $this->request->data('last_name');
            $doj = $this->request->data('doj');
            $status = $this->request->data('onboard');
            if ($status == 'on') {
                $ob_status = 1;
            } else {
                $ob_status = 0;
            }
            $empid = $this->request->data('emp_id');
            $email = $this->request->data('email');
            $business = $this->request->data('businees_unit');
            $mobile = $this->request->data('mobile');
            $city = $this->request->data('city');
            $country = $this->request->data('country');
            $dept = $this->request->data('department');
            $subdept = $this->request->data('sub_department');
            $status = $this->request->data('status');
            $designation = $this->request->data('designation');
            $band = $this->request->data('band');
            $manager_emp_id = $this->request->data('manager_emp_id');
            $manager_name = $this->request->data('manager_name');
            $manager_email = $this->request->data('manager_email');
            $bhr_emp_id = $this->request->data('bhr_emp_id');
            $bhr_name = $this->request->data('bhr_name');
            $bhr_email = $this->request->data('bhr_email');
            $password = $this->request->data('password');
            //$password1 = md5($this->request->data['password']);

            $usersTable = TableRegistry::get('users');
            $usersdata = $usersTable->newEntity();
            $usersdata->user_type = $user_type;
            $usersdata->first_name = $first_name;
            $usersdata->last_name = $last_name;

            $usersdata->doj = $doj;
            $usersdata->username = $username;
            $usersdata->user_type = $user_type;
            $usersdata->emp_id = $empid;
            $usersdata->email = $email;
            $usersdata->businees_unit = $business;
            $usersdata->status = $status;
            $usersdata->businees_unit = $business;
            $usersdata->mobile = $mobile;
            $usersdata->city = $city;
            $usersdata->country = $country;
            $usersdata->sub_department = $subdept;
            $usersdata->department = $dept;
            $usersdata->auth_type = $auth_type;
            $usersdata->band = $band;
            $usersdata->designation = $designation;
            $usersdata->manager_emp_id = $manager_emp_id;
            $usersdata->manager_name = $manager_name;
            $usersdata->manager_email = $manager_email;
            $usersdata->bhr_emp_id = $bhr_emp_id;
            $usersdata->bhr_name = $bhr_name;
            $usersdata->bhr_email = $bhr_email;
            $usersdata->password = $password;
            $usersdata->ob_status = $ob_status;
            $usersdata->time_created = $time;


            if ($usersTable->save($usersdata)) {
                $id = $usersdata->id;
                $sucessful = 'User Added Sucessfully';
                $class = 'alert alert-success alert-dismissible fade in';
                $iclass = 'fa fa-check';
                $close = '&times';
            }
        }

        $this->set(compact('sucessful', 'class', 'iclass', 'close', 'business_units', 'roles'));
    }

    public function deleteuser() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {

            $id = $this->request->data('id');
            $status = $this->request->data('status');
            $usersTable = TableRegistry::get('users');
            $conditions = array('id' => $id);
            $fields = array('status' => $status);
            $usersTable->updateAll($fields, $conditions);
        }
    }

//feadback list
public function feedbacklist(){
$this->autoRender = false;
        if ($this->request->is('ajax')) {
            $id = $this->request->data['id'];
			
		$connection = ConnectionManager::get('default');
            $sql = "select q.title from feedback_questions as fq inner join questions as q on q.id=fq.question_id where fq.feedback_id = '".$id."'   ";
            $users  = $connection->execute($sql)->fetchAll('assoc');
							    $html = '';
            if (!empty($users)) {
        $u=1;
        foreach ($users as $user){
                   $html .= '<div><p>'.$user["title"].'</p><div> ';
				   
    }
               
            }
         $arrData = json_encode( $html);
            echo $arrData;
        }





}
    // employee dashboard function
    public function employeeDashboard() {
        $session = $this->request->session();
        $session_data = $session->read();
        $user_id = $session_data["Auth"]["User"]["id"];

        $usersTable = TableRegistry::get('users');
        $usersLogistic = TableRegistry::get('logistics_arrangement');

    $feedbackdata = TableRegistry::get('feedbacks');
    $feedbackuser=  $feedbackdata->find('all',array('order'=>array('id','title')))->where(['for_joinee'=>'1','status'=>'1'])->toArray();
       

        $conn = ConnectionManager::get('default');
        $id = $this->request->data('id');
        $sql = "select l.*, lg.title as logistic_name from logistics_arrangement as l inner join logistics as lg on l.logistic_id = lg.id where l.user_id = '" . $user_id . "'";
        $logistic_detail = $conn->execute($sql)->fetchAll('assoc');

        $query2 = "select u.*, d.title as department, d1.title as sub_department, bu.title as businees_unit from users as u inner join departments as d on u.department = d.id  left join departments as d1 on u.sub_department = d1.id left join business_units as bu on bu.id = u.businees_unit where u.id = '" . $user_id . "'";
        $user_details = $conn->execute($query2)->fetchAll('assoc');

            $add_sessions_table = TableRegistry::getTableLocator()->get('add_sessions');
            $sessions_data = $add_sessions_table->find('all')->contain(['Departments', 'BusinessUnits'])->where(['AND' => ['add_sessions.joinee_id' => $user_id, 'add_sessions.status' => 1]])->toArray();

        if ($this->request->is('ajax')) {
            $r_status = $this->request->data('r_status');
            $id = $this->request->data('id');

            $conditions = array('id' => $id);
            $fields = array('r_status' => $r_status);
            $usersLogistic->updateAll($fields, $conditions);
        }


        //queries to track status bar in dashboard 
        $query = "select count(id) as no from logistics_arrangement where user_id = '" . $user_id . "'";
        $logistic_status = $conn->execute($query)->fetchAll('assoc');
        $value = $logistic_status[0]['no'];

        if ($value != 0) {
            $status1 = "complete";
        } else {
            $status1 = "disabled";
        }


        $query3 = "select count(id) as nos from logistics_arrangement where user_id = '" . $user_id . "' AND  r_status = '0' ";
        $logistic = $conn->execute($query3)->fetchAll('assoc');
        $value1 = $logistic[0]['nos'];

        if ($value1 != 0) {
            $status2 = 1;
        } else {
            $status2 = 0;
        }



        $this->set(compact('user_deatil', 'logistic_detail', 'status1', 'value', 'logistic_status', 'user_details', 'status2','sessions_data','feedbackuser','user_id'));

    }

    public function getdepartments() {
        if ($this->request->is(array('ajax'))) {
            $this->autoRender = false;
        }
        if ($this->request->isPost()) {
            $business_unit_id = $this->request->data['business_unit_id'];
            $this->loadModel('Departments');
            /* $departments_data = $departments_table->find('all', array(
              'fields' => array('id', 'title'),
              'conditions' => array('AND' => ['Departments.business_unit_id' => $business_unit_id, 'Departments.sub_department_id =' => 0])))->toArray(); */

            $departments_data = $this->Departments->find('all')->select(['id', 'title'])->distinct(['Departments.title'])->where(['AND' => ['Departments.business_unit_id' => $business_unit_id, 'Departments.sub_department_id' => 0]])->toArray();
        }
        $html = '';
        foreach ($departments_data as $key => $value) {
            $html .= '<option value="' . $value->id . '" >' . $value->title . '</option>';
        }
        header('Content-Type: application/json');
        echo json_encode(array($html));
    }

    public function getsubdepartments() {
        if ($this->request->is(array('ajax'))) {
            $this->autoRender = false;
        }
        if ($this->request->isPost()) {
            $business_unit_id = $this->request->data['business_unit_id'];
            $department_id = $this->request->data['id'];
            $departments_table = TableRegistry::get('Departments');
            $sub_departments = $departments_table->find('all', array(
                        'fields' => array('id', 'title'),
                        'conditions' => array('AND' => ['Departments.business_unit_id' => $business_unit_id, 'Departments.sub_department_id' => $department_id])))->toArray();
            //pr($sub_departments);die;
            $html = '';
            foreach ($sub_departments as $key => $value) {
                $html .= '<option value="' . $value->id . '" >' . $value->title . '</option>';
            }
            header('Content-Type: application/json');
            echo json_encode(array($html));
        }
    }

    public function getRoleData($user_id) {
        $roleTbl = TableRegistry::getTableLocator()->get('Roles');
        $query = $roleTbl->find('all')
                ->where(['id' => $user_id, 'status' => 1]);
        $roleData = [];
        if (!empty($query->first())) {
            $roleData = $query->first()->toArray();
        }
        echo json_encode($roleData);
        die;
    }


   

    public function stchange($id, $flag) {
        $this->autoRender = false;
        $user_type = $this->Auth->user('user_type');
        if (!in_array($user_type, [1, 3])) {
            echo 'Invalid request !';
            die;
        }
        $userTbl = TableRegistry::getTableLocator()->get('Users');
        $user = $userTbl->get($id);
        if($user->status!=1){
            echo 'Invalid request 2 !';
            die;
        }
        if ($flag == 1) {
            $user->status = 2;
        } else if ($flag == 0) {
            $user->status = 3;
        }
        $userTbl->save($user);
        echo json_encode(['Done']);
        die;
    }
    
    
    public function getFeedbackData($user_id) {
        $this->autoRender = false;
        $fbTbl = TableRegistry::getTableLocator()->get('Feedbacks');
        //$feedbackUserTbl = TableRegistry::getTableLocator()->get('FeedbackUsers');
        $uTbl = TableRegistry::getTableLocator()->get('Users');
        $feedBackData = [];

        // Get basic info of user
        $uinfo = $uTbl->get($user_id);
        $username = $uinfo['first_name'] . " " . $uinfo['last_name'];
        $ueId = $uinfo['emp_id'];
        $doj = date('d/m/Y', strtotime($uinfo['doj']));
        // Get feedbacl list for user
        $query1 = $fbTbl->find('all')
                ->where(['status' => 1, 'for_supervisor' => 1])
                ->contain([
            'FeedbackVerify' => function ($q) use ($user_id){
                    return $q->where(['FeedbackVerify.user_id' =>$user_id]);
            },
            'FeedbackQuestions' => ['Questions']]);
        foreach ($query1 as $rw) {
            //pr($rw);die;
            if (!empty($rw)) {
                $key = $rw['id'];
                $completed = false;
                if (!empty($rw['feedback_verify'])) {  // This method will be replaced by another method later
                    $completed = true;
                }
                $completedOn = "-";
                $completedTxt = "<h5>&nbsp;</h5>";
                $title = $rw['title'];
                $fstatus = '<p class="margin-bottom-0 text-red">Pending</p>';
                if (($completed)&&!empty($rw['feedback_verify'][0])) {
                    $completedOn = date('d/m/Y', strtotime($rw['feedback_verify'][0]['created']));
                    $completedTxt = '<h5 class="text-muted">Completed on ' . $completedOn . '</h5>';
                }
                if ($completed) {
                    $fstatus = '<p class="margin-bottom-0 text-green">Completed</p>';
                }

                // Html for info
                $infohtml = '<div class="col-md-4">
                                <div class="panel panel-success joinee-blocks info-sec" data-rel="' . $key . '">
                                    <div class="panel-body">
                                        <div class="panel-proceed-btn"><i class="fa fa-angle-double-right fa-lg"></i></div>
                                        <strong>' . $title . '</strong>
                                        <p class="margin-bottom-0 text-muted">' . $completedOn . '</p>
                                        ' . $fstatus . '
                                    </div>
                                </div>
                            </div>';
                $detailedHtml = '<div class="hidden feedback-sec" id="detail-sec-' . $key . '">
                            <form class="feedback-form" onsubmit="return false;">
                            <input type="hidden" name="fu_id" value="' . $user_id . '">
                            <input type="hidden" name="f_id" value="' . $key . '">
                            <input type="hidden" name="u_id" value="' . $user_id . '">    
                            <ol class="breadcrumb">
                                <li class="text-blue pointer goback-feedback" data-rel="' . $key . '">Interval Feedback</li>
                                <li class="active">' . $title . '</li>
                            </ol>
                            <div class="margin-top-sm">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span>Name : </span>
                                        <strong class="j-name-html">' . $username . '</strong>
                                    </div>
                                    <div class="col-md-4">
                                        <span>Emp Id : </span>
                                        <strong class="j-emp_id-html">' . $ueId . '</strong>
                                    </div>
                                    <div class="col-md-4">
                                        <span>DOJ : </span>
                                        <strong class="j-doj-html">' . $doj . '</strong>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class="margin-0">' . $title . '</h4>
                                    ' . $completedTxt . '
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">';
                $feedbackAnsData = $rw['feedback_verify'];
                if (!empty($rw['feedback_questions'])) {
                    foreach ($rw['feedback_questions'] as $key1 => $fq) {
                        if($completed){
                            $answer = $feedbackAnsData[$key1];
                        }
                        $detailedHtml .= '<div class="col-md-6">
                                                    <p>' . ($key1 + 1) . '. ' . $fq['question']['title'] . '</p>';
                        $ratingG = 0;
                        if ($fq['question']['type'] == 2) {
                            $starClas = " star-rate";
                            if ($completed) {
                                $ratingG = $answer['rating'];
                                $starClas = "";
                            }
                            $detailedHtml .= ' <input type="hidden" name="q_' . $fq['id'] . '" class="rate" value="' . $ratingG . '"/><div class="u-rate" data-rate="0">&nbsp;';
                            for ($i = 1; $i <= 5; $i++) {
                                if ($ratingG > 0) {
                                    $detailedHtml .= '&nbsp;<span><i class="fa fa-star fa-lg text-gold' . $starClas . '"></i></span>';
                                } else {
                                    $detailedHtml .= '&nbsp;<span><i class="fa fa-star-o fa-lg text-gold ' . $starClas . '"></i></span>';
                                }
                                $ratingG--;
                            }
                            $detailedHtml .= '</div>';
                        } else if ($fq['question']['type'] == 1) {
                            $textExtra = "";
                            $tval = "";
                            if ($completed) {
                                $textExtra = ' readonly ';
                                $tval = $answer['answer'];
                            }
                            $detailedHtml .= '<div class="form-group">
                                                                    <textarea disabled class="form-control" ' . $textExtra . ' rows="2" name="q_' . $fq['id'] . '">' . $tval . '</textarea>
                                                                </div>';
                        }

                        $detailedHtml .= '<hr class="margin-sm"></div>';
                    }
                }
                $submitClass = " hidden";
                if (!$completed) {
                    $submitClass = " save-feedback";
                }
                $detailedHtml .= '</div>
                                </div>
                            </div>
                            <hr/>
                            </form>
                        </div>';
                $feedBackData[] = ['info' => $infohtml, 'details' => $detailedHtml];
            }
        }
        echo json_encode($feedBackData);
        die;
    }
    
    
    public function getFeedbackdetailData($user_id) {
        $this->autoRender = false;
        $fbTbl = TableRegistry::getTableLocator()->get('Feedbacks');
        //$feedbackUserTbl = TableRegistry::getTableLocator()->get('FeedbackUsers');
        $uTbl = TableRegistry::getTableLocator()->get('Users');
        $feedBackData = [];

        // Get basic info of user
        $uinfo = $uTbl->get($user_id);
        $username = $uinfo['first_name'] . " " . $uinfo['last_name'];
        $ueId = $uinfo['emp_id'];
        $doj = date('d/m/Y', strtotime($uinfo['doj']));
        // Get feedbacl list for user
        $query1 = $fbTbl->find('all')
                ->where(['status' => 1, 'for_supervisor' => 1])
                ->contain([
            'FeedbackVerify' => function ($q) use ($user_id){
                    return $q->where(['FeedbackVerify.user_id' =>$user_id]);
            },
            'FeedbackQuestions' => ['Questions']]);
        foreach ($query1 as $rw) {
            //pr($rw);die;
            if (!empty($rw)) {
                $key = $rw['id'];
                $completed = false;
                if (!empty($rw['feedback_verify'])) {  // This method will be replaced by another method later
                    $completed = true;
                }
                $completedOn = "-";
                $completedTxt = "<h5>&nbsp;</h5>";
                $title = $rw['title'];
                $fstatus = '<p class="margin-bottom-0 text-red">Pending</p>';
                if (($completed)&&!empty($rw['feedback_verify'][0])) {
                    $completedOn = date('d/m/Y', strtotime($rw['feedback_verify'][0]['created']));
                    $completedTxt = '<h5 class="text-muted">Completed on ' . $completedOn . '</h5>';
                }
                if ($completed) {
                    $fstatus = '<p class="margin-bottom-0 text-green">Completed</p>';
                }

                // Html for info
                $infohtml = '<div class="col-md-4">
                                <div class="panel panel-success joinee-blocks info-sec" data-rel="' . $key . '">
                                    <div class="panel-body">
                                        <div class="panel-proceed-btn"><i class="fa fa-angle-double-right fa-lg"></i></div>
                                        <strong>' . $title . '</strong>
                                        <p class="margin-bottom-0 text-muted">' . $completedOn . '</p>
                                        ' . $fstatus . '
                                    </div>
                                </div>
                            </div>';
                $detailedHtml = '<div class="hidden feedback-sec" id="detail-sec-' . $key . '">
                            <form class="feedback-form" onsubmit="return false;">
                            <input type="hidden" name="fu_id" value="' . $user_id . '">
                            <input type="hidden" name="f_id" value="' . $key . '">
                            <input type="hidden" name="u_id" value="' . $user_id . '">    
                            <ol class="breadcrumb">
                                <li class="text-blue pointer goback-feedback" data-rel="' . $key . '">Interval Feedback</li>
                                <li class="active">' . $title . '</li>
                            </ol>
                            <div class="margin-top-sm">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span>Name : </span>
                                        <strong class="j-name-html">' . $username . '</strong>
                                    </div>
                                    <div class="col-md-4">
                                        <span>Emp Id : </span>
                                        <strong class="j-emp_id-html">' . $ueId . '</strong>
                                    </div>
                                    <div class="col-md-4">
                                        <span>DOJ : </span>
                                        <strong class="j-doj-html">' . $doj . '</strong>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4 class="margin-0">' . $title . '</h4>
                                    ' . $completedTxt . '
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">';
                $feedbackAnsData = $rw['feedback_verify'];
                if (!empty($rw['feedback_questions'])) {
                    foreach ($rw['feedback_questions'] as $key1 => $fq) {
                        if($completed){
                            $answer = $feedbackAnsData[$key1];
                        }
                        $detailedHtml .= '<div class="col-md-6">
                                                    <p>' . ($key1 + 1) . '. ' . $fq['question']['title'] . '</p>';
                        $ratingG = 0;
                        if ($fq['question']['type'] == 2) {
                            $starClas = " star-rate";
                            if ($completed) {
                                $ratingG = $answer['rating'];
                                $starClas = "";
                            }
                            $detailedHtml .= ' <input type="hidden" name="q_' . $fq['id'] . '" class="rate" value="' . $ratingG . '"/><div class="u-rate" data-rate="0">&nbsp;';
                            for ($i = 1; $i <= 5; $i++) {
                                if ($ratingG > 0) {
                                    $detailedHtml .= '&nbsp;<span><i class="fa fa-star fa-lg text-gold' . $starClas . '"></i></span>';
                                } else {
                                    $detailedHtml .= '&nbsp;<span><i class="fa fa-star-o fa-lg text-gold ' . $starClas . '"></i></span>';
                                }
                                $ratingG--;
                            }
                            $detailedHtml .= '</div>';
                        } else if ($fq['question']['type'] == 1) {
                            $textExtra = "";
                            $tval = "";
                            if ($completed) {
                                $textExtra = ' readonly ';
                                $tval = $answer['answer'];
                            }
                            $detailedHtml .= '<div class="form-group">
                                                                    <textarea disabled class="form-control" ' . $textExtra . ' rows="2" name="q_' . $fq['id'] . '">' . $tval . '</textarea>
                                                                </div>';
                        }

                        $detailedHtml .= '<hr class="margin-sm"></div>';
                    }
                }
                $submitClass = " hidden";
                if (!$completed) {
                    $submitClass = " save-feedback";
                }
                $detailedHtml .= '</div>
                                </div>
                            </div>
                            <hr/>
                            </form>
                        </div>';
                $feedBackData[] = ['info' => $infohtml, 'details' => $detailedHtml];
            }
        }
        echo json_encode($feedBackData);
        die;
    }

}
