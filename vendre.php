<html lang="fr">
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
<img src="img/grid-blog-1-571x353.jpg" width="150px">
        <details>
            <summary>Mettre un bien en vente / location</summary>
            <form method="POST">
                <p>
                    <label for="bie_type">Type du bien :</label>
                    <select name="bie_type" id="bie_type">
                        <option value=1>Appartement</option>
                        <option value=2>Maison</option>
                        <option value=3>Terrain</option>
                    </select>
                </p>
                <p>
                    <label for="bie_caracteristique">Caractéristique :</label>
                    <select name="bie_caracteristique" id="bie_caracteristique">
                        <option value=1>studio</option>
                        <option value=2>F2</option>
                        <option value=3>F3</option>
                        <option value=4>F4</option>
                    </select>
                </p>
                <p>
                    <label for="bie_adresse">adresse du bien :</label>
                    <input type="text" id="bie_adresse" name="bie_adresse" placeholder="Ex: 15 rue du Colonel Moutarde" maxlength="500>"
                </p>
                <p>
                    <label for="bie_statut">Statut :</label>
                    <select name="bie_statut">
                        <option value="1">En vente</option>
                        <option value="2">En location</option>
                    </select>
                </p>
                <p>
                    <label for="bie_prix">Prix du bien :</label>
                    <input type="number" id="bie_prix" name="bie_prix" step="1" min="0">
                </p>

                <input type="submit" name="btSubmit" value="Envoyer">
                <input type="reset">
            </form>
        </details>
        <hr />
        <?php
        $cli_id= $_GET["cli_id"];
        if(isset($_POST["btSubmit"])){
            extract ($_POST);
            $sql="
            insert into 
                biens
                    (bie_id, bie_caracteristique, 
                    bie_adresse, bie_type, bie_prix, bie_statut, 
                    bie_client) 
                values
                    (null, '$bie_caracteristique', '$bie_adresse', '$bie_type', $bie_prix, '$bie_statut', '$cli_id')
                ";
                $result=mysqli_query($link,$sql);
            } 
            $cli_id=$_SESSION["cli_id"];
            $sql="
            select 
                *
            from 
                biens, type, caracteristique, statut
            where 
                bie_type=typ_id
            and 
                bie_caracteristique=car_id
            and
                bie_statut=sta_id
            and
                bie_client=$cli_id
            ";
            $result=mysqli_query($link,$sql);
            $data=mysqli_fetch_all($result,MYSQLI_ASSOC);
            ?>
            <table>
                <tr>
                    <th>bie_ID</th>
                    <th>bie_caracteristique</th>
                    <th>bie_type</th>
                    <th>bie_statut</th>
                    <th>bie_prix</th>
        </tr>
            <?php foreach($data as $row){
                extract($row); ?> 
                <tr>
                <th><?=$bie_id?></td>
                <td><?=$bie_caracteristique?></td>
                <td><?=$bie_type?></td>
                <td><?=$bie_statut?></td>
                <td><?=$bie_prix?></td>
            </tr>
            <?php } ?>
            </table>
        </main>    <footer>
        <?php require "gabarit/inc_footer.php" ?>
    </footer>
</body>

</html>