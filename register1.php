<!DOCTYPE html>
<?php
 
 $servername="localhost";
 $username="root";
 $passward="";
 $dbname="City";
 $con=mysqli_connect($servername,$username,$passward,$dbname);
 if(mysqli_connect_errno())
 { die("can't connect :");}
 
$errname=$errpass=$errmail=$errsphone=$errsid=$errreligion=$errgender=$erraddress=$errgovern=$errstate=$errfaculty=$errlevel=$errgpa=$errFname=$errfid=$errfphone=$errfjob="";
$name=$pass=$mail=$sphone=$sid=$religion=$gender=$address=$govern=$state=$faculty=$level=$gpa=$Fname=$fid=$fphone=$fjob="";
$thereis_error=false;


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
  

 if (isset($_POST['submit']))
{
  #Name_check------------
 if(empty($_POST['name'])){ 
     $errname="Name is requried!";   $thereis_error=true;
   }
 else if (!preg_match ("/^[a-zA-Z-' ]*$/", $_POST['name'])) {
    $errname="Only alphabets and whitespace are allowed."; $thereis_error=true;
   }
 else $name=test_input($_POST['name']); 

  #Password_check----------- 
 if(empty($_POST['pass'])) { 
       $errpass="password is required!"; $thereis_error=true;
  }
 else $pass=test_input($_POST['pass']); 
  
  #E-mail_check--------
  $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
 if(empty($_POST['email'])) { 
  $errmail="E-mail is required!"; $thereis_error=true;
  }
 else if (filter_var(empty($_POST['email']), FILTER_VALIDATE_EMAIL)) {
    $errmail="Email is not valid."; $thereis_error=true;
  }
 else $mail=test_input($_POST['email']);
  #Telephone_check-------
 if(empty($_POST['telephone'])) { 
    $errsphone="Mobile is required!"; $thereis_error=true;
  }
 else if(strlen($_POST['telephone'])!=11){
    $errsphone="Mobile must have 11 digits"; $thereis_error=true;
  }
 else  $sphone=test_input($_POST['telephone']);
  #National-ID_check------- 
 if(empty($_POST['nation-id'])) { 
    $errsid="ID-Number is required!"; $thereis_error=true;
  }
 else if(strlen($_POST['nation-id'])!=14){
    $errsid="ID-Number must have 14 digits"; $thereis_error=true;
  }
 else  $sid=test_input($_POST['nation-id']);
  #Religion_check------- 
 if(empty($_POST['religiont'])) { 
  $errreligion="Religiont is required!"; $thereis_error=true;
}
 else  $religion=test_input($_POST['religiont']);
 #Gender_check------
 if(empty($_POST['gender'])) { 
  $errgender="Gender is required!"; $thereis_error=true;
}
 else  $gender=test_input($_POST['gender']);
 #Address_check------
 if(empty($_POST['address'])) { 
  $erraddress="Address is required!"; $thereis_error=true;
}
 else  $address=test_input($_POST['address']);
 #Governorate_check--------
 if(empty($_POST['govern'])) { 
  $errgovern="Governorate is required!"; $thereis_error=true;
}
 else  $govern=test_input($_POST['govern']);
 #State_check---------
 if(empty($_POST['state'])) { 
  $errstate="State is required!"; $thereis_error=true;
}
 else  $state=test_input($_POST['state']);
#Faculty_check-------
if(empty($_POST['faculty'])) { 
  $errfaculty="Faculty is required!"; $thereis_error=true;
}
 else  $faculty=test_input($_POST['faculty']);
#Level_check----------
if(empty($_POST['level'])) { 
  $errlevel="Level is required!"; $thereis_error=true;
}
 else  $level=test_input($_POST['level']);
#GPA_check--------
if(empty($_POST['gpa'])) { 
  $errgpa="GPA is required!"; $thereis_error=true;
}else if ($_POST['gpa']>4||$_POST['gpa']<=0){
  $errgpa="GPA must be between [1:4]!"; $thereis_error=true;
}
 else  $gpa=test_input($_POST['gpa']);
  #Father-Name_Check--------
  if(empty($_POST['F_name'])){ 
    $errFname="Father Name is requried!";   $thereis_error=true;
  }
else if (!preg_match ("/^[a-zA-z]*$/", $_POST['F_name'])) {
  $errFname="Only alphabets and whitespace are allowed."; $thereis_error=true;
  }
else $Fname=test_input($_POST['F_name']); 
#Father-National-ID_check-------
if(empty($_POST['F_nationid'])) { 
  $errfid="ID-Number is required!"; $thereis_error=true;
}
else if(strlen($_POST['F_nationid'])!=14){
  $errfid="ID-Number must have 14 digits"; $thereis_error=true;
}
else  $fid=test_input($_POST['F_nationid']);
#Father-Phone_check--------
if(empty($_POST['F_phone'])) { 
  $errfphone="Mobile is required!"; $thereis_error=true;
}
else if(strlen($_POST['F_phone'])!=11){
  $errfphone="Mobile must have 11 digits"; $thereis_error=true;
}
else  $fphone=test_input($_POST['F_phone']);
#Father-Job_check--------
if(empty($_POST['F_job'])){ 
  $errfjob="Father Job is requried!";   $thereis_error=true;
}
else $fjob=test_input($_POST['F_job']); 

} 
if(!$thereis_error)
{
  $con->query("call push_student('".$_POST['nation-id']."','".$_POST['name']."','".$_POST['pass']."','".$_POST['gender']."',Date'".$_POST['year']."-".$_POST['month']."-".$_POST['day']."','".$_POST['address']."','".$_POST['religiont']."','".$_POST['govern']."','".$_POST['email']."','".$_POST['state']."','".$_POST['faculty']."'," .$_POST['gpa']. "," .$_POST['level']. ",'".$_POST['F_nationid']."','".$_POST['F_name']."','".$_POST['F_job']."','".$_POST['F_phone']."','".$_POST['telephone']."');");
#empty variables to not display them in Value attribute
$name=$pass=$mail=$sphone=$sid=$religion=$gender=$address=$govern=$state=$faculty=$level=$gpa=$Fname=$fid=$fphone=$fjob="";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
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
    <div class="content " >
        <h2  style="  color: green;
  font-weight: bold;" id="dn">your request is submitted successfully!</h2>
         
    </div>
        
       
     
    </div>
  </body>
</html>
<?php
}
else
{
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
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
      <div class="regist">
        <form method="POST" action="register1.php">
          <div class="row">
            <div class="col">
              <label>Name: </label>
              <input
                type="text"
                placeholder="name"
                class="form-control"
                name="name"
                value="<?php  echo $name; ?>"
              />
              <span class="err"> <?php echo $errname; ?> </span>
            </div>
            <div class="col">
              <label> Password: </label>
              <input
                type="password"
                placeholder="password"
                class="form-control"
                name="pass"
                value="<?php echo $pass; ?>"
              />
              <span class="err"><?php echo $errpass; ?></span>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label> E-mail: </label>
              <input
                type="text"
                placeholder="email "
                class="form-control"
                name="email"
                value="<?php  echo $mail ; ?>"
              />
              <span class="err"><?php echo $errmail; ?></span>
            </div>
            <div class="col">
              <label>Phone number: </label>
              <input
                type="tel"
                placeholder="phone number "
                class="form-control"
                name="telephone"
                value="<?php  echo $sphone ; ?>"
              />
              <span class="err"><?php echo $errsphone ; ?></span>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label> National-ID: </label>
              <input
                type="text"
                placeholder="National number "                
                class="form-control"
                name="nation-id"
                value="<?php  echo $sid ; ?>"
              />
              <span class="err"><?php echo $errsid ; ?></span>
            </div>
            <div class="col">
              <label> Religion: </label>
              <input
                list="religion"
                type="text"
                placeholder=""
                class="form-control"
                name="religiont"
                value="<?php  echo $religion ; ?>"
              />
              <datalist id="religion">
                <option value="Muslim"></option>
                <option value="Christian"></option>
              </datalist>
              <span class="err"><?php echo $errreligion; ?></span>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label>Gender: </label>
              <input
                list="gender"
                type="text"
                placeholder=""                
                class="form-control"
                name="gender"
                value="<?php  echo $gender ; ?>"
              />
              <datalist id="gender">
                <option value="Male"></option>
                <option value="Female"></option>
              </datalist>
              <span class="err"><?php echo $errgender ; ?></span>
            </div>
            <div class="col">
              <label> Date Of Birth: </label> <br />
              <select  name="day" >
                <option disabled>Day</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
                <option>19</option>
                <option>20</option>
                <option>21</option>
                <option>22</option>
                <option>23</option>
                <option>24</option>
                <option>25</option>
                <option>26</option>
                <option>27</option>
                <option>28</option>
                <option>29</option>
                <option>30</option>
                <option>31</option>
              </select>
              <select name="month">
                <option disabled>Month</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
              </select>
              <select name="year">
                <option disabled>Year</option>
                <option>1994</option>
                <option>1995</option>
                <option>1996</option>
                <option>1997</option>
                <option>1998</option>
                <option>1999</option>
                <option>2000</option>
                <option>2001</option>
                <option>2002</option>
                <option>2003</option>
                <option>2004</option>
                <option>2005</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label>Address: </label>
              <input
                type="text"
                placeholder=" address"               
                class="form-control"
                name="address"
                value="<?php  echo $address ; ?>"
              />
              <span class="err"><?php echo $erraddress ; ?></span>
            </div>
            <div class="col">
              <label>Governorate: </label>
              <input
                type="text"
                list="governs"
                placeholder=""                
                class="form-control"
                name="govern"
                value="<?php  echo $govern ; ?>"
              />
              <datalist id="governs">
                <option value="Cairo"></option>
                <option value="Giza"></option>
                <option value="Minya"></option>
                <option value="Sohag"></option>
                <option value="Alexandria"></option>
                <option value="Suez"></option>
                <option value="Faiyum"></option>
                <option value="Qena"></option>
                <option value="Red Sea"></option>
                <option value="Beheira"></option>
                <option value="Ismailia"></option>
                <option value="Aswan"></option>
                <option value="Port Said"></option>
                <option value="Beni Suef"></option>
                <option value="New Valley"></option>
                <option value="Luxor"></option>
                <option value="Dakahlia"></option>
                <option value="Gharbia"></option>
                <option value="Matrouh"></option>
                <option value="Ash Sharqia"></option>
                <option value="Menofia"></option>
                <option value="South Sinai"></option>
                <option value="North Sinai"></option>
                <option value="Helwan"></option>
                <option value="Kafr el-Sheikh"></option>
                <option value="Qulyubia"></option>
                <option value="Damietta"></option>
                <option value="Assiut"></option>
              </datalist>
              <span class="err"><?php echo $errgovern ; ?></span>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label>Residence in previous years: </label>
              <input
                list="states"
                type="text"
                placeholder="---"               
                class="form-control"
                name="state"
                value="<?php  echo $state ; ?>"
              />
              <datalist id="states">
                <option value="New"></option>
                <option value="Old"></option>
              </datalist>
              <span class="err"><?php echo $errstate ; ?></span>
            </div>
            <div class="col">
              <label>Faculty : </label>
              <input
                type="text"
                list="faculties"
                placeholder=""
                class="form-control"
                name="faculty"
                value="<?php  echo $faculty ; ?>"
              />
              <datalist id="faculties">
                <option value="Faculty of Science"></option>
                <option value="Faculty of Engineering"></option>
                <option value="Faculty of Agriculture"></option>
                <option value="Faculty of Medicine"></option>
                <option value="Faculty of Pharmacy"></option>
                <option value="Faculty of Veterinary Medicine"></option>
                <option value="Faculty of Commerce"></option>
                <option value="Faculty of Education"></option>
                <option value="Faculty of Law"></option>
                <option value="Faculty of Physical Education"></option>
                <option value="Faculty of Nursing"></option>
                <option value="Faculty of Specific Education"></option>
                <option
                  value="Faculty of Education (New Valley regional Campus)"
                ></option>
                <option value="Faculty of Social Work"></option>
                <option value="Faculty of Arts"></option>
                <option value="Faculty of Computers and Information"></option>
                <option value="Faculty of dentistry"></option>
                <option value="Sugar Technology Research Institute"></option>
                <option value="Technical Institute of Nursing"></option>
              </datalist>
              <span class="err"><?php echo $errfaculty ; ?></span>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label>Level: </label>
              <input
                list="levels"
                type="text"
                placeholder="---"         
                class="form-control"
                name="level"
                value="<?php  echo $level ; ?>"
              />
              <datalist id="levels">
                <option value="1"></option>
                <option value="2"></option>
                <option value="3"></option>
                <option value="4"></option>
                <option value="5"></option>
                <option value="6"></option>
                <option value="7"></option>
              </datalist>
              <span class="err"><?php echo $errlevel ; ?></span>
            </div>
            <div class="col">
              <label>GPA: </label>
              <input
                type="number"
                step="0.1"
                class="form-control"          
                name="gpa"
                value="<?php  echo $gpa ; ?>"
              />
              <span class="err"><?php echo $errgpa ; ?></span>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label>Father Name: </label>
              <input
                type="text"
                placeholder="father name"     
                class="form-control"
                name="F_name"
                value="<?php  echo  $Fname ; ?>"
              />
              <span class="err"><?php echo $errFname; ?></span>
            </div>
            <div class="col">
              <label>Father National ID: </label>
              <input
                type="text"
                placeholder="Father National ID"              
                class="form-control"
                name="F_nationid"
                value="<?php  echo $fid ; ?>"
              />
              <span class="err"><?php echo $errfid ; ?></span>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label>Father Phone Number:</label>
              <input
                type="tel"
                placeholder="Father Phone Number"               
                class="form-control"
                name="F_phone"
                value="<?php  echo $fphone ; ?>"
              />
              <span class="err"><?php echo $errfphone ; ?></span>
            </div>
            <div class="col">
              <label>Father Job: </label>
              <input
                type="text"
                placeholder="Father Job"                
                class="form-control"
                name="F_job"
                value="<?php  echo $fjob ; ?>"
              />
              <span class="err"><?php echo $errfjob; ?></span>
            </div>
          </div>
          <br />
          <div class="but">
            <input type="submit" value="Submit" name="submit" />
          </div>
        </form>
      </div>
    </div>
    
  </body>
</html>


<?php
}

 ?>
 
