<a href = "JavaScript:history.back(-1)">回可選課表</a> <p>
<?php
    if(isset($_GET["m"])) {
        $MyHead=$_GET['m'];
		$index=$_GET['n'];
        $dbhost = '127.0.0.1';
		$dbuser = 'hj';
		$dbpass = 'test1234';
		$dbname = 'testdb';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
		mysqli_query($conn, "SET NAMES 'utf8'");
		mysqli_select_db($conn, $dbname);
		
        //印出加選課表，並添加到line_table用
        $sql = "SELECT DISTINCT course_id ,title ,dept_name ,grade ,category ,now_people ,max_people FROM course_table  WHERE course_id NOT IN (SELECT course_id FROM takes_table WHERE stud_id LIKE \"".$MyHead."%\") ORDER BY course_id;";
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

        //count++
        if(empty($_SESSION['focusid']))
        {
            $_SESSION['focusid'] = 1;
        }
        else
        {
            $_SESSION['focusid']++;
        }

        $sql_check = "SELECT ordernum, stud_id, course_id FROM line_table WHERE course_id LIKE \"".$add."%\";";
        $result_c = mysqli_query($conn, $sql_check) or die('MySQL query error');

        $temp=0;
        while($row1 = mysqli_fetch_array($result_c))
        {
            if($row1['stud_id'] == $MyHead && $row1['course_id'] == $add)
            {
                $temp=1;
                echo "您已在課程 ";
                echo $add;
                echo $add_n;
                echo " 的備取中";
                break;
            }
        }
        if($temp!=1)
        {
            $sql_max = "SELECT max(ordernum) as max FROM line_table WHERE course_id LIKE \"".$add."%\";";
            $result_m = mysqli_query($conn, $sql_max) or die('MySQL query error');
            while($row_m = mysqli_fetch_array($result_m))
            {
                if($row_m['max']!=NULL)
                {   
                    $nowlong = $row_m['max'] + 1;
                    $sql_line = "INSERT INTO line_table VALUES('{$_SESSION['focusid']}', $nowlong, '{$MyHead}', '{$add}','{$add_n}');";
                    mysqli_query($conn, $sql_line);
                }
                else
                {
                    $nowlong = 1;
                    $sql_line = "INSERT INTO line_table VALUES('{$_SESSION['focusid']}', $nowlong, '{$MyHead}', '{$add}','{$add_n}');";
                    mysqli_query($conn, $sql_line);
                }
            }
            echo "課程 ";
            echo $add;
            echo $add_n;
            echo " 人數已額滿","<br>", "自動將您列為備取";
            echo $nowlong;
        }
  
    }

?>