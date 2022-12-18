<?php
class RequestForm {	
	private $server = "mysql:host=localhost;dbname=requestform";
	private $root = "root";
	private $password = "";
	private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
	protected $con;

//make a public function for openConnection with try and catch/this loop/function
		public function openConnection(){
			try{
				$this->con = new PDO($this->server, $this->root, $this->password, $this->options);
				return $this->con;
				
				}catch (PDOException $e) {

					echo "There is something wrong". $e->getMessage();
					}
		}
		public function closeConnection(){	
			$this->con = null;
		}
		public function getUser(){
			if(isset($_POST['account_id'])){
				$account_id = $_POST['account_id'];
				$password = $_POST['password'];
			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT * FROM members WHERE account_id = ?");
			$stmt->execute([$account_id]);
			$user = $stmt->fetch();
			if($stmt->rowCount() > 0){
				$this->set_userdata($user);
			if(password_verify($password, $user['password'])){
				// echo "theres one existed";
				// if(password_verify($_POST['password'], $user['password'])) {
					header("Location: reqform.php");
					$this->set_userdata($user);
				
				}else{
					echo "not correct";
				}
			}
		}
	}

		
				public function register(){
		if(isset($_POST['register'])){

			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$account_id = $_POST['account_id'];
			$contact = $_POST['contact'];
			$department = $_POST['department'];
			$dept_head_firstname = $_POST['dept_head_firstname'];
			$dept_head_lastname = $_POST['dept_head_lastname'];
			$dept_head_fullname = $dept_head_firstname. " ". $dept_head_lastname;
			$position = $_POST['position'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			if($this->check_user_exist($account_id) == 0){
			if($password != $cpassword){
				echo "Passwords do not match";
			}else{
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);
			$conn = $this->openConnection();
			$stmt = $conn->prepare("INSERT INTO `members`(`firstname`, `lastname`, `account_id`, `contact`, `department`, `dept_head_fullname`, `position`, `password`) 
				VALUES (?,?,?,?,?,?,?,?)");
			$stmt->execute([$firstname, $lastname, $account_id, $contact, $department, $dept_head_fullname, $position, $hashed_password]);
			$count = $stmt->rowCount();
			if($count > 0){
				echo "Added";
				header("Location: login.php");
			}else{
				echo "something is wrong";
				}
			}
			
		}else{
			echo "this account_id is already registered";
		}
	}

}	

		
	
	public function set_userdata($array){
		if(!isset($_SESSION)){
			session_start();
		}
		$_SESSION['userdata'] = array("fullname" => $array['firstname']. " ". $array['lastname'], 
			"account_id" => $array['account_id'], "contact" => $array['contact'],
			 "department" => $array['department'], "dept_head_fullname" => $array['dept_head_fullname'], 
			 "position" => $array['position'], "access" => $array['access']);
		return $_SESSION['userdata'];
	}

		public function get_userdata(){	
		if(!isset($_SESSION)){
			session_start();

		}
		if(isset($_SESSION['userdata'])){
			return $_SESSION['userdata'];
		}else{
		
		return null;
	}
}
		public function userInsertData(){
			if (isset($_POST['submit'])) {
					date_default_timezone_set('Asia/Manila');
					$fullname = $_POST['fullname'];
					$req_dept = $_POST['req_dept'];
					$account_id = $_POST['account_id'];
					$contact = $_POST['contact'];
					$date_sub = date('Y-m-d H:i:s');

					$dept_head_fullname = $_POST['dept_head_fullname'];
					$position = $_POST['position'];
				$euser_fname = $_POST['euserfname'];
				$euser_midname = $_POST['eusermidname'];
				$euser_lname = $_POST['euserlname'];
				$euser_suffix = $_POST['eusersuffix'];
				$euser_fullname = $euser_fname. " ". $euser_midname. " ". $euser_lname. " ". $euser_suffix;
				// $form_date = $_POST['form_date'];

				$equip_type = $_POST['equip_type'];
				$equip_num = $_POST['equip_number'];
				$equip_issues= implode(',', $_POST['issues']);
				$required_services = implode(',', $_POST['services']);
				$conn = $this->openConnection();
				$stmt = $conn->prepare("INSERT INTO formdata(req_name, req_dept, dept_acc_id, contact, dept_head_fullname, euser_fullname, position, equip_type, equip_num, equip_issues, required_services,date_added)
					VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
				$stmt->execute([$fullname, $req_dept, $account_id, $contact, $dept_head_fullname, $euser_fullname, $position, $equip_type, $equip_num, $equip_issues, $required_services, $date_sub]);
				$count = $stmt->rowCount();
				if($count > 0){
				echo "added";
				$rowId = $stmt->fetch();
				

				}else{
					echo "not added";
				}
	}
}


	
	public function addAdmin(){
		if(isset($_POST['add'])){

			$account_id = $_POST['account_id'];
			$password = $_POST['password'];

			if($this->check_admin_exist($account_id) == 0){

			$conn = $this->openConnection();
			$stmt = $conn->prepare("INSERT INTO members(account_id, password) VALUES(?,?)");
			$stmt->execute([$account_id,$password]);


			echo "added";
			
			
			}else{
				echo 'user already exist';
			}
		}
	}
	
	
	public function check_admin_exist(){
		if(isset($_POST['add'])){
			$account_id = $_POST['account_id'];
		$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM members WHERE account_id = ?");
		$stmt->execute([$account_id]);
		$count = $stmt->rowCount();
		return $count;
	}
}
	public function check_user_exist(){
		if(isset($_POST['register'])){
			$account_id = $_POST['account_id'];
		$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM members WHERE account_id = ?");
		$stmt->execute([$account_id]);
		$count = $stmt->rowCount();
		return $count;
	}
}

	
	public function logout(){
		if(!isset($_SESSION)){
		session_start();
		}
		$_SESSION['userdata'] = null;
		unset($_SESSION['userdata']);
	}



	public function getPendings(){
		$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM formdata WHERE form_status = :form_status");
		$stmt->execute(['form_status' => 'pending']);
		$pendings = $stmt->fetchAll();
		$count = $stmt->rowCount();
		if($count > 0 ){
			return $pendings;
		}else{
			echo "theres no pending request/s yet";
		}
	}
	public function getApproved(){
		$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM formdata WHERE form_status = :form_status");
		$stmt->execute(['form_status' => 'approved']);
		$approved = $stmt->fetchAll();
		$count = $stmt->rowCount();
		if($count > 0 ){
			return $approved;

		}
	}
	public function getDenied(){
		$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM formdata WHERE form_status = :form_status");
		$stmt->execute(['form_status' => 'denied']);
		$denied = $stmt->fetchAll();
		$count = $stmt->rowCount();
		if($count > 0 ){
			return $denied;
		
		}
	}
	public function getnew_requests(){
		date_default_timezone_set('Asia/Manila');
		$now = date('Y-m-d H:i:s');
		$lastweek = date('Y-m-d H:i:s', strtotime("-7 days"));
		$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM formdata WHERE date_added BETWEEN ? AND ?");
		$stmt->execute([$lastweek,$now]);
		$newrequests = $stmt->fetchAll();
		$count = $stmt->rowCount();
		if($count > 0){
			return $newrequests;
		}
	}

	public function updateStatus(){
		if(isset($_POST['update'])){	
			$id =  $_POST['id'];
			$form_status = $_POST['form_status'];
			$changed_status_by = $_POST['changed_status_by'];
			$conn = $this->openConnection();
			$stmt = $conn->prepare("UPDATE formdata SET changed_status_by = :changed_status_by, form_status = :form_status WHERE id = :id");
 			$stmt->execute(["changed_status_by" => $changed_status_by, "form_status" => $form_status, "id" => $id]);
			$count = $stmt->rowCount();
			if($count > 0){
				"successfully updated";
			}else{
				"error";
			}


		}
	}
	public function redirect(){	
	 	$userdetails = $this->get_userdata();
			if(isset($userdetails)){
				if($userdetails['access'] == 'administrator'){
					header("Location: adminpanel.php");
			}
			if($userdetails['access'] == 'user'){
					header("Location: reqform.php");
			}
		}
	}
	public function sessionAdmin(){
		$session = $this->get_userdata();
		if(isset($session)){
			if($session['access'] != 'administrator'){
				header("Location: login.php");
			}
		}else{
			header("Location: login.php");
		} 
	}










}



$class = new RequestForm();
?>
