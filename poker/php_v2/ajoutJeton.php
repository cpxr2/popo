<?php
session_start();
if($_SESSION['acces'] == 3)
{
    ?>
    
ajout de jeton

<?php
}
else
{
    echo 'acces non autorisé.';
}
?>