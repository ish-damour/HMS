<?php
session_start();

?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php include('../includes/connection.php') ?>
<?php include('../includes/header.php') ?>
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
<?php include('../includes/sidebar.php') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-secondary">Admin|<span class="h5">Manage Doctors</span></h1>
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



      <h2 class="text-center">List Of All Doctors</h2>
      <hr>
      <div class="table-responsive small">
          <?php
         $sel=mysqli_query($con,"SELECT * FROM doctors,province,district,sector,cells,villages WHERE doctors.docprovince=province.province_id and doctors.docdistrict=district.district_id and doctors.docsector=sector.sector_id and doctors.doccell=cells.cell_id and doctors.docvillage=villages.village_id");
          if (mysqli_num_rows($sel)>0) {
           ?>
        <table class="table table-striped table-sm">
             <thead>
                <tr>
                      <!-- /<th>ID</th> -->
                  <th hidden>ID</th>
                  <th class="col">Specialization</th>
                  <th>Doctor Name</th>
                  <th class="col">Province</th>
                  <th>District</th>
                  <th>Secetor</th>
                  <th>Cell</th>
                  <th>Village</th>
                  <th>Contact/Phone</th>
                  <th>Email</th>
                  <th>AddedDate</th>
                  <th>Action</th>
                </tr>
                </thead>

      <?php      while($fec=mysqli_fetch_array($sel)){

        ?>
<tbody>
                <tr><form method="post">
                  <?php $idse=$fec["doc_id"];
                        $quase=$fec["docname"]; 
                  ?>
                  <td hidden><input type="text" name="idc" value="<?php echo $fec["doc_id"]?>" class="input-sm" ></td>    
                  <td><input type="text" name="Specilization"  value="<?php echo $fec["Specialization"]?>" class="form-control-sm "></td>
                  <td><input type="text" name="docname" value="<?php echo $fec["docname"]?>"class="form-control-sm " ></td>
                  <td>
                    <select  name="docprovince" id="province" class="form-control-sm " >
         <?php

        $selectpro=mysqli_query($con,"SELECT * FROM province ");
        if (mysqli_num_rows($selectpro)>0) {
          ?>
  <option value="<?php echo $fec["docprovince"]?>"><?php echo $fec["province_name"]?></option>

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
                  </td>

                  <td>   
    <select id="district" name="district" disabled class="form-control-sm " required>
        <option  value="<?php echo $fec["docdistrict"]?>"><?php echo $fec["district_name"]?></option>
    </select>
              </td>
                  <td>
    <select id="sector" name="sector" disabled class="form-control-sm" required>
        <option value="<?php echo $fec["docsector"]?>"><?php echo $fec["sector_name"]?></option>
    </select>

                  </td>
                  <td>
    <select id="cell" name="cell" disabled class="form-control-sm" required> 
        <option value="<?php echo $fec["doccell"]?>"><?php echo $fec["cell_name"]?></option>
    </select>
                  </td>
                  <td>
                    <select id="village" name="village" disabled class="form-control-sm" required>
                     <option value="<?php echo $fec["docvillage"]?>"><?php echo $fec["village_name"]?></option>
                  </select>
                  </td>
                  <td><input type="text" name="Quantity" value="<?php echo $fec["doccontact"]?>"class="form-control-sm " ></td>
                  <td><input type="text" name="Entereddate" value="<?php echo $fec["docemail"]?>" class="form-control-sm " >
                  </td>
                  <td><input type="date" name="Enteredby" value="<?php echo $fec["docemail"]?>" class="form-control-sm "></td>

                        <td>
                          <div class="btn-group">
                    <button type="submit" class="btn btn-primary btn-sm  mr-2"  name="selec"><i class="fa fa-edit"></i></button>
                     <button type="submit" class="btn btn-danger btn-sm "  name="delet"><i class="fa fa-trash"></i></button></div>
                 </form>
                </td>
                </tr> 

                <?php

            }

          }else{
            $message="";
  $message="<div class='alert text-center alert-danger mt-2'>No Books Available </div>";     
    }
   
          ?>


                </tbody>
        </table>
      </div>
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
  </body>
</html>
