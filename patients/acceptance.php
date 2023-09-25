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
      <?php

$pat_name=$_GET['pat_name'];
$dname=$_GET['doc_name'];
$sdate=$_GET["sdate"];
$stime=$_GET["stime"];
$special=$_GET["special"];
$ticket=$_GET["ticket"];
$location=$_GET["location"];
      ?>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
              <div class="container-fluid container-fullw mt-5" id="letterContent">
<!--               <div class="container col-md-7  shadow-sm border-bottom  text-secondary  pb-2 my-3 h5 text-center">
                Please fill this form to book appointment of patient
              </div> -->
              <div class="container col-md-7  shadow border   p-3 my-3">
                    <h1 class="text-center mb-4 h4">Doctor Appointment Acceptance Letter</h1>
                    <p>Dear <?php echo $pat_name ?>,</p>
                    <p>We are pleased to inform you that your appointment request has been accepted.</p>
                    <p>Doctor: <?php echo $dname ?></p>
                    <p>Date: <?php echo $sdate ?></p>
                    <p>Time: <?php echo $stime ?></p>
                    <p>Specialization: <?php echo $special ?></p>
                    <p>Ticket Number: <?php echo $ticket ?></p>
                    <p>Location: <?php echo $location ?></p>
                    <p>Please arrive 15 minutes before your scheduled appointment time. If you have any questions or need to reschedule, please contact us as soon as possible.</p>
                    <p>Thank you for choosing our clinic for your healthcare needs.</p>
                    <p>Sincerely,</p>
                    <p><b><i>RULI DISTRICT HOSPITAL</i></b></p>
                </div>
            </div>
            <div class="text-center mt-4">
                <button class="btn btn-primary" onclick="printLetter()">Print Letter</button>
                
                <button class="btn btn-primary" id="downlodbtn">Download</button>
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
                xhr.open('GET', 'get_date.php?province_id=' + provinceId, true);
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
                xhr.open('GET', 'get_appoint.php?district_id=' +districtId, true);
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
<script>
    function printLetter() {
        var printContent = document.getElementById('letterContent');
        var originalContent = document.body.innerHTML;
        document.body.innerHTML = printContent.innerHTML;
        window.print();
        document.body.innerHTML = originalContent;
    }
</script>
<script>
  document.getElementById('downlodbtn').addEventListener('click',function(){
    var doc =new jsPDF();
     var content = document.getElementById('letterContent');
     doc.fromHTML(content,15,15,{
      'width' : 170
     });
     doc.save('downloaded.pdf');
  });

</script>
</html>
