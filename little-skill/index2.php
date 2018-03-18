<?php 

include 'lib/config.php';
include 'lib/database.php';

$db=new database();

$query="select * from skill";
$c=$db->select("$query");

$err="";

function test_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// echo $_GET['id'];

if(!isset($_GET['id']))
{   
    echo "<br>";
    die("Your Have Not Authorized Access ");
}


if(isset($_POST['reg-3']))
{
    // header("location:index.php");
    
        
    // $Mname= test_data($_POST['Mnm']);
    $fname= test_data($_POST['skill']);
    $text= test_data($_POST['desc']);
    

    $query="INSERT INTO user_skill (skill_id,skill_description)
                 VALUES ('".$fname."','".$text."');";


        // $password = password_hash($password, PASSWORD_DEFAULT);
        // $query="INSERT INTO user (name,email,password,phonenumber)
        //          VALUES ('".$name."','".$email."','".$password."','".$number."');";

          // echo $query;
           $run=$db->insert($query);
        //  $err="registered!successfully";

        //  $query="select * from user where email='".$email."'";
        //  $pos=$db->select($query);
        //  $ro=$pos->fetch_assoc();
        //  print_r($ro);
        //  $id=$ro['id'];
      
        
         header("location:index.php?fm=successfully done");
    
    

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
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-fire" aria-hidden="true">
      </span><strong>Little-Skills</strong></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php echo $err;?>


<div class="col-md-6 col-md-offset-3 fm" id="reg">
<h2>Your Skills</h2>
<form method="post">



  <div class="form-group">
    <label for="exampleFormControlSelect1">select your skill</label>
    <select class="form-control" id="exampleFormControlSelect1" name="skill">
    <?php while($row=$c->fetch_array()):?>
    <option value="<?php echo $row['skill_id'] ;?>">

<?php echo  $row['skill'];?>
</option>>
<?php endwhile;?>
    </select>

  </div>

  <div class="form-group">
  <label for="exampleFormControlTextarea1">Describe about your self</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3" minlength="20" required></textarea>
  </div>
  
  <div class="input-group mb-3 form-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01" webkitdirectory directory multiple required>
    <label class="custom-file-label" for="inputGroupFile01">Upload your  certificates</label>
  </div>
  </div>
        
  <button type="submit" name='reg-3' class="btn btn-default center-block">Register</button>
  </div>
  </div>

  
</form>
  
</div>
