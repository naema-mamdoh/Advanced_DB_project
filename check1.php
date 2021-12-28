<!DOCTYPE html>
<?php

$servername="localhost";
$username="root";
$passward="";
$dbname="City";
$con=mysqli_connect($servername,$username,$passward,$dbname);
if(mysqli_connect_errno())
{ die("can't connect :");}

$errsid="";
$sid="";
$thereis_error=false;

function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
 }

 if (isset($_POST['Checking']))
 {#National-ID_check------- 
 if(empty($_POST['nationalidcheck'])) { 
    $errsid="ID-Number is required!"; $thereis_error=true;
  }
 else if(strlen($_POST['nationalidcheck'])!=14){
    $errsid="ID-Number must have 14 digits"; $thereis_error=true;
  }
 else  $sid=test_input($_POST['nation-id']);
 }

 if(!$thereis_error)
{
################################################
#                                              #
#-------------YOUR CODE NEAMAA HERE------------#
#                                              #
################################################


#empty variables to not display them in Value attribute
$errsid="";
#$sid="";
}

?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="navbar">
        <h1><a href="project.php">University City Application Form</a></h1>
      </div>
      <div class="content">
        <br /><br />
        <form method="post" action="check1.php">
          <label>National-Id: </label>
          <input
            type="text"
            placeholder="Enter your national number"
            class="form-control"
            name="nationalidcheck"
            value="<?php  echo $sid ; ?>"
          />
          <span class="err"><?php echo $errsid ; ?></span>
          <br />
          <div class="but">
            <input type="submit" value="Check" name="Check" />
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
