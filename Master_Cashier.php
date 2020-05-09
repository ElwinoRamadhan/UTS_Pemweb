<?php 
	class Master_Cashier{
		function __construct(){
			$this->conn = mysqli_connect('localhost', 'root', '', 'db_foodcourt');

			if (mysqli_connect_errno()) {
				echo mysqli_connect_error();
			}
		}

		function getCashier(){
			$data = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE level = '3'");
			while ($row = mysqli_fetch_array($data)) {
				$res = $row;
			}
			return $res;
		}

		function getCashierById($id){
			$data = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE id_user = ".$id);
			while ($row = mysqli_fetch_array($data)) {
				$res = $row;
			}
			return $res;
		}

		function addCashier($name, $username, $password){
			$ins = mysqli_query($this->conn, "INSERT INTO tb_user VALUES(null,'$name', '$username', '".md5($password)."', '3')");
			
			return $ins;
		}

		function updateCashier($id, $name, $username){
			$ed = mysqli_query($this->conn, "UPDATE tb_user SET name = '$name', username = '$username' WHERE id_user = $id");
			return $ed;
		}

		function updateCashierPassword($id, $password){
			$ed = mysqli_query($this->conn, "UPDATE tb_user SET password = '".md5($password)."' WHERE id_user = $id");
			return $ed;
		}

		function deleteCashier($id){
			$del = mysqli_query($this->conn, "DELETE FROM tb_user WHERE id_user = $id");
			return $del;
		}
	}
 ?>