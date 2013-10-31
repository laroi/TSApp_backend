<?

class UserController extends CController{
	private $all_projects;
	public $layout='//layouts/layout';
	/*************
	 * API used for logging in
	 * @params : mac_id
	 *************/
	public function actionLogin(){
		$mac_id = $_POST['mac'] ;
		$model = new UserModel();
		$ret_val = $model->getUser($mac_id);
		if($ret_val){
			$result = array(
					"result" => Constants::API_RESULT_SUCESS,
					"value"  => $ret_val
			);
		}
		else{
			$result = array(
					"result" => Constants::API_RESULT_FAILURE,
					"value"  => null
			);
		}
		
		echo CJSON::encode($result);
	}
	
	/*************
	 * API used for Joining
	* @params : first_name,last_name,mac
	*************/
	public function actionJoin(){
		$model = new UserModel();
		$first =  $_POST['first_name'] ;
		$last =  $_POST['last_name'] ;
		$mac =  $_POST['mac'] ;
		$ret_val = $model->addNewUser($first,$last,$mac);
		if ($ret_val > 0){
			$result = array(
					"result" => Constants::API_RESULT_SUCESS,
					"value"  => $ret_val
			);
		}else{
			$result = array(
					"result" => Constants::API_RESULT_FAILURE,
					"value"  => null
			);
		}
		echo CJSON::encode($result);
	}
	public function actionTest(){
		$model = new UserModel();
		//hard coded values
		$date ="2013-8-25";
		//$entry_id = if(isset($_POST['entry_pk']) ;
		$project = $_POST['project_fk']; //"test project";
		$hours = $_POST['hours'];//5;
		$body = $_POST['body'];//"this is for testing a project";
		$user_fk = $_POST['user_pk'];
		$isEdit = $_POST['isEdit'];
		echo "test";
		
	}
	
	/*************
	 * API used for Update Particular user project
	* @params : user_pk,array of added projects, array of deleted projects
	*************/
	public function actionUpdateMyProjects(){
		$model = new UserModel();
		$user_fk = $_POST['user_pk'];
		$added_project = $_POST['added'] !== "" ? explode(",",$_POST['added']) : null;
		$deleted_project = $_POST['deleted']!== "" ? explode(",",$_POST['deleted']) :null;
		$ret_val = $model->updateMyProjects($user_fk,$added_project,$deleted_project);
		$result = array(
				Constants::API_RESULT_SUCESS,
					
		);
		echo json_encode($result);
		//echo json_encode($deleted_project);
	}
	/*************
	 * API used for adding projects. To be used by admin only
	* @params : array of added projects, array of deleted projects 
	*************/
	public function actionUpdateAllProjects(){
		$model = new UserModel();
		$added_project = $_POST['added'] !== "" ? explode(",",$_POST['added']) : null;
		$deleted_project = $_POST['deleted']!== "" ? explode(",",$_POST['deleted']) :null;
		$ret_val = $model->updateAllProjects($added_project,$deleted_project);
		$result = array(
				'result'=>Constants::API_RESULT_SUCESS,
					
		);
		echo json_encode($result);
		//echo json_encode($deleted_project);
	}
	/*************
	 * API used for adding and editing time sheet entry
	* @params : entryid (only for editing), project id, hours of working, description,user id,isEdit
	*************/
	public function actionAddTimeSheetEntry(){
		$model = new UserModel();
		//hard coded values
		$date =date("Y-m-d"); //"2013-8-25";
		$entry_id = isset($_POST['entry_pk'])?$_POST['entry_pk']:"";
		$project = $_POST['project_fk']; //"test project";
		$hours = $_POST['hours'];//5;
		$body = $_POST['body'];//"this is for testing a project";
		$user_fk = $_POST['user_pk'];
		$isEdit = $_POST['isEdit'];
		
		//Yii::app()->session['user_fk']= 1;
		
		$ret_val = $model->addEditTimeSheetEntry($entry_id,$date,$project,$hours,$body,$user_fk,$isEdit);
		if ($ret_val > 0){
			$result = array(
					Constants::API_RESULT_SUCESS,
					
			);
		}
		elseif ($ret_val == -1){
			$result = array(
					Constants::ENTRY_EXISTS,
						
			);
		}
		else{
			$result = array(
					 Constants::API_RESULT_FAILURE,
					
			);
		}
		
		echo CJSON::encode($result);
		
	}
	
	/*************
	 * API used for get projects per user
	* @params : userid
	*************/
	public function actionGetProjects(){
		$user_pk = $_POST['user_pk'];
		$model = new UserModel();
		$ret_val = $model->getProjectListPerUser($user_pk);
		if($ret_val){
			$result = array(
					"result" => Constants::API_RESULT_SUCESS,
					"valuee"  => $ret_val
			);
		}
		else{
			$result = array(
					"result" => Constants::API_RESULT_FAILURE,
					"valuee"  => null
			);
		}
		
		echo CJSON::encode($result);
		
	}
	
	public function actiongetTimeSheetEntry(){
		$date = $_POST['date'];
		 if(isset($_POST['project'])){
		 	$project = $_POST['project'];
		}
		else {
			$project = "";
		}
		$user_pk = $_POST['user_pk'];
		$model = new UserModel();
		$ret_val = $model -> getTimeSheetEntry($date,$project,$user_pk);
		//echo $ret_val;
		
		if($ret_val){
			$result = array(
					"result" => Constants::API_RESULT_SUCESS,
					"getTimeSheet"  => $ret_val
			);
		}
		else{
			$result = array(
					"result" => Constants::API_RESULT_FAILURE,
					"getTimeSheet"  => null
			);
		}
		
		echo CJSON::encode($result);
	}
	
	public function actionGetAllProjects(){
		$model = new UserModel();
		$ret_val = $model->getAllProjects();
		if($ret_val){
			$result = array(
					"result" => Constants::API_RESULT_SUCESS,
					"valuee"  => $ret_val
			);
		}
		else{
			$result = array(
					"result" => Constants::API_RESULT_FAILURE,
					"valuee"  => null
			);
		}
		
		echo CJSON::encode($result);
	}
	public function actoinAddProject(){
		$project_name = $_POST['project_name'];
		$model = new UserModel();
		$ret_val = $model->AddProject($project_name);
	}
	public function actionCreatePDF(){
		$user_pk = $_POST['user_pk'];
		$project_pk = $_POST['project_pk'];
		$date = $_POST['date'];
		//$user_pk ='1';
		//$project_pk ='1';
		//$date = '2013-10';
		$model = new UserModel();
		$url = $model->getPDF($user_pk,$project_pk,$date);
		if($url !== 0){
			$result = array(
					"result" => Constants::API_RESULT_SUCESS,
					"value"  => $url
			);
		}
		else{
			$result = array(
					"result" => Constants::API_RESULT_FAILURE,
					"value"  => null
			);
		}
		echo CJSON::encode($result);
		//$model->createPDF();
	}
	//View calling function
	
	public function actionAdmin(){
		$model = new UserModel();
		$all_projects = $model->getAllProjects();
		
		$this->render('admin',array('projects'=>$all_projects));
	}
}