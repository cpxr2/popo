<?php
session_start();
if($_SESSION['acces'] == 3)
{
    require 'connexion.php';
    
    $requete = $bdd->query('SELECT * FROM utilisateur');
    //$resultat = $requete->fetch();
    //print_r($resultat);
    
    ?>
    
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de jeton</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="css/ajoutJeton.css">
</head>
<?php
if(!isset($_POST['ajouter']))
    {
?>
<body>
    
    <h1>Ajout de jetons</h1>
    <br /><br />
    <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <div class="form-group">
        <label for="joueur">Choisir un joueur : </label>
        <select name="joueur" id="id">
            <?php
        while($pseudo = $requete->fetch())
        {
            ?>
            <option value="<?=$pseudo['id_util']?>"><?=$pseudo['pseudo_util']?></option>
            <?php
        }
            ?>
        </select>
    </div>
    <div class="form-group">
       <label for="jeton">Indiquer le nombre de jetons</label><br />
        <input type="number" name="jeton" step="10" min="0" id="jeton"/>
    </div>
    <input type="hidden" name="id" value="<?=$pseudo['id_util']?>" />
    <input class="btn btn-primary" type="submit" value="Crediter" name="ajouter" />
    </form>
    <?php
    }
    else
    {
        $jeton = $_POST['jeton'];
        $joueur = $_POST['joueur'];
        $id = $_POST['id'];
        
       $requete = $bdd->prepare('UPDATE utilisateur SET jeton_util = :jeton WHERE id_util = :id');
        $requete->execute([':jeton'=>$jeton, ':id'=>$id]);
    ?>
        <p>Vous avez ajouté <?=$jeton?> au joueur <?=$joueur?></p>
      <?php  
    }
     ?>
</body>
</html>


<?php
}
else
{
    echo 'acces non autorisé.';
}
?>