<?php
require'fonction.php';

$main = [0=>'', 1=>'', 2=>'', 3=>'', 4=>''];
$dejaTirer = false;


/***************************************************************************************

                            PREMIER TIRAGE

****************************************************************************************/
if(isset($_POST['donne1']))
{
    for($i=0; $i<5; $i++)// on tire les 5 cartes.
    {
        do
        {
            //On tire une carte.
            $nb = rand(1,52);
            $carte = 'images/(' . $nb . ').png';

            //On vérifie si elle est pas deja dans la main.
            for($j=0; $j<5; $j++)
            {

                if($carte == $main[$j])//Si elle est deja tirer on passe en TRUE et on retire
                {
                    $dejaTirer = true;
                    break;
                }else{
                    $dejaTirer = false;
                }
            }
        }while($dejaTirer == true);

        $main[$i] =$carte; // si elle est pas deja tirer on la met dans la main.
        if(isset($_GET["retire1"])){
            if($_GET["retire1"] == true)
            {
                $main[$i] = "images/(53).png";
            }
            echo $_GET["retire1"];
        }
    }
    tapis($main);
?>

<div class="row">
    <div class="col-lg-offset-8 col-lg-4 col-lg-pull-8" id="bet">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="submit" name="donne2" class="btn btn-warning" value="Tirage" />
        </form>
    </div>
</div>
</div> <!--div qui ferme les row et col de la class "tapis" et le container (voir la fonction tapis())-->
</div>
</div>
<?php

}

/***************************************************************************************

                            DERNIER TIRAGE

****************************************************************************************/

elseif(isset($_POST['donne2']))
{
    $main2 = [1=>'', 2=>'', 3=>'', 4=>'', 5=>''];


}


/***************************************************************************************

                            AVANT TIRAGE

****************************************************************************************/


else
{
    $dos = "images/(53).png";
    $main=[0=>$dos, 1=>$dos, 2=>$dos, 3=>$dos, 4=>$dos];
    tapis($main);
?>
<div class="row">
    <div class="col-lg-offset-8 col-lg-4 col-lg-pull-8" id="bet">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="submit" name="donne1" class="btn btn-warning" value="Pari" />
        </form>
    </div>
</div>
</div> <!--div qui ferme les row et col de la class "tapis" et le container (voir la fonction tapis())-->
</div>
</div>
<?php
}
?>                          

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="JS_test_poker.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
