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
					<a class="nav-link active" data-bs-toggle="tab" href="#introduction">首頁</a>
				</li>
				<!--
				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="tab" href="#alreadychoose">已選課表</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="tab" href="#canchoose">可選課表</a>
				</li>
				-->
				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="tab" href="#studlogin">登入</a>
				</li>
			</ul>

			<div class="tab-content mt-3">
				<div id="introduction" class="tab-pane fade mb-4 show active">
					<h3>公告事項</h3>
					<p>
					<div class="container mt-1 p-4 bg-primary text-white rounded bg-secondary navbar-dark">
						<p>
							<h1>[ 財務處公告 ]</h1><h5>聯絡分機2058</h5>
							<h3>1、延修生採二階段式收費，111學年度第二學期第一階段之雜費敬請112年2月6日繳費截止日前繳費，第二階段之學分費俟112年2月21日加選截止日（學分費核算基準日）後，另行通知補繳（體育及軍訓課程按每週上課時數收取2個學分費），延修生若於加選截止日（學分費核算基準日）之「學分總數」達10（含）學分者，須繳交原系所全額學雜費。</h3>
							<h3>2、延修生、進修學士班學生或採學分費核算者，111學年度第二學期實際學分費依112年2月21日加選截止日之選課學分數核算，未於加選截止日前辦理退選者，該科目學分費不予退費（未繳費者仍須補繳學分費），俟加退選後另行通知補繳或退費。</h3>
						</p>
						<p>
							<h1>[ 資訊總處公告 ]</h1><h5>聯絡分機2712</h5>
							<h3>配合本校NID密碼設定原則，長度至少應為12碼以上，即日起請大家進行密碼檢核，若您無法登入系統，請重新啟用帳號，確保系統使用安全性。相關網址如https://netid.fcu.edu.tw/Apps/step1.aspx</h3>
						</p>
					</div>
					</p>
				</div>
				<!--
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
				-->
				<div id="studlogin" class="tab-pane fade mb-4">
					<form name="form1" method="post" action="check_login.php">
					StudentID：<input type="test" name="student_id">
					<br><br>
					Password：<input type="password" name="student_pwd"  placeholder="student_id">
					<input type="submit" value="送出">
					</form>
				</div>				
			</div>
		</div>
		</section>	
	</div>
</body>
</html>




