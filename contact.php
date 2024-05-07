<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php'; // inclure votre fichier de configuration de base de données

    $nom = $conn->real_escape_string($_POST['nom']);
    $email = $conn->real_escape_string($_POST['email']);
    $sujet = $conn->real_escape_string($_POST['sujet']);
    $commentaire = $conn->real_escape_string($_POST['commentaire']);

    $sql = "INSERT INTO contact (nom, email, sujet, commentaire) VALUES ('$nom', '$email', '$sujet', '$commentaire')";

    if ($conn->query($sql) === TRUE) {
        echo "Merci pour votre message!";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contactez-nous</title>
</head>
<body>
    <form action="contact.php" method="post">
        Votre nom: <input type="text" name="nom" required><br>
        Email: <input type="email" name="email" required><br>
        Sujet: <input type="text" name="sujet" required><br>
        Commentaire: <textarea name="commentaire" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
