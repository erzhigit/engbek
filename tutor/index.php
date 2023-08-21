<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
	<?php
		include('../incs/connect.php');
		
		session_start();
		$_SESSION['tutor'];							
		$_SESSION['lang'];
		if(!isset($_SESSION['tutor'])){
			header('Location: ../login.php');
		}
	?>
	<title><?= $oL::get('Басты бет')?></title>
	<link rel = "stylesheet" type = "text/css" href = "../css/style.css">
	<link rel = "stylesheet" type = "text/css" href = "../css/tutorStyle.css">
	<script type = "text/javascript" src = "../js/jquery.js"></script>
    <script type="text/javascript">
        /* <![CDATA[ */
        /* Locale for JS */
        <? require_once '../locale/jslocale.php'; ?>

        /* ]]> */
    </script>
	<script type = "text/javascript" src = "../js/functions.js"></script>
	<script type = "text/javascript" src = "../chartjs/js/chart.min.js"></script>
	<script type = "text/javascript" src = "../chartjs/js/jquery.min.js"></script>
	<script type = "text/javascript" src = "../chartjs/js/app.js"></script>
	<link rel="icon" type="image/png" href="../img/favicon.png" />
</head>
<body>
	<div class = "upper_header">
        <?include '../extensions/header.php'?>
	</div><br />
	<div class = "header">	
	<div id = "menu_nav">
		<?php include '../extensions/nav.php'; ?>
	</div>
	</div>
	<div class = "content">
		<div class = "content_wrapper" style = "margin-top: 5px;">					
			<?php
			/*	
				if(isset($_SESSION['tutor'])){
				
				} else {
				
					header('Location: ../login.php');
				}
			*/
				$_SESSION['tutor'];
				$query = mysqli_query($connection,"SELECT * FROM tutors WHERE Login = '$_SESSION[tutor]'") or die(mysqli_error($connection));
				$tut = mysqli_fetch_array($query);
				$sLastName = $tut['lastname'];
				$sFirstName = $tut['firstname'];
				$sPatronymic = $tut['patronymic'];
				if ($_SESSION['lang'] != 'kaz'){
                    $sLastName = isset($tut['lastnameRu']) && mb_strlen($tut['lastnameRu']) ? $tut['lastnameRu'] : $tut['lastname'];
                    $sFirstName = isset($tut['firstnameRu']) && mb_strlen($tut['firstnameRu']) ? $tut['firstnameRu'] : $tut['firstname'];
                    $sPatronymic = isset($tut['patronymicRu']) && mb_strlen($tut['patronymicRu']) ? $tut['patronymicRu'] : $tut['patronymic'];
                }

				echo "<h2 style = 'color:#0094aa'>".$oL::get('Оқытушы').": " . $sLastName ." ". $sFirstName ." ". $sPatronymic . "</h2>";
				?>
			<hr />		
			<h1 style = "text-align: center; color: red"><?= $oL::get('Ағымдағы рейтинг')?> 2022-2023</h1><hr />
			<h2 align = 'center' style = "color: #0094de"><?= $oL::get('Факультеттер рейтингі')?></h2>
			<div id = "chart_container">
				<canvas id = "mycanvas"></canvas>
			</div>				
			<div class = 'tutors_table'>
				<h3 align = 'center' style = "color: #0094de"><?= $oL::get('Оқытушы-профессорлар және ғылыми қызметкерлер рейтингі') ?></h3>
				<?php
					$sql1 = mysqli_query($connection,"SELECT 
					T1.TutorID,
					T1.job_titleID,
					T1.lastname,
					T1.firstname,
					T1.lastnameRu,
					T1.firstnameRu,
					SUM(T1.typ1) AS sum_typ1,
					SUM(T1.typ2) AS sum_typ2,
					SUM(T1.typ3) AS sum_typ3,
					SUM(T1.typ4) AS sum_typ4,
				   (SUM(T1.typ1) + SUM(T1.typ2) + SUM(T1.typ3) + SUM(T1.typ4)) AS sum_val
				FROM (
					SELECT
						tutors.TutorID,
						tutors.RATE, 
						tutors.job_titleID,
						tutors.lastname, 
						tutors.lastnameRu, 
						engbekter.kod_kizm,
						tutors.firstname,
						tutors.firstnameRu,
						CASE WHEN korsetkishter.typeID = 1 THEN engbekter.ball ELSE 0 END * 0.50 AS typ1,
						CASE WHEN korsetkishter.typeID = 2 THEN engbekter.ball ELSE 0 END * 0.35 AS typ2,
						CASE WHEN korsetkishter.typeID = 3 THEN engbekter.ball ELSE 0 END * 0.15 AS typ3,
						CASE WHEN korsetkishter.typeID = 5 THEN engbekter.ball ELSE 0 END AS typ4
					FROM engbekter
					LEFT JOIN tutors ON tutors.TutorID = engbekter.kod_kizm
					LEFT JOIN korsetkishter ON korsetkishter.kod_korsetkish = engbekter.kod_korset
					WHERE tutors.deleted=0 AND engbekter.del=0 AND tutors.RATE IN (1,2,3)
					UNION ALL
					SELECT 
						tutors.TutorID,
						tutors.RATE,
						tutors.job_titleID, 
						tutors.lastname, 
						tutors.lastnameRu, 
						engbekter.kod_kizm, 
						tutors.firstname, 
						tutors.firstnameRu, 
						0 AS typ1,
						0 AS typ2,
						0 AS typ3,
						engbekter.ball AS typ4
					FROM engbekter 
					RIGHT JOIN tutors ON tutors.TutorID = engbekter.kod_kizm
					WHERE tutors.deleted=0  AND engbekter.del=0 AND tutors.RATE IN (1,2,3) AND engbekter.kod_kizm IS NULL
				) AS T1
				GROUP BY T1.lastname, T1.firstname
				ORDER BY sum_val DESC") or die(mysqli_error($connection));
					?>
					<table id="tutorTable" class="display" style="witdth:100%">
						<thead>
							<tr>
								<th>№</th>
								<th><?= $oL::get('Аты жөні') ?></th>
								<th><?= $oL::get('Жалпы балл') ?></th>
								<th><?= $oL::get('Толық көру') ?></th>
							</tr>
						</thead>
				<?php

					$i = 0;
					
					while($tutor = mysqli_fetch_array($sql1)){
						$i++;
						$sum_val = sprintf("%.2f", $tutor['sum_val']);
                        $sLastName = $tutor['lastname'];
                        $sFirstName = $tutor['firstname'];
                        if ($_SESSION['lang'] != 'kaz'){
                            $sLastName = isset($tutor['lastnameRu']) && mb_strlen($tutor['lastnameRu']) ? $tutor['lastnameRu'] : $tutor['lastname'];
                            $sFirstName = isset($tutor['firstnameRu']) && mb_strlen($tutor['firstnameRu']) ? $tutor['firstnameRu'] : $tutor['firstname'];
                        }

						echo "
							<tr>
								<td>".$i."</td>
								<td>".$sLastName." ".$sFirstName."</td>
								<td>" . $sum_val . "</td>
								<td><a href = \"tolyk.php?ID=" . $tutor['TutorID'] . "\">". $oL::get('Толық')." >></a></td>
							</tr>";
					}
					
			?>
					</table>
					</div>
					<div class = "univer_table">
						<?php
						//###########################################univer table display###############################################
						$sql3 = mysqli_query($connection, "SELECT engbekter.kod_fakul, SUM(engbekter.ball) AS sum_univer FROM engbekter INNER JOIN faculties ON faculties.FacultyID = engbekter.kod_fakul") or die(mysqli_error($connection));
							
						$univer = mysqli_fetch_array($sql3);
						
						$sql4 = mysqli_query($connection,"SELECT engbekter.kod_fakul, SUM(engbekter.ball)*0.50 AS sum_univer_gylym, korsetkishter.typeID FROM engbekter INNER JOIN faculties ON faculties.FacultyID = engbekter.kod_fakul INNER JOIN korsetkishter ON korsetkishter.kod_korsetkish = engbekter.kod_korset WHERE korsetkishter.typeID = 1") or die(mysqli_error($connection));
						
						$univer2 = mysqli_fetch_array($sql4);
						
						$sql5 = mysqli_query($connection, "SELECT engbekter.kod_fakul, SUM(engbekter.ball)*0.35 AS sum_univer_oku, korsetkishter.typeID FROM engbekter INNER JOIN faculties ON faculties.FacultyID = engbekter.kod_fakul INNER JOIN korsetkishter ON korsetkishter.kod_korsetkish = engbekter.kod_korset WHERE korsetkishter.typeID = 2") or die(mysqli_error($connection));
						
						$univer3 = mysqli_fetch_array($sql5);
						
						$sql6 = mysqli_query($connection, "SELECT engbekter.kod_fakul, SUM(engbekter.ball)*0.15 AS sum_univer_tarbie, korsetkishter.typeID FROM engbekter INNER JOIN faculties ON faculties.FacultyID = engbekter.kod_fakul INNER JOIN korsetkishter ON korsetkishter.kod_korsetkish = engbekter.kod_korset WHERE korsetkishter.typeID = 3") or die(mysqli_error($connection));
						
						$univer4 = mysqli_fetch_array($sql6);
						$sql7 = mysqli_query($connection, "SELECT engbekter.kod_fakul, SUM(engbekter.ball) AS sum_baska, korsetkishter.typeID FROM engbekter INNER JOIN faculties ON faculties.FacultyID = engbekter.kod_fakul INNER JOIN korsetkishter ON korsetkishter.kod_korsetkish = engbekter.kod_korset WHERE  korsetkishter.typeID = 5") or die(mysqli_error($connection));
						
						$univer5 = mysqli_fetch_array($sql7);
						$a = array($univer4['sum_univer_tarbie'],$univer2['sum_univer_gylym'],$univer3['sum_univer_oku'],$univer5['sum_baska']);
						$univ = array_sum($a);
						?>
						<h3 align = 'center' style = "color: #0094de"><?= $oL::get('Университет бойынша')?></h3>
								<table>
									<thead>
										<tr>
											<th><?= $oL::get('Штат саны') ?></th>
											<th><?= $oL::get('Ғылым') ?></th>
											<th><?= $oL::get('Академиялық') ?></th>
											<th><?= $oL::get('Әлеуметтік-мәдени') ?></th>
											<th><?= $oL::get('Жалпы балл') ?></th>
											<th><?= $oL::get('Орта балл') ?></th>
										</tr>
									</thead>
									<tr>	
										<td>
											<div>
												<?php
													$result= mysqli_query($connection,"SELECT shtat_sani FROM jildar WHERE id_jildar= '1'");
													while($row = mysqli_fetch_array($result)){
													echo $row['shtat_sani'];
													}
												?>
												</div>
										</td>
										<td><?php echo sprintf("%.2f",$univer2['sum_univer_gylym']);?></td>
											<td><?php echo sprintf("%.2f",$univer3['sum_univer_oku']);?></td>
											<td><?php echo sprintf("%.2f",$univer4['sum_univer_tarbie']);?></td>
											<td><?php echo sprintf("%.2f",$univ);?></td>
											<td><?php $shtat_sani = 1045.75; $avg = ($univ)/$shtat_sani; echo sprintf("%.2f",$avg);?></td>
									</tr>
						 		</table>
					</div>
					<div class = "faculty_table">
						<?php
							$f_sql = mysqli_query($connection,"SELECT T1.*, (T1.typ1 + T1.typ2 + T1.typ3+T1.typ4) AS sum_faculty, (T1.typ1 + T1.typ2 + T1.typ3+T1.typ4)/T1.shtat_sany AS avg_faculty
							FROM (SELECT
							  faculties.FacultyID,
							  faculties.facultyNameKZ, 
							  faculties.facultyNameRU, 
							  faculties.shtat_sany,
							  SUM(CASE WHEN korsetkishter.typeID = 1 THEN engbekter.ball ELSE 0 END) * 0.50 AS typ1,
							  SUM(CASE WHEN korsetkishter.typeID = 2 THEN engbekter.ball ELSE 0 END) * 0.35 AS typ2,
							  SUM(CASE WHEN korsetkishter.typeID = 3 THEN engbekter.ball ELSE 0 END) * 0.15 AS typ3,
							  SUM(CASE WHEN korsetkishter.typeID = 5 THEN engbekter.ball ELSE 0 END) AS typ4
							FROM engbekter
							RIGHT JOIN faculties ON faculties.FacultyID = engbekter.kod_fakul
							left JOIN korsetkishter ON korsetkishter.kod_korsetkish = engbekter.kod_korset 
							WHERE faculties.activ = 1
							GROUP BY faculties.facultyNameKZ) AS T1 ORDER by avg_faculty DESC") or die(mysqli_error($connection));						
						?>
						<h3 align = 'center' style = "color: #0094de"><?= $oL::get('Факультеттер')?></h3>
						<table>
							<tr>
								<th>№</th>
								<th><?= $oL::get('Факультет атауы')?></th>
								<th><?= $oL::get('Штат саны')?></th>
								<th><?= $oL::get('Жалпы балл')?></th>
								<th><?= $oL::get('Орта балл')?></th>
								<th><?= $oL::get('Толық көру')?></th>
							</tr>
							<?php
								$i = 1;
								while($faculty = mysqli_fetch_array($f_sql)){
								    $sFacultyName = $faculty['facultyNameKZ'];
                                    if ($_SESSION['lang'] != 'kaz'){
                                        $sFacultyName = isset($faculty['facultyNameRU']) && mb_strlen($faculty['facultyNameRU']) ? $faculty['facultyNameRU'] : $faculty['facultyNameKZ'];
                                    }

									echo "<tr><td>".$i."</td><td>".$sFacultyName."</td><td>".$faculty['shtat_sany']."</td><td>". sprintf("%.2f",$faculty['sum_faculty'])."</td><td>". sprintf("%.2f",$faculty['avg_faculty'])."</td><td><a href = \"tolyk_faculty.php?ID=" . $faculty['FacultyID'] . "\">". $oL::get('Толық')." >></a></td></tr>";
									$i++;
								}
							?>
						</table>							
					</div>
						<div class = "cafedra_table">
						<?php
								$c_sql = mysqli_query($connection,"SELECT T1.*,  (T1.typ1 + T1.typ2 + T1.typ3) AS sum_cafedra, (T1.typ1 + T1.typ2 + T1.typ3)/T1.shtat_sany AS avg_cafedra

								FROM (SELECT
	
								  cafedras.cafedraID,
	
								  cafedras.cafedraNameKZ, 
								  cafedras.cafedraNameRU, 
	
								  cafedras.shtat_sany,
	
								  SUM(CASE WHEN korsetkishter.typeID = 1 THEN engbekter.ball ELSE 0 END) * 0.50 AS typ1,
	
								  SUM(CASE WHEN korsetkishter.typeID = 2 THEN engbekter.ball ELSE 0 END) * 0.35 AS typ2,
	
								  SUM(CASE WHEN korsetkishter.typeID = 3 THEN engbekter.ball ELSE 0 END) * 0.15 AS typ3
	
								FROM engbekter
	
								RIGHT JOIN cafedras ON cafedras.cafedraID = engbekter.kod_kafedra
	
								LEFT JOIN faculties ON faculties.FacultyID = cafedras.FacultyID
	
								left JOIN korsetkishter ON korsetkishter.kod_korsetkish = engbekter.kod_korset 
	
								WHERE faculties.activ = 1
	
								GROUP BY cafedras.cafedraNameKZ) AS T1 ORDER by avg_cafedra DESC") or die(mysqli_error($connection));
						?>
						<h3 align = 'center' style = "color: #0094de"><?= $oL::get('Кафедралар')?></h3>
						<table>
							<thead>
								<tr>
									<th>№</th>
									<th><?= $oL::get('Кафедра атауы')?></th>
									<th><?= $oL::get('Штат саны')?></th>
									<th><?= $oL::get('Жалпы балл')?></th>
									<th><?= $oL::get('Орта балл')?></th>
									<th><?= $oL::get('Толық көру')?></th>
								</tr>
							</thead>
							<?php
								$i = 1;
								while($cafedra = mysqli_fetch_array($c_sql)){
                                    $sTitle = $cafedra['cafedraNameKZ'];
                                    if ($_SESSION['lang'] != 'kaz'){
                                        $sTitle = isset($cafedra['cafedraNameRU']) && mb_strlen($cafedra['cafedraNameRU']) ? $cafedra['cafedraNameRU'] : $cafedra['cafedraNameKZ'];
                                    }
									echo "
									<tr>
									<td>".$i."</td>
									<td>".$sTitle."</td>
									<td>".$cafedra['shtat_sany']."</td>
									<td>". sprintf("%.2f",$cafedra['sum_cafedra'])."</td>
									<td>". sprintf("%.2f",$cafedra['avg_cafedra'])."</td>
									<td><a href = \"tolyk_cafedra.php?ID=" . $cafedra['cafedraID'] . "\">". $oL::get('Толық')." >></a></td
									></tr>";
									$i++;
								}
							?>
						</table>
					</div>
					
					<div class = "cafedra_table">
						<?php
							$c_sql = mysqli_query($connection,"SELECT T1.*,  (T1.typ1 + T1.typ2 + T1.typ3) AS sum_cafedra, (T1.typ1 + T1.typ2 + T1.typ3)/T1.shtat_sany AS avg_cafedra
							FROM (SELECT
							  cafedras.cafedraID,
							  cafedras.cafedraNameKZ, 
							  cafedras.cafedraNameRU, 
							  cafedras.shtat_sany,
							  SUM(CASE WHEN korsetkishter.typeID = 1 THEN engbekter.ball ELSE 0 END) * 0.50 AS typ1,
							  SUM(CASE WHEN korsetkishter.typeID = 2 THEN engbekter.ball ELSE 0 END) * 0.35 AS typ2,
							  SUM(CASE WHEN korsetkishter.typeID = 3 THEN engbekter.ball ELSE 0 END) * 0.15 AS typ3,
							  SUM(CASE WHEN korsetkishter.typeID = 5 THEN engbekter.ball ELSE 0 END) AS typ4
							FROM engbekter
							RIGHT JOIN cafedras ON cafedras.cafedraID = engbekter.kod_kafedra
							LEFT JOIN faculties ON faculties.FacultyID = cafedras.FacultyID
							left JOIN korsetkishter ON korsetkishter.kod_korsetkish = engbekter.kod_korset 
							WHERE faculties.activ = 0
							GROUP BY cafedras.cafedraNameKZ) AS T1 ORDER by avg_cafedra DESC") or die(mysqli_error($connection));
						?>
						<h3 align = 'center' style = "color: #0094de"><?= $oL::get('Ғылыми зерттеу институттары')?></h3>
						<table>
							<tr>
								<th>№</th>
								<th><?= $oL::get('Орталық атауы')?></th>
								<th><?= $oL::get('Штат саны')?></th>
								<th><?= $oL::get('Жалпы балл')?></th>
								<th><?= $oL::get('Орта балл')?></th>
								<th><?= $oL::get('Толық көру')?></th>
							</tr>
							<?php
								$i = 1;
								while($cafedra = mysqli_fetch_array($c_sql)){
                                    $sTitle = $cafedra['cafedraNameKZ'];
                                    if ($_SESSION['lang'] != 'kaz'){
                                        $sTitle = isset($cafedra['cafedraNameRU']) && mb_strlen($cafedra['cafedraNameRU']) ? $cafedra['cafedraNameRU'] : $cafedra['cafedraNameKZ'];
                                    }
									echo "<tr>
									<td>".$i."</td>
									<td>".$sTitle."</td>
									<td>".$cafedra['shtat_sany']."</td>
									<td>". sprintf("%.2f",$cafedra['sum_cafedra'])."</td>
									<td>". sprintf("%.2f",$cafedra['avg_cafedra'])."</td>
									<td><a href = \"tolyk_cafedra.php?ID=" . $cafedra['cafedraID'] . "\">". $oL::get('Толық').">></a></td></tr>";
									$i++;
								}
							?>
						</table>
					</div>		
				</div>
	</div>
	<div class = "footer">
	</div>
</body>
</html>