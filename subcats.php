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
    <?php include('./partials/_navbar.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.php -->
        <?php include('./partials/_sidebar.php'); ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card col-md-6 mx-auto">
                    <div class="card-body">
                        <a class="btn btn-outline-primary" href="add_subcategory.php">+ Ajouter une sous-catégorie</a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Titre:</th>
                                    <th>Catégorie:</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                include('connection.php');

                                $sql = "SELECT * FROM souscategories";
                                $result = $connection->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $categorie_id = $row["categorie_id"];
                                        $sql_categorie = "SELECT nom_categorie FROM categories WHERE id = $categorie_id";
                                        $result_categorie = $connection->query($sql_categorie);
                                        $categorie_row = $result_categorie->fetch_assoc();
                                        $nom_categorie = $categorie_row["nom_categorie"];

                                        echo "<tr>";
                                        echo "<td><label class='badge badge-outline-info'>" . $row["nom_souscategorie"] . "</label></td>";
                                        echo "<td><label class='badge badge-outline-success'>" . $nom_categorie . "</label></td>";
                                        echo "<td><a href='update_subcategory.php?id=" . $row["id"] . "'><i class='icon-md text-info mdi mdi-pencil-box'></i></a>
                                    <i class='icon-md text-danger mdi mdi-delete' data-toggle='modal' data-target='#deleteSubCategory' data-subcategory-id='" . $row["id"] . "'></i></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>Aucune sous-catégorie trouvée</td></tr>";
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
            <div class="modal fade" id="deleteSubCategory" tabindex="-1" role="dialog" aria-labelledby="deleteSubCategoryLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteSubCategoryLabel">Supprimer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3>Êtes-vous sûr de vouloir supprimer cette sous-catégorie ?</h3>
                        </div>
                        <div class="modal-footer">
                            <form method="POST" action="delete_subcategory.php">
                                <input type="hidden" name="subcategory_id" id="deleteSubCategoryId" value="">
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
        $('#deleteSubCategory').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let subcategoryId = button.data('subcategory-id');
            let modal = $(this);
            modal.find('#deleteSubCategoryId').val(subcategoryId);
        });
    </script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>
