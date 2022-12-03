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
		public function adminLogin(){

			if (isset($_POST['submit'])) {
			$account_id = $_POST['account_id'];
			$password = $_POST['password'];


			$conn = $this->openConnection();
			$stmt = $conn->prepare("SELECT * FROM admin WHERE account_id = ? AND password = ?");
			$stmt->execute([$account_id, $password]);
			$admin = $stmt->fetch();
			$adminNum = $stmt->rowCount();
			if($adminNum > 0){
				?>
		 	<script>
	 			<?php
			}else{
				echo "Incorrect account_id nor password";
			}
		}
	}	
		public function set_admindata($array){
			if(isset($_SESSION)){
				session_start();

				$_SESSION['admindata'] = array();
			}
		}
		public function userInsertData(){
			if (isset($_POST['submit'])) {
				$req_dept = $_POST['deptname'];
				$dept_acc_id = $_POST['deptid'];
				$contact = $_POST['contact'];
				// $date_sub = $_POST['date_sub'];


				$dept_head_fname = $_POST['deptheadfname'];
				$dept_head_midname = $_POST['deptheadmidname'];
				$dept_head_suffix = $_POST['deptheadsuffix'];
				$dept_head_lname = $_POST['deptheadlname'];
				$dept_head_fullname = $dept_head_fname. $dept_head_midname. $dept_head_lname. $dept_head_suffix;

				$euser_fname = $_POST['euserfname'];
				$euser_midname = $_POST['eusermidname'];
				$euser_lname = $_POST['euserlname'];
				$euser_suffix = $_POST['eusersuffix'];
				$euser_fullname = $euser_fname. " ". $euser_midname. " ". $euser_lname. " ". $euser_suffix;


				$position = $_POST['position'];
				$equip_type = $_POST['equip_type'];
				$equip_num = $_POST['equip_number'];
				$equip_issues= implode(',', $_POST['issues']);
				$required_services = implode(',', $_POST['services']);
				$conn = $this->openConnection();
				$stmt = $conn->prepare("INSERT INTO users(req_dept, dept_acc_id, contact, dept_head_fullname, euser_fullname, position, equip_type, equip_num, equip_issues, required_services)
					VALUES(?,?,?,?,?,?,?,?,?,?)");
				$stmt->execute([$req_dept, $dept_acc_id, $contact, $dept_head_fullname, $euser_fullname,
					 $position, $equip_type, $equip_num, $equip_issues, $required_services]);
				if($stmt == TRUE){
				echo "added";
			}
		}
	}
	// }
	// 	public function set_userdata($array){ 
	// 		if (!isset($_SESSION)) {
	// 			session_start();
	// 		}

	// 			$_SESSION['userdata'] = array(
	// 			"fullname" => $array['firstname']. $array['lastname']. "",
	// 		 	"access" => $array['access']);
	// 			return $_SESSION['userdata'];  
	// 	}

	// 	public function get_userdata(){

	// 		if (!isset($_SESSION)) {
	// 			session_start();
	// 	}
	// 	return $_SESSION['userdata'];
	// }
	}

$class = new RequestForm();