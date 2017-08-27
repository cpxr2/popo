<?php



    for($i=0; $i<5; $i++)// on tire les 5 cartes.
    {
        do
        {
            //On tire une carte.
            $nb = rand(1,52);
            $carte = $nb;

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

         // si elle est pas deja tirer on la met dans la main.
        $main[$i] = $carte;
       
    }
 header('Content-type: application/json');
?>
{
"c0": "<?=$main[0]?>",
"c1": "<?=$main[1]?>",
"c2": "<?=$main[2]?>",
"c3": "<?=$main[3]?>",
"c4": "<?=$main[4]?>"
}

