<?php
    $message="";
if (!isset($_POST["btSubmit"])) {
    $cli_login = "";
    $cli_nom = "";
    $cli__prenom = "";
    $cli_adresse = "";
    $cli_ville = "";
    $cli_cp = "";
} else {
    extract($_POST);

    //Vérifier si le login saisi est unique
    $sql = "select * from client where cli_login='$cli_login'";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if ($data->rowCount() > 0) {
        //Si le login saisi existe déjà
        $message = "Erreur, le login saisi est déjà pris ! Veuillez réessayer";
    } else {
        //Si le login est unique
        $cli_login = mysqli_real_escape_string($link, $cli_login);
        $cli_mdp = password_hash($cli_mdp, PASSWORD_DEFAULT);
        $cli_prenom = mysqli_real_escape_string($link, $cli_prenom);
        $cli_nom = mysqli_real_escape_string($link, $cli_nom);
        $cli_adresse = mysqli_real_escape_string($link, $cli_adresse);
        $cli_ville = mysqli_real_escape_string($link, $cli_ville);
        $cli_cp = mysqli_real_escape_string($link, $cli_cp);
        $sql = "
insert into client 
(cli_id, cli_login, cli_mdp, cli_prenom, cli_nom, cli_adresse, cli_ville, cli_cp, cli_profil ) values
(null, '$cli_login', '$cli_mdp', '$cli_prenom', '$cli_nom', '$cli_adresse', '$cli_ville', '$cli_cp', $cli_profil)";
        $result = mysqli_query($link, $sql);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require "gabarit/inc_head.php"; ?>
</head>

<body>
    <?php require "gabarit/config.php"; ?>
    <nav>
        <?php require "gabarit/inc_nav.php"; ?>
    </nav>
    <main>
        <hr>
        <h2>Page d'inscription</h2>
        <h3><?php echo $message ?></h3>
        <form method="POST">
            <p>
                <label for="cli_login">Votre login :</label>
                <input type="text" id="cli_login" name="cli_login" size="40" maxlength="50">
            </p>
            <p>
                <label for="cli_mdp">Mot de passe :</label>
                <input type="password" id="cli_mdp" name="cli_mdp" size="40" maxlength="100">
            </p>
            <p>
                <label for="cli_prenom">prenom :</label>
                <input type="text" id="cli_prenom" name="cli_prenom" size="40" maxlength="100">
                <label for="cli_nom">nom :</label>
                <input type="text" id="cli_nom" name="cli_nom" size="40" maxlength="100">
            </p>
            <p>
                <label for="cli_adresse">adresse :</label>
                <input type="text" id="cli_adresse" name="cli_adresse" size="40" maxlength="100">
            </p>
            <p>
                <label for="cli_ville">Ville :</label>
                <input type="text" id="cli_ville" name="cli_ville" size="40" maxlength="100">
                <label for="cli_cp">Code Postal:</label>
                <input type="text" id="cli_cp" name="cli_cp" size="40" maxlength="100">
            </p>

            <input type="hidden" name="cli_profil" value="2">
            <input type="submit" name="btSubmit">
        </form>
    </main>
    <footer>
        <?php require "gabarit/inc_footer.php" ?>
    </footer>
</body>
</html>