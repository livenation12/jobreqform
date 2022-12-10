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
//End of Connection Functions//
				public function userInsertData(){
					if (isset($_POST['submit'])) {
				$fullname = $_SESSION['user_name'];	
				$req_dept = $_POST['deptname'];
				$dept_acc_id = $_POST['deptid'];
				$contact = $_POST['contact'];
				// $date_added = date('Y-m-d',strtotime($_POST['date_added']));
					
				$dept_head_fname = $_POST['deptheadfname'];
				$dept_head_midname = $_POST['deptheadmidname'];
				$dept_head_suffix = $_POST['deptheadsuffix'];
				$dept_head_lname = $_POST['deptheadlname'];
				$dept_head_fullname = $dept_head_fname. "". $dept_head_midname. "". $dept_head_lname. "". $dept_head_suffix;

				$euser_fname = $_POST['euserfname'];
				$euser_midname = $_POST['eusermidname'];
				$euser_lname = $_POST['euserlname'];
				$euser_suffix = $_POST['eusersuffix'];
				$euser_fullname = $euser_fname. " ". $euser_midname. " ". $euser_lname. " ". $euser_suffix;
				$status = "pending";

				$position = $_POST['position'];
				$equip_type = $_POST['equip_type'];
				$equip_num = $_POST['equip_number'];
				$equip_issues= implode(',', $_POST['issues']);
				$required_services = implode(',', $_POST['services']);
				$conn = $this->openConnection();
				$stmt = $conn->prepare("INSERT INTO users(user_name, req_dept, dept_acc_id, contact,  dept_head_fullname, euser_fullname, position, equip_type, equip_num, equip_issues, required_services, status)
					VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
				$stmt->execute([$fullname, $req_dept, $dept_acc_id, $contact, $dept_head_fullname, $euser_fullname, $position, $equip_type, $equip_num, $equip_issues, $required_services, $status]);
				if($stmt == TRUE){
				echo "added";
				}else{
				echo "something is wrong";
			}
		}	
	}

	// public function userCredentials(){
	// 	if(isset($_GET['submit'])){
	// 		$fname = $_GET['fname'];
	// 		$midname = $_GET['midname'];
	// 		$lname = $_GET['lname'];
	// 		$suffix = $_GET['suffix'];
	// 		$fullname = $fname. " ". $midname. " ". $lname. " ". $suffix;
	// 		}

	// 	}
	
	public function getUser(){
		if(isset($_GET['submit'])){
			$fname = $_GET['fname'];
			$midname = $_GET['midname'];
			$lname = $_GET['lname'];
			$suffix = $_GET['suffix'];
			$fullname = $fname. " ". $midname. " ". $lname. " ". $suffix;
			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT * FROM users WHERE user_name = :user_name");
	//named parameters	--col-name		--variable
			$stmt->execute(['user_name' => $fullname]);
				//sessioned colname = variable name
				$_SESSION['user_name'] = $fullname;
				if(isset($_SESSION['user_name'])){
				header("Location: reqform.php");

			}else{
			echo "failed";
			}	
		}
	}
	public function backhome(){

	}
	// public function set_userdata($array){
	// 	if(!isset($_SESSION)){
	// 		session_start();
	// 	}
	// 	$_SESSION['userdata'] = 
	// 	return $_SESSION['userdata'];
	// }

	// public function get_userdata(){
	// 	if(!isset($_SESSION)){
	// 		session_start();
	// 	}
	// 	return $_SESSION['userdata'];
	// }




//Admin functions start//
		public function adminLogin(){

			if (isset($_POST['submit'])) {
			$adminname = $_POST['adminname'];
			$account_id = $_POST['account_id'];
			$password = $_POST['password'];


			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT * FROM admin WHERE adminname = ? AND account_id = ? AND password = ?");
			$stmt->execute([$adminname, $account_id, $password]);
			$admin = $stmt->fetch();
			$adminNum = $stmt->rowCount();
		if($adminNum > 0){
				 header("Location: adminpanel.php");
			// session_start();
			// $_SESSION['adminname'] = $admin['adminname'];
			// echo "welcome ". $_SESSION['adminname'];
			// header("Location: adminpanel.php");
		//  		echo "Welcome". $admin['adminname']. $admin['account_id'];	
		//  	if(!isset($_SESSION)){
		// 		session_start();
				$_SESSION['adminname'] = $adminname;
			
			}else{
				echo "Incorrect account_id nor password";
			}
		
		
	}	

}

	public function get_Admin(){
		if(isset($_POST['submit'])){
				$adminname = $_POST['adminname'];
			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT * FROM admin WHERE adminname = ?");
			$stmt->execute([$adminname]);
			$_SESSION['adminname'] = $adminname;
				echo $_SESSION['adminname'];
			}else{
			echo "failed";
			}	
		}
	
			
		
	public function addAdmin(){
		if(isset($_POST['add'])){
			$adminname = $_POST['adminname'];
			$account_id = $_POST['account_id'];
			$password = $_POST['password'];

			if($this->check_admin_exist($adminname) == 0){

			$conn = $this->openConnection();
			$stmt = $conn->prepare("INSERT INTO admin(adminname, account_id, password) VALUES(?,?,?)");
			$stmt->execute([$adminname,$account_id,$password]);
			echo "added";
			
			
			}else{
				echo 'user already exist';
			}
		}
	}
	
	public function check_admin_exist(){
		if(isset($_POST['add'])){
			$adminname = $_POST['adminname'];
		$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM admin WHERE adminname = ?");
		$stmt->execute([$adminname]);
		$count = $stmt->rowCount();
		return $count;
	}
}
	// public function try(){
	// 	if(isset($_POST['try'])){
	// 		$status = $_POST['status'];
	// 		$conn = $this->openConnection();
	// 		$stmt = $conn->prepare("INSERT INTO users(status) VALUES(?)");
	// 		$stmt->execute([$status]);
	// 		$count = $stmt->rowCount();
	// 		if ($count > 0 ) {
	// 			echo "added";
	// 		}
	// 	}
	// }

	// public function set_session($array){
	// 	if(!isset($_SESSION)){
	// 		session_start();
	// 	}
	// 	$_SESSION['admindata'] = array("adminkey" => $array['adminname']. "". $array['account_id']);
	// 	return $_SESSION['admindata'];
	// }
	// public function get_session(){
	// 	if(!isset($_SESSION)){
	// 		session_start();

	// 	}
	// 	return $_SESSION['admindata'];
	// }
	
	// 	public function logout(){
	// $conn = $this->openConnection();
	// if(!isset($_SESSION['variable'])){
	// 	session_start();
		
	// 	}
	// 	$_SESSION['admindata'] = null;
	// 	unset($_SESSION['admindata']);
	// }
	public function getPendings(){
		$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM users WHERE status = :status");
		$stmt->execute(['status' => 'pending']);
		$pendings = $stmt->fetch();
		$count = $stmt->rowCount();
		if($count > 0 ){
			return $pendings;
		}else{
			echo "theres no pending request/s yet";
		}
	}
}



$class = new RequestForm();
?>