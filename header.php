<?
	include "config.php";
	include "../datebase/config.php";
	try {
  		$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
  		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  		$db->exec("set names utf8");
	}
	catch(PDOException $e) {
	    echo $e->getMessage();
	}
	$id = ID;
	$url = URL;
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>salespay.com</title>
		<!-- Bootstrap -->
	    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	    <!--[if lt IE 9]-->
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <link rel="stylesheet" href="css/font-awesome.min.css">
	</head>
		<body>
			<header>
				<div class="row-fluid">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 head_bar">
						<a href="#" class="logo">
							сервис безопасных покупок
						</a>
						<input class="search" type="search" name="" placeholder="Поиск Вашего товара">
						<a href="#">
							<i class="fa fa-search search_btn" aria-hidden="true"></i>
						</a>
						<?
						if(!$_SESSION['userid'])
  							{
  								echo "<a class='chang' href='https://oauth.vk.com/authorize?client_id=$id&display=page&redirect_uri=$url&response_type=code'><div class='vkenter'>Войти через Вконтакте</div></a>";
  							}
  							else{
  								$row = $db->query("SELECT uid, first_name, last_name, photo_big, moneyu FROM users WHERE uid =".$_SESSION['userid'])->fetch();
                  					echo "<div class='topup' onclick='popupw()'>Пополнить Баланс</div>";
								  	echo "<div class='username'>".$row['first_name']." ".$row['last_name']."";
								  	echo "<div class='money'>Баланс: <span class='moneyhave'>".$row['moneyu']." руб </span></div></div>";
								  	echo "<a href=''><div class='userphoto'><img src=".$row['photo_big']."></div></a>";
								  	echo "<a href=''><div class='exit'><img src='../img/exit.png'></div></a>";
  							}
  						?>
					</div>
					<div class="slider">
						<div class="container-fluid">
						  <h2>Carousel Example</h2>  
						  <div id="myCarousel" class="carousel slide" data-ride="carousel">
						    <!-- Indicators -->
						    <ol class="carousel-indicators">
						      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						      <li data-target="#myCarousel" data-slide-to="1"></li>
						      <li data-target="#myCarousel" data-slide-to="2"></li>
						    </ol>

						    <!-- Wrapper for slides -->
						    <div class="carousel-inner">
						      <div class="item active">
						        <img src="images/1.jpg" alt="Los Angeles" style="width:100%; height: 100%;">
						      </div>

						      <div class="item">
						        <img src="images/2.jpg" alt="Chicago" style="width:100%; height: 100%">
						      </div>
						    
						      <div class="item">
						        <img src="images/1.jpg" alt="New york" style="width:100%; height: 100%">
						      </div>
						    </div>

						    <!-- Left and right controls -->
						    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
						      <span class="glyphicon glyphicon-chevron-left"></span>
						      <span class="sr-only">Previous</span>
						    </a>
						    <a class="right carousel-control" href="#myCarousel" data-slide="next">
						      <span class="glyphicon glyphicon-chevron-right"></span>
						      <span class="sr-only">Next</span>
						    </a>
						  </div>
						</div>	
					</div>
				</div>
			</header>