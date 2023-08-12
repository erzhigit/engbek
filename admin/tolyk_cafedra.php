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
	<title><?= $oL::get('Еңбектерді растау')?></title>
	<link rel = "stylesheet" type = "text/css" href = "../css/style.css">
	<script type = "text/javascript" src = "../js/jquery.js"></script>
	<script type = "text/javascript" src = "../js/functions.js"></script>
	<style>
		.engbek{
			width: 900px;
			padding: 20px;
			margin: 0 auto;
			margin-bottom: 100px;
			border: black solid 1px;
		}
		.engbek select{
			padding: 5px;
		}
		.engbek	table {
			width: 100%;
			font-size: 14px;
			border: black solid 1px;
		}

		.engbek th td {
			text-align: left;
			padding: 6px;
			border: 0px white solid;
		}
		.to_back:hover{
			background: gray;
		}
		input[type=text],input[type=password],input[type=date]{
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		input[type=number]{
			width: 200px;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		.select_box{
			width: 1000px;
			padding: 20px;
			margin: 0 auto;
			margin-top: 30px;
			margin-bottom: 30px;
			border: 1px black solid;
			background: #ddd;
		}
		.btn {
			  background: #3498db;
			  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
			  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
			  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
			  background-image: -o-linear-gradient(top, #3498db, #2980b9);
			  background-image: linear-gradient(to bottom, #3498db, #2980b9);
			  font-family: Arial;
			  color: #ffffff;
			  font-size: 20px;
			  padding: 10px 20px 10px 20px;
			  text-decoration: none;
			}

			.btn:hover {
			  background: #3cb0fd;
			  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
			  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
			  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
			  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
			  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
			  text-decoration: none;
			}
			.btn:focus {
				background: #3cb0fd;
			}
			select{
				width: 100%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}

			input[type=submit] {
				width: 150px;
				background-color: #003366;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: 1px black solid;
				cursor: pointer;
			}

			input[type=submit]:hover {
				background-color: #000;
			}
			
			.login_form{
				margin: 0 auto;
				margin-top: 100px;
				width: 300px;
				padding: 20px;
				border: 1px black solid;				
			}
			
			.footer{
				margin-top: 100px;
			}
			.works{
				margin: 0 auto;
				width: 1045px;
			}
			.works table {
							border-collapse: collapse;
							border:1px black solid;
							width: 100%;
							font-size: 12px;
						}

						.works th, td {
							text-align: left;
							padding: 6px;
							border:1px black solid;
						}

						.works th {
							background-color: #003366;
							color: white;
						}
	</style>
</head>
<body>
	<div class = "upper_header">
		<? include '../extensions/header.php'; ?>
	</div>	
	<div class = "header">
	<div id = "menu_nav">
        <? include '../extensions/nav.php'; ?>
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
		<div class = "content_wrapper" style = "width: 100%; margin: 0 auto; margin-top: 10px;">
		
			<?php
			
				$_SESSION['tutor'];
				$sql = mysqli_query($connection, "SELECT * FROM tutors WHERE Login = '$_SESSION[tutor]'") or die(mysqli_error($connection));
				$result = mysqli_fetch_array($sql);
				
				
				
				$sql3 = mysqli_query($connection,"SELECT engbekter.engbekID, SUM(engbekter.ball*0.50) AS sum_gylym, engbekter.file_ati, engbekter.sani, cafedras.cafedraNameKZ, cafedras.cafedraNameRU, korsetkishter.korsetkish_ati, cafedras.cafedraID, korsetkishter.typeID
				FROM engbekter
				INNER JOIN cafedras ON cafedras.cafedraID = engbekter.kod_kafedra
				INNER JOIN korsetkishter ON korsetkishter.kod_korsetkish = engbekter.kod_korset
				WHERE kod_kafedra = '$_GET[ID]' AND korsetkishter.typeID = 1") or die(mysqli_error($connection));
				
				$cafedra2 = mysqli_fetch_array($sql3);
				
				$sql4 = mysqli_query($connection,"SELECT engbekter.engbekID, SUM(engbekter.ball*0.35) AS sum_oku, engbekter.file_ati, engbekter.sani, cafedras.cafedraNameKZ, cafedras.cafedraNameRU, korsetkishter.korsetkish_ati, cafedras.cafedraID, korsetkishter.typeID
				FROM engbekter
				INNER JOIN cafedras ON cafedras.cafedraID = engbekter.kod_kafedra
				INNER JOIN korsetkishter ON korsetkishter.kod_korsetkish = engbekter.kod_korset
				WHERE kod_kafedra = '$_GET[ID]' AND korsetkishter.typeID = 2") or die(mysqli_error($connection));
				
				$cafedra3 = mysqli_fetch_array($sql4);
				
				$sql5 = mysqli_query($connection,"SELECT engbekter.engbekID, SUM(engbekter.ball*0.15) AS sum_tarbie, engbekter.file_ati, engbekter.sani, cafedras.cafedraNameKZ, cafedras.cafedraNameRU, korsetkishter.korsetkish_ati, cafedras.cafedraID, korsetkishter.typeID
				FROM engbekter
				INNER JOIN cafedras ON cafedras.cafedraID = engbekter.kod_kafedra
				INNER JOIN korsetkishter ON korsetkishter.kod_korsetkish = engbekter.kod_korset
				WHERE kod_kafedra = '$_GET[ID]' AND korsetkishter.typeID = 3") or die(mysqli_error($connection));
				
				$cafedra4 = mysqli_fetch_array($sql5);
				$a = array($cafedra4['sum_tarbie'],$cafedra2['sum_gylym'],$cafedra3['sum_oku']);
				$univ = array_sum($a);
				$sql2 = mysqli_query($connection,"SELECT engbekter.engbekID, SUM(engbekter.ball) AS sum_val, $univ/cafedras.shtat_sany AS avg_cafedra, cafedras.cafedraNameKZ, cafedras.cafedraNameRU, cafedras.cafedraID, tutors.lastname, tutors.lastnameRu, tutors.TutorID, tutors.firstname, tutors.patronymic, tutors.firstnameRu, tutors.patronymicRu
				FROM cafedras
				INNER JOIN engbekter ON engbekter.kod_kafedra = cafedras.cafedraID
				INNER JOIN tutors ON tutors.TutorID = cafedras.cafedraManager
				WHERE kod_kafedra = '$_GET[ID]'") or die(mysqli_error($connection));
				
				$cafedra = mysqli_fetch_array($sql2);

                $sLastName = $cafedra['lastname'];
                $sFirstName = $cafedra['firstname'];
                $sPatronymic = $cafedra['patronymic'];
                $sCafedra = $cafedra['cafedraNameKZ'];
                if ($_SESSION['lang'] != 'kaz'){
                    $sLastName = isset($cafedra['lastnameRu']) && mb_strlen($cafedra['lastnameRu']) ? $cafedra['lastnameRu'] : $cafedra['lastname'];
                    $sFirstName = isset($cafedra['firstnameRu']) && mb_strlen($cafedra['firstnameRu']) ? $cafedra['firstnameRu'] : $cafedra['firstname'];
                    $sPatronymic = isset($cafedra['patronymicRu']) && mb_strlen($cafedra['patronymicRu']) ? $cafedra['patronymicRu'] : $cafedra['patronymic'];
                    $sCafedra = isset($cafedra['cafedraNameRU']) && mb_strlen($cafedra['cafedraNameRU']) ? $cafedra['cafedraNameRU'] : $cafedra['cafedraNameKZ'];
                }

			?>
			
			<h2 align = "center"><?= $oL::get('Кафедра/ҒЗИ рейтингі жайлы мәліметтер')?></h2>
			
			<div class = "engbek">
				<form action = "confirmation.php" method = "post">
					<table style = "font-size: 19px;">
						<tr>
							<td><span><strong><?= $oL::get('Кафедра/ҒЗИ атауы')?>:</strong></td><td><?php echo $sCafedra; ?></span></td>
						</tr>
						<tr>
							<td><span><strong><?= $oL::get('Кафедра меңгерушісі/ҒЗИ директоры')?>:</strong></td><td><?php echo $sLastName . " " . $sFirstName . " " . $sPatronymic; ?></span></td>
						</tr>						
						<tr>
							<td><hr/></td><td><hr /></td>
						</tr>
						<tr>
							<td><strong><?= $oL::get('Ғылым бағыты')?>:</strong></td><td><?php echo sprintf("%.2f",$cafedra2['sum_gylym']); ?></td>
						</tr>
						<tr>
							<td><strong><?= $oL::get('Академиялық бағыты')?>:</strong></td><td><?php echo sprintf("%.2f",$cafedra3['sum_oku']); ?></td>
						</tr>
						<tr>
							<td><strong><?= $oL::get('Әлеуметтік-мәдени бағыты')?>:</strong></td><td><?php echo sprintf("%.2f",$cafedra4['sum_tarbie']); ?></td>
						</tr>
						<tr>
							<td><hr/></td><td><hr /></td>
						</tr>
						<tr>
							<td><strong><?= $oL::get('Орта балл')?>:</strong></td><td><?php echo sprintf("%.2f",$cafedra['avg_cafedra']); ?></td>
						</tr>
						<tr>
							<td><strong><?= $oL::get('Жалпы балл')?>:</strong></td><td><?php echo sprintf("%.2f",$univ); ?></td>
						</tr>
						<tr>
							<td><hr/></td><td><hr /></td>
						</tr>
					</table>
				</form>
			</div>
			<div class = "works">
					<?php
						
						$sql = "SELECT engbekter.ball, engbekter.engbekID, tutors.firstname, tutors.lastname, tutors.patronymic, tutors.firstnameRu, tutors.lastnameRu, tutors.patronymicRu, korsetkishter.korsetkish_ati, 	engbekter.sani, engbekter.univ_avtor_san, engbekter.file_ati, engbekter.kayt_sebeb, engbekter.eskertu, status.status_name, faculties.FacultyID, status.statusID, cafedras.cafedraNameKZ, faculties.facultyNameKZ,  cafedras.cafedraNameRU, faculties.facultyNameRU,  cafedras.CafedraID, tutors.roleID
						FROM engbekter 
						INNER JOIN cafedras ON cafedras.cafedraID = engbekter.kod_kafedra 
						INNER JOIN tutors ON tutors.TutorID = engbekter.kod_kizm
						INNER JOIN korsetkishter ON korsetkishter.kod_korsetkish = engbekter.kod_korset
						INNER JOIN faculties ON faculties.FacultyID = engbekter.kod_fakul 
						INNER JOIN status ON status.statusID = engbekter.kod_stat 
						WHERE cafedras.CafedraID = '$_GET[ID]' AND tutors.roleID = 4 AND engbekter.univ_avtor_san IS NULL ORDER BY engbekter.engbekID DESC";
						
						$result = mysqli_query($connection,$sql) or die(mysqli_error($connection));
						
						echo "<table><tr><th>№</th><th>".$oL::get('Кафедра/ҒЗИ')."</th><th>".$oL::get('Аты жөні')."</th><th>".$oL::get('Көрсеткіш')."</th><th>".$oL::get('Саны')."</th><th>".$oL::get('Автор саны')."</th><th>".$oL::get('Файл аты')."</th><th>".$oL::get('Балл')."</th><th>".$oL::get('Қайтару себебі')."</th><th>".$oL::get('Статус')."</th></tr>";
						
						$i = 1;
						
						while($row = mysqli_fetch_array($result)){
                            $sLastName = $row['lastname'];
                            $sFirstName = $row['firstname'];
                            $sPatronymic = $row['patronymic'];
                            $sFacult = $row['facultyNameKZ'];
                            $sCafedra = $row['cafedraNameKZ'];
                            if ($_SESSION['lang'] != 'kaz'){
                                $sLastName = isset($row['lastnameRu']) && mb_strlen($row['lastnameRu']) ? $row['lastnameRu'] : $row['lastname'];
                                $sFirstName = isset($row['firstnameRu']) && mb_strlen($row['firstnameRu']) ? $row['firstnameRu'] : $row['firstname'];
                                $sPatronymic = isset($row['patronymicRu']) && mb_strlen($row['patronymicRu']) ? $row['patronymicRu'] : $row['patronymic'];
                                $sFacult = isset($row['facultyNameRU']) && mb_strlen($row['facultyNameRU']) ? $row['facultyNameRU'] : $row['facultyNameKZ'];
                                $sCafedra = isset($row['cafedraNameRU']) && mb_strlen($row['cafedraNameRU']) ? $row['cafedraNameRU'] : $row['cafedraNameKZ'];
                            }
							echo "<tr><td>".$i."</td><td>".$sCafedra."</td><td>".$sLastName." ".$sFirstName."</td><td>".$row["korsetkish_ati"]."</td><td>".$row["sani"]."</td><td>".$row["univ_avtor_san"]."</td><td><a target='_blank' href = " .$row['file_ati'] .">".$row["file_ati"]."</a></td><td>".$row["ball"]."</td><td>".$row["kayt_sebeb"]."</td><td>".$oL::get($row["status_name"])."</td></tr>";
							$i++;
						}
						
						echo "</table>";    	
					?>
			</div>
		</div>
	</div>
	<div class = "footer">
	</div>
</body>
</html>