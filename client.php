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
        <h1>CLIENT</h1>
<img src="img/client.jpg" width="150px">
        <?php

        $sql = "select * from client, profil";
        $result = mysqli_query($link, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>
        <table>
            <tr>
                <th>cli_id</th>
                <th>cli_login</th>
                <th>Prenom
                <th>Nom</th>
                <th>Adresse</th>
                <th>Code Postal - Ville</th>
                <th>Profil</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            foreach ($data as $row) {
                extract($row); ?>
                <tr>
                    <td><?= $cli_id ?></td>
                    <td><?= $cli_login ?></td>
                    <td><?= $cli_prenom ?></td>
                    <td><?= $cli_nom ?></td>
                    <td><?= $cli_adresse ?></td>
                    <td><?= $cli_cp ?> - <?= $cli_ville ?></td>
                    <td><?= $pro_nom ?></td>
                    <td><a href="clientEdit.php?cli_id=<?= $cli_id ?>&action=edit">Modifier</a></td>
                    <td><a href="clientEdit.php?cli_id=<?= $cli_id ?>&action=del">Supprimer</a></td>
                <?php } ?>
                </tr>
        </table>


        }
        ?>
    </main>
    <footer>
        <?php require "gabarit/inc_footer.php" ?>
    </footer>
</body>
</html>