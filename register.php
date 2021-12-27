<!DOCTYPE html>
<?php
 
 $servername="localhost";
 $username="root";
 $passward="";
 $dbname="City";
 $con=mysqli_connect($servername,$username,$passward,$dbname);
 if(mysqli_connect_errno())
 { die("can't connect :");}
 
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
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="row">
            <div class="col">
              <label>Name: </label>
              <input
                type="text"
                placeholder="name"
                required
                class="form-control"
                name="name"
              />
            </div>
            <div class="col">
              <label> Password: </label>
              <input
                type="password"
                placeholder="password "
                required
                class="form-control"
                name="pass"
              />
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label> E-mail: </label>
              <input
                type="email"
                placeholder="email "
                required
                class="form-control"
                name="email"
              />
            </div>
            <div class="col">
              <label>Phone number: </label>
              <input
                type="tel"
                placeholder="phone number "
                required
                class="form-control"
                name="telephone"
              />
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label> National-ID: </label>
              <input
                type="text"
                placeholder="National number "
                required
                class="form-control"
                name="nation-id"
              />
            </div>
            <div class="col">
              <label> Religion: </label>
              <input
                list="religion"
                type="text"
                placeholder=""
                required
                class="form-control"
                name="religion"
              />
              <datalist id="religion">
                <option value="Muslim"></option>
                <option value="Christian"></option>
              </datalist>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label>Gender: </label>
              <input
                list="gender"
                type="text"
                placeholder=""
                required
                class="form-control"
                name="gender"
              />
              <datalist id="gender">
                <option value="Male"></option>
                <option value="Female"></option>
              </datalist>
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
                required
                class="form-control"
                name="address"
              />
            </div>
            <div class="col">
              <label>Governorate: </label>
              <input
                type="text"
                list="governs"
                placeholder=""
                required
                class="form-control"
                name="govern"
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
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label>Residence in previous years: </label>
              <input
                list="states"
                type="text"
                placeholder="---"
                required
                class="form-control"
                name="state"
              />
              <datalist id="states">
                <option value="New"></option>
                <option value="Old"></option>
              </datalist>
            </div>
            <div class="col">
              <label>Faculty : </label>
              <input
                type="text"
                list="faculties"
                placeholder=""
                required
                class="form-control"
                name="faculty"
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
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label>Level: </label>
              <input
                list="levels"
                type="text"
                placeholder="---"
                required
                class="form-control"
                name="level"
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
            </div>
            <div class="col">
              <label>GPA: </label>
              <input
                type="number"
                step="0.1"
                class="form-control"
                required
                name="gpa"
                min="1"
                max="4"
              />
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label>Father Name: </label>
              <input
                type="text"
                placeholder="father name"
                required
                class="form-control"
                name="F_name"
              />
            </div>
            <div class="col">
              <label>Father National ID: </label>
              <input
                type="text"
                placeholder="Father National ID"
                required
                class="form-control"
                name="F_nationid"
              />
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label>Father Phone Number:</label>
              <input
                type="tel"
                placeholder="Father Phone Number"
                required
                class="form-control"
                name="F_phone"
              />
            </div>
            <div class="col">
              <label>Father Job: </label>
              <input
                type="text"
                placeholder="Father Job"
                required
                class="form-control"
                name="F_job"
              />
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
$errMsg1 ="";
$name="";

if (isset($_POST['sub_mit']))
{
  echo "Welcome ". $_POST['name']. "<br>";
}


function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
 ?>