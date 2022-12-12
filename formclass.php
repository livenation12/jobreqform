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
	//Admin functions start//
// 		public function set_admindata(){
// 		if(!isset($_SESSION)){
// 			session_start();
// 		}
// 		$_SESSION['admindata'] = $_POST['adminname'];
// 		return $_SESSION['admindata'];
// 	}

// 		public function get_admindata(){
// 		if(!isset($_SESSION)){
// 			session_start();

// 		}
// 		if(isset($_SESSION['userdata'])){
// 			return $_SESSION['admindata'];
// 		}else{
		
// 		return null;
// 	}
// }
// 	public function get_adminKey(){
		// if(isset($_SESSION)){
		// $conn = $this->openConnection();
		// $stmt = $conn->prepare("SELECT * FROM admin");
		// $stmt->execute();
		// $adminid = $stmt->fetch();
		// $adminkey = $adminid['adminname']. $adminid['id'];
		// return $adminkey;
		
	// 	}
	// }

	// 	public function getAdmin(){
	// 		if(isset($_POST['submit'])){
	// 		$adminname = $_POST['adminname'];
	// 		$password = $_POST['password'];
	// 		$conn = $this->openConnection();
	// 		$stmt = $conn->prepare("SELECT * FROM admin WHERE adminname = ? AND password = ?");
	// 		$stmt->execute([$adminname, $password]);
	// 		$admin = $stmt->fetch();
	// 		$count = $stmt->rowCount();
	// 		if($count > 0){
	// 			echo "welcome". $admin['adminname'];
	// 			$_SESSION['adminname'] = $adminname;
	// 			// $this->set_admindata($admin); 

	// 		}else{
	// 			return 0;
	// 		}
	// 	}
	// }

		public function adminLogin(){

			if (isset($_POST['submit'])) {
			$adminname = $_POST['adminname'];
			$password = $_POST['password'];

			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT * FROM admin WHERE adminname = ? AND password = ?");
			$stmt->execute([$adminname,$password]);
			$admin = $stmt->fetch();
			$count = $stmt->rowCount();
			if($count > 0 ){
				$_SESSION['adminname'] = $adminname;
				header("Location: adminpanel.php");
					


			}else{
				echo "<center><h2>Incorrect account_id nor password</h2</center>";
		}
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
	
	public function logout(){
		if(!isset($_SESSION)){
		session_start();
		}
		$_SESSION['admindata'] = null;
		unset($_SESSION['admindata']);
	}



	public function getPendings(){
		$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM users WHERE status = :status");
		$stmt->execute(['status' => 'pending']);
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
		$stmt = $conn->prepare("SELECT * FROM users WHERE status = :status");
		$stmt->execute(['status' => 'approved']);
		$approved = $stmt->fetchAll();
		$count = $stmt->rowCount();
		if($count > 0 ){
			return $approved;

		}
	}
	public function getDenied(){
		$conn = $this->openConnection();
		$stmt = $conn->prepare("SELECT * FROM users WHERE status = :status");
		$stmt->execute(['status' => 'denied']);
		$denied = $stmt->fetchAll();
		$count = $stmt->rowCount();
		if($count > 0 ){
			return $denied;
		}else{
			echo "theres no denied request/s yet";
		}
	}

	public function updateStatus(){
		if(isset($_POST['update'])){

			$conn = $this->openConnection();
			$stmt = $conn->prepare("UPDATE users SET status = :status WHERE id = :id");
			$stmt->execute(["status" => $_POST['status'], "id" => $_POST['id']]);
			$count = $stmt->rowCount();
			if($count > 0){
				"successfully altered";
			}else{
				"error";
			}


		}
	}


}




$class = new RequestForm();
?>