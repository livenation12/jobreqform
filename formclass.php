<?php
class MyForm {	
	private $server = "mysql:host=localhost;dbname=";
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
				echo "Welcome". $admin['account_id'];
			}else{
				echo "Incorrect account_id nor password";
			}
		}
	}
		public function set_admindata($array){
			if(isset($_SESSION)){
				session_start();

				$_SESSION['admindata'] = array()
		}
	}
}
?>