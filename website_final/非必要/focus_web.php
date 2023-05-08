<!-- <a href = "login_new.php">回到首頁</a> <p> -->
<style>
    th{
        /* border-style: ; */
        background-color: lightsteelblue;
    }
</style>
<?php
    

    if(isset($_GET['m'])) {
		$MyHead=$_GET['m'];
        echo "<a href = 'login_new.php?id=$MyHead'>回到首頁</a> <p>";

        $dbhost = '127.0.0.1';
		$dbuser = 'hj';
		$dbpass = 'test1234';
		$dbname = 'testdb';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
		mysqli_query($conn, "SET NAMES 'utf8'");
		mysqli_select_db($conn, $dbname);

        $sql = "SELECT * FROM focus_table where stud_id LIKE \"".$MyHead."%\";";
        $result = mysqli_query($conn, $sql) or die('MySQL query error');

        // echo $MyHead;
        echo "<h3>關注清單</h3>";
        echo "<table style='width: 750px' border='1'><tr><th height='30'>取消關注</th><th height='30'>課號</th><th>課程名稱</th><th>開課系所</th><th>目前選修人數</th><th>修課人數上限</th></tr>";
        
        $num=0;
        $flag=-1;
        while($row = mysqli_fetch_array($result)){
            echo "<tr>","<td height='30'>","<a type='button' href=focus.php?m=$MyHead&n=$num&f=$flag>取消</a>","<td height='30'>"," ",$row['course_id'],"</td>","<td height='30'>","	",$row['title'],"</td>","<td height='30'>"," ",$row['dept_name'],"</td>","</td>","<td height='30'>"," ",$row['now_people'],"</td>","<td height='30'>"," ",$row['max_people'],"</td>"."<p>";
        }
        
    }
?>