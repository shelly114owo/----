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

    </style>
</head>

<body>
	<div class="container">
        <header>
            <h1 style="font-size:28px; text-align: left;">逢甲大學選課系統</h1>
        </header>
		<section class="mt-3 mb-3">
	    <div class="container">
			<ul class="nav nav-tabs mt-3">
				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="tab" href="#alreadychoose">已選課表</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="tab" href="#canchoose">可選課表</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" data-bs-toggle="tab" href="#logout">登出</a>
				</li>
			</ul>

			<div class="tab-content mt-3">
				<div id="alreadychoose" class="tab-pane fade mb-4">
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
				</div>	
			</div>

            <div id="logout" class="tab-pane fade mb-4">
                <form name="form1" method="post" action="check_login.php">
                    <input type="submit" value="登出">
                    <input type="hidden" name="Logout" value="true"/>
                </form>
			</div>				
		</div>
		</section>	
	</div>
</body>
</html>
