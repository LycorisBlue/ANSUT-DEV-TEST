<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="POST" action="index.php?action=login">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="mot_de_passe">Mot de passe:</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

        <input type="submit" value="Se connecter">
    </form>
    <p>Pas encore inscrit ? <a href="index.php?action=register">S'inscrire</a></p>
</body>
</html>