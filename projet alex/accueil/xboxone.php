<?php
    include 'nav1.php';

            if(isset($_GET['marque'])){
                ?>
                <div class="gtabackground">
                <div id="div3">
                    <div id="div4">
                <?php
                $id = $_GET['marque'];
                $detali = $bdd->query("SELECT * FROM xboxone WHERE id='$id'");
               while($reponse = $detali->fetch()){
                    ?>
                        <div style="display: flex;flex-direction:row;">

                            <img src="<?php echo "../upload/".$reponse['image']; ?>" style="padding-left: 100px;padding-top:30px;" height="300" width="250">

                            <div style="display: flex;flex-direction:column;">
                                <div class="groupliste">
                                    <h3 class="liste"><span style="text-decoration: underline">Titre :</span> <?php echo $reponse['name']; ?></h3>
                                    <h3 class="liste"><span style="text-decoration: underline">Plat-forme :</span> <?php echo $reponse['marque']; ?></h3>
                                    <h3 class="liste"><span style="text-decoration: underline">Date de sortie :</span> <?php echo $reponse['date']; ?></h3>
                                    <h3 class="liste"><span style="text-decoration: underline">Age :</span> <?php echo $reponse['age']; ?> ans</h3>
                                    <h3 class="liste"><span style="text-decoration: underline">Genres :</span> <?php echo $reponse['action']; ?></h3>
                                    <h3 class="liste"><span style="text-decoration: underline">Entreprise :</span> <?php echo $reponse['entreprise']; ?></h3>
                                    <h3 class="liste"><span style="text-decoration: underline">Prix :</span> <?php echo $reponse['prix']; ?> €</h3>
                                </div>
                            </div>
                            <a href="xboxone.php"><button class="retour" value="ok">Retour à la liste des jeux</button></a>
                        </div>
                        <p style="width: 94%;text-align: justify;padding-left:35px;padding-top:20px;"><?php echo $reponse['contenu']; ?></p>

                        <div style="margin-left:230px;margin-top:30px;">
                            <?php echo $reponse['video']; ?>
                        </div>
                  <?php
              }
              ?>
                    </div>
                </div>
                </div>
              <?php
            }else{
                ?>
                <div id="backgroundxboxone">
                    <div id="pagebackground">
                    <?php
            $page=1;

            if (isset($_GET['page'])) {
            
            $page=filter_var($_GET['page'], FILTER_SANITIZE_NUMBER_INT);
            
            }
            $per_page=6;

            $sqlcount="select count(*) as pagetik from xboxone";

            $stmt = $bdd->prepare($sqlcount);

            $stmt->execute();

            $row = $stmt->fetch();

            $total_records= $row['pagetik'];

            $total_pages=ceil($total_records/$per_page);

            $offset=($page-1)*$per_page;

            $sql="select * from xboxone where marque='xboxone' limit $offset,$per_page";

            $stmt = $bdd->prepare($sql);

            $stmt->execute();

            while($reponse = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
                <div id="flex123">
                    <div class="pagegame">
                        <div class="topfloatleft"><?php echo $reponse['name']; ?></div><div class="topfloatleft"><?php echo $reponse['marque']; ?></div>
                        <img src="<?php echo "../upload/".$reponse['image']; ?>"  class="pagegameimage">
                         <a href="xboxone.php?marque=<?php echo $reponse['id']; ?>"><button class="cherchebutton" name="click">Detailes</button></a>
                        <button class="cherchebutton"><?php echo $reponse['prix'];?> Euro Prix</button>
                    </div>
                </div> 
            <?php 
            }
            ?>
        </div>
    </div>
    <?php
     
     ?>
        <div id="pageclick">
                <?php
               
                        if( $page-1>=1) {
                            ?>

                        <a href=?page=<?php echo ($page-1); ?>><img src="../img/FG.png" class="FG" alt="fleche"></a>
                        
                        <?php
                        }
                        
                        if( $page+1<=$total_pages) {
                        
                            ?>

                            <a href=?page=<?php echo ($page+1); ?>><img src="../img/FD.png" class="FD" alt="fleche"></a>
                            
                            <?php
                        
                        }
                
                ?>
        </div>
    <?php
    }
     include 'footer.php';
    ?>