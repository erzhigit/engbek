<body>

<p>Worked</p>	

	<?php

		include('../incs/connect.php');

		

		$tutor_id = $_POST['tutor_id'];

		$engbek_id = $_POST['engbek_id'];

		$tutor_moderator = $_POST['tutor_moderator'];

		$addedBall = $_POST['myInput']??0;

		$status = $_POST['status'];

		$kaytaru_sebebi = $_POST['kaytaru_sebebi'];

		$resolution = $_POST['resolution'];
        $avtorNUM = $_POST['myInputNum'];
		

		if(isset($_POST['confirmed'])){

			

			echo "Test echo <hr />";

				

			$main_sql = mysqli_query($connection,"SELECT korsetkishter.ball, korsetkishter.kod_korsetkish, engbekter.engbekID, engbekter.sani, engbekter.kod_fakul, engbekter.divBall, engbekter.univ_avtor_san, engbekter.kod_kizm FROM engbekter INNER JOIN korsetkishter ON engbekter.kod_korset = korsetkishter.kod_korsetkish WHERE del=0 and engbekID = '$engbek_id'") or die(mysqli_error($connection)); 

			

			$res = mysqli_fetch_array($main_sql);

				

			$first_ball = $res['ball'];

				
            
			echo "Ball = ".$first_ball."<hr />";

			
     
			$avtor_san = $res['univ_avtor_san'];

			

			echo "Avtor san = ".$avtor_san."<hr />";

			

			$sani = $res['sani'];

			

			echo "Sani = ".$sani."<hr />";

			

			$kod_korsetkish = $res['kod_korsetkish'];

			

			echo "Korsetkish ID = ".$kod_korsetkish."<hr />";

			

			$kod_fakul = $res['kod_fakul'];

			
            $divBall=$res['divBall'];
			if($avtorNUM==$divBall){
				$divBall=$res['divBall'];
			}else{
				$divBall=$avtorNUM;
			}
			echo "Facultet ID = ".$kod_fakul."<hr />";

			

			echo "moderator ID = ".$tutor_moderator."<hr />";

			

			$last_ball = 1;

			

			if($status == 3){

				

				if($avtor_san > 1){				

					if($kod_korsetkish == 8){

						$last_ball  = $first_ball;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 9){
						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish ==11){
						$s = $first_ball*$sani;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish ==12){
						$s = $first_ball*$sani;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 54){
						$s = $first_ball;

						$last_ball = $s+$addedBall;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 531){

						$r = $first_ball * $sani;

						$last_ball = $r/$avtor_san;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 532){

						$r = $first_ball * $sani * 2;

						$last_ball = $r/$avtor_san;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 560){

						$s = $sani * 0.002*3;

						$last_ball = $s/$avtor_san;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');	

					} else if($kod_korsetkish == 561){

						$s = $sani * 0.002*2;

						$last_ball = $s/$avtor_san;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');	

					} else if($kod_korsetkish == 562){

						$s = $sani * 0.002 * 1;

						$last_ball = $s/$avtor_san;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 512){

						$s = $first_ball;

						$last_ball = $s/$avtor_san;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');
                        /*2,1*/
					} else if($kod_korsetkish == 16){
							$totalPoints = $first_ball;
							if($avtor_san==2){
								switch($divBall){
									case 1:
										$person1Percentage = 60;
										$last_ball = ($totalPoints * $person1Percentage) / 100;
										$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
										$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
										break;
									case 2:
										$person1Percentage = 40;
										$last_ball = ($totalPoints * $person1Percentage) / 100;
										$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
										$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
										break;
								}
							}else if($avtor_san==3){
								switch($divBall){
									case 3:
										$person1Percentage = 30;
										$last_ball = ($totalPoints * $person1Percentage) / 100;
										$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
										$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
										break;
									case 4:
										$person1Percentage = 40;
										$last_ball = ($totalPoints * $person1Percentage) / 100;
										$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
										$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
										break;
								}
							}else if($avtor_san==4){
								switch($divBall){
									case 4:
										$person1Percentage = 40;
										$last_ball = ($totalPoints * $person1Percentage) / 100;
										$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
										$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
										break;
									case 5:
										$person1Percentage = 20;
										$last_ball = ($totalPoints * $person1Percentage) / 100;
										$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
										$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
										break;
								}
							}else if($avtor_san==5){
								switch($divBall){
									case 4:
										$person1Percentage = 40;
										$last_ball = ($totalPoints * $person1Percentage) / 100;
										$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
										$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
										break;
									case 6:
										$person1Percentage = 15;
										$last_ball = ($totalPoints * $person1Percentage) / 100;
										$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
										$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
										break;
								}
							}else if($avtor_san==6){
								switch($divBall){
									case 7:
										$person1Percentage = 25;
										$last_ball = ($totalPoints * $person1Percentage) / 100;
										$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
										$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
										break;
									case 6:
										$person1Percentage = 15;
										$last_ball = ($totalPoints * $person1Percentage) / 100;
										$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
										$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
										break;
								}
							}else{
								switch($divBall){
									case 8:
										$person1Percentage = 20;
										$last_ball = ($totalPoints * $person1Percentage) / 100;
										$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
										$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
										break;
									case 9:
										$person1Percentage = 80;
										$last_ball = ($totalPoints * $person1Percentage) / 100;
										$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
										$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
										break;
								}
							}
							header('Location: show_load_e.php');
					} else if($kod_korsetkish == 17){
						$totalPoints = $first_ball;
						if($avtor_san==2){
							switch($divBall){
								case 1:
									$person1Percentage = 60;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 2:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==3){
							switch($divBall){
								case 3:
									$person1Percentage = 30;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==4){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 5:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==5){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==6){
							switch($divBall){
								case 7:
									$person1Percentage = 25;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else{
							switch($divBall){
								case 8:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 9:
									$person1Percentage = 80;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}
						header('Location: show_load_e.php');
				    } else if($kod_korsetkish == 18){
						$totalPoints = $first_ball;
						if($avtor_san==2){
							switch($divBall){
								case 1:
									$person1Percentage = 60;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 2:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==3){
							switch($divBall){
								case 3:
									$person1Percentage = 30;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==4){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 5:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==5){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==6){
							switch($divBall){
								case 7:
									$person1Percentage = 25;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else{
							switch($divBall){
								case 8:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 9:
									$person1Percentage = 80;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}
						header('Location: show_load_e.php');
				    } else if($kod_korsetkish == 19){
						$totalPoints = $first_ball;
						if($avtor_san==2){
							switch($divBall){
								case 1:
									$person1Percentage = 60;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 2:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==3){
							switch($divBall){
								case 3:
									$person1Percentage = 30;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==4){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 5:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==5){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==6){
							switch($divBall){
								case 7:
									$person1Percentage = 25;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else{
							switch($divBall){
								case 8:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 9:
									$person1Percentage = 80;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}
						header('Location: show_load_e.php');
				    } else if($kod_korsetkish == 20){
						$totalPoints = $first_ball;
						if($avtor_san==2){
							switch($divBall){
								case 1:
									$person1Percentage = 60;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 2:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==3){
							switch($divBall){
								case 3:
									$person1Percentage = 30;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==4){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 5:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==5){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==6){
							switch($divBall){
								case 7:
									$person1Percentage = 25;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else{
							switch($divBall){
								case 8:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 9:
									$person1Percentage = 80;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}
						header('Location: show_load_e.php');
				    } else if($kod_korsetkish == 21){
						$totalPoints = $first_ball;
						if($avtor_san==2){
							switch($divBall){
								case 1:
									$person1Percentage = 60;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 2:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==3){
							switch($divBall){
								case 3:
									$person1Percentage = 30;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==4){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 5:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==5){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==6){
							switch($divBall){
								case 7:
									$person1Percentage = 25;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else{
							switch($divBall){
								case 8:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 9:
									$person1Percentage = 80;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}
						header('Location: show_load_e.php');
				    } else if($kod_korsetkish == 22){
						$totalPoints = $first_ball;
						if($avtor_san==2){
							switch($divBall){
								case 1:
									$person1Percentage = 60;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 2:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==3){
							switch($divBall){
								case 3:
									$person1Percentage = 30;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==4){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 5:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==5){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==6){
							switch($divBall){
								case 7:
									$person1Percentage = 25;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else{
							switch($divBall){
								case 8:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 9:
									$person1Percentage = 80;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}
						header('Location: show_load_e.php');
				    } else if($kod_korsetkish == 23){
						$totalPoints = $first_ball;
						if($avtor_san==2){
							switch($divBall){
								case 1:
									$person1Percentage = 60;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 2:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==3){
							switch($divBall){
								case 3:
									$person1Percentage = 30;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==4){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 5:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==5){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==6){
							switch($divBall){
								case 7:
									$person1Percentage = 25;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else{
							switch($divBall){
								case 8:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 9:
									$person1Percentage = 80;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}
						header('Location: show_load_e.php');
				    } else if($kod_korsetkish == 24){
						$totalPoints = $first_ball;
						if($avtor_san==2){
							switch($divBall){
								case 1:
									$person1Percentage = 60;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 2:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==3){
							switch($divBall){
								case 3:
									$person1Percentage = 30;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==4){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 5:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==5){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==6){
							switch($divBall){
								case 7:
									$person1Percentage = 25;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else{
							switch($divBall){
								case 8:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 9:
									$person1Percentage = 80;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}
						header('Location: show_load_e.php');
				    } else if($kod_korsetkish == 25){
						$totalPoints = $first_ball;
						if($avtor_san==2){
							switch($divBall){
								case 1:
									$person1Percentage = 60;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 2:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==3){
							switch($divBall){
								case 3:
									$person1Percentage = 30;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==4){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 5:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==5){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==6){
							switch($divBall){
								case 7:
									$person1Percentage = 25;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else{
							switch($divBall){
								case 8:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 9:
									$person1Percentage = 80;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}
						header('Location: show_load_e.php');
				    } else if($kod_korsetkish == 26){
						$totalPoints = $first_ball;
						if($avtor_san==2){
							switch($divBall){
								case 1:
									$person1Percentage = 60;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 2:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==3){
							switch($divBall){
								case 3:
									$person1Percentage = 30;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==4){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 5:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==5){
							switch($divBall){
								case 4:
									$person1Percentage = 40;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else if($avtor_san==6){
							switch($divBall){
								case 7:
									$person1Percentage = 25;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 6:
									$person1Percentage = 15;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}else{
							switch($divBall){
								case 8:
									$person1Percentage = 20;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
									break;
								case 9:
									$person1Percentage = 80;
									$last_ball = ($totalPoints * $person1Percentage) / 100;
									$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
									$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));	
									break;
							}
						}
						header('Location: show_load_e.php');
				    } else {
						$last_ball = $first_ball/$avtor_san;
						echo $last_ball = sprintf("%.2f", $last_ball);
						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));
						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));
						header('Location: show_load_e.php');
					}
				} else {

					if($kod_korsetkish == 8){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');					

					} else if($kod_korsetkish == 16){
						$last_ball  = $first_ball;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');					

					} else if($kod_korsetkish == 17){
						$last_ball  = $first_ball;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');					

					} else if($kod_korsetkish == 18){
						$last_ball  = $first_ball;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');					

					} else if($kod_korsetkish == 19){
						$last_ball  = $first_ball;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');					

					} else if($kod_korsetkish == 20){
						$last_ball  = $first_ball;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');					

					} else if($kod_korsetkish == 21){
						$last_ball  = $first_ball;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');					

					} else if($kod_korsetkish == 22){
						$last_ball  = $first_ball;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');					

					} else if($kod_korsetkish == 23){
						$last_ball  = $first_ball;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');					

					} else if($kod_korsetkish == 24){
						$last_ball  = $first_ball;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');					

					} else if($kod_korsetkish == 25){
						$last_ball  = $first_ball;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');					

					} else if($kod_korsetkish == 26){
						$last_ball  = $first_ball;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');					

					} else if($kod_korsetkish == 9){

						$last_ball  = 10 * $sani;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 531){

						$r = $first_ball * $sani;

						$last_ball = $r;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 532){

						$r = $first_ball * $sani * 2;

						$last_ball = $r;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 560){

						$s = $sani * 0.002*3;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');	

					} else if($kod_korsetkish == 561){

						$s = $sani * 0.002*2;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');	

					} else if($kod_korsetkish == 562){

						$s = $sani * 0.002 * 1;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 512){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 101){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 102){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 103){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 60){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 361){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 61){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 107){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 98){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 54){
						$s = $first_ball;

						$last_ball = $s+$addedBall;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 99){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 100){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 203){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 204){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 205){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 206){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 108){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 109){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 110){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 111){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 112){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 113){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 114){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 115){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 116){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 117){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 118){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query("INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 211){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 212){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 213){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 122){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 123){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 124){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 128){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 129){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 221){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 222){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query("INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 215){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 216){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 217){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 208){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 209){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 210){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 214){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 207){

						$s = $first_ball;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 11){
						$s = $first_ball*$sani;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else if($kod_korsetkish == 12){
						$s = $first_ball*$sani;

						$last_ball = $s;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					} else {

						$last_ball = $first_ball;

						echo $last_ball = sprintf("%.2f", $last_ball);

						$sql = mysqli_query($connection,"UPDATE engbekter SET ball = '$last_ball', kod_stat = '3' WHERE engbekID = '$engbek_id'") or die(mysqli_error($connection));

						$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

						header('Location: show_load_e.php');

					}

				}				

			} else if($status == 4){

				$sql = mysqli_query($connection,"UPDATE engbekter SET `ball` = '0', kod_stat = '4', kod_kayt_sebeb = '$kaytaru_sebebi', kayt_sebeb = '$resolution' WHERE `engbekID` = '$engbek_id'") or die(mysqli_error($connection));

				$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

				header('Location: show_conf_not_ok.php');

			} else if($status == 2){

				$sql = mysqli_query($connection,"UPDATE engbekter SET `ball` = '0', kod_stat = '2' WHERE `engbekID` = '$engbek_id'") or die(mysqli_error($connection));		

				header('Location: engbek_tekseru.php');

			} else if($status == 5){

				$sql = mysqli_query($connection,"UPDATE engbekter SET `ball` = '0', kod_stat = '5' WHERE `engbekID` = '$engbek_id'") or die(mysqli_error($connection));

				$sql2 = mysqli_query($connection,"INSERT INTO tekserushi(kod_tekserushi,kod_korset,kod_fakultet) VALUES('$tutor_moderator','$kod_korsetkish','$kod_fakul')") or die(mysqli_error($connection));

				header('Location: show_load_e.php');

			}

		} else {

			echo "Бір қате бар";

		}

	?>

</body>

