<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="css/favicon.ico">

    <title>Create a RU Roommate account</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.mi.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

 
    <div class="container">

      <form class="form-signin" name='registration' method='post' action='register_back.php'>
        <h2><font style='color:#FAFAFA;'>Register a RU Roommate Account</font></h2>
		<input type="text" name='first_name' class="form-control" placeholder="First Name" required autofocus><br>
		<input type="text" name='last_name' class="form-control" placeholder="Last Name" required autofocus><br>
		<input type="text" name='email_box' class="form-control" placeholder="Email address" required autofocus><br>
        <input type="password" name='password_box' class="form-control" placeholder="Password" required><br>
		<input type="password" name='re_password_box' class="form-control" placeholder="Re-enter Password" required><br>
		
		<select class="form-control" name='class_box'>
			<option value="No" disabled selected>You're in Rutgers the Class of. . .</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2021">2023</option>
			<option value="2022">2024</option>
		</select><br>
        <!--<label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>-->
        <button class="btn btn-lg btn-primary btn-block" type="submit" name='submit'>Submit</button>
      </form>



    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>
