<?php
    session_start();

	if(isset($_GET['m'])) {
		$MyHead=$_GET['m'];
		$index=$_GET['n'];
        $flag=$_GET['f'];
		echo "<a href = 'login_new.php?id=$MyHead'>回到首頁</a> <p>";
        echo "<a href = 'focus_web.php?m=$MyHead'>回關注清單</a> <p>";
    
		$dbhost = '127.0.0.1';
		$dbuser = 'hj';
		$dbpass = 'test1234';
		$dbname = 'testdb';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
		mysqli_query($conn, "SET NAMES 'utf8'");
		mysqli_select_db($conn, $dbname);

        if($flag==0)
        {
            //$sql = "SELECT takes_table.course_id ,title ,dept_name ,takes_table.grade ,category ,now_people ,max_people FROM takes_table INNER JOIN course_table ON takes_table.course_id = course_table.course_id where stud_id LIKE \"".$MyHead."%\"ORDER BY takes_table.course_id;";
		    $sql = "SELECT takes_table.course_id, title, dept_name, now_people, max_people FROM takes_table INNER JOIN course_table ON takes_table.course_id = course_table.course_id where stud_id LIKE \"".$MyHead."%\"ORDER BY takes_table.course_id;";
            $result = mysqli_query($conn, $sql) or die('MySQL query error');
        }
        elseif($flag==1)
        {
            $sql = "SELECT course_id, title, dept_name, now_people, max_people FROM course_table WHERE course_id NOT IN (SELECT course_id FROM takes_table WHERE stud_id LIKE \"".$MyHead."%\") ORDER BY course_id;";
            $result = mysqli_query($conn, $sql) or die('MySQL query error');
        }
        elseif($flag==-1)
        {
            $sql = "SELECT * FROM focus_table WHERE stud_id LIKE \"".$MyHead."%\";";
            $result = mysqli_query($conn, $sql) or die('MySQL query error');
        }
        
        $num=0;
		$add_or_minus='';
        $add_or_minus_t='';
        $add_or_minus_d='';
        $add_or_minus_nowp='';
        $add_or_minus_maxp='';
		while($row = mysqli_fetch_array($result)){
			if($num==$index)
			{
				$add_or_minus=$row['course_id'];
                $add_or_minus_t=$row['title'];
                $add_or_minus_d=$row['dept_name'];
                $add_or_minus_nowp=$row['now_people'];
                $add_or_minus_maxp=$row['max_people'];
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

        if($flag<0)
        {
            echo "已取消關注: ",$add_or_minus;
            echo $add_or_minus_t;
            $sql_1 = "DELETE FROM focus_table WHERE course_id = ".$add_or_minus." AND stud_id LIKE \"".$MyHead."%\";";
			mysqli_query($conn, $sql_1);
        }
        else
        {
            echo "已關注: ",$add_or_minus;
            echo $add_or_minus_t;
            $sql_focus = "INSERT INTO focus_table VALUES('{$_SESSION['focusid']}','{$MyHead}','{$add_or_minus}','{$add_or_minus_t}','{$add_or_minus_d}',{$add_or_minus_nowp},{$add_or_minus_maxp});";
            mysqli_query($conn, $sql_focus);
        }
        

    }


?>