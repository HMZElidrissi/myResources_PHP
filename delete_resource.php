<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["resource_id"])) {
        $resource_id = $_POST["resource_id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "MyResources";

        $connection = new mysqli($servername, $username, $password, $dbname);

        if ($connection->connect_error) {
            die("La connexion a échoué :" . $connection->connect_error);
        }

        $sql_delete = "DELETE FROM ressources WHERE id = $resource_id";
        if ($connection->query($sql_delete) === TRUE) {
            header("Location: ".$_SERVER['HTTP_REFERER']);
        } else {
            echo "Erreur lors de la suppression de la ressource: " . $connection->error;
        }

        $connection->close();
    } else {
        echo "l'ID est invalide";
    }
} else {
    echo "Méthode de requête invalide";
}

