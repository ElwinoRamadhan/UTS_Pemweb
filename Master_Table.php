<?php 
	class Master_Table{
		function __construct(){
			$this->conn = mysqli_connect('localhost', 'root', '', 'db_foodcourt');

			if (mysqli_connect_errno()) {
				echo mysqli_connect_error();
			}
		}

		function getTable(){
			$data = mysqli_query($this->conn, "SELECT * FROM tb_table");
			while ($row = mysqli_fetch_array($data)) {
				$res = $row;
			}
			return $res;
		}

		function getTableById($id){
			$data = mysqli_query($this->conn, "SELECT * FROM tb_table WHERE id_table = ".$id);
			while ($row = mysqli_fetch_array($data)) {
				$res = $row;
			}
			return $res;
		}

		function addTable($tableno, $floor){
			$ins = mysqli_query($this->conn, "INSERT INTO tb_table VALUES(null,'$tableno', '$floor')");
			
			return $ins;
		}

		function updateTable($id, $tableno, $floor){
			$ed = mysqli_query($this->conn, "UPDATE tb_table SET table_no = '$tableno', floor = '$floor' WHERE id_table = $id");
			return $ed;
		}

		function deleteTable($id){
			$del = mysqli_query($this->conn, "DELETE FROM tb_table WHERE id_table = $id");
			return $del;
		}
	}
 ?>