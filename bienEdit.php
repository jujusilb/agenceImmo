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
        <?php
        $bie_id = $_GET["bie_id"];
        $action = $_GET["action"];
        $sql = "
            select * from biens
            where bie_id='$bie_id'";
        $result = mysqli_query($link, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        extract($data[0]);
        ?>
        <form method="POST">
            <input type="hidden" name="bie_id" value="$bie_id">
            <label for="bie_adresse">Adresse</label>
            <input type="text" name="bie_adresse" id="bie_adresse" value="<?= $bie_adresse ?>">
            <label for="bie_prix">Prix</label>
            <input type="number" name="bie_prix" id="bie_prix" value="<?= $bie_prix ?>">
            <input type="submit" name="btSubmit">
        </form>
    </main>
    <footer>
        <?php require "gabarit/inc_footer.php" ?>
    </footer>
</body>
</html>