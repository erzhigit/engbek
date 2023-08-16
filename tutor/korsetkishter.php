<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
	<?php
		session_start();
		$_SESSION['tutor'];
		include('../incs/connect.php');
		
		if(!isset($_SESSION['tutor'])){
			header('Location: ../login.php');
		}
		//$query = mysql_query("SELECT * FROM users WHERE username = '$_SESSION[user]'") or die(mysql_error());
		//$main_me = mysql_fetch_array($query);
	?>
	<title><?= $oL::get('Көрсеткіштер')?></title>
	<link rel = "stylesheet" type = "text/css" href = "../css/style.css">
	<script type = "text/javascript" src = "../js/jquery.js"></script>
	<script type = "text/javascript" src = "../js/functions.js"></script>
	<link rel="icon" type="image/png" href="../img/favicon.png" />
	<style>
		.shagymTable{
			margin: 0 auto;
			width: 1000px;
		}
		table {
			border-collapse: collapse;
			border:1px black solid;
			width: 100%;
			font-size: 12px;
		}

		th, td {
			text-align: left;
			padding: 6px;
			border:1px black solid;
		}

		tr:nth-child(even){background-color: #f2f2f2}

		th {
			background-color: #003366;
			color: white;
		}
	</style>
</head>
<body>
	<div class = "upper_header">
        <? include '../extensions/header.php'?>
    </div>
	<div class = "header">
	<div id = "menu_nav">
        <? include '../extensions/nav.php'?>
		<nav id="primary_nav_wrap" style="display: none">
			<ul>
			  <li><a href="index.php">Негізгі</a>
				<ul>
				  <li><a href="index.php">Негізгі бет</a></li>				  
				</ul>
			  </li>
			  
			  <li><a href="#">Орындау</a>
				<ul>
				  <li><a href="engbek_jukteu.php">ОПҚ/ҒҚ</a></li>
				</ul>
			  </li>
			  <li><a href="#">Басқа</a>
				<ul>
				  <li><a href="baska_okitushyny_koru.php">ОПҚ/ҒҚ</a></li>
				</ul>
			  </li>
			  
			  <li><a href="#">Сенім жәшігі</a>
				<ul>
				  <li><a href="shagym_tusiru.php">Шағым түсіру</a></li>
				  <li><a href="shagymdar.php">Шағымдарды көру</a></li>
				</ul>
			  </li>
			  <li><a href="../logout.php">Шығу</a></li>
			</ul>
		</nav>
	</div>
	</div>
	<div class = "content">
		<div class = "content_wrapper" style = "width: 100%; margin: 0 auto; margin-top: 5px;">
		
			<?php
			
				$_SESSION['tutor'];
				
			?>
			<div class = "shagymTable">
				<h2 align = "center"><?= $oL::get('Көрсеткіштер')?></h2>
				<table>
					<tr>
						<th>№</th><th><?= $oL::get('Көрсеткіш атауы')?></th><th><?= $oL::get('Өлшемі')?></th><th><?= $oL::get('Балы')?></th>
					</tr>
					<?php
						
						$query = mysqli_query($connection,"SELECT * FROM korsetkishter WHERE bolimderID = '1'") or die(mysqli_error($connection));
						while($korsetkish = mysqli_fetch_array($query)){
							echo "<tr><td>" . $korsetkish['kod_korsetkish'] ."</td><td>".$korsetkish['korsetkish_ati']."</td><td>".$oL::get($korsetkish['olshem'])."</td><td>" . $korsetkish['ball'] . "</td></tr>";
						}
					?>
				</table>
			</div>
		</div>
	</div>
	</br>
</body>
</html>