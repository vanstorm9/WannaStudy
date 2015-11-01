<html>

	<head>

		<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" type="text/css"/>
		<link href = "css/bootstrap.min.css" rel= "stylesheet">
		<!--<link href = "css/styles.css" rel= "stylesheet">-->
		<link href = "css/index_art.css" rel= "stylesheet">
		
		<?php 
	include 'connect.php';
	include 'general.php';
	include 'header.php';
	$user = $_SESSION['username'];
	include 'navbar.html'
	
	
	?>
	

	</head>
	
	<title>WannaStudy</title>
	
	<body>
	<?php 
	if ($user){
		header("location: subject.php?".$my_school_type."=".$my_school_int."&m=".$my_major_int."");
	}
	?>
		
		
		 <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <!--<div class="masthead clearfix">
            <div class="inner">
              <h3 style="color:#FFFFFF" class="masthead-brand"><b>Wanna</b><i>Study</i></h3>
              <ul class="nav masthead-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
          </div>-->

          <div class="inner cover">
            <h1 class="cover-heading"><b>Wanna</b><i>Study</i></h1>
            <p class="lead">Study together with your friends and the entire class</p>
	<p class="lead">Anytime, anywhere</p>
	<p>An academic community where one can ask questions, form study groups, and study together</p>
            <p class="lead">
              <a href="#" class="btn btn-lg btn-default">Learn more</a>
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
          </div>

        </div>

      </div>
    </div>
		
	<div style='background-color: black;'>

	
		 <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <span id="span1"><h1>About WannaStudy</h1></span><br><hr />
		<span style="color:#323232"><h2>Ask the entire class a question as yourself or anonymously</h2></span>
		<br>
		<p>Praise English Ministry began in October 2010 as the college and young adult ministry of Praise Presbyterian Church. The ministry started from a calling that many of the staff and laypersons felt to reach out to the local community and create an extended family of God where passionate worship and intimate fellowship are central missional goals. We feel especially called to reach out to those who have grown up in the church but have since left, either due to bad personal experiences or a feeling of God’s absence in their lives. We are blessed to be so close to Rutgers University and being able to serve the campus for so many years.
</p>
		<img style='height:500px;width:800px;' src='http://nsa33.casimages.com/img/2014/10/03/14100307511418937.jpg'>
		<hr>
		
		<span style="color:#323232"><h2>Share and exchange notes / academic information with each other. </h2></span>
		<br>
		<p>To be a church that saves the lost, not the saved, through obeying the Great Commission found in Matthew 28:19-20.</p>
		<hr>               
		<span style="color:#323232"><h2>Create study groups or meet up with them online through Google Hangouts!</h2></span>	
		<br>	
		<p>We strive to achieve our vision through House Churches. Simply stated, house churches are the restoration of New Testament churches by living in smaller, intimate groups that meet weekly to break bread, worship, and share our daily lives to build Christ-centered communities. The goal is not for the building up of the individual but creating Christ-loving followers who seek to bring non-believers into their House Church. Here, the non-believers, or VIP's, are the utmost importance and everything is centered to make them feel comfortable and loved with the goal that by receiving the Gospel in a tangible way, they will accept the Gospel in a spiritual way. House Church is not another type of small group or Bible study or cell group. It is, instead, a paradigm shift to prepare each member for daily evangelism and not mere Biblical head knowledge.</p>
           <img style='height:500px;width:800px;' src='http://nsa34.casimages.com/img/2014/10/02/141002091518337151.jpg'>
			</div>
        </div>
    </section>
		<br><br><br>
		<p class="lead">
              <a href="#" class="btn btn-lg btn-default">Sign Up Now!</a>
            </p>
		<br><br><br>
		
		
</div>

	
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src = "js/bootstrap.js"></script>

	</body>

	
</html>