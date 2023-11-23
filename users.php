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
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.php -->
      <?php include('partials/_navbar.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.php -->
        <?php include('partials/_sidebar.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <a class="btn btn-outline-primary" href="add_user.php">+ Ajouter un utilisateur</a>
                <br>
                <br>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Nom d'utilisateur</th>
                      <th>E-mail</th>
                      <th>Squad</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "MyResources";

                  $connection = new mysqli($servername, $username, $password, $dbname);

                  if ($connection->connect_error) {
                      die("La connexion a échoué :" . $connection->connect_error);
                  }

                  $sql_users = "SELECT * FROM utilisateurs";
                  $result = $connection->query($sql_users);

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          $squad_id = $row["squad_id"];
                          $sql_squad = "SELECT nom_squad FROM squads WHERE id = $squad_id";
                          $result_squad = $connection->query($sql_squad);
                          $squad_row = $result_squad->fetch_assoc();
                          $nom_squad = $squad_row["nom_squad"];

                          echo "<tr>";
                          echo "<td>" . $row["nom_utilisateur"] . "</td>";
                          echo "<td>" . $row["email"] . "</td>";
                          echo "<td>" . $nom_squad . "</td>";
                          echo "<td><a href='update_user.php?id=" . $row["id"] . "'><i class='icon-md text-info mdi mdi-pencil-box'></i></a>
                                    <i class='icon-md text-danger mdi mdi-delete' data-toggle='modal' data-target='#deleteUser' data-user-id='" . $row["id"] . "'></i></td>";
                          echo "</tr>";
                      }
                  } else {
                      echo "<tr><td colspan='4'>Aucun utilisateur trouvé</td></tr>";
                  }

                  $connection->close();
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.php -->
        <?php include('partials/_footer.php'); ?>
        <!-- partial -->
      </div>
          <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="deleteUserLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="deleteUserLabel">Supprimer</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <h3>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</h3>
                      </div>
                      <div class="modal-footer">
                          <form method="POST" action="delete_user.php">
                              <input type="hidden" name="user_id" id="deleteUserId" value="">
                              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Fermer</button>
                              <button type="submit" class="btn btn-danger">Supprimer</button>
                          </form>
                      </div>
                  </div>
              </div>
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
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script>
      $('#deleteUser').on('show.bs.modal', function (event) {
          let button = $(event.relatedTarget);
          let userId = button.data('user-id');
          let modal = $(this);
          modal.find('#deleteUserId').val(userId);
      });
  </script>
      <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
