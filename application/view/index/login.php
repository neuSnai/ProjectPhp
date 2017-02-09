<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>登录</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <base href="<?php echo base_url();?> ">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <style type="text/css">
        #mes{
            /*width: 200px;*/
            margin-left: 15px;
            color: red;
        }
    </style>
</head>
<body>

    <div class="container">
    <div class="login">
      <h1>Login to Web App</h1>
      <form method="post" action="Index/login">
        <p><input type="text" name="username" value="" placeholder="用户名"></p>
        <p><input type="password" name="password" value="medical" placeholder="密码"></p>
        <p class="remember_me">
          <label id="mes">
            <?php echo $mes?>
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="登录"></p>
      </form>
    </div>
  </div>
</body>
</html>
