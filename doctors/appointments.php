<?php
session_start();
if (!isset($_SESSION["loggedemail"]) or !isset($_SESSION['loggedname'] ) or !isset($_SESSION['loggedid'] )) {
  ?>
<script type="text/javascript">
window.location.href="login.php"; 
</script>
  <?php
}else{
  $loggedname=$_SESSION['loggedname'];
  $loggedemail=$_SESSION['loggedemail'];
  $loggedid=$_SESSION['loggedid'];
}
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php include('../includes/connection.php') ?>
<?php include('../includes/header0.php') ?>
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
<?php include('../includes/sidebar0.php') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-dark"><span class="text-muted">Doctor, </span><span class="h5"><strong><?php echo $loggedname ?></strong></span></h1>
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
      <?php echo $message ?>
      <hr>
      <div class="table-responsive small">
          <?php
         $select=mysqli_query($con,"SELECT * FROM appointments a JOIN doctor_specialization s ON a.appo_specialization_id = s.specialization_id JOIN doctors d ON a.appo_doc_id = d.doc_id WHERE a.appo_doc_id = '$loggedid';");


          if (mysqli_num_rows($select)>0) {
           ?>
        <table class="table table-striped table-sm">
             <thead>
                <tr>
                      <!-- /<th>ID</th> -->
                  <th hidden>Appo_ID</th>
                  <th class="col">Specialization</th>
                  <th hidden>Doctor Name</th>
                  <th class="col">start_date</th>
                  <th>start_time</th>
                    <th>end_time</th>
                  <th>Number offered</th>
                  <th>Remain</th>
                  <th>place</th>
                  <th>Status</th>
                  <th style="position: sticky;right: 0;z-index: 1;">Action</th>
                </tr>
                </thead>

      <?php      while($fec=mysqli_fetch_array($select)){
?>

<tbody>
    <form method="post" action="managedoctorlogic.php">
<?php

if ($fec["status"]=="Expired") {



?>
                <tr>
                  <?php $idse=$fec["appointment_id"];
                        // $quase=$fec["docname"]; 
                  ?>
                  <td hidden><input type="text" name="appo_id" value="<?php echo $fec["appointment_id"]?>" class="input-sm" ></td>    
                  <td><input type="text" name="Specilization" value="<?php echo $fec["docspecialization"]?>"class="form-control-sm " disabled  ></td>
                  <td hidden><input type="text" name="docname" value="<?php echo $fec["docname"]?>"class="form-control-sm " ></td>
                  <td>

        <input value="<?php echo $fec["start_date"] ?>" class="form-control-sm " name="startdate" disabled>
                  </td>
                    <td>
        <input value="<?php echo $fec["start_time"] ?>" class="form-control-sm " name="starttime" disabled>
                  </td>
                    <td>
        <input value="<?php echo $fec["end_time"] ?>" class="form-control-sm " name="endtime" disabled>
                  </td>
                    <td>
        <input value="<?php echo $fec["numberofpatient"] ?>" class="form-control-sm " name="endtime" disabled>
                  </td>

                    <td>
        <input value="<?php echo $fec["remainplaces"] ?>" class="form-control-sm " name="endtime" disabled>
                  </td>                  
                  <td><input type="email"   name="docemail" value="<?php echo $fec["place"]?>" class="form-control-sm " disabled>
                  </td>                 
                  <td><input type="text" disabled value="<?php echo $fec["created_ate"]?>" class="form-control-sm "></td>

                        <td class="sticky-col" style="position: sticky;right: 0;z-index: 1;">
                          <div class="btn-group">
                    <!-- <button type="submit" class="btn btn-outline-primary btn-sm  mx-2"  name="updatedoctor"><i class="fa fa-edit"></i></button>
                     <button type="submit" class="btn btn-outline-danger btn-sm "  name="delet"><i class="fa fa-trash"></i></button> -->
                         Expired
                     </div>
                 
                </td>
                </tr> 
<?php
}else{

    ?>
                <tr>
                  <?php $idse=$fec["appointment_id"];
                        // $quase=$fec["docname"]; 
                  ?>
                  <td hidden><input type="text" name="appo_id" value="<?php echo $fec["appointment_id"]?>" class="input-sm" ></td>    
                  <td><input type="text" name="Specilization" value="<?php echo $fec["docspecialization"]?>"class="form-control-sm " ></td>
                  <td hidden><input type="text" name="docname" value="<?php echo $fec["docname"]?>"class="form-control-sm " ></td>
                  <td>

        <input value="<?php echo $fec["start_date"] ?>" class="form-control-sm " name="startdate" required>
                  </td>
                    <td>
        <input value="<?php echo $fec["start_time"] ?>" class="form-control-sm " name="starttime" required>
                  </td>
                    <td>
        <input value="<?php echo $fec["end_time"] ?>" class="form-control-sm " name="endtime" >
                  </td>
                    <td>
        <input value="<?php echo $fec["numberofpatient"] ?>" class="form-control-sm " name="endtime" >
                  </td>
                                      <td>
        <input value="<?php echo $fec["remainplaces"] ?>" class="form-control-sm " name="endtime" >
                  </td>
                  <td><input type="email"   name="docemail" value="<?php echo $fec["place"]?>" class="form-control-sm " >
                  </td>                 
                  <td><input type="text" disabled value="<?php echo $fec["created_ate"]?>" class="form-control-sm "></td>

                        <td class="sticky-col" style="position: sticky;right: 0;z-index: 1;">
                          <div class="btn-group">
                    <button type="submit" class="btn btn-outline-primary btn-sm  mx-2"  name="updatedoctor"><i class="fa fa-edit"></i></button>
                     <button type="submit" class="btn btn-outline-danger btn-sm "  name="delet"><i class="fa fa-trash"></i></button></div>
                 
                </td>
                </tr> 
<?php
}




        ?>


                <?php

            }

          }else{
            $message="";
  $message="<div class='alert text-center alert-danger mt-2'>No Books Available </div>";     
    }
   
          ?>


                </form></tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js" integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous"></script><script src="dashboard.js"></script>



    <script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    var provinces = document.querySelectorAll('.province');

    provinces.forEach(function(province) {
        province.addEventListener('change', function() {
            var provinceId = this.value;
            var districtSelect = this.closest('tr').querySelector('.district');
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
    });



    var districts = document.querySelectorAll('.district');

    districts.forEach(function(district) {
        district.addEventListener('change', function() {
            var districtId = this.value;
            var sectorSelect = this.closest('tr').querySelector('.sector');
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
    });




    var sectors = document.querySelectorAll('.sector');

    sectors.forEach(function(sector) {
        sector.addEventListener('change', function() {
            var sectorId = this.value;
            var cellSelect = this.closest('tr').querySelector('.cell');
            cellSelect.innerHTML = "<option>Loading...</option>";
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_cells.php?sector_id=' +sectorId, true);
            xhr.onload = function() {
                    if (xhr.status === 200) {
                        cellSelect.innerHTML = xhr.responseText;
                        cellSelect.disabled = false;
                    }
            };
            xhr.send();
        });
    });


    var cells = document.querySelectorAll('.cell');

    cells.forEach(function(cell) {
        cell.addEventListener('change', function() {
            var cellId = this.value;
            var villageSelect = this.closest('tr').querySelector('.village');
            villageSelect.innerHTML = "<option>Loading...</option>";
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_villages.php?cell_id=' +cellId, true);
            xhr.onload = function() {
                    if (xhr.status === 200) {
                        villageSelect.innerHTML = xhr.responseText;
                        villageSelect.disabled = false;
                    }
            };
            xhr.send();
        });
    });


    });   


    // Add similar event listeners for other dropdowns (district, sector, cell, village)
// });



// document.addEventListener('DOMContentLoaded', function() {


//             document.getElementById('province').addEventListener('change', function() {
//                 var provinceId = this.value;
//                 var districtSelect = document.getElementById('district');
//                 districtSelect.innerHTML = "<option>Loading...</option>";
//                 var xhr = new XMLHttpRequest();
//                 xhr.open('GET', 'get_district.php?province_id=' + provinceId, true);
//                 xhr.onload = function() {
//                     if (xhr.status === 200) {
//                         districtSelect.innerHTML = xhr.responseText;
//                         districtSelect.disabled = false;
//                     }
//                 };
//                 xhr.send();
//             });



//             document.getElementById('district').addEventListener('change', function() {
//                 var districtId = this.value;
//                 var sectorSelect = document.getElementById('sector');
//                 sectorSelect.innerHTML = "<option>Loading...</option>";
//                 var xhr = new XMLHttpRequest();
//                 xhr.open('GET', 'get_sectors.php?district_id=' +districtId, true);
//                 xhr.onload = function() {
//                     if (xhr.status === 200) {
//                         sectorSelect.innerHTML = xhr.responseText;
//                         sectorSelect.disabled = false;
//                     }
//                 };
//                 xhr.send();
//             });






//             document.getElementById('sector').addEventListener('change', function() {
//                 var sectorId = this.value;
//                 var cellSelect = document.getElementById('cell');
//                 cellSelect.innerHTML = "<option>Loading...</option>";
//                 var xhr = new XMLHttpRequest();
//                 xhr.open('GET', 'get_cells.php?sector_id=' + sectorId, true);
//                 xhr.onload = function() {
//                     if (xhr.status === 200) {
//                         cellSelect.innerHTML = xhr.responseText;
//                         cellSelect.disabled = false;
//                     }
//                 };
//                 xhr.send();
//             });
        

// document.getElementById('cell').addEventListener('change', function() {
//     var cellId = this.value;
//     var villageSelect = document.getElementById('village');
//     villageSelect.innerHTML = "<option>Loading...</option>";

//     var xhr = new XMLHttpRequest();
//     xhr.open('GET', 'get_villages.php?cell_id=' + cellId, true);

//     xhr.onload = function() {
//         if (xhr.status === 200) {
//             villageSelect.innerHTML = xhr.responseText;
//             villageSelect.disabled = false;
//         }
//     };

//     xhr.send();
// });








//         });
     
    </script>
  </body>
</html>
