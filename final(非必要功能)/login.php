<a href = "login_new.php">回到首頁</a> <p>
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
		$dbname = 'new';
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
		/*	$course = [15][8];
			for($k = 0;$k < 98;$k++) {
				$course[$k] = " ";
			}
		*/	    for ($i=1; $i<=14; $i++) {
					for ($j=1; $j<=7; $j++) {   
						$course[$i][$j] = " ";
					}
				}
			while($row = mysqli_fetch_array($result)){
				$sql_time = "SELECT day,start_time,end_time FROM section_table INNER JOIN time_slot_table ON section_table.time_slot_id = time_slot_table.time_slot_id WHERE course_id LIKE \"".$row['course_id']."%\";";
				$result_time = mysqli_query($conn, $sql_time) or die('MySQL query error');
				//$row_time = mysqli_fetch_array($result_time);
				$i = 0;
				while($row_time = mysqli_fetch_array($result_time)){
					$day[$i] = $row_time['day'];
					$begin[$i] = $row_time['start_time'];
					$finish[$i] = $row_time['end_time'];	
					$i++;
				}$count = $i;
				$i = 0;
				while($i < $count) {
						if($day[$i]=="(一)") {
							for ($j=$begin[$i]; $j<=$finish[$i]; $j++) {   
								if($course[$j][1] != " ")
									$course[$j][1] = $course[$j][1]." ".$row['course_id'];
								else
									$course[$j][1] = $row['course_id'];
							}
						}
						else if($day[$i]=="(二)") {
							for ($j=$begin[$i]; $j<=$finish[$i]; $j++) {   
								if($course[$j][2] != " ")
									$course[$j][2] = $course[$j][2]." ".$row['course_id'];
								else
									$course[$j][2] = $row['course_id'];
							}
						}
						else if($day[$i]=="(三)") {
							for ($j=$begin[$i]; $j<=$finish[$i]; $j++) {   
								if($course[$j][3] != " ")
									$course[$j][3] = $course[$j][3]." ".$row['course_id'];
								else
									$course[$j][3] = $row['course_id'];
							}
						}
						else if($day[$i]=="(四)") {
							for ($j=$begin[$i]; $j<=$finish[$i]; $j++) {   
								if($course[$j][4] != " ")
									$course[$j][4] = $course[$j][4]."<br>".$row['course_id'];
								else
									$course[$j][4] = $row['course_id'];
							}
						}
						else if($day[$i]=="(五)") {
							for ($j=$begin[$i]; $j<=$finish[$i]; $j++) {   
								if($course[$j][5] != " ")
									$course[$j][5] = $course[$j][5]." ".$row['course_id'];
								else
									$course[$j][5] = $row['course_id'];
							}
						}
						else if($day[$i]=="(六)") {
							for ($j=$begin[$i]; $j<=$finish[$i]; $j++) {   
								if($course[$j][6] != " ")
									$course[$j][6] = $course[$j][6]." ".$row['course_id'];
								else
									$course[$j][6] = $row['course_id'];
							}
						}
						else if($day[$i]=="(日)") {
							for ($j=$begin[$i]; $j<=$finish[$i]; $j++) {   
								if($course[$j][7] != " ")
									$course[$j][7] = $course[$j][7]." ".$row['course_id'];
								else
									$course[$j][7] = $row['course_id'];
							}
						}
					$i++;
				}
				
				
			/*	$temp = (int)$row_time['time'];
				$count = 0;
				while($temp > 0) {
					$i = $temp%100;
					if($i == 0)	break;
					$course[$i/7][$i%7] = $row['course_id'];
					$temp = $temp/100;
				}*/
			}
	
	$k = 1;
	echo "<table style='width: 400px' border='1'><tr><th height='30'>節數\星期</th><th height='30'>一</th><th height='30'>二</th><th height='30'>三</th><th height='30'>四</th><th height='30'>五</th><th height='30'>六</th><th height='30'>日</th>";
    for ($i=1; $i<=14; $i++) {
        echo "<tr>";
        for ($j=1; $j<=7; $j++) {   
			if($j==1) {
				echo "<td height='30'>$i</td>";
				if($course[$i][$j] == " ") 
					echo "<td height='30'>	</td>";
				else
					echo "<td height='30'>".$course[$i][$j]."</td>";				
			}
			else {
				if(empty($course[$i][$j])) 
					echo "<td height='30'>	</td>";
				else
					echo "<td height='30'>".$course[$i][$j]."</td>";				
			}
			$k++;
           }
        echo "</tr>";
    }
	}	
?>

