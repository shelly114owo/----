<?php
	if(isset($_GET['m'])) {
		$MyHead=$_GET['m'];
		$index=$_GET['n'];
		echo "<a href = 'login_new.php?id=$MyHead'>回到首頁</a> <p>";
		echo "<a href = 'action.php?m=$MyHead'>回已選課表</a> <p>";

		$dbhost = '127.0.0.1';
		$dbuser = 'hj';
		$dbpass = 'test1234';
		$dbname = 'testdb';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
		mysqli_query($conn, "SET NAMES 'utf8'");
		mysqli_select_db($conn, $dbname);
		$sql = "SELECT takes_table.course_id ,title ,dept_name ,takes_table.grade ,category ,now_people ,max_people FROM takes_table INNER JOIN course_table ON takes_table.course_id = course_table.course_id where stud_id LIKE \"".$MyHead."%\"ORDER BY takes_table.course_id;";
		$result = mysqli_query($conn, $sql) or die('MySQL query error');
		$num=0;
		$minus='';
		$minus_n='';
		while($row = mysqli_fetch_array($result)){
			if($num==$index)
			{
				$minus=$row['course_id'];
				$minus_n=$row['title'];
				break;
			}
			$num++;
		}

		/*
		$sql_3 = "UPDATE student_table SET tot_cred = tot_cred - (SELECT credits FROM course_table INNER JOIN takes_table ON course_table.course_id = takes_table.course_id WHERE course_table.course_id = ".$minus." AND stud_id LIKE \"".$MyHead."%\") WHERE stud_id LIKE \"".$MyHead."%\";";
		mysqli_query($conn, $sql_3);
		$sql_3 = "UPDATE course_table SET now_people = now_people - 1 WHERE course_id = ".$minus.";";
		mysqli_query($conn, $sql_3);
		$sql_3 = "DELETE FROM takes_table WHERE course_id = ".$minus." AND stud_id LIKE \"".$MyHead."%\";";
		mysqli_query($conn, $sql_3);
		*/

		/*
		//takes_table
		$sql = "SELECT takes_table.course_id ,title ,dept_name ,grade ,category ,now_people ,max_people FROM takes_table INNER JOIN course_table ON takes_table.course_id = course_table.course_id where stud_id LIKE \"".$MyHead."%\"ORDER BY takes_table.course_id;";
		$result = mysqli_query($conn, $sql) or die('MySQL query error');
		echo "<table style='width: 70%' border='1'><tr><th height='30'>加/退選</th><th height='30'>課號</th><th>課程名稱</th><th>開課系所</th><th>年級</th><th>必/選修別</th><th>目前選修人數</th><th>修課人數上限</th><th>開課時段</th></tr>";
		*/
		// my credits
		$sql_totcred = "SELECT tot_cred FROM student_table where stud_id LIKE \"".$MyHead."%\";";
		$result_totcred = mysqli_query($conn, $sql_totcred) or die('MySQL query error');	//check sql
		$totcred = mysqli_fetch_array($result_totcred);	//turn into array
		// course credits
		$sql_coursecred = "SELECT credits FROM course_table INNER JOIN takes_table ON course_table.course_id = takes_table.course_id WHERE course_table.course_id = ".$minus." AND stud_id LIKE \"".$MyHead."%\";";
		$result_coursecred = mysqli_query($conn, $sql_coursecred) or die('MySQL query error');
		$coursecred = mysqli_fetch_array($result_coursecred);
		//echo $coursecred['credits'];
		$newcred = intval($totcred['tot_cred']) - intval($coursecred['credits']);
		// echo $newcred;
		
		while($row = mysqli_fetch_array($result)){
			/*
			if($row['category'] == "必修")
			{
				echo "<tr>","<td height='30'>","<a type='button' href='minus.php?m=$MyHead'>	</a>","</td>","<td height='30'>"," ",$row['course_id'],"</td>","<td height='30'>","	",$row['title'],"</td>","<td height='30'>"," ",$row['dept_name'],"</td>","<td height='30'>"," ",$row['grade'],"</td>","<td height='30'>"," ",$row['category'],"</td>","<td height='30'>"," ",$row['now_people'],"</td>","<td height='30'>"," ",$row['max_people'],"</td>"."<p>";
			}	
			else
			{
				echo "<tr>","<td height='30'>","<a type='button' href='minus.php?m=$MyHead'>退選</a>","</td>","<td height='30'>"," ",$row['course_id'],"</td>","<td height='30'>","	",$row['title'],"</td>","<td height='30'>"," ",$row['dept_name'],"</td>","<td height='30'>"," ",$row['grade'],"</td>","<td height='30'>"," ",$row['category'],"</td>","<td height='30'>"," ",$row['now_people'],"</td>","<td height='30'>"," ",$row['max_people'],"</td>"."<p>";
			}
			*/
			if($newcred < 9)
			{
				echo "<a href=empty.php>加選</a>";
				break;
			}
			else
			{
				//學生退選
				$sql_5 = "UPDATE student_table SET tot_cred = '{$newcred}' WHERE stud_id LIKE \"".$MyHead."%\";";
				mysqli_query($conn, $sql_5);
				//選課表資料刪除
				$sql_3 = "DELETE FROM takes_table WHERE course_id = ".$minus." AND stud_id LIKE \"".$MyHead."%\";";
				mysqli_query($conn, $sql_3);
				
				//確認是否有人排隊
				$sql_line = "SELECT ordernum, stud_id, course_id FROM line_table WHERE course_id = ".$minus.";";
				$result_line = mysqli_query($conn, $sql_line) or die('MySQL query error');
				while($row_l = mysqli_fetch_array($result_line))
				{
					if($row_l["ordernum"]!=NULL)
					{
						$sql_first = "SELECT min(ordernum) as min, stud_id, course_id FROM line_table WHERE course_id = ".$minus.";";
						$result_first = mysqli_query($conn, $sql_first) or die('MySQL query error');
						while($row_fir = mysqli_fetch_array($result_first))
						{
							//加選
							$add_stud = $row_fir["stud_id"];
							$sql_3 = "UPDATE student_table SET tot_cred = '{$newcred}' WHERE stud_id LIKE \"".$add_stud."%\";";
							mysqli_query($conn, $sql_3);
							$sql_3 = "UPDATE course_table SET now_people = now_people + 1 WHERE course_id = ".$minus.";";
							mysqli_query($conn, $sql_3);

							//關注清單加人
							$sql_3 = "UPDATE focus_table SET now_people = now_people + 1 WHERE course_id = ".$minus.";";
							mysqli_query($conn, $sql_3);

							$sql_4 = "INSERT INTO takes_table VALUES('{$add_stud}','{$minus}','{$minus}',2,2023,2);";
							mysqli_query($conn, $sql_4);

							//刪除line中資料
							$sql_3 = "DELETE FROM line_table WHERE course_id = ".$minus." AND stud_id LIKE \"".$add_stud."%\";";
							mysqli_query($conn, $sql_3);
						}
						
						//改變相同課程的人的排序
						$row_l["ordernum"]--;
					}
					else
					{
						//無人排隊
						//退選
						$sql_3 = "UPDATE course_table SET now_people = now_people - 1 WHERE course_id = ".$minus.";";
						mysqli_query($conn, $sql_3);
						//關注清單
						$sql_3 = "UPDATE focus_table SET now_people = now_people - 1 WHERE course_id = ".$minus.";";
						mysqli_query($conn, $sql_3);

						
						break;
					}
				}
				
			}
			/*
			$sql_2 = "SELECT time_slot_id FROM section_table WHERE sec_id = ".$row['course_id'].";";
			$result_2 = mysqli_query($conn, $sql_2) or die('MySQL query error');
			$row_2 = mysqli_fetch_array($result_2);
			echo "<td height='30'>"," ",$row_2['time_slot_id'],"</td><p>";
			*/
		}

		$sql_1 = "SELECT stud_id ,stud_name	,dept_name ,tot_cred FROM student_table where stud_id LIKE \"".$MyHead."%\";";
		$result_1 = mysqli_query($conn, $sql_1) or die('MySQL query error');
		echo "<table style='width: 30%' border='1'><tr><th height='30'>學號</th><th height='30'>名字</th><th height='30'>部別</th><th height='30'>總學分</th>";
		if($row_1 = mysqli_fetch_array($result_1))
		{
			echo "<tr>","<td height='30'>",$row_1['stud_id'],"</td>","<td height='30'>"," ",$row_1['stud_name'],"</td>","<td height='30'>"," ",$row_1['dept_name'],"</td>","<td height='30'>"," ",$row_1['tot_cred'],"</td>"."<p>";
		}
		echo "成功退選: ",$minus,$minus_n;
	}
?>
