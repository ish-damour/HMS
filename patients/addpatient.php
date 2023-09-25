<?php require("patientloginblocker.php") ?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php include('../includes/connection.php') ?>
<?php include('../includes/header2.php') ?>
<?php 
if (isset($_SESSION['message'])){
$message=$_SESSION['message'];
    if(time() - $_SESSION['timestamp'] > 3) {
        // If 3 seconds have passed, unset the session and destroy it
        unset($_SESSION['message']);

    }
}else{
  $_SESSION['timestamp'] = time();
}


 ?>
<div class="container-fluid">
  <div class="row">
<?php include('../includes/sidebar2.php') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="text-muted">Register,</span><strong class="h3 text-"> <?php echo $loggedname ?></strong></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi"><use xlink:href="#calendar3"/></svg>
            This week
          </button>
        </div>
      </div>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
              <div class="container-fluid container-fullw mt-5">
              <div class="container col-md-7  shadow-sm border-bottom  text-secondary  pb-2 my-3 h5 text-center">
                Please fill this form to register new patients
              </div>
              <div class="container col-md-7  shadow border   p-3 my-3">
                <form role="form" name="book" method="post" action="patientaddlogic.php" class="border-radius-6">
      <?php echo $message ?>
      <div class="form-group">
<!--                <label for="Doctor Specialization">
         Doctor Name
         </label>  -->
         <input type="text" pattern="\d{16}" title="enter only numbers and length is 16 only" name="nid" minlength="16" maxlength="16" placeholder="Enter National Id" class="form-control my-2" required>
            </div>

      <div class="form-group">
<!--                <label for="Doctor Specialization">
         Doctor Name
         </label>  -->
         <input type="text" name="fname" placeholder="Enter FirstName" class="form-control my-2" required>
            </div>


      <div class="form-group">
<!--                <label for="Doctor Specialization">
         Doctor Name
         </label>  -->
         <input type="text" name="lname" placeholder="Enter LastName" class="form-control my-2" required>
            </div>            

      <div class="form-group">
<!--                <label for="Doctor Specialization">
         Doctor Name
         </label>  -->
               <select class="form-control my-2" name="insurance" required> 
         <?php

        $sele1=mysqli_query($con,"SELECT * FROM insurances ");
        if (mysqli_num_rows($sele1)>0) {
          ?>
          <option value="">Select Insurance</option>
          <?php
        while ($frow=mysqli_fetch_array($sele1)) { 
          ?>
        <option value="<?php echo $frow["ins_id"] ?>"><?php echo $frow["ins_name"] ?></option>
      <?php
        }
        }else{
          ?>
          <option>no apoointment</option>
          <?php
        }
         ?>
         </select>
            </div>
      <div class="form-group">
<!--                  <label for="Doctor Specialization">
         Doctor Address
         </label>   -->     



   <!--             <label for="Doctor Specialization">
         Doctor Specialization
         </label>  -->
               <select class="form-control" name="province" id="province" required> 
         <?php

        $selectpro=mysqli_query($con,"SELECT * FROM province ");
        if (mysqli_num_rows($selectpro)>0) {
          ?>
          <option value=''>Select Province of home location </option>
          <?php
        while ($frow=mysqli_fetch_array($selectpro)) { 
          ?>
        <option value="<?php echo $frow["province_id"] ?>"><?php echo $frow["province_name"] ?></option>
      <?php
        }
        }else{
          ?>
          <option>no province</option>
          <?php
        }
         ?>
         </select>






    <!-- <select id="sector" name="sector"> -->
        <!-- Populate this with options from the database -->
<!--         <option value="">Select Sector</option>
        <option value="1">Sector A</option>
        <option value="2">Sector B</option> -->
        <!-- Add more options as needed -->
    <!-- </select> -->

    <select id="district" name="district" disabled class="form-control mt-2" required>
        <option value="">Select a province first</option>
    </select>

    <select id="sector" name="sector" disabled class="form-control mt-2" required>
        <option value="">Select a district first</option>
    </select>


    <select id="cell" name="cell" disabled class="form-control mt-2" required> 
        <option value="">Select a sector first</option>
    </select>



    <select id="village" name="village" disabled class="form-control mt-2" required>
        <option value="">Select a cell first</option>
    </select>
      </div>
<!--      <div class="form-group">
        <label for="fess">
          Doctor Consultancy Fees
        </label>
          <input type="text" name="docfees" class="form-control"  placeholder="Enter Doctor Consultancy Fees">
      </div> -->
      <div class="form-group mt-2">
<!--         <label for="fess">
          Doctor Contact no
        </label> -->
          <input type="text" pattern="\d{10}" title="enter only numbers and length is 10 only"  name="phone"  class="form-control"  placeholder="EnterPhone No 0780000000" required>
      </div>
      <div class="form-group mt-2">
<!--         <label for="fess">
          Doctor Email
        </label> -->
          <input type="email" name="email" class="form-control"  placeholder="Enter Email Address">
      </div>
      <!-- <div class="form-group mt-2"> -->
<!--         <label for="exampleInputPassword1">
          Password
        </label> -->
<!--           <input type="password" name="password" class="form-control"  placeholder="New Password" required="required">
      </div>

      <div class="form-group mt-2"> -->
<!--         <label for="exampleInputPassword2">
          Confirm Password
        </label> -->
<!--           <input type="password" name="confirm" class="form-control"  placeholder="Confirm Password" required="required">
      </div> -->
      <div class="btn-group col-sm-12 mt-3">
               <div class="col-sm-5 mx-4">
                <button type="submit" name="add" class="btn btn-sm btn-outline-info rounded-0 form-control"><i class="fa fa-plus-circle"></i> ADD</button></div>
               <div class="col-sm-5 "> 
                <button type="reset"  class="btn btn-sm btn-outline-danger rounded-0 form-control"><i class="fa fa-times-circle"></i> Cancel</button></div> 
      </div>
      
      </form>
              </div>
            </div>



<!--       <h2>Section title</h2>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>data</td>
              <td>rich</td>
              <td>dashboard</td>
              <td>tabular</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>information</td>
              <td>placeholder</td>
              <td>illustrative</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,004</td>
              <td>text</td>
              <td>random</td>
              <td>layout</td>
              <td>dashboard</td>
            </tr>
            <tr>
              <td>1,005</td>
              <td>dashboard</td>
              <td>irrelevant</td>
              <td>text</td>
              <td>placeholder</td>
            </tr>
            <tr>
              <td>1,006</td>
              <td>dashboard</td>
              <td>illustrative</td>
              <td>rich</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,007</td>
              <td>placeholder</td>
              <td>tabular</td>
              <td>information</td>
              <td>irrelevant</td>
            </tr>
            <tr>
              <td>1,008</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr>
            <tr>
              <td>1,009</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
            </tr>
            <tr>
              <td>1,010</td>
              <td>data</td>
              <td>rich</td>
              <td>dashboard</td>
              <td>tabular</td>
            </tr>
            <tr>
              <td>1,011</td>
              <td>information</td>
              <td>placeholder</td>
              <td>illustrative</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,012</td>
              <td>text</td>
              <td>placeholder</td>
              <td>layout</td>
              <td>dashboard</td>
            </tr>
            <tr>
              <td>1,013</td>
              <td>dashboard</td>
              <td>irrelevant</td>
              <td>text</td>
              <td>visual</td>
            </tr>
            <tr>
              <td>1,014</td>
              <td>dashboard</td>
              <td>illustrative</td>
              <td>rich</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,015</td>
              <td>random</td>
              <td>tabular</td>
              <td>information</td>
              <td>text</td>
            </tr>
          </tbody>
        </table>
      </div> -->
    </main>
  </div>
</div>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js" integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous"></script><script src="dashboard.js"></script>



    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {

            document.getElementById('province').addEventListener('change', function() {
                var provinceId = this.value;
                var districtSelect = document.getElementById('district');
                districtSelect.innerHTML = "<option>Loading...</option>";
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'get_district.php?province_id=' + provinceId, true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        districtSelect.innerHTML = xhr.responseText;
                        districtSelect.disabled = false;
                    }
                };
                xhr.send();
            });




            document.getElementById('district').addEventListener('change', function() {
                var districtId = this.value;
                var sectorSelect = document.getElementById('sector');
                sectorSelect.innerHTML = "<option>Loading...</option>";
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'get_sectors.php?district_id=' +districtId, true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        sectorSelect.innerHTML = xhr.responseText;
                        sectorSelect.disabled = false;
                    }
                };
                xhr.send();
            });






            document.getElementById('sector').addEventListener('change', function() {
                var sectorId = this.value;
                var cellSelect = document.getElementById('cell');
                cellSelect.innerHTML = "<option>Loading...</option>";
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'get_cells.php?sector_id=' + sectorId, true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        cellSelect.innerHTML = xhr.responseText;
                        cellSelect.disabled = false;
                    }
                };
                xhr.send();
            });
        

document.getElementById('cell').addEventListener('change', function() {
    var cellId = this.value;
    var villageSelect = document.getElementById('village');
    villageSelect.innerHTML = "<option>Loading...</option>";

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_villages.php?cell_id=' + cellId, true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            villageSelect.innerHTML = xhr.responseText;
            villageSelect.disabled = false;
        }
    };

    xhr.send();
});








        });
     
    </script>
</html>
