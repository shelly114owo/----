<a href = "index.php">回到首頁</a> <p>
    <style>
        th{
            /* border-style: ; */
            background-color: lightsteelblue;
        }
    </style>

<?php
	if(isset($_POST['student_id'])) {
		$MyHead=$_POST["student_id"];
	
		$dbhost = '127.0.0.1';
		$dbuser = 'hj';
		$dbpass = 'test1234';
		$dbname = 'testdb';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
		mysqli_query($conn, "SET NAMES 'utf8'");
		mysqli_select_db($conn, $dbname);
		$sql = "SELECT takes_table.course_id FROM takes_table INNER JOIN course_table ON takes_table.course_id = course_table.course_id where stud_id LIKE \"".$MyHead."%\"ORDER BY takes_table.course_id;";
		$result = mysqli_query($conn, $sql) or die('MySQL query error');
		$sql_1 = "SELECT stud_id ,stud_name	,dept_name ,tot_cred FROM student_table where stud_id LIKE \"".$MyHead."%\";";
		$result_1 = mysqli_query($conn, $sql_1) or die('MySQL query error');
		echo "<table style='width: 350px' border='1'><tr><th height='30'>學號</th><th height='30'>名字</th><th height='30'>部別</th><th height='30'>總學分</th>";
		if($row_1 = mysqli_fetch_array($result_1)){
			echo "<tr>","<td height='30'>",$row_1['stud_id'],"</td>","<td height='30'>"," ",$row_1['stud_name'],"</td>","<td height='30'>"," ",$row_1['dept_name'],"</td>","<td height='30'>"," ",$row_1['tot_cred'],"</td>"."</table><p>";
		}
			$course = [];
			for($k = 0;$k < 98;$k++) {
				$course[$k] = " ";
			}
			while($row = mysqli_fetch_array($result)){
				$sql_time = "SELECT time FROM section_table INNER JOIN time_slot_table ON section_table.time_slot_id = time_slot_table.time_slot_id WHERE course_id LIKE \"".$row['course_id']."%\";";
				$result_time = mysqli_query($conn, $sql_time) or die('MySQL query error');
				$row_time = mysqli_fetch_array($result_time);
				
				$sql_2 = "SELECT sec_id, time FROM section_table INNER JOIN time_slot_table ON section_table.time_slot_id = time_slot_table.time_slot_id WHERE sec_id = ".$row['course_id'].";";
				$result_2 = mysqli_query($conn, $sql_2) or die('MySQL query error');
				$row_2 = mysqli_fetch_array($result_2);
				$temp = (int)$row_2['time'];
				while($temp > 0) {
					$i = $temp%100;
					if($i == 0)	break;
					$course[$i] = $row['course_id'];
					$temp = $temp/100;
				}
			}
	
	$k = 1;
	echo "<table style='width: 400px' border='1'><tr><th height='30'>節數\星期</th><th height='30'>一</th><th height='30'>二</th><th height='30'>三</th><th height='30'>四</th><th height='30'>五</th><th height='30'>六</th><th height='30'>日</th>";
    for ($i=1; $i<=14; $i++) {      
        echo "<tr>";
        for ($j=1; $j<=7; $j++) {   
			if($j==1) {
				echo "<td height='30'>$i</td>";
				if($course[$k] == " ") 
					echo "<td height='30'>	</td>";
				else
					echo "<td height='30'>$course[$k]</td>";				
			}
			else {
				if(empty($course[$k])) 
					echo "<td height='30'>	</td>";
				else
					echo "<td height='30'>$course[$k]</td>";				
			}
			$k++;
           }
        echo "</tr>";
    }
	}	
?>

