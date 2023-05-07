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
        
        $sql_already = "SELECT takes_table.course_id ,title ,dept_name ,grade ,category ,now_people ,max_people FROM takes_table INNER JOIN course_table ON takes_table.course_id = course_table.course_id where stud_id LIKE \"".$MyHead."%\"ORDER BY takes_table.course_id;";
		$result_already = mysqli_query($conn, $sql_already) or die('MySQL query error');
        while($row = mysqli_fetch_array($result_already)){
            if($add_n==$row['title'])
            {
                echo "已有此課程，不能再選";
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
?>