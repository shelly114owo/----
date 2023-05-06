<a href = "index.php">回到首頁</a> <p>
<?php
	if(isset($_POST["MyHead"])) {
		$MyHead=$_POST["MyHead"];
	
		$dbhost = '127.0.0.1';
		$dbuser = 'hj';
		$dbpass = 'test1234';
		$dbname = 'testdb';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
		mysqli_query($conn, "SET NAMES 'utf8'");
		mysqli_select_db($conn, $dbname);
		$sql = "SELECT takes_table.course_id ,title ,dept_name ,grade ,category ,now_people ,max_people FROM takes_table INNER JOIN course_table ON takes_table.course_id = course_table.course_id where stud_id LIKE \"".$MyHead."%\"ORDER BY takes_table.course_id;";
		$result = mysqli_query($conn, $sql) or die('MySQL query error');
		$sql_1 = "SELECT stud_id ,stud_name	,dept_name ,tot_cred FROM student_table where stud_id LIKE \"".$MyHead."%\";";
		$result_1 = mysqli_query($conn, $sql_1) or die('MySQL query error');
		if($row_1 = mysqli_fetch_array($result_1)){
			echo "<table>","<thead>","<tr>",$row_1['stud_id']," ",$row_1['stud_name']," ",$row_1['dept_name']," ",$row_1['tot_cred']."<p>";
		}
		while($row = mysqli_fetch_array($result)){
			echo "<table>","<thead>","<tr>",$row['course_id']," ",$row['title']," ",$row['dept_name']," ",$row['grade']," ",$row['category']," ",$row['now_people']," ",$row['max_people']."<p>";
		}
	}
?>

