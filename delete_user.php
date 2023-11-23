<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["user_id"])) {
        $user_id = $_POST["user_id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "MyResources";

        $connection = new mysqli($servername, $username, $password, $dbname);

        if ($connection->connect_error) {
            die("La connexion a échoué :" . $connection->connect_error);
        }

        $sql_delete = "DELETE FROM utilisateurs WHERE id = $user_id";
        if ($connection->query($sql_delete) === TRUE) {
            header("Location: ".$_SERVER['HTTP_REFERER']);
        } else {
            echo "Erreur lors de la suppression de l'utilisateur: " . $connection->error;
        }

        $connection->close();
    } else {
        echo "l'ID est invalide";
    }
} else {
    echo "Méthode de requête invalide";
}

