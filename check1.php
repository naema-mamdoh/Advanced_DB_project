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
$tag;
$length;
$accept;
function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
 }

 if (isset($_POST['Checking'])||isset($_POST['Check']))
 {#National-ID_check------- 
 if(empty($_POST['nationalidcheck'])) { 
    $errsid="ID-Number is required!"; $thereis_error=true;
  }
 else if(strlen($_POST['nationalidcheck'])!=14){
    $errsid="ID-Number must have 14 digits"; $thereis_error=true;
  }
 else  $sid=test_input($_POST['nationalidcheck']);
 }

 if(!$thereis_error)
{
 # here i made a select query in the value of text box
  #search in the data base with this value and then returned it in $result
  $sql="select accepted from Student  where Ssn='".$sid."'";
  $result=$con->query($sql);
  #if $result is not empty then loop in it's content and return each row in $row 
  # $row contain accepted value
  $length=(int)$result->num_rows;
  if($length > 0)
{
	while($row=$result->fetch_assoc())
	{
		# convert the value returned to integer so we can make comarison in it
    $accept=(int)$row['accepted'];
	}
}

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
        <?php
             if($length==0){
              $tag='<div class="result">you are not registered<br></div>';
                echo $tag;
            }
            else{
              if($accept==1){
                $tag='<div class="result">you are accepted<br></div>';
                echo $tag;
              }
              else{
                $tag='<div class="result">you are not accepted</div>';
                echo $tag;
              }
            }
          ?>
      
      </div>
    </div>
  </body>
</html>
