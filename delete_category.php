<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["category_id"])) {
        $category_id = $_POST["category_id"];

        include('connection.php');

        $sql_delete = "DELETE FROM categories WHERE id = $category_id";
        if ($connection->query($sql_delete) === TRUE) {
            header("Location: ".$_SERVER['HTTP_REFERER']);
        } else {
            echo "Erreur lors de la suppression de la catégorie: " . $connection->error;
        }

        $connection->close();
    } else {
        echo "l'ID est invalide";
    }
} else {
    echo "Méthode de requête invalide";
}

