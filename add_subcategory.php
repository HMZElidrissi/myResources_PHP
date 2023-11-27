<?php
include('connection.php');

$categoriesQuery = "SELECT * FROM categories";
$categoriesResult = $connection->query($categoriesQuery);

if ($categoriesResult) {
    $categories = $categoriesResult->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Erreur lors de la récupération des catégories : " . $connection->error;
}

if(isset($_POST['add']))  {

    $title = $_POST['addSubCategoryTitle'];
    $category = $_POST['addSubCategoryCat'];

    $sql = "INSERT INTO souscategories (nom_souscategorie, categorie_id)
            VALUES ('$title', '$category');";

    if ($connection->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
    } else {
        echo "Erreur lors de la mise à jour de l'enregistrement : " . $connection->error;
    }

    header("Location: subcats.php");

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
                <div class="card col-md-6 mx-auto">
                    <div class="card-body">
                        <h4 class="card-title">+ AJOUTER UNE NOUVELLE SOUS-CATÉGORIE</h4>
                        <br>
                        <form class="forms-sample" method="POST" action="">
                            <div class="form-group row">
                                <label for="addSubCategoryTitle" class="col-sm-3 col-form-label">Titre:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="addSubCategoryTitle" name="addSubCategoryTitle" placeholder="Titre du nouvelle sous-catégorie ...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="addSubCategoryCat" class="col-sm-3 col-form-label">Catégorie:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="addSubCategoryCat" name="addSubCategoryCat">
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?php echo $category['id']; ?>">
                                                <?php echo $category['nom_categorie']; ?>
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
