<?php
session_start();
if (!isset($_SESSION["loggedemail"]) or !isset($_SESSION['loggedname'] ) ) {
  ?>
<script type="text/javascript">
window.location.href="login.php"; 
</script>
  <?php
}else{
  $loggedname=$_SESSION['loggedname'];
  $loggedemail=$_SESSION['loggedemail'];
}
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<?php include('../includes/header0.php') ?>
<div class="container-fluid">
  <div class="row">
<?php include('../includes/sidebar0.php') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><span class="text-muted">Doctor,</span><strong class="h3 text-"> <?php echo $loggedname ?></strong></h1>
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
              <div class="row">

                <div class="col-sm-3 mx-4 border border-secondary pt-3">
                  <div class="panel panel-dark no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary "></i> <i class="fas fa-user-edit fa-stack-1x fa-inverse"></i> </span>
                      <h2 class="text-secondary">My Profile</h2>
                      
                      <p class="links cl-effect-1">
                        <a href="#" class="nav-link link-primary">
                          [ Update profile ]
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3 mx-4 border border-secondary pt-3">
                  <div class="panel panel-dark no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary "></i> <i class="fas fa-stethoscope fa-stack-1x fa-inverse"></i> </span>
                      <h2 class="text-secondary">Offer/Give/Add</h2>
                      
                      <p class="links cl-effect-1">
                        <a href="addoffer.php" class="nav-link link-primary">
                          [ Offer appointment to patients]
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3 mx-4 border border-secondary pt-3">
                  <div class="panel panel-dark no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary "></i> <i class="fas fa-user-md fa-stack-1x fa-inverse"></i> </span>
                      <h2 class="text-secondary">Manage</h2>
                      
                      <p class="links cl-effect-1">
                        <a href="appointments.php" class="nav-link link link-primary">
                          [ Manage your appointments ]
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
<!--                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                      <h2 class="StepTitle"> Book My Appointment</h2>
                      
                      <p class="links cl-effect-1">
                        <a href="book-appointment.php">
                          Book Appointment
                        </a>
                      </p>
                    </div>
                  </div>
                </div> -->
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js" integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>
