<?php $domain = $this->get('domain'); 
$logged = $this->get('logged');
if ($logged == true) echo 'zalogowany';
?>


<!DOCTYPE html>
<html style="background: transparent;">
  <head>
    <meta charset="UTF-8">
    <title>Servus v1.0</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="<?php echo $domain; ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?php echo $domain; ?>/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo $domain; ?>/assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="bg-navy" style="background: url(<?php echo $domain; ?>/assets/img/bg2.jpg) center center no-repeat; background-size: cover; height: 100%;">

    <div class="form-box" id="login-box" style="box-shadow: 0px 0px 40px 0px #000; border-radius: 3px;">
      <div class="header bg-blue">Logowanie do panelu</div>
      <form action="<?php echo $domain; ?>/login/login" method="POST">
        <div class="body bg-gray">
          <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="login" />
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="hasło" />
          </div>
          <div class="form-group">
            <input type="checkbox" name="autologin" value="1" />
            <label for="autologin">Zapamiętaj mnie</label>
          </div>          
        </div>
        <div class="footer text-center">                                                               
          <button type="submit" class="btn bg-blue btn-block">Zaloguj mnie</button>  
          <p>W razie jakichkolwiek pytań skontaktuj się z administratorem: <a href="mailto:pacholskimichal@gmail.com">pacholskimichal@gmail.com</a></p>
          <p>Panel administratora - <strong>Servus v1.0</strong></p>
        </div>
      </form>
    </div>


    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo $domain; ?>/assets/js/bootstrap.min.js" type="text/javascript"></script>        

  </body>
</html>