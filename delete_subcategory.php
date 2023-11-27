<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["subcategory_id"])) {
        $subcategory_id = $_POST["subcategory_id"];

        include('connection.php');

        $sql_delete = "DELETE FROM souscategories WHERE id = $subcategory_id";
        if ($connection->query($sql_delete) === TRUE) {
            header("Location: ".$_SERVER['HTTP_REFERER']);
        } else {
            echo "Erreur lors de la suppression de la sous-catégorie: " . $connection->error;
        }

        $connection->close();
    } else {
        echo "l'ID est invalide";
    }
} else {
    echo "Méthode de requête invalide";
}

