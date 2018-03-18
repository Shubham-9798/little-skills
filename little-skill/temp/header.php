<?php 

// session_start();
    include 'lib/config.php';
    include 'lib/database.php';
    
    $err="";
    $fm='';
    if(isset($_GET['fm']))
    {
      $err="successfull done";

    }

    function test_data($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }
    
    $db= new database();

    if(isset($_POST['register']))
    {
      
        
        $name= test_data($_POST['nm']);
        $email= test_data($_POST['email']);
        $password= test_data($_POST['password']);
        $cpassword= test_data($_POST['cpassword']);
        $number= test_data($_POST['number']);

   if($password===$cpassword){
       
     echo $email;
        $query="select * from user where email='".$email."'";
        $pos=$db->select($query);
    
    if($pos)
      {
       $ro=$pos->fetch_assoc();
      //  print_r($ro);
      //  echo $ro['id'];
       $err="Already have account! plz login";
       
       }
    else
      {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query="INSERT INTO user (name,email,password,phonenumber)
                     VALUES ('".$name."','".$email."','".$password."','".$number."');";
    
              echo $query;
              $run=$db->insert($query);
             $err="registered!successfully";

             $query="select * from user where email='".$email."'";
             $pos=$db->select($query);
             $ro=$pos->fetch_assoc();
             print_r($ro);
             $id=$ro['id'];
          
            
             header("location:index1.php?id=$id");

      }}
     else
      {
        $err="passwords Not matched";
      }

    }    


    if(isset($_POST['login']))
  {

    $email= test_data($_POST['email']);
    $password= test_data($_POST['password']);
    $query="select * from user where email='".$email."'";
    echo $query;

    $pos=$db->select($query);
   

if($pos)
  {
   $ro=$pos->fetch_assoc();
   if(password_verify($password,$ro['password']))
   {
      $_session['id']=$email;
      header('location:admin?id=sk');
   }
   else{
     $err="Invalid email and password";
   }


   }else
  $err="you are not registered";
  
  }
    
    

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Little-Skills</title>
    
    
     <link rel="stylesheet" href="assets/bootstrap/bootstrap.css">
     <link href="assets/css/style.css" rel="stylesheet">
     <link href="assets/bootstrap/fonts/glyphicons-halffings-regular.svg" rel="stylesheet">
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      
    </head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand a" href="index.php"><span class="glyphicon glyphicon-fire" aria-hidden="true">
      </span><strong>Little-Skills</strong></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="a"><a href="category.php">Categories</span></a></li>
        <li class="a"><a href="about.php">About</a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li id="btn-log"><a ><span class="glyphicon glyphicon-fire" aria-hidden="true"></span>Login</a></li>
        <li id="btn-reg"><a><span class="glyphicon glyphicon-fire" aria-hidden="true"></span>Register</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    
    <div class="coll" role="alert"><?php echo $err;?></div>

<div class="row">
<div class="col-md-6 col-md-offset-3 fm" id="log">
<h2>Login form</h2>
<form method="post">
  <div class="form-group">
    <label>Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required >
  </div>


  <button type="submit" name="login" class="btn btn-default">Login</button>
</form>
  
</div>


<div class="col-md-6 col-md-offset-3 col-sm-4 col-sm-offset-4 fm" id="reg">
<h2>Registration Form</h2>
<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nm" placeholder="Name" required >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="Email" required >
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Phone Number</label>
    <input type="number" class="form-control" id="exampleInputEmail1" pattern="[1-9]{1}[0-9]{9}"  required name="number" placeholder="Phone Number" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required >
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="cpassword" placeholder="confirm password" minlength="6" required >
  </div>

  <button type="submit" name='register' class="btn btn-default">Register</button>
</form>
  
</div>
</div>

<div class="container" id='jm'>
    <div class="jumbotron">
      <h2 class="">LITTLE-SKILL</h2>
      <p>Redefining The Art Of Learning</p>
      <p class="center">
        <a class="btn btn-primary btn-lg" id="btn-log-1" role="button">Login</a>
        <a class="btn btn-primary btn-lg" id="btn-reg-1" role="button">Register</a>
    </p>
    </div>
</div>


