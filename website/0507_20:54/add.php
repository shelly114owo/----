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

		$sql_1 = "SELECT stud_id ,stud_name	,dept_name ,tot_cred FROM student_table where stud_id LIKE \"".$MyHead."%\";";
		$result_1 = mysqli_query($conn, $sql_1) or die('MySQL query error');
		echo "<table style='width: 30%' border='1'><tr><th height='30'>學號</th><th height='30'>名字</th><th height='30'>部別</th><th height='30'>總學分</th>";
		if($row_1 = mysqli_fetch_array($result_1)){
			echo "<tr>","<td height='30'>",$row_1['stud_id'],"</td>","<td height='30'>"," ",$row_1['stud_name'],"</td>","<td height='30'>"," ",$row_1['dept_name'],"</td>","<td height='30'>"," ",$row_1['tot_cred'],"</td>"."<p>";
		}
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

        $sql_already = "SELECT takes_table.course_id ,title ,dept_name ,grade ,category ,now_people ,max_people FROM takes_table INNER JOIN course_table ON takes_table.course_id = course_table.course_id where stud_id LIKE \"".$MyHead."%\"ORDER BY takes_table.course_id;";
		$result_already = mysqli_query($conn, $sql_already) or die('MySQL query error');
        while($row = mysqli_fetch_array($result_already)){
            if($add_n==$row['title'])
            {
                echo "已有此課程，不能再選";
                break;
            }
        }
    
    }