<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<!--
<script type="text/javascript" src="jquery-1.8.0.min.js"></script> 
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
<script>
<style type="text/css">
input[type=text]
{
  border: 1px solid #ccc;
  border-radius: 3px;
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  width:200px;
  min-height: 28px;
  padding: 4px 20px 4px 8px;
  font-size: 12px;
  -moz-transition: all .2s linear;
  -webkit-transition: all .2s linear;
  transition: all .2s linear;
}
input[type=text]:focus
{
  width: 400px;
  border-color: #51a7e8;
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1),0 0 5px rgba(81,167,232,0.5);
  outline: none;
}
</script>
-->
<?php
require('db/connect.php');
// Initial Values
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$email = mysql_real_escape_string($_POST['email']);

$action = array();
$action['result'] = null;
$text = array();

   // Login Tab
   if(isset($_POST['login'])) {
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $strSQL = mysqli_query($conn,"SELECT username FROM users WHERE email='".$email."' and password='".md5($password)."'");
        $Results = mysqli_fetch_array($strSQL);
        if(count($Results)>=1)
        {
echo "Login Sucessfully";
            $message = $Results['username']." Login Sucessfully!!";
        }
        else
        {
echo "Invalid email or password";
            $message = "Invalid email or password!!";
        }        
   }

   //SIGN UP Tab
   if(isset($_POST['signup'])) {
      $username   = mysqli_real_escape_string($conn,$_POST['username']);
      $email      = mysqli_real_escape_string($conn,$_POST['email']);
      $password   = mysqli_real_escape_string($conn,$_POST['password']);

      if(empty($username)) {$action['result'] = 'error'; array_push($text, 'You forgot your username'); echo "You Forgot Username ";}
      if(empty($password)) {$action['result'] = 'error'; array_push($text, 'You forgot your password'); echo "You Forgot password ";}
      if(empty($email)) {$action['result'] = 'error'; array_push($text, 'You forgot your email'); echo "You Forgot email ";}

      if($action['result'] != 'error') {
//echo " $username $password $email ";
//        $insertit = mysqli_query($conn,"INSERT INTO users VALUES(NULL,'".$username."','".md5($password)."','".$email."',0,NULL)");
//        if($insertit){
//          echo " Signup Sucessfully ";
//        }else{
//          $action['result'] = 'error';
//          array_push($text, 'User could not be added to the database. Reason: ' . mysql_error());
//      }
//echo "text is " . $text[0];
//      $action['text'] = $text;

        $query = "SELECT email FROM users where email='".$email."'";
        $result = mysqli_query($conn,$query);
        $numResults = mysqli_num_rows($result);

        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 	// Validate email address
        {echo " Invalid Email "; $message =  "Invalid email address please type a valid email!!";}
        elseif($numResults>=1) 					// Check Email exist
        {echo " Email exist "; $message = $email." Email already exist!!";}
        else
        {
          $add =  mysqli_query($conn,"INSERT INTO users(username,email,password) 
					VALUES('".$username."','".$email."','".md5($password)."')");
          if ($add) {
            $userid = $conn->insert_id; //mysqli_insert_id($conn)
printf($userid);
            $key = $username . $email . date('mY');
            $key = md5($key);

            $confirm = $conn->query("INSERT INTO `confirm` VALUES(NULL,'$userid','$key','$email')");

            if($confirm){
              echo " Signup Sucessfully ";
              $message = "Signup Sucessfully!!";
              include_once 'inc/php/swift/swift_required.php';

              $info = array('username' => $username, 'email' => $email, 'key' => $key);

              //Send the email
              if(send_mail($info)){
                //email send
                $action['result']='success';
                array_push($text, 'Thanks for signing up. Please check your email for confirmation!');
              }else{
                $action['result']='error';
                array_push($text, 'Could not send confirm email');
              }
            }else{
              $action['result']='error';
              $array_push($text,'Confirm row was not added to the database. Reason: ' . mysql_error());
            }
          }else{
            $action['result']='error';
            array_push($text,'User could not be added to the database. Reason: ' . mysql_error());
          }
          $action['text']=$text;
echo " Signup Done ";
        }
      }
   }
//include 'inc/elements/header.php';
//echo  show_errors($action);
?>
 
<!-- Login and Signup forms -->
<!--
<div id="tabs">
  <ul>
    <li><a href="#tabs-login">Login</a></li>
    <li><a href="#tabs-signup" class="active">Signup</a></li>
 
  </ul>                 
  <div id="tabs-1">
  <form action="" method="post">
    <p><input id="email" name="email" type="text" placeholder="Email"></p>
    <p><input id="password" name="password" type="password" placeholder="Password">
    <input name="login" type="hidden" value="login" /></p>
    <p><input type="submit" value="Login" /></p>
  </form>
  </div>
  <div id="tabs-2">
    <form action="" method="post">
    <p><input id="username" name="username" type="text" placeholder="UserName"></p>
    <p><input id="email" name="email" type="text" placeholder="Email"></p>
    <p><input id="password" name="password" type="password" placeholder="Password">
    <input name="signup" type="hidden" value="signup" /></p>
    <p><input type="submit" value="Signup" /></p>
  </form>
  </div>
</div>
-->

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 well well-sm">
            <legend><a href="index.php"><i class="glyphicon glyphicon-home"></i></a> Sign up!</legend>
            
            <form action="" method="post" class="form" role="form">
            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" id="username" name="username" placeholder="Username" type="text" required autofocus />
                </div>
            </div>
            <input class="form-control" id="email" name="email" placeholder="Your Email" type="email" />
            <input class="form-control" id="password" name="password" placeholder="Password" type="password" />
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup" value="signup">Sign up</button>
            </form>
        </div>
    </div>
</div>




</html>
