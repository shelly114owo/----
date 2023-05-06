<a href = "index.php">回到首頁</a> <p>
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
		while($row = mysqli_fetch_array($result)){
			echo "<table>","<thead>","<tr>","<button type='button' action='action1.php'>加選</button>","<tr>"," ",$row['course_id'],"<tr>","	",$row['title'],"<tr>"," ",$row['dept_name'],"<tr>"," ",$row['grade'],"<tr>"," ",$row['category'],"<tr>"," ",$row['now_people'],"<tr>"," ",$row['max_people']."<p>";
		}
	}
?>
