<?php
include('connection.php');

$squadsQuery = "SELECT * FROM squads";
$squadsResult = $connection->query($squadsQuery);

if ($squadsResult) {
    $squads = $squadsResult->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Erreur lors de la récupération des squads : " . $connection->error;
}

if(isset($_POST['add']))  {

    $username = $_POST['addUserName'];
    $email = $_POST['addUserEmail'];
    $squad = $_POST['addUserSquad'];

    $sql = "INSERT INTO utilisateurs (nom_utilisateur, email, squad_id)
            VALUES ('$username', '$email', '$squad');";

    if ($connection->query($sql) === TRUE) {
        echo "Enregistrement avec succès";
    } else {
        echo "Erreur lors de l'enregistrement : " . $connection->error;
    }

    header("Location: users.php");

}

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
                <div class="card col-md-8 mx-auto">
                    <div class="card-body">
                        <h4 class="card-title">+ AJOUTER UN NOUVEAU UTILISATEUR</h4>
                        <form class="forms-sample" method="POST" action="">
                            <div class="form-group row">
                                <label for="addUserName" class="col-sm-3 col-form-label">Nom d'utilisateur:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="addUserName" name="addUserName" placeholder="Nom du nouveau utilisateur ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="addUserEmail" class="col-sm-3 col-form-label">Email:</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="addUserEmail" name="addUserEmail" placeholder="Email du nouveau utilisateur ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="addUserSquad" class="col-sm-3 col-form-label">Squad:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="addUserSquad" name="addUserSquad">
                                        <?php foreach ($squads as $squad): ?>
                                            <option value="<?php echo $squad['id']; ?>">
                                                <?php echo $squad['nom_squad']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <button name="add" type="submit" class="btn btn-primary mr-2">Enregistrer</button>
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
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>
