<a href = "index.php">回到首頁</a> <p>
    <style>
        table, th, td, tr{
            border: 1px soild black;
            border-collapse: collapse;
        }
    </style>
<?php
	if(isset($_POST['MyHead'])) {
		$MyHead=$_POST["MyHead"];
	
		$dbhost = '127.0.0.1';
		$dbuser = 'hj';
		$dbpass = 'test1234';
		$dbname = 'testdb';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
		mysqli_query($conn, "SET NAMES 'utf8'");
		mysqli_select_db($conn, $dbname);
		$sql = "SELECT DISTINCT takes_table.course_id ,title ,dept_name ,grade ,category ,now_people ,max_people FROM takes_table INNER JOIN course_table ON takes_table.course_id = course_table.course_id WHERE stud_id NOT IN ('".$MyHead."') ORDER BY course_id;";
		$result = mysqli_query($conn, $sql) or die('MySQL query error');
		echo "<table style='width: 70%' border='1'><tr><th height='30'>加/退選</th><th height='30'>課號</th><th>課程名稱</th><th>開課系所</th><th>年級</th><th>必/選修別</th><th>目前選修人數</th><th>修課人數上限</th><th>開課時段</th></tr>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr>","<td height='30'>","<form name='form1' method='post' action='minus.php'><input type='submit' value='加選' name='MyHead'></form>","</td>","<td height='30'>"," ",$row['course_id'],"</td>","<td height='30'>","	",$row['title'],"</td>","<td height='30'>"," ",$row['dept_name'],"</td>","<td height='30'>"," ",$row['grade'],"</td>","<td height='30'>"," ",$row['category'],"</td>","<td height='30'>"," ",$row['now_people'],"</td>","<td height='30'>"," ",$row['max_people'],"</td>"."<p>";
		}
	}
?>
