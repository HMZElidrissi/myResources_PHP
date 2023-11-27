<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MyResources";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("La connexion a échoué :" . $connection->connect_error);
}

$sql_users = "SELECT COUNT(*) FROM utilisateurs";
$sql_ressources = "SELECT COUNT(*) FROM ressources";
$sql_categories = "SELECT COUNT(*) FROM categories";
$sql_subcategories = "SELECT COUNT(*) FROM souscategories";

$nbrUsers = $connection->query($sql_users)->fetch_row()[0];
$nbrRes = $connection->query($sql_ressources)->fetch_row()[0];
$nbrCat = $connection->query($sql_categories)->fetch_row()[0];
$nbrSubCat = $connection->query($sql_subcategories)->fetch_row()[0];

$connection->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>My Resources</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.php -->
    <?php include('partials/_navbar.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial -->
      <!-- partial:partials/_sidebar.php -->
      <?php include('partials/_sidebar.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Bienvenue sur Class Aziz Resources Hub,</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Nombre total d'utilisateurs</p>
                      <p class="fs-30 mb-2"><?php echo $nbrUsers ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Nombre total de ressources</p>
                        <p class="fs-30 mb-2"><?php echo $nbrRes ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Nombre total de catégories</p>
                        <p class="fs-30 mb-2"><?php echo $nbrCat ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Nombre total de sous-catégories</p>
                        <p class="fs-30 mb-2"><?php echo $nbrSubCat ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Nombre de sous-catégories par catégories</p>
                  <div class="charts-data">
                      <?php
                      $servername = "localhost";
                      $username = "root";
                      $password = "";
                      $dbname = "MyResources";

                      $connection = new mysqli($servername, $username, $password, $dbname);

                      if ($connection->connect_error) {
                          die("La connexion a échoué :" . $connection->connect_error);
                      }

                      $sql_categories = "SELECT * FROM categories";
                      $result_categories = $connection->query($sql_categories);

                      if ($result_categories->num_rows > 0) {
                          while ($category_row = $result_categories->fetch_assoc()) {
                              $nom_category = $category_row["nom_categorie"];
                              $categorie_id = $category_row["id"];

                              // Calculate the number of subcategories per category
                              $sql_nbr_souscategorie = "SELECT COUNT(*) as nbr_souscategorie FROM souscategories WHERE categorie_id = $categorie_id";
                              $result_nbr_souscategorie = $connection->query($sql_nbr_souscategorie);
                              $nbr_souscategorie_row = $result_nbr_souscategorie->fetch_assoc();
                              $nbr_souscategorie_per_category = $nbr_souscategorie_row["nbr_souscategorie"];

                              // Calculate the total number of subcategories
                              $sql_nbr_total_souscategorie = "SELECT COUNT(*) as nbr_total_souscategorie FROM souscategories";
                              $result_nbr_total_souscategorie = $connection->query($sql_nbr_total_souscategorie);
                              $nbr_total_sous_category_row = $result_nbr_total_souscategorie->fetch_assoc();
                              $nbr_total_sous_category = $nbr_total_sous_category_row["nbr_total_souscategorie"];

                              // Calculate the percentage completion
                              $percentage_completion = ($nbr_souscategorie_per_category / $nbr_total_sous_category) * 100;

                              echo '<div class="mt-3">';
                              echo '<p class="mb-0">' . $nom_category . '</p>';
                              echo '<div class="d-flex justify-content-between align-items-center">';
                              echo '<div class="progress progress-md flex-grow-1 mr-4">';
                              echo '<div class="progress-bar bg-info" role="progressbar" style="width: ' . $percentage_completion . '%" aria-valuenow="' . $percentage_completion . '" aria-valuemin="0" aria-valuemax="100"></div>';
                              echo '</div>';
                              echo '<p class="mb-0">' . $nbr_souscategorie_per_category . '</p>';
                              echo '</div>';
                              echo '</div>';
                          }
                      } else {
                          echo '<p>Aucune catégorie trouvée</p>';
                      }

                      $connection->close();
                      ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.php -->
        <?php include('partials/_footer.php'); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>