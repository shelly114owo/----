<a href = "index.php">回到首頁</a> <p>
<a href = "JavaScript:history.back(-1)">回到上一頁</a> <p>
<?php
	if(isset($_GET['m'])) {
		$MyHead=$_GET['m'];
		$index=$_GET['n'];

		$dbhost = '127.0.0.1';
		$dbuser = 'hj';
		$dbpass = 'test1234';
		$dbname = 'testdb';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
		mysqli_query($conn, "SET NAMES 'utf8'");
		mysqli_select_db($conn, $dbname);
		//印出沒選到的課程
        $sql = "SELECT DISTINCT takes_table.course_id ,title ,dept_name ,grade ,category ,now_people ,max_people FROM takes_table INNER JOIN course_table ON takes_table.course_id = course_table.course_id WHERE stud_id NOT IN ('".$MyHead."') ORDER BY course_id;";
		$result = mysqli_query($conn, $sql) or die('MySQL query error');

        $num=0;
		$add='';
        $add_n='';
		while($row = mysqli_fetch_array($result)){
			if($num==$index)
			{
				$add=$row['course_id'];
                $add_n=$row['title'];
				break;
			}
			$num++;
		}
        echo $add;

		//取得個人以選課程:takes_table
		$sql_already = "SELECT takes_table.course_id ,title ,dept_name ,grade ,category ,now_people ,max_people FROM takes_table INNER JOIN course_table ON takes_table.course_id = course_table.course_id where stud_id LIKE \"".$MyHead."%\"ORDER BY takes_table.course_id;";
		$result_already = mysqli_query($conn, $sql_already) or die('MySQL query error');
		// my credits
		$sql_totcred = "SELECT tot_cred FROM student_table where stud_id LIKE \"".$MyHead."%\";";
		$result_totcred = mysqli_query($conn, $sql_totcred) or die('MySQL query error');	//check sql
		$totcred = mysqli_fetch_array($result_totcred);	//turn into array
		// course credits
		$sql_coursecred = "SELECT credits FROM course_table INNER JOIN takes_table ON course_table.course_id = takes_table.course_id WHERE course_table.course_id = ".$add." AND stud_id LIKE \"".$MyHead."%\";";
		$result_coursecred = mysqli_query($conn, $sql_coursecred) or die('MySQL query error');
		$coursecred = mysqli_fetch_array($result_coursecred);
		//echo $coursecred['credits'];
		$newcred = intval($totcred['tot_cred']) + intval($coursecred['credits']);
		echo $newcred;

		while($row = mysqli_fetch_array($result_already)){
            if($add_n==$row['title'])
            {
				//echo "alr";
                echo "已有此課程，不能再選";
                break;
            }
			elseif($newcred > 30)
			{
				echo "超過30學分，不能再加選";
                break;
			}
			else
			{
				echo "h";
				$sql_3 = "UPDATE student_table SET tot_cred = '{$newcred}' WHERE stud_id LIKE \"".$MyHead."%\";";
				mysqli_query($conn, $sql_3);
				$sql_3 = "UPDATE course_table SET now_people = now_people + 1 WHERE course_id = ".$add.";";
				mysqli_query($conn, $sql_3);
				/*
				$sql_semmer = "SELECT semester FROM teaches_table WHERE course_table.course_id = ".$add.";";
				$result_sql_semmer = mysqli_query($conn, $sql_semmer) or die('MySQL query error');
				$sql_year = "SELECT year FROM teaches_table WHERE course_table.course_id = ".$add.";";
				$result_sql_year = mysqli_query($conn, $sql_year) or die('MySQL query error');
				*/
				$sql_3 = "INSERT INTO takes_table VALUES('{$MyHead}','{$add}','{$add}',2,2023,2);";
				mysqli_query($conn, $sql_3);
				break;
			}
			
        }
		
		// add 的 time_slot_id
        $time[5]='';
        $num=0;
        $sql_time = "SELECT time_slot_id FROM section_table WHERE course_id LIKE \"".$add."%\";";
        $result_time = mysqli_query($conn, $sql_time) or die('MySQL query error');
        while($row = mysqli_fetch_array($result_time)){
            $time[$num]=$row['time_slot_id'];
            $num++;
        }

         
        //add 的 day start end time
        $start_time[5]='';
        $end_time[5]='';
        $day[5]='';

        for($i=0;$i<$num;$i++)
        {
            $sql_timeSE = "SELECT * FROM time_slot_table WHERE time_slot_id LIKE \"".$time[$i]."%\";";
            $result_timeSE = mysqli_query($conn, $sql_timeSE) or die('MySQL query error');
            while($row = mysqli_fetch_array($result_timeSE)){
                $day[$i]=$row['day'];
                $start_time[$i]=$row['start_time'];
                $end_time[$i]=$row['end_time'];
                break;
            }
        }
        
        $def=0;
        $sql_alreadyT = "SELECT time_slot_table.day, start_time, end_time FROM takes_table INNER JOIN section_table ON takes_table.sec_id = section_table.sec_id INNER JOIN time_slot_table ON time_slot_table.time_slot_id = section_table.time_slot_id where stud_id LIKE \"".$MyHead."%\"ORDER BY takes_table.course_id;";
        $result_alreadyT = mysqli_query($conn, $sql_alreadyT) or die('MySQL query error');
        for($i=0;$i<$num;$i++)
        {
            while($row = mysqli_fetch_array($result_alreadyT))
            {
                if($row['day']==$day[$i])
                {
                    if($row['start_time']<=$start_time[$i] && $row['end_time']>=$start_time[$i])
                    {
                        echo "衝堂!!";
                        $def=1;
                        break;
                    }
                    else if($row['start_time']<=$end_time[$i] && $row['end_time']>=$end_time[$i])
                    {
                        echo "衝堂!!";
                        $def=1;
                        break;
                    }
                }
            }
            if($def==1) break;
        }



		$sql_1 = "SELECT stud_id ,stud_name	,dept_name ,tot_cred FROM student_table where stud_id LIKE \"".$MyHead."%\";";
		$result_1 = mysqli_query($conn, $sql_1) or die('MySQL query error');
		echo "<table style='width: 30%' border='1'><tr><th height='30'>學號</th><th height='30'>名字</th><th height='30'>部別</th><th height='30'>總學分</th>";
		if($row_1 = mysqli_fetch_array($result_1)){
			echo "<tr>","<td height='30'>",$row_1['stud_id'],"</td>","<td height='30'>"," ",$row_1['stud_name'],"</td>","<td height='30'>"," ",$row_1['dept_name'],"</td>","<td height='30'>"," ",$row_1['tot_cred'],"</td>"."<p>";
		}
		
    
    }