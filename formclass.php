<?php
class MyForm {	
	private $server = "mysql:host=localhost;dbname=requestform";
	private $root = "root";
	private $password = "";
	private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
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
		public function userLogin(){

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
					alert("<?php echo "Welcome". $admin['account_id'];?>");
					window.location.href = "form.php";
				</script>
				<?php
			}else{
				echo "Incorrect account_id nor password";
			}
		}
	}
		// public function set_admindata($array){
		// 	if(isset($_SESSION)){
		// 		session_start();

		// 		$_SESSION['admindata'] = array();
	// 	}
	// }


		public function userData(){
			if (isset($_POST['submit'])) {
				$req_dept = $_POST['deptname'];
				$dept_acc_id = $_POST['deptid'];
				$contact = $_POST['contact'];
				$date_sub = $_POST['date_sub'];
				$dept_head_name = $_POST['deptheadname'];
				$dept_head_sign = $_POST['dept_head_sign'];
				$euser_name = $_POST['eusername'];
				$position = $_POST['position'];
				$equip_type = $_POST['equip_type'];
				$equip_num = $_POST['equip_num'];

				$conn = $this->openConnection();
				$stmt = $conn->prepare("INSERT INTO users(req_dept, dept_acc_id, contact, date_sub, dept_head_name, dept_head_sign, euser_name, position, equip_type, equip_num)
				VALUES(?,?,?,?,?,?,?,?,?,?)");
				$stmt->execute([$req_dept, $dept_acc_id, $contact, $date_sub, $dept_head_name, $dept_head_sign, $euser_name, $position, $equip_type, $equip_num ]);
				if($stmt == TRUE){
					echo "successfully submitted!";
				
			}else{
				echo "something is wrong";
			}
		}
	}
}
?>