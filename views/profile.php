<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil Utilisateur</title>
</head>
<body>
    <h1>Profil de <?php echo $user['prenom'] . ' ' . $user['nom']; ?></h1>
    <p>Email: <?php echo $user['email']; ?></p>
    <p>Type: <?php echo $user['type']; ?></p>
    <p>Rôle: <?php echo $user['role']; ?></p>
    <a href="index.php?action=logout">Se déconnecter</a>
</body>
</html>