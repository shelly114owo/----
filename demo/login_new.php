<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選課系統</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
		header {
			background-color: #017592;
			padding: 30px;
			text-align: center;
			font-size: 35px;
			color: white;
		}
		section::after {
			content: "";
			display: table;
			clear: both;
		}
        table, th, td, tr{
            border: 1px soild black;
            border-collapse: collapse;
        }
		th{
            /* border-style: ; */
            background-color: lightsteelblue;
        }
    </style>
</head>

<body>
	<div class="container">
        <header>
            <h1 style="font-size:28px; text-align: left;">逢甲大學選課系統</h1>
        </header>
		<section class="mt-3 mb-3">
	    <div class="container">
        <?php 
    if(isset($_GET['id'])) {
        $MyHead=$_GET['id'];
        // echo $MyHead;

        echo "<ul class='nav nav-tabs mt-3'>
                <li class='nav-item'>
                    <a class='nav-link' href='focus_web.php?m=$MyHead'>關注清單</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link' href='action.php?m=$MyHead'>已選課表</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link' href='action1.php?m=$MyHead'>可選課表</a>
				</li>
                <li class='nav-item'>
					<a class='nav-link' href='login.php?m=$MyHead'>課表</a>
				</li>
                <li class='nav-item'>
					<a class='nav-link' data-bs-toggle='tab' href='#logout'>登出</a>
				</li>
			</ul>";
    }    
?>


			<div class="tab-content mt-3">

                <div id="focus" class="tab-pane fade mb-4 show active">
					<p>點擊上方關注清單<br>進入後，會看到以下畫面↓
					<h5>關注清單</h5>
						<table style='width: 70%' border='1'><tr><th height='30'>取消關注</th><th height='30'>課號</th><th>課程名稱</th><th>開課系所</th><th>目前選修人數</th><th>修課人數上限</th>
							<tr><td height='30'><a href="#">取消</a></td><td height='30'>1261</td><td height='30'>資料庫系統</td><td height='30'>資訊系</td><td height='30'>XX</td><td height='30'>XX</td></tr>
						</table>
					</p>
                </div>
                
			<!-- 	<div id="alreadychoose" class="tab-pane fade mb-4">
                    <form name="form1" method="post" action="action.php" >
                        輸入學號 (顯示已選課表)：<input name="MyHead">
                        <input type="submit" value="送出">
                    </form>
				</div>
				<div id="canchoose" class="tab-pane fade mb-4">
                    <form name="form1" method="post" action="action1.php" >
                        輸入學號 (顯示可選課表)：<input name="MyHead">
                        <input type="submit" value="送出">
					</form>
				</div>	 -->
			</div>

            <div id="logout" class="tab-pane fade mb-4">
                <form name="form1" method="post" action="index.php">
                    <input type="submit" value="登出">
                    <input type="hidden" name="Logout" value="true"/>
                </form>
			</div>				
		</div>
		</section>	
	</div>
</body>
</html>
