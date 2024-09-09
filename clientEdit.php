<html>

<head>
    <?php require "gabarit/inc_head.php"; ?>
</head>

<body>
    <?php require "gabarit/config.php"; ?>
    <nav>
        <?php require "gabarit/inc_nav.php"; ?>
    </nav>
    <main>
        <h1>EDITER UN CLIENT</h1>
        <?php
        $action = $_GET["action"];
        $cli_id = $_GET["cli_id"];
        if ($action == "edit") {
            $sql = "select * from client, profil where cli_id='$cli_id'";
            $result = mysqli_query($link, $sql);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            extract($data[0]);
        ?>
            <form method="POST">
                <p>
                    <label for="cli_login">Votre login :</label>
                    <input type="text" id="cli_login" name="cli_login" size="40" maxlength="50" value="<?= $cli_login ?>">
                </p>
                <p>
                    <label for="cli_prenom">prenom :</label>
                    <input type="text" id="cli_prenom" name="cli_prenom" size="40" maxlength="100" value="<?= $cli_prenom ?>">
                    <label for="cli_nom">nom :</label>
                    <input type="text" id="cli_nom" name="cli_nom" size="40" maxlength="100" value="<?= $cli_nom ?>">
                </p>
                <p>
                    <label for="cli_adresse">adresse :</label>
                    <input type="text" id="cli_adresse" name="cli_adresse" size="40" maxlength="100" value="<?= $cli_adresse ?>">
                </p>
                <p>
                    <label for="cli_ville">Ville :</label>
                    <input type="text" id="cli_ville" name="cli_ville" size="40" maxlength="100" value="<?= $cli_ville ?>">
                    <label for="cli_cp">Code Postal:</label>
                    <input type="text" id="cli_cp" name="cli_cp" size="40" maxlength="100" value="<?= $cli_cp ?>">
                </p>
                <label for="cli_profil">Profil</label>
                <select name="cli_profil" id="cli_profil">
                    <option value="1">Admin</option>
                    <option value="2">Client</option>
                </select>
                </p>
                <input type="submit" name="btSubmit">
            </form>
        <?php if (isset($_POST["btSubmit"])) {
                extract($_POST);
                $cli_login = mysqli_real_escape_string($link, $cli_login);
                $cli_mdp = password_hash($cli_mdp, PASSWORD_DEFAULT);
                $cli_prenom = mysqli_real_escape_string($link, $cli_prenom);
                $cli_nom = mysqli_real_escape_string($link, $cli_nom);
                $cli_adresse = mysqli_real_escape_string($link, $cli_adresse);
                $cli_ville = mysqli_real_escape_string($link, $cli_ville);
                $cli_cp = mysqli_real_escape_string($link, $cli_cp);
                $sql = "
                    update client set
                    cli_login='$cli_login', cli_prenom='$cli_prenom',
                    cli_nom='$cli_nom', cli_adresse='$cli_adresse',
                    cli_ville='$cli_ville', cli_cp='$cli_cp',
                    cli_profil=$cli_profil where cli_id=$cli_id";
                $result = mysqli_query($link, $sql);
            }
        } else if ($action == "del") {
            $sql = "delete from client where cli_id='$cli_id'";
            $result = mysqli_query($link, $sql);
        } ?>
    </main>
    <footer>
        <?php require "gabarit/inc_footer.php" ?>
    </footer>
</body>
</html>