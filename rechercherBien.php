<?php
    global $link;
    require "gabarit/config.php";
    if (isset($_POST["btSubmit"])) {
        if ($_POST["sta_libelle"]=="En vente" ) {
            $sql="select bie_id, bie_adresse, cli_login, car_libelle, typ_libelle, bie_prix, sta_libelle from biens, caracteristique, client, statut, type where bie_client=cli_id and bie_statut=sta_id and bie_type=typ_id and bie_caracteristique=car_id and sta_libelle='En vente'" ;
        } else if ($_POST["sta_libelle"] == "En location") {
            $sql = "select bie_id, bie_adresse, cli_login, car_libelle, typ_libelle, bie_prix, sta_libelle from biens, caracteristique, client, statut, type where bie_client=cli_id and bie_statut=sta_id and bie_type=typ_id and bie_caracteristique=car_id and sta_libelle='En location'";
        } else if (!isset($_POST["sta_libelle"]) or $_POST["sta_libelle"] == "Tous") {
            $sql = "select bie_id, bie_adresse, cli_login, car_libelle, typ_libelle, bie_prix, sta_libelle from biens, caracteristique, client, statut, type where bie_client=cli_id and bie_statut=sta_id and bie_type=typ_id and bie_caracteristique=car_id";
        } 
    } else {
        $sql = "select bie_id, bie_adresse, cli_login, car_libelle, typ_libelle, bie_prix, sta_libelle from biens, caracteristique, client, statut, type where bie_client=cli_id and bie_statut=sta_id and bie_type=typ_id and bie_caracteristique=car_id";
    }
        $result=mysqli_query($link,$sql);
        $data=mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    ?>

<html>
    <head>
        <?php require "gabarit/inc_head.php"; ?>
    </head>
    <body>
        <?php  ?>
        <nav>
            <?php require "gabarit/inc_nav.php"; ?>
        </nav>
        <main>
            <h2>Filtrer la recherche</h2>
            <form method="POST">
                <label for="sta_libelle">statut du bien</label>
                <select id="sta_libelle" name="sta_libelle">
                    <option value="Tous">Vente / Location</option>
                    <option>En vente</option>
                    <option>En Location</option>
                </select>
                <input type="submit" name="btSubmit" value="Rechercher">
            </form>
            <hr>
<img src="img/grid-blog-1-571x353.jpg" width="150px">
            <h2>Liste des biens de l'agence</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID du bien</th>
                        <th>Adresse</th>
                        <th>Propriétaire</th>
                        <th>Caractéristiques</th>
                        <th>Type</th>
                        <th>Prix</th>
                        <th>statut</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $row) { ?>
                        <tr>
                            <?php foreach ($row as $valeur) { ?>
                                <td><?= htmlentities($valeur) ?></td>
                            <?php } ?>
                            <td><a href="bienEdit.php?bie_id=<?=$row["bie_id"]?>&action=edit">Modifier</a></td>
                            <td><a href="bienEdit.php?bie_id=<?=$row["bie_id"]?>&action=del">Supprimer</a></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </main>
    <footer>
        <?php require "gabarit/inc_footer.php" ?>
    </footer>
</body>

</html>