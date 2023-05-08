<style>
	table, th, td, tr{
		border: 1px soild black;
		border-collapse: collapse;
	}
    th{
            /* border-style: ; */
            background-color: lightsteelblue;
    }
</style>

<?php
	function myFunction() {
		$student = document.getElementsByName('myHead');
		$dstudent.submit();
	}
	if(isset($_GET["m"])) {
		$MyHead=$_GET["m"];
		echo "<a href = 'login_new.php?id=$MyHead'>回到首頁</a> <p>";
	
		$dbhost = '127.0.0.1';
		$dbuser = 'hj';
		$dbpass = 'test1234';
		$dbname = 'testdb';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
		mysqli_query($conn, "SET NAMES 'utf8'");
		mysqli_select_db($conn, $dbname);
		$sql = "SELECT takes_table.course_id ,title ,dept_name ,takes_table.grade ,category ,now_people ,max_people FROM takes_table INNER JOIN course_table ON takes_table.course_id = course_table.course_id where stud_id LIKE \"".$MyHead."%\"ORDER BY takes_table.course_id;";
		$result = mysqli_query($conn, $sql) or die('MySQL query error');
		$sql_1 = "SELECT stud_id ,stud_name	,dept_name ,tot_cred FROM student_table where stud_id LIKE \"".$MyHead."%\";";
		$result_1 = mysqli_query($conn, $sql_1) or die('MySQL query error');
		echo "<table style='width: 300px' border='1'><tr><th height='30'>學號</th><th height='30'>名字</th><th height='30'>部別</th><th height='30'>總學分</th>";
		if($row_1 = mysqli_fetch_array($result_1)){
			echo "<tr>","<td height='30'>",$row_1['stud_id'],"</td>","<td height='30'>"," ",$row_1['stud_name'],"</td>","<td height='30'>"," ",$row_1['dept_name'],"</td>","<td height='30'>"," ",$row_1['tot_cred'],"</td>"."<p>";
		}
		
		echo "<table style='width: 850px' border='1'><tr><th height='30'>關注</th><th height='30'>退選</th><th height='30'>課號</th><th>課程名稱</th><th>開課系所</th><th>年級</th><th>必/選修別</th><th>目前選修人數</th><th>修課人數上限</th><th>開課時段</th></tr>";

		//印可退選表
		$num=0;
		$flag=0;
		$course[50]=0;
		
		while($row = mysqli_fetch_array($result)){
			//關注用
			$sql_2 = "SELECT * FROM focus_table WHERE stud_id LIKE \"".$MyHead."%\";";
			$result2 = mysqli_query($conn, $sql_2) or die('MySQL query error');
			$temp=0;
			if($row['category'] == "必修")
			{
				while($row2 = mysqli_fetch_array($result2))
				{
					if($row['course_id'] == $row2['course_id'])
					{
						$temp=1;
						echo "<tr>","<td height='30'>","<a type='button' href=focus.php?m=$MyHead&n=$num&f=$flag>	   </a>","</td>","<td height='30'>","<a type='button' href='minus.php?m=$MyHead&n=$num'>	   </a>","</td>","<td height='30'>"," ",$row['course_id'],"</td>","<td height='30'>","	",$row['title'],"</td>","<td height='30'>"," ",$row['dept_name'],"</td>","<td height='30'>"," ",$row['grade'],"</td>","<td height='30'>"," ",$row['category'],"</td>","<td height='30'>"," ",$row['now_people'],"</td>","<td height='30'>"," ",$row['max_people'],"</td>"."<p>";
						break;
					}
				}
				if($temp!=1)
				{
					echo "<tr>","<td height='30'>","<a type='button' href=focus.php?m=$MyHead&n=$num&f=$flag>關注</a>","</td>","<td height='30'>","<a type='button' href='minus.php?m=$MyHead&n=$num'>	   </a>","</td>","<td height='30'>"," ",$row['course_id'],"</td>","<td height='30'>","	",$row['title'],"</td>","<td height='30'>"," ",$row['dept_name'],"</td>","<td height='30'>"," ",$row['grade'],"</td>","<td height='30'>"," ",$row['category'],"</td>","<td height='30'>"," ",$row['now_people'],"</td>","<td height='30'>"," ",$row['max_people'],"</td>"."<p>";
				}
			}
			else
			{
				while($row2 = mysqli_fetch_array($result2))
				{
					if($row['course_id'] == $row2['course_id'])
					{
						$temp=1;
						echo "<tr>","<td height='30'>","<a type='button' href=focus.php?m=$MyHead&n=$num&f=$flag>	   </a>","</td>","<td height='30'>","<a type='button' href='minus.php?m=$MyHead&n=$num'>退選</a>","</td>","<td height='30'>"," ",$row['course_id'],"</td>","<td height='30'>","	",$row['title'],"</td>","<td height='30'>"," ",$row['dept_name'],"</td>","<td height='30'>"," ",$row['grade'],"</td>","<td height='30'>"," ",$row['category'],"</td>","<td height='30'>"," ",$row['now_people'],"</td>","<td height='30'>"," ",$row['max_people'],"</td>"."<p>";
						break;
					}
				}
				if($temp!=1)
				{
					echo "<tr>","<td height='30'>","<a type='button' href=focus.php?m=$MyHead&n=$num&f=$flag>關注</a>","</td>","<td height='30'>","<a type='button' href='minus.php?m=$MyHead&n=$num'>退選</a>","</td>","<td height='30'>"," ",$row['course_id'],"</td>","<td height='30'>","	",$row['title'],"</td>","<td height='30'>"," ",$row['dept_name'],"</td>","<td height='30'>"," ",$row['grade'],"</td>","<td height='30'>"," ",$row['category'],"</td>","<td height='30'>"," ",$row['now_people'],"</td>","<td height='30'>"," ",$row['max_people'],"</td>"."<p>";
				}
			}
			
			
			$num++;
			$sql_2 = "SELECT * FROM time_slot_table INNER JOIN section_table ON time_slot_table.time_slot_id = section_table.time_slot_id WHERE sec_id = ".$row['course_id'].";";
			$result_2 = mysqli_query($conn, $sql_2) or die ('MySQL query error');
			// $row_2 = mysqli_fetch_array($result_2);
			// echo "<td height='30'>"," ",$row_2['time_slot_id'],"</td><p>";
			echo "<td height='30'>";
			while($row_2 = mysqli_fetch_array($result_2)){
				if( $row_2['start_time']==$row_2['end_time'])
				{
					echo $row_2['day'], $row_2['start_time'];
				}
				else
				{
					echo $row_2['day'], $row_2['start_time'],"-",$row_2['end_time'];
				}
			}
			echo "</td><p>";
		}

	}
?>