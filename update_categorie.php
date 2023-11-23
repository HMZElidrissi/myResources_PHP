<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MyResources";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("La connexion a échoué : " . $connection->connect_error);
}

$id = $_GET['id'];
$data = "SELECT * FROM categories WHERE id = $id" ;
$result = $connection->query($data);


if ($result) {
    $categoryData = $result->fetch_assoc();
} else {
    echo "Erreur lors de la récupération des données catégories : " . $connection->error;
}

if(isset($_POST['edit']))  {

    $title = $_POST['editCategoryTitle'];

    $sql = "UPDATE categories SET nom_categorie = '$title' WHERE id = '$id'";

    if ($connection->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
    } else {
        echo "Erreur lors de la mise à jour de l'enregistrement : " . $connection->error;
    }

    header("Location: categories.php");

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
                        <h4 class="card-title">MODIFIER</h4>
                        <form class="forms-sample" method="POST" action="">
                            <div class="form-group row">
                                <label for="editCategoryTitle" class="col-sm-3 col-form-label">Titre:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="editCategoryTitle" name="editCategoryTitle" value="<?php echo $categoryData['nom_categorie']; ?>">
                                </div>
                            </div>
                            <button name="edit" type="submit" class="btn btn-primary mr-2">Enregistrer</button>
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
