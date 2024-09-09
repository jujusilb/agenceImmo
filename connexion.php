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
        <h1>CONNEXION</h1>
        <form method="POst">
            <p>
                <label for="cli_login">Votre login :</label>
                <input type="text" id="cli_login" name="cli_login" size="40" maxlength="50">
                <br /><label for="cli_mdp">Mot de passe :</label>
                <input type="password" id="cli_mdp" name="cli_mdp" size="40" maxlength="100">
            </p>
            <input type="submit" name="btSubmit">
        </form>
        <?php if (isset($_POST["btSubmit"])) {
            extract($_POST);
            debug($_POST, "post");
            $sql = "
                select * from client
                where cli_login='$cli_login'
                ";
            echo $sql;
            $result = mysqli_query($link, $sql);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (count($data) > 0) {
                extract($data[0]);
                debug($_POST, "post");
                debug($data[0], "data");
                echo "cli login=" . $cli_login;
                echo "mdp=" . $cli_mdp;
                if (password_verify($_POST["cli_mdp"], $cli_mdp)) {
                    $_SESSION["cli_id"] = $cli_id;
                    $_SESSION["cli_login"] = $cli_login;
                    $_SESSION["cli_profil"] = $cli_profil;
                }
                debug($_SESSION, "session");
                header("location:index.php");
            }
        } ?>
    </main>
    <footer>
        <?php require "gabarit/inc_footer.php" ?>
    </footer>
</body>
</html>