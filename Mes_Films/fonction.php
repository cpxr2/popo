<?php 
    function formulaire_recherche (){
  ?>  
                <Section class="formulaire">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

                        <label>Titre : </label><input type="text" name="titre" /><br />
                        <label>Réalisateur : </label><input type="text" name="realisateur" /><br />
                        <label>Année : </label><input type="text" name="annee" /><br />
                        <label>Acteurs : </label><input type="text" name="acteur" /><br />
                        <label>Type de support : </label><select name="support">
                        <option value="" selected>--</option>
                        <option value="dvd">DVD</option>
                        <option value="mkv">MKV</option>
                        <option value="avi">AVI</option>
                        <option value="autre">Autre</option>
                        </select><br />
                        <label>Qualité : </label><select name="qualite">
                        <option value="" selected>--</option>
                        <option value="720">720i</option>
                        <option value="1080">1080p</option>
                        <option value="dvd">DVD</option>
                        <option value="divx">Divx</option>
                        </select><br />
                        <label>Langue : </label><select name="langue">
                        <option value="" selected>--</option>
                        <option value="vf">VF</option>    
                        <option value="vq">VQ</option>
                        <option value="multi">MULTI</option>
                        <option value="vo">VO</option>
                        <option value="vostf">VOSTF</option>
                        </select><br />
                        <label>Genre : </label><input type="text" name="genre" /><br />
                        <!--                        <label>Lien imdb :</label><input type="text" name="imdb" /><br />-->
                        <br />
                        <input type="submit" value="Rechercher" name="envoyer" />


                    </form>
                </Section>
<?php
}

    function formulaire_ajout($id='', $titre='', $real='', $annee='', $acteur='', $support='', $qualite='', $langue='', $genre='', $imdb=''){
  ?>  
                <Section class="formulaire">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

                       <input type="hidden" name='id' value="<?=$id ?>" />
                        <label>Titre : </label><input type="text" name="titre" value="<?=$titre?>" /><br />
                        <label>Réalisateur : </label><input type="text" name="realisateur" value="<?=$real?>" /><br />
                        <label>Année : </label><input type="text" name="annee" value="<?=$annee?>" /><br />
                        <label>Acteurs : </label><input type="text" name="acteur" value="<?=$acteur?>" /><br />
                        <label>Type de support : </label><select name="support">
                        <option value="<?=$support?>" selected>--</option>
                        <option value="dvd">DVD</option>
                        <option value="mkv">MKV</option>
                        <option value="avi">AVI</option>
                        <option value="autre">Autre</option>
                        </select><br />
                        <label>Qualité : </label><select name="qualite">
                        <option value="<?=$qualite?>" selected>--</option>
                        <option value="720">720i</option>
                        <option value="1080">1080p</option>
                        <option value="dvd">DVD</option>
                        <option value="divx">Divx</option>
                        </select><br />
                        <label>Langue : </label><select name="langue">
                        <option value="<?=$langue?>" selected>--</option>
                        <option value="vf">VF</option>    
                        <option value="vq">VQ</option>
                        <option value="multi">MULTI</option>
                        <option value="vo">VO</option>
                        <option value="vostf">VOSTF</option>
                        </select><br />
                        <label>Genre : </label><input type="text" name="genre" value="<?=$genre?>" /><br />
                        <label>Lien imdb :</label><input type="text" name="imdb" value="<?=$imdb?>" /><br /><br />
                        <input type="submit" value="Ajouter" name="envoyer" />

                    </form>
                </Section>
<?php
}

function tableau_resultat ($requete){
    ?>
    <div class="tableau" style="margin: 20px;">
            <table border="1px" bgcolor="white">
                <tr>
                    <th>Titre</th>
                    <th>Réalisteur</th>
                    <th>Année</th>
                    <th>Acteur</th>
                    <th>Support</th>
                    <th>Qualité</th>
                    <th>Langue</th>
                    <th>Genre</th>
                    <th>IMDB</th>                    
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
 <?php
                while($resultat = $requete->fetch())
                {
?>
                <tr>
                    <td><?php echo $resultat['titre']?></td>
                    <td><?php echo $resultat['realisateur']?></td>
                    <td><?php echo $resultat['annee']?></td>
                    <td><?php echo $resultat['acteur']?></td>
                    <td><?php echo $resultat['support']?></td>
                    <td><?php echo $resultat['qualite']?></td>
                    <td><?php echo $resultat['langue']?></td>
                    <td><?php echo $resultat['genre']?></td>
                    <td><a href="<?=$resultat['imdb'] ?>"><img src="images/imdb.png"/></a></td>
                    <td><a href="modifier_un_film.php?id=<?=$resultat['ID'] ?>"><img src="images/modify.png" /></a></td>
                    <td><a href="supprimer_un_film.php?id=<?=$resultat['ID'] ?>"><img src="images/supprime.png" /></a></td>
                </tr>
<?php
                }
?>
            </table>
            <br />
      
        </div>
<?php
}
?> 