<?php 

include 'lib/config.php';
include 'lib/database.php';

$db=new database();
$err="";

$err="";

// echo $_GET['id'];

if(!isset($_GET['id']))
{   
    echo "<br>";
    die("Your Have Not Authorized Access ");
}

function test_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['reg-2']))
 {
  
    
        
     $Mname= test_data($_POST['Mnm']);
     $Fname= test_data($_POST['Fnm']);


    // $email= test_data($_POST['email']);
    $a1= test_data($_POST['ad1']);
    $c1= test_data($_POST['city-1']);
    $s1= test_data($_POST['state-1']);

    $a2= test_data($_POST['ad2']);
    $c2= test_data($_POST['city-2']);
    $s2= test_data($_POST['state-2']);


        // $password = password_hash($password, PASSWORD_DEFAULT);
         $query="INSERT INTO user_details (Mname,Fnm,a1,c1,s1,a2,c2,s2)
                  VALUES ('".$Mname."','".$Fname."','".$a1."','".$c1."',
                '".$s1."','".$a2."','".$c2."','".$s2."');";

           echo $query;
           $run=$db->insert($query);
        //  $err="registered!successfully";

        //  $query="select * from user where email='".$email."'";
        //  $pos=$db->select($query);
        //  $ro=$pos->fetch_assoc();
        //  print_r($ro);
        //  
      
        
          header("location:index2.php?id=asdfghk");
    
    

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
      <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-fire" aria-hidden="true">
      </span><strong>Little-Skills</strong></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="category.php">category <span class="sr-only">(current)</span></a></li>
        <li><a href="about.php">about</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php echo $err;?>


<div class="col-md-6 col-md-offset-3 fm" id="reg">
<h2></h2>
<form method="post">

  <div class="form-group">
    <label >Father's Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="Fnm" placeholder="father's name" required>
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Mother's Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="Mnm" placeholder="mother's name" required >
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Permanent Address</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="ad1" placeholder="address-1" required>
  </div>

    <div class="form-group">

        <div class="row">
        <div class="col-md-6">
        <label for="exampleInputPassword1">City</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="city-1" placeholder="city" required>
            
        </div>
        <div class="col-md-6">
        <label for="exampleInputPassword1">State</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="state-1" placeholder="State" required>
        </div>
            
        
        </div>
        </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Correspondance address</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="ad2" placeholder="address-2" required>
  </div>
  
  <div class="form-group">

    <div class="row">
    <div class="col-md-6">
    <label for="exampleInputPassword1">City</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="city-2" placeholder="city" required>
        
    </div>
    <div class="col-md-6">
    <label for="exampleInputPassword1">State</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="state-2" placeholder="State" required>
    </div>
        
       
  </div>
  </div>

  <button type="submit" name='reg-2' class="btn btn-default center-block">Register</button>
</form>
  
</div>
