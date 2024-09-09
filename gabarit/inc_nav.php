<style>
    ul{
        display:flex;
    }
</style>
<ul>
    <a href="index.php"><button>Accueil</button></a>
    <?php 
    if (isset($_SESSION["cli_id"])){ ?>
        <?=$_SESSION["cli_login"]?>
        <a href="deconnexion.php"><button>deconnexion</button></a>
        <a href="vendre.php?cli_id=<?=$_SESSION["cli_id"]?>"><button>Vendre</button></a>
        <a href="client.php"><button>Liste Client</button></a>
        <?php } else { ?>
        <a href="connexion.php"><button>connexion</button></a>
        <a href="inscription.php"><button>inscription</button></a>
        <?php } ?>
    <a href="contact.php"><button>contact</button></a>
    <a href="rechercherBien.php"><button>rechercher bien</button></a>
    
</ul>
<hr>