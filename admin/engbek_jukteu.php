<!DOCTYPE html><html>	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	<head>	<?php include '../extensions/head_enbek.php'; ?>	</head>	<body>		<div class = "upper_header">			<? include '../extensions/header.php'?>		</div>		<div class = "header">		<div id = "menu_nav">            <? include '../extensions/nav.php'?>			<nav id="primary_nav_wrap" style="display: none">				<ul>				<li><a href="index.php">Негізгі</a>					<ul>					<li><a href="index.php">Негізгі бет</a></li>				  					</ul>				</li>								<li><a href="#">Орындау</a>					<ul>					<li><a href="engbek_jukteu.php">ОПҚ/ҒҚ</a></li>					</ul>				</li>				<li><a href="#">Басқа</a>					<ul>					<li><a href="baska_okitushyny_koru.php">ОПҚ/ҒҚ</a></li>					</ul>				</li>			  				<li><a href="#">Сенім жәшігі</a>					<ul>					<li><a href="shagym_tusiru.php">Шағым түсіру</a></li>					<li><a href="shagymdar.php">Шағымдарды көру</a></li>					</ul>				</li>				<li><a href="../logout.php">Шығу</a></li>				</ul>			</nav>		</div>		</div>		<div class = "content">			<div class = "content_wrapper" style = "margin-top: 5px;">				<div class = "inner_conten" style = "width: 1000px; margin: 0 auto;">					<h2 style = "text-align: center;"><?= $oL::get('Орындалған жұмыстар')?></h2>					<div id="dialog">						<div class="dialog-content">							<span class="close" onclick="closeDialog()">&times;</span>							<p style="color:red"><?= $oL::get('Ескерту:2.1 - 2.1.6 аралығындағы көрсеткіштерге салынған еңбек өшірлмейді бірақ функция қосу үстіндеміз')?></p>							<p style="color:red"><?= $oL::get('Авторлар санын жазасыз')?></p>							<p style="color:red"><?= $oL::get('Ескерту сипаттамасына авторлардың аттарын жазып шығасыз бас автордан төмен қарай')?></p>							<p style="color:red"><?= $oL::get('Мысалы: Егер автор 4 еу болса 1)Жүнісбек Сәкен Болатұлы 2)Анеш Болат Мүсирбекович 3)Сейсен Марат Исабекулы 4)Утебаев Баймурат')?></p>							<p><?= $oL::get('Әлемдік рейтингтік ғылыми индекстегі  жарияланымдар')?> <?= $oL::get('Ахмет Ясауи университеті атауы көрсетілген жағдайда, қосалқы авторлық тек өз ғылыми және пәнаралық бағыты бойынша,')?> <?= $oL::get('Journal Citation Reports (Clarivate Analytics) үшін квартиль және CiteScore (Scopus) индикаторы және барлық ғылыми мақалалар мен монографиялар үшін ұпайларды есептеу кезінде жарияланымның ішкі авторлар санына қарай ұпай төмендегіше бөлінеді')?>:</p>							<ul>								<li><?= $oL::get('1 автор – 100 % ;')?></li>								<li><?= $oL::get('2 автор, 1-ші авторға 60% болса, екінші авторға 40 % беріледі;')?></li>								<li><?= $oL::get('3 автор, 1-ші авторға 40%, қалған екі авторға 30-% теңдей бөлінеді;')?></li>								<li><?= $oL::get('4 автор, 1-ші авторға 40%, қалған 3 авторға 20 % теңдей бөлінеді;')?></li>								<li><?= $oL::get('5 автор, 1-ші авторға 40%, қалған 4 авторға 15 %-дан теңдей бөлінеді;')?></li>								<li><?= $oL::get('6 автор, 1-ші авторға 25 %, қалған 5 авторға 15 %-дан теңдей бөлінеді,')?></li>								<li><?= $oL::get('7 авторлар, 1-ші авторға 20 %, қалған авторларға 80 % үлес бөлінеді.')?></li>							</ul>							<p style="color:red"><?= $oL::get('Ескерту:Екі немесе одан да көп автор болған жайғдайда еңбектеріңізді жүктеу кезінде басқа авторға да хабарлаңыз себебі басқа автор білмей жатып екінші рет тағы салуы мүмкін')?></p>							<p style="color:red"><?= $oL::get('Таңдалған авторларға сіз жүктеген еңбек көрінеді және оларға ұпай беріледі')?></p>							<p style="color:red"><?= $oL::get('басқа авторларды белгілеп жүктемеген жағдайда еңбегіңіз қайтарылады')?></p>						</div>					</div>					<?php						$_SESSION['tutor'];						$query = mysqli_query($connection,"SELECT cafedras.cafedraID, cafedras.FacultyID, tutors.TutorID						FROM cafedras						INNER JOIN faculties ON faculties.FacultyID = cafedras.FacultyID						INNER JOIN tutors ON tutors.CafedraID = cafedras.cafedraID						WHERE Login = '$_SESSION[tutor]'") or die(mysqli_error($connection));						$tutor = mysqli_fetch_array($query);						$tut = $tutor['TutorID'];							function load_korsetkish(){								global $connection;								global $tut;								$output = '';								$sql = "SELECT * FROM korsetkishter k								WHERE k.bolimderID='1' ";								$result = mysqli_query($connection,$sql) or die(mysqli_error($connection));																while($row = mysqli_fetch_array($result)){												$output .= '<option id_esep="'.$row["id_esep"].'" id_comment="'.$row["id_comment"].'" value = "'.$row["kod_korsetkish"].'" id_shekteu="'.$row["id_shekteu"].'">' . $row["korsetkish_ati"] . '</option>';												}								return $output;							}																	?>						<div class = "select_box">						<form id="form1" method = "post" action = "load_engbek.php" style = "margin-top: 10px;" enctype = "multipart/form-data">                            <?= $oL::get('Көрсеткіштер')?>							<select name = "korsetkish" id = "korsetkish" onchange="handleChange()">								<option>---</option>									<?php echo load_korsetkish(); ?>							</select><br /><br />							<span><?= $oL::get('Көрсеткіштің толық атауы')?></span><br />							<textarea rows="8" cols="109" name = "tolyk_korset" id = "tolyk_korset" style = "font-size: 18px; font-family: Tahoma; margin-top: 8px; border-radius:4px;"></textarea><br /><br />                            <?= $oL::get('Орындалған күні')?>							<input type = "date" name = "date" required/><br /><br />                            <?= $oL::get('ХҚТУ авторлар саны (Өзіңізді қоса санағанда)')?><span style="color:red" id="hideText"><?= $oL::get('Макс 7 автор')?></span><br/>							<input type = "number" id = "univ_avtor_san" name = "univ_avtor_san" value = "1" min="1"/>							<input type = "number" id = "univ_avtor_san2" name = "univ_avtor_san2" value = "1" min="1"  oninput="compareSelectedValue()" required="<?= $oL::get('Автор санын енгізіңіз')?>" />							<br /><br />							<div id="hidingElem">                            <?= $oL::get('Еңбек санының түрлері')?>								<select id = "select_sany" >									<option value = "0">---</option>									<option value = "1"><?= $oL::get('Әр 1 млн. теңге үшін')?></option>									<option value = "2"><?= $oL::get('Деңгейі')?></option>									<option value = "5"><?= $oL::get('Саны')?></option>								</select><br /><br />								<label for="sany" id = "label_sany">---</label><br />								<input type = "number" id = "sany" name = "sany" value = "1" step="0.01"><br />							</div><br />							<div class="avtor1">								<label for="avtor_bir"><?= $oL::get('Автор')?> 2:<span style="color:red">* <?= $oL::get('Автордың толық  аты-жөнін қараңыз')?> </span></label>								<input type ="text" id ="avtor_bir" name="avtor_bir"  placeholder="<?= $oL::get('Іздеу үшін теріңіз')?> ...">								<div id="suggesstion-box"></div>							</div>							<div class="avtor2">								<label for="avtor_eki"><?= $oL::get('Автор')?> 3<span style="color:red">* <?= $oL::get('Автордың толық  аты-жөнін қараңыз')?> </span></label>								<input type = "text" id = "avtor_eki" name = "avtor_eki" placeholder="<?= $oL::get('Іздеу үшін теріңіз')?> ...">								<div id="suggesstion-box2"></div>							</div>							<div class="avtor3">								<label for="avtor_ush"><?= $oL::get('Автор')?> 4<span style="color:red">* <?= $oL::get('Автордың толық  аты-жөнін қараңыз')?> </span></label>								<input type = "text" id = "avtor_ush" name = "avtor_ush" placeholder="<?= $oL::get('Іздеу үшін теріңіз')?> ...">								<div id="suggesstion-box3"></div>							</div>							<div class="avtor4">								<label for="avtor_tort"><?= $oL::get('Автор')?> 5<span style="color:red">* <?= $oL::get('Автордың толық  аты-жөнін қараңыз')?> </span></label>								<input type = "text" id = "avtor_tort" name = "avtor_tort" placeholder="<?= $oL::get('Іздеу үшін теріңіз')?> ...">								<div id="suggesstion-box4"></div>							</div>							<div class="avtor5">								<label for="avtor_bes" ><?= $oL::get('Автор')?> 6<span style="color:red">* <?= $oL::get('Автордың толық  аты-жөнін қараңыз')?> </span></label>								<input type = "text" id = "avtor_bes" name = "avtor_bes" placeholder="<?= $oL::get('Іздеу үшін теріңіз')?> ...">								<div id="suggesstion-box5"></div>							</div>							<div class="avtor6">								<label for="avtor_alty"><?= $oL::get('Автор')?> 7<span style="color:red">* <?= $oL::get('Автордың толық  аты-жөнін қараңыз')?> </span></label>								<input type = "text" id = "avtor_alty" name = "avtor_alty" placeholder="<?= $oL::get('Іздеу үшін теріңіз')?> ...">								<div id="suggesstion-box6"></div>							</div>							<span><?= $oL::get('Ескерту')?></span><br />							<textarea rows="8" cols="109" name = "eskertu" style = "font-size: 18px; font-family: Tahoma; margin-top: 8px; border-radius:4px;"></textarea><br/><br/><hr />							<span><?= $oL::get('Растаушы файлды таңдау (PDF, JPG форматындағы файлдар)')?></span><br/><br/>														<!--<input type = "file" name = "file" /><br /><br /><hr />-->																				<input type = "file" name="file" accept="application/pdf, image/*" required /><br /><br /><hr />														<input type = "hidden" name = "tutor_id" value = "<?php echo $tutor['TutorID'];?>"/>							<input type = "hidden" name = "id_esep" id ="id_esep1" />							<input type = "hidden" name = "cafedra" value = "<?php echo $tutor['cafedraID'];?>"/>							<input type = "hidden" name = "faculty" value = "<?php echo $tutor['FacultyID'];?>"/>							<input type = "hidden" name = "save_date" value = "<?php date_default_timezone_set("Asia/Dhaka"); echo date("d/m/Y H:i:s");?>"/>																			<!--<br>Деректер қоры жабылды! 20.05.2023 00:00<br/>-->							<input type = "submit" name = "upload" value = "<?= $oL::get('Жүктеу')?>"/>						</form>					</div>					<div class = "works">						<table>							<thead>							<tr>								<th>№</th>								<th><?= $oL::get('Кафедра/ҒЗИ')?></th>								<th><?= $oL::get('Аты жөні')?></th>								<th><?= $oL::get('Көрсеткіш')?></th>								<th><?= $oL::get('Саны')?></th>								<th><?= $oL::get('Автор саны')?></th>								<th><?= $oL::get('Файл аты')?></th>								<th><?= $oL::get('Балл')?></th>								<th><?= $oL::get('Қайтару себебі')?></th>								<th><?= $oL::get('Статус')?></th>							</tr>							</thead>							<tbody>						<?php														$tutor_id = $_SESSION['tutor'];														$sql = "SELECT engbekter.ball, 							engbekter.engbekID, 							tutors.firstname, tutors.lastname, 							tutors.patronymic, 							tutors.firstnameRu, tutors.lastnameRu, 							tutors.patronymicRu, 							korsetkishter.korsetkish_ati, 								engbekter.sani, 							engbekter.divBall,							engbekter.univ_avtor_san, 							engbekter.file_ati, 							engbekter.kayt_sebeb, 							engbekter.eskertu, 							status.status_name,							faculties.FacultyID, 							status.statusID, 							cafedras.cafedraNameKZ, 							faculties.facultyNameKZ 							cafedras.cafedraNameRU, 							faculties.facultyNameRU 							FROM engbekter 							INNER JOIN cafedras ON cafedras.cafedraID = engbekter.kod_kafedra 							INNER JOIN tutors ON tutors.TutorID = engbekter.kod_kizm							INNER JOIN korsetkishter ON korsetkishter.kod_korsetkish = engbekter.kod_korset							INNER JOIN faculties ON faculties.FacultyID = engbekter.kod_fakul 							INNER JOIN status ON status.statusID = engbekter.kod_stat 							WHERE Login = '$tutor_id' and engbekter.del=0 ORDER BY engbekter.engbekID DESC";														$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));														$i = 1;														while($row = mysqli_fetch_array($result)){                                $sLastName = $row['lastname'];                                $sFirstName = $row['firstname'];                                $sPatronymic = $row['patronymic'];//                                $sFacult = $row['facultyNameKZ'];                                $sCafedra = $row['cafedraNameKZ'];                                if ($_SESSION['lang'] != 'kaz'){                                    $sLastName = isset($row['lastnameRu']) && mb_strlen($row['lastnameRu']) ? $row['lastnameRu'] : $row['lastname'];                                    $sFirstName = isset($row['firstnameRu']) && mb_strlen($row['firstnameRu']) ? $row['firstnameRu'] : $row['firstname'];                                    $sPatronymic = isset($row['patronymicRu']) && mb_strlen($row['patronymicRu']) ? $row['patronymicRu'] : $row['patronymic'];//                                    $sFacult = isset($row['facultyNameRU']) && mb_strlen($row['facultyNameRU']) ? $row['facultyNameRU'] : $row['facultyNameKZ'];                                    $sCafedra = isset($row['cafedraNameRU']) && mb_strlen($row['cafedraNameRU']) ? $row['cafedraNameRU'] : $row['cafedraNameKZ'];                                }								echo "<tr> ";								echo "<td>".$i."</td>";								echo "<td>".$sCafedra."</td>";								echo "<td>".$sLastName." ".$sFirstName."</td>";								echo "<td>".$row["korsetkish_ati"]."</td>";								echo "<td>".$row["sani"]."</td>";								echo "<td>".$row["univ_avtor_san"]."</td>";								echo "<td><a target='_blank' href = " .$row['file_ati'] .">".$row["file_ati"]."</a></td>";								echo "<td>".$row["ball"]."</td><td>".$row["kayt_sebeb"]."</td><td>".$oL::get($row["status_name"])."</td>";								echo "<td><button class='btn btn-danger delete-btn' data-id=".$row['engbekID']." onClick='deleteRecord(this)'>".$oL::get('Өшіру') ."</button></td>";								echo "</tr>";								$i++;							}							   							?>						</tbody>						</table> 					</div>				</div>			</div>		</div>		<div class = "footer">		</div>	</body>	<?php include '../extensions/scripts_enbek.php'; ?></html>