<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un utilisateur</title>
</head>
<body>
    <h1>Créer un nouvel utilisateur</h1>
    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="mot_de_passe">Mot de passe:</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

        <label for="type">Type:</label>
        <select id="type" name="type">
            <option value="Interne">Interne</option>
            <option value="Externe">Externe</option>
        </select><br>

        <label for="role">Rôle:</label>
        <select id="role" name="role">
            <option value="Participant">Participant</option>
            <option value="Organisateur">Organisateur</option>
            <option value="Administrateur">Administrateur</option>
        </select><br>

        <input type="submit" value="Créer l'utilisateur">
    </form>

    <p>Déjà inscrit ? <a href="index.php?action=login">Se connecter</a></p>
</body>
</html>