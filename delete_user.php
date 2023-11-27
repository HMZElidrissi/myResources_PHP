<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["user_id"])) {
        $user_id = $_POST["user_id"];

        include('connection.php');

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

