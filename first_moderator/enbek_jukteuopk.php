<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
<?php include '../extensions/head_enbek.php'; ?>
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
		<div class = "content_wrapper" style = "margin-top: 5px;">
			<div class = "inner_conten" style = "width: 1000px; margin: 0 auto;">
				<h2 style = "text-align: center;">Орталықтандырылған ендіру (ОПҚ үшін)</h2>			
				<?php
					
				/*	if(isset($_SESSION['teacher'])){
					
					} else {
					
						header('Location: login.php');
					}
				*/
					$tutor_id=$_SESSION['tutor'];
					$query = mysqli_query($connection,"SELECT cafedras.cafedraID, cafedras.FacultyID, tutors.TutorID
					FROM cafedras
					INNER JOIN faculties ON faculties.FacultyID = cafedras.FacultyID
					INNER JOIN tutors ON tutors.CafedraID = cafedras.cafedraID
					WHERE Login = '$tutor_id'") or die(mysqli_error());
					$tutor = mysqli_fetch_array($query);
					$query = mysqli_query($connection,"SELECT tutors.typeID FROM tutors WHERE  Login = '$_SESSION[tutor]'") or die(mysqli_error($connection));
					$tutor1 = mysqli_fetch_array($query);
					$tt=$tutor1['typeID'];
					function load_korsetkish(){
                        global  $tt;
						global $connection;
						$output = '';
						$sql = "SELECT * FROM korsetkishter WHERE bolimderID IN(1) and typeID='$tt'";
						$result = mysqli_query($connection,$sql) or die(mysqli_error($connection));
						
						while($row = mysqli_fetch_array($result)){			
							$output .= '<option value = "'.$row["kod_korsetkish"].'">' . $row["korsetkish_ati"] . '</option>';				
						}
						return $output;
					}
					
					function load_faculty(){
						global $connection;
						$output = '';
						$sql = "SELECT * FROM faculties";
						$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
						
						while($row = mysqli_fetch_array($result)){			
							$output .= '<option value = "'.$row["FacultyID"].'">' . $row["facultyNameKZ"] . '</option>';				
						}
						return $output;
					}
                    /*function load_tutor(){
						global $connection;
						$output = '';
						$sql = "SELECT * FROM `tutors`";
						$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
						
						while($row = mysqli_fetch_array($result)){			
							$output .= '<option value = "'.$row["TutorID"].'">' . $row["firstname"] . ' ' . $row["patronymic"] . ' </option>';				
						}
						return $output;
					}*/
				?>
						<script>
							$(document).ready(function(){
								
								$("#faculty1").change(function(){
										var FacultyID = $(this).val();
										$.ajax({
										    url:"get_cafedra.php",
											method:"POST",
											data:{FacultyID:FacultyID},
											dataType:"text",
											success:function(data){
											    $("#cafedra").html(data);
											}
										});
								});
							    $("#cafedra").change(function(){
									var cafedraID = $(this).val();
									$.ajax({
										url:"get_tutor.php",
										method:"POST",
										data:{cafedraID:cafedraID},
										dataType:"text",
										success:function(data){
											$("#tutor").html(data);
										}
									});
								});
								$("#korsetkish").change(function(){
									var kod_korsetkish = $("#korsetkish option:selected").text();
									$.ajax({
										method:"POST",
										data:{kod_korsetkish:kod_korsetkish},
										dataType:"text",
										success:function(data){
											$("#tolyk_korset").text(kod_korsetkish);
										}
									});
								});
								
								$("#select_sany").change(function(){
									var select_sany = $("#select_sany option:selected").text();
									var select_sanyID = $("#select_sany option:selected").val();
									$.ajax({
										method:"POST",
										data:{select_sany:select_sany},
										dataType:"text",
										success:function(data){
											$("#label_sany").text(select_sany);
										/*	if(select_sanyID == 3){
												alert("Сағат саны максимал 36");
												$('#sany').prop('min','1');
												$('#sany').prop('max','36');
											} else if(select_sanyID == 4){
												alert("Шаршы см. максимал 500");
												$('#sany').prop('min','1');
												$('#sany').prop('max','500');
											} 	*/								
										}
									});
								});
							});
						/*	function limit(element){
								var max_chars = 3;
								if(element.value.length > max_chars) {
									element.value = element.value.substr(0, max_chars);
								}
							} */
						</script>
				<div class = "select_box">
					<form method = "post" action = "load_enbek_opk.php" style = "margin-top: 10px;" enctype = "multipart/form-data">
						Көрсеткіштер
						<select name = "korsetkish" id = "korsetkish">
							<option>---</option>
								<?php echo load_korsetkish(); ?>
						</select><br /><br />
						<span>Көрсеткіштің толық атауы</span><br />
						<textarea rows="8" cols="109" name = "tolyk_korset" id = "tolyk_korset" style = "font-size: 18px; font-family: Tahoma; margin-top: 8px; border-radius:4px;"></textarea><br /><br />
						Орындалған күні
						<input type = "date" name = "date" placeholder = "жжжж-аа-кк"/><br /><br />
						Факультет немесе ҒЗО
						<select name = "faculty" id = "faculty1">
							<option>Факультетті немесе ҒЗО-ны таңдаңыз</option>
								<?php echo load_faculty(); ?>
						</select><br /><br />
						Кафедра немесе ҒЗИ
						<select name = "cafedra" id = "cafedra">
							<option>Кафедраны немесе ҒЗИ-ды таңдаңыз</option>
						</select><br /><br />
                        Оқытушы немесе ғылыми қызметкер
						<select name = "tutor" id = "tutor">
							<option>Оқытушы немесе ғылыми қызметкерді таңдаңыз</option>
						</select><br /><br />
						<label for="sany" id = "label_sany">Саны</label><br /><input type = "number" id = "sany" name = "sany" value = "1" step="0.01" min="0.01"><br /><br />
						<label for="ball" id = "ball">Балы</label><br /><input type = "text" id = "ball" name = "ball" value = "1" step="0.01" min="0.01"><br /><br />
						<span>Ескерту</span><br />
						<textarea rows="8" cols="109" name = "eskertu" style = "font-size: 18px; font-family: Tahoma; margin-top: 8px; border-radius:4px;"></textarea><br/><br/><hr />
						<span>Растаушы файлды таңдау (PDF, JPG форматындағы файлдар)(Файл лимит 10мб аспау керек)</span><br/><br/>
						<input type = "file" name="file" accept="application/pdf, image/*" /><br /><br /><hr />
						<input type = "hidden" name = "tutor_id" value = "<?php echo $tutor['TutorID'];?>"/>
						<input type = "hidden" name = "save_date" value = "<?php date_default_timezone_set("Asia/Dhaka"); echo date("d/m/Y H:i:s");?>"/>						
						<!--<br>Деректер қоры жабылды! 01.06.2020 00:00<br/>-->
                                                <input type = "submit" name = "upopk" value = "Жүктеу"/>
					</form>
				</div>
				<div class = "works">
					<style>
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

						th {
							background-color: #003366;
							color: white;
						}
					</style>

						<table>
							<thead>
							<tr>
								<th>№</th>
								<th>Кафедра/ҒЗИ</th>
								<th>Аты жөні</th>
								<th>Көрсеткіш</th>
								<th>Саны</th>
								<th>Автор саны</th>
								<th>Файл аты</th>
								<th>Балл</th>
								<th>Қайтару себебі</th>
								<th>Статус</th>
							</tr>
							</thead>
							</tbody>
					<?php
						$query = mysqli_query($connection,"SELECT tutors.TutorID FROM tutors WHERE  Login = '$_SESSION[tutor]'") or die(mysqli_error($connection));
						$tutor2 = mysqli_fetch_array($query);
						
						$tutor_id = $tutor2['TutorID'];
						
						$sql = "SELECT engbekter.ball, engbekter.engbekID, tutors.firstname, tutors.lastname, tutors.patronymic, korsetkishter.korsetkish_ati, 	engbekter.sani, engbekter.univ_avtor_san, engbekter.file_ati, engbekter.kayt_sebeb, engbekter.eskertu, status.status_name, faculties.FacultyID, status.statusID, cafedras.cafedraNameKZ, faculties.facultyNameKZ 
						FROM engbekter 
						INNER JOIN cafedras ON cafedras.cafedraID = engbekter.kod_kafedra 
						INNER JOIN tutors ON tutors.TutorID = engbekter.kod_kizm
						INNER JOIN korsetkishter ON korsetkishter.kod_korsetkish = engbekter.kod_korset
						INNER JOIN faculties ON faculties.FacultyID = engbekter.kod_fakul 
						INNER JOIN status ON status.statusID = engbekter.kod_stat 
						WHERE id_tutor = '$tutor_id' and engbekter.del=0 ORDER BY engbekter.engbekID DESC";
						
						$result = mysqli_query($connection,$sql) or die(mysqli_error($connection));
						
						
						
						$i = 1;
						
						while($row = mysqli_fetch_array($result)){
							echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$row["cafedraNameKZ"]."</td>";
                            echo "<td>".$row["lastname"]." ".$row["firstname"]."</td>";
                            echo "<td>".$row["korsetkish_ati"]."</td>";
                            echo "<td>".$row["sani"]."</td>";
                            echo "<td>".$row["univ_avtor_san"]."</td>";
                            echo "<td><a target='_blank' href = " .$row['file_ati'] .">".$row["file_ati"]."</a></td>";
                            echo "<td>".$row["ball"]."</td><td>".$row["kayt_sebeb"]."</td>";
                            echo "<td>".$row["status_name"]."</td>";
							echo "<td><button class='btn btn-danger delete-btn' data-opk=".$row['engbekID']." onClick='deleteOpk(this)'>Өшіру</button></td>";	
                            echo "</tr>"; 
							$i++;
						}
						
						   	
					?>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class = "footer">
	</div>
</body>
<?php include '../extensions/scripts_enbek.php'; ?>
</html>