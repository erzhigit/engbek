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


	?>

	<title>Еңбектерді растау</title>

	<link rel = "stylesheet" type = "text/css" href = "../css/style.css">

	<script type = "text/javascript" src = "../js/jquery.js"></script>

	<script type = "text/javascript" src = "../js/functions.js"></script>

	<link rel="icon" type="image/png" href="../img/favicon.png" />

	<script>

		$(document).ready(function(){											

			$("#status").change(function(){

				var kod_stat = $("#status option:selected").text();

				$.ajax({

					method:"POST",

					data:{kod_stat:kod_stat},

					dataType:"text",

					success:function(data){

						alert(kod_stat+" статусын таңдадыңыз!!!");

					}

				});

			});

		});

	</script>

	<style>

		.engbek{

			width: 900px;

			padding: 20px;

			margin: 0 auto;

			margin-bottom: 100px;

			border: black solid 1px;

			border-top: 1px black dashed;

		}

		.engbek select{

			padding: 5px;

		}

		table {

			width: 100%;

			font-size: 14px;

		}



		th, td {

			text-align: left;

			padding: 6px;

		}

		to_back:hover{

			background: red;

		}
        .block-td {
			display: block;
		}
	</style>

</head>

<body>

	<div class = "upper_header">

		<img src = "../img/login_logo.png" style = "width: 200px; float:left;">

		<p style = "font-size: 24px; text-align: center; color: #0094de; font-weight: bold;">АХМЕТ ЯСАУИ УНИВЕРСИТЕТІ</p>

		<p style = "font-size: 24px; text-align: center; color: red;font-weight: bold;">ІШКІ КӘСІБИ РЕЙТИНГІ</p>

		<div style = "font-size: 18px; text-align: center; color: #0094de;font-weight: bold;">		

<?php

$result= mysqli_query($connection,"SELECT text_jildar FROM jildar WHERE id_jildar= '1'");

while($row = mysqli_fetch_array($result)){

echo $row['text_jildar'];

 }

?>

</div></br>	</div>	

	<div class = "header">

	<div id = "menu_nav">

		<nav id="primary_nav_wrap">

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

				$sql = mysqli_query($connection,"SELECT * FROM tutors WHERE Login = '$_SESSION[tutor]'") or die(mysqli_error($connection));

				$result = mysqli_fetch_array($sql);

				

				$sql2 = mysqli_query($connection,"SELECT engbekter.engbekID, engbekter.kod_korset, engbekter.file_ati, engbekter.sani, engbekter.univ_avtor_san, engbekter.eskertu, engbekter.ball, tutors.TutorID, tutors.lastname, tutors.firstname, tutors.patronymic, faculties.facultyNameKZ, cafedras.cafedraNameKZ, korsetkishter.korsetkish_ati, status.status_name, kaytaru_sebebi.sebepter

				FROM engbekter

				INNER JOIN tutors ON tutors.TutorID = engbekter.kod_kizm

				INNER JOIN faculties ON faculties.FacultyID = engbekter.kod_fakul

				INNER JOIN cafedras ON cafedras.cafedraID = engbekter.kod_kafedra

				INNER JOIN korsetkishter ON korsetkishter.kod_korsetkish = engbekter.kod_korset

				INNER JOIN status ON status.statusID = engbekter.kod_stat

				INNER JOIN kaytaru_sebebi ON kaytaru_sebebi.kod_kayt_sebeb = engbekter.kod_kayt_sebeb

				WHERE engbekID = '$_GET[ID]'") or die(mysqli_error($connection));

				

				$engbek = mysqli_fetch_array($sql2);

				$showInput = $engbek['kod_korset'];

				function load_status(){

					global $connection;

					$output = '';

					$sql = "SELECT * FROM status";

					$result = mysqli_query($connection,$sql) or die(mysqli_error($connection));

						

					while($row = mysqli_fetch_array($result)){			

						$output .= '<option value = "'.$row["statusID"].'">' . $row["status_name"] . '</option>';				

					}

					return $output;

				}

				

				function load_sebep(){

					global $connection;

					$output = '';

					$sql = "SELECT * FROM kaytaru_sebebi";

					$result = mysqli_query($connection,$sql) or die(mysqli_error($connection));

						

					while($row = mysqli_fetch_array($result)){			

						$output .= '<option value = "'.$row["kod_kayt_sebeb"].'">' . $row["sebepter"] . '</option>';				

					}

					return $output;

				}

				

			?>

			

			<h3 align = "center">Оқытушы: <?php echo " " . $engbek['lastname'] . " ". $engbek['firstname'] . " ". $engbek['patronymic'];?> еңбегін тексеріп, растау</h3>

			

			<div class = "engbek">

				<form action = "confirmation.php" method = "post">

					<table>

						<tr>

							<td><span><strong>Факультет атауы:</strong></td><td><?php echo $engbek['facultyNameKZ']; ?></span></td>

						</tr>

						<tr>

							<td><span><strong>Кафедра атауы:</strong></td><td><?php echo $engbek['cafedraNameKZ']; ?></span></td>

						</tr>

						<tr>

							<td><span><strong>Аты-жөні:</strong></td><td><?php echo $engbek['lastname'] . " " . $engbek['firstname'] . " " . $engbek['patronymic']; ?></span> </td>

						</tr>

						<tr>

							<td><span><strong>Көрсеткіш атауы:</strong></td><td><?php echo $engbek['korsetkish_ati']; ?></span></td>

						</tr>

						<tr>

							<td><span><strong>Еңбегі:</strong></td><td><a target = "_blank" href = "<?php echo $engbek['file_ati']; ?>"><?php echo $engbek['file_ati']; ?></a></span></td>

						</tr>

						<tr>

							<td><span><strong>Еңбек санының түрлері:</strong></td><td><?php echo $engbek['sani']; ?></span> </td>

						</tr>

						<tr>

							<td><span><strong>ХҚТУ авторлар саны (Өзін қоса санағанда):</strong></td><td><?php echo $engbek['univ_avtor_san']; ?></span></td>

						</tr>

						<tr>
							<td>
								<span>
									<strong>Ескерту:</strong>
								</td>
								<td>
									<?php echo $engbek['eskertu']; ?>
								</span>
							</td>
						</tr>
						<tr>

							<td>
								<span>
									<strong>Балл:</strong>
								</td>
								<td>
									<?php echo $engbek['ball']; ?>
								</span>
								</td>
						</tr>
                          
						  <?php
								if ($showInput==54) {
									echo '<tr><td><span><strong>Балл қосу хирша деңгейі 4-тен жоғары болған жайғдайда:</strong></td><td><input type="text" name="myInput"></span></td></tr>';
									
								} else {
									echo '<input type="text" name="myInput" style="display: none;">';
								}
						   ?>
						   <?php
								if ($showInput==16) {
									echo '<tr><td><span><strong>2 автор үшін</strong></td><td>1-ші автор  60% беру үшін 1 саны, ал 2-ші автор 40% үшін 2 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>3 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 2 авторға  30% беру үшін 3 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>4 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 3 авторға  20% беру үшін 5 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>5 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 4 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>6 автор үшін</strong></td><td>1-ші автор  25% беру үшін 7 саны, ал қалған 5 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>7 автор үшін</strong></td><td>1-ші автор  20% беру үшін 8 саны, ал қалған 6 авторға  80% беру үшін 9 саны қойылуы керек</span></td><tr>';
									echo '<tr><td><span><strong>Авторға бал беру  1-9 аралығындағы санмен белгіленеді</strong></td><td><input type="text" name="myInputNum"></span></td></tr>';
									
								}else if ($showInput==17) {
									echo '<tr><td><span><strong>2 автор үшін</strong></td><td>1-ші автор  60% беру үшін 1 саны, ал 2-ші автор 40% үшін 2 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>3 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 2 авторға  30% беру үшін 3 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>4 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 3 авторға  20% беру үшін 5 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>5 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 4 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>6 автор үшін</strong></td><td>1-ші автор  25% беру үшін 7 саны, ал қалған 5 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>7 автор үшін</strong></td><td>1-ші автор  20% беру үшін 8 саны, ал қалған 6 авторға  80% беру үшін 9 саны қойылуы керек</span></td><tr>';
									echo '<tr><td><span><strong>Авторға бал беру  1-9 аралығындағы санмен белгіленеді</strong></td><td><input type="text" name="myInputNum"></span></td></tr>';
									
								}else if ($showInput==18) {
									echo '<tr><td><span><strong>2 автор үшін</strong></td><td>1-ші автор  60% беру үшін 1 саны, ал 2-ші автор 40% үшін 2 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>3 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 2 авторға  30% беру үшін 3 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>4 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 3 авторға  20% беру үшін 5 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>5 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 4 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>6 автор үшін</strong></td><td>1-ші автор  25% беру үшін 7 саны, ал қалған 5 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>7 автор үшін</strong></td><td>1-ші автор  20% беру үшін 8 саны, ал қалған 6 авторға  80% беру үшін 9 саны қойылуы керек</span></td><tr>';
									echo '<tr><td><span><strong>Авторға бал беру  1-9 аралығындағы санмен белгіленеді</strong></td><td><input type="text" name="myInputNum"></span></td></tr>';
									
								}else if ($showInput==19) {
									echo '<tr><td><span><strong>2 автор үшін</strong></td><td>1-ші автор  60% беру үшін 1 саны, ал 2-ші автор 40% үшін 2 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>3 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 2 авторға  30% беру үшін 3 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>4 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 3 авторға  20% беру үшін 5 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>5 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 4 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>6 автор үшін</strong></td><td>1-ші автор  25% беру үшін 7 саны, ал қалған 5 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>7 автор үшін</strong></td><td>1-ші автор  20% беру үшін 8 саны, ал қалған 6 авторға  80% беру үшін 9 саны қойылуы керек</span></td><tr>';
									echo '<tr><td><span><strong>Авторға бал беру  1-9 аралығындағы санмен белгіленеді</strong></td><td><input type="text" name="myInputNum"></span></td></tr>';
									
								}else if ($showInput==20) {
									echo '<tr><td><span><strong>2 автор үшін</strong></td><td>1-ші автор  60% беру үшін 1 саны, ал 2-ші автор 40% үшін 2 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>3 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 2 авторға  30% беру үшін 3 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>4 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 3 авторға  20% беру үшін 5 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>5 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 4 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>6 автор үшін</strong></td><td>1-ші автор  25% беру үшін 7 саны, ал қалған 5 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>7 автор үшін</strong></td><td>1-ші автор  20% беру үшін 8 саны, ал қалған 6 авторға  80% беру үшін 9 саны қойылуы керек</span></td><tr>';
									echo '<tr><td><span><strong>Авторға бал беру  1-9 аралығындағы санмен белгіленеді</strong></td><td><input type="text" name="myInputNum"></span></td></tr>';
									
								}else if ($showInput==21) {
									echo '<tr><td><span><strong>2 автор үшін</strong></td><td>1-ші автор  60% беру үшін 1 саны, ал 2-ші автор 40% үшін 2 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>3 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 2 авторға  30% беру үшін 3 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>4 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 3 авторға  20% беру үшін 5 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>5 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 4 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>6 автор үшін</strong></td><td>1-ші автор  25% беру үшін 7 саны, ал қалған 5 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>7 автор үшін</strong></td><td>1-ші автор  20% беру үшін 8 саны, ал қалған 6 авторға  80% беру үшін 9 саны қойылуы керек</span></td><tr>';
									echo '<tr><td><span><strong>Авторға бал беру  1-9 аралығындағы санмен белгіленеді</strong></td><td><input type="text" name="myInputNum"></span></td></tr>';
									
								}else if ($showInput==22) {
									echo '<tr><td><span><strong>2 автор үшін</strong></td><td>1-ші автор  60% беру үшін 1 саны, ал 2-ші автор 40% үшін 2 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>3 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 2 авторға  30% беру үшін 3 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>4 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 3 авторға  20% беру үшін 5 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>5 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 4 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>6 автор үшін</strong></td><td>1-ші автор  25% беру үшін 7 саны, ал қалған 5 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>7 автор үшін</strong></td><td>1-ші автор  20% беру үшін 8 саны, ал қалған 6 авторға  80% беру үшін 9 саны қойылуы керек</span></td><tr>';
									echo '<tr><td><span><strong>Авторға бал беру  1-9 аралығындағы санмен белгіленеді</strong></td><td><input type="text" name="myInputNum"></span></td></tr>';
									
								}else if ($showInput==23) {
									echo '<tr><td><span><strong>2 автор үшін</strong></td><td>1-ші автор  60% беру үшін 1 саны, ал 2-ші автор 40% үшін 2 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>3 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 2 авторға  30% беру үшін 3 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>4 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 3 авторға  20% беру үшін 5 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>5 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 4 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>6 автор үшін</strong></td><td>1-ші автор  25% беру үшін 7 саны, ал қалған 5 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>7 автор үшін</strong></td><td>1-ші автор  20% беру үшін 8 саны, ал қалған 6 авторға  80% беру үшін 9 саны қойылуы керек</span></td><tr>';
									echo '<tr><td><span><strong>Авторға бал беру  1-9 аралығындағы санмен белгіленеді</strong></td><td><input type="text" name="myInputNum"></span></td></tr>';
									
								}else if ($showInput==24) {
									echo '<tr><td><span><strong>2 автор үшін</strong></td><td>1-ші автор  60% беру үшін 1 саны, ал 2-ші автор 40% үшін 2 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>3 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 2 авторға  30% беру үшін 3 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>4 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 3 авторға  20% беру үшін 5 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>5 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 4 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>6 автор үшін</strong></td><td>1-ші автор  25% беру үшін 7 саны, ал қалған 5 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>7 автор үшін</strong></td><td>1-ші автор  20% беру үшін 8 саны, ал қалған 6 авторға  80% беру үшін 9 саны қойылуы керек</span></td><tr>';
									echo '<tr><td><span><strong>Авторға бал беру  1-9 аралығындағы санмен белгіленеді</strong></td><td><input type="text" name="myInputNum"></span></td></tr>';
									
								}else if ($showInput==25) {
									echo '<tr><td><span><strong>2 автор үшін</strong></td><td>1-ші автор  60% беру үшін 1 саны, ал 2-ші автор 40% үшін 2 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>3 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 2 авторға  30% беру үшін 3 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>4 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 3 авторға  20% беру үшін 5 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>5 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 4 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>6 автор үшін</strong></td><td>1-ші автор  25% беру үшін 7 саны, ал қалған 5 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>7 автор үшін</strong></td><td>1-ші автор  20% беру үшін 8 саны, ал қалған 6 авторға  80% беру үшін 9 саны қойылуы керек</span></td><tr>';
									echo '<tr><td><span><strong>Авторға бал беру  1-9 аралығындағы санмен белгіленеді</strong></td><td><input type="text" name="myInputNum"></span></td></tr>';
									
								}else if ($showInput==26) {
									echo '<tr><td><span><strong>2 автор үшін</strong></td><td>1-ші автор  60% беру үшін 1 саны, ал 2-ші автор 40% үшін 2 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>3 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 2 авторға  30% беру үшін 3 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>4 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 3 авторға  20% беру үшін 5 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>5 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 4 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>6 автор үшін</strong></td><td>1-ші автор  25% беру үшін 7 саны, ал қалған 5 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>7 автор үшін</strong></td><td>1-ші автор  20% беру үшін 8 саны, ал қалған 6 авторға  80% беру үшін 9 саны қойылуы керек</span></td><tr>';
									echo '<tr><td><span><strong>Авторға бал беру  1-9 аралығындағы санмен белгіленеді</strong></td><td><input type="text" name="myInputNum"></span></td></tr>';
									
								}else if ($showInput==27) {
									echo '<tr><td><span><strong>2 автор үшін</strong></td><td>1-ші автор  60% беру үшін 1 саны, ал 2-ші автор 40% үшін 2 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>3 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 2 авторға  30% беру үшін 3 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>4 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 3 авторға  20% беру үшін 5 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>5 автор үшін</strong></td><td>1-ші автор  40% беру үшін 4 саны, ал қалған 4 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>6 автор үшін</strong></td><td>1-ші автор  25% беру үшін 7 саны, ал қалған 5 авторға  15% беру үшін 6 саны қойылуы керек</span></td></tr>';
									echo '<tr><td><span><strong>7 автор үшін</strong></td><td>1-ші автор  20% беру үшін 8 саны, ал қалған 6 авторға  80% беру үшін 9 саны қойылуы керек</span></td><tr>';
									echo '<tr><td><span><strong>Авторға бал беру  1-9 аралығындағы санмен белгіленеді</strong></td><td><input type="text" name="myInputNum"></span></td></tr>';
									
								}else {
									echo '<input type="text" name="myInputNum" style="display: none;">';
								}
						   ?>
			              
						<tr>

							<td><span><strong>Статус:</strong> </span></td><td><select name = "status" id = "status" />

																					<?php echo load_status();?>

																				</select></td>

						</tr>

						<tr>

							<td><span><strong>Қайтару себебі:</strong></span></td><td>	<select name = "kaytaru_sebebi" id = "kaytaru_sebebi" />

																							<?php echo load_sebep();?>

																						</select></td>

						</tr>

						<tr>

							<td><p style = "vertical-align: middle;"><strong>Резолюция:</strong> </p></td><td><textarea cols = 50 rows = 10 name = "resolution" id = "resolution"></textarea></td>

						</tr>

						<input type = "hidden" name = "engbek_id" value = "<?php echo $engbek['engbekID']; ?>" />

						<input type = "hidden" name = "tutor_id" value = "<?php echo $engbek['TutorID']; ?>" />

						<input type = "hidden" name = "sani_simple" value = "<?php echo $engbek['sani']; ?>" />

						<input type = "hidden" name = "univ_avtor_san" value = "<?php echo $engbek['univ_avtor_san']; ?>" />

						<input type = "hidden" name = "tutor_moderator" value = "<?php echo $result['TutorID']; ?>" />
						

						<tr>

                                                        <!--<br>Деректер қоры жабылды! 01.06.2020 00:00<br/>-->

							<td></td><td> <input style = "width: 100px; height: 50px;" type = "submit" name = "confirmed" value = "Растау"> <span> <span><a href = "engbek_tekseru.php" style = "text-decoration: none; color: black;" class = "to_back">Артқа қайту</a></td>

						</tr>

					</table>

				</form>

			</div>

		</div>

	</div>

	<div class = "footer">

	</div>

</body>

</html>