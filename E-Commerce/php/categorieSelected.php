<div class="col-7 p-0 ps-3">    
            <div class="row col-12">
                <div class="">
                    <h2>
                        <?=$categorieName?>
                    </h2>
                </div>
                </div>
                <?php
                if(isset($_GET['idCategorie'])){
                    $idCategorie = $_GET['idCategorie'];
                }
                $queryCategorySelected = "SELECT 
                    p.idProduit,
                    p.libelle,
                    p.description,
                    p.prix,
                    CASE
                        WHEN EXISTS (
                            SELECT *
                            FROM promotions pr 
                            WHERE p.idProduit = pr.idProduit 
                              AND CURDATE() BETWEEN pr.dateDebut AND pr.dateFin
                        ) THEN (
                            SELECT pr.tauxPromotion 
                            FROM promotions pr 
                            WHERE p.idProduit = pr.idProduit 
                              AND CURDATE() BETWEEN pr.dateDebut AND pr.dateFin
                        )
                        ELSE 0
                    END AS promotionTaux
                    FROM 
                        produits p WHERE idCategorie = $idCategorie ";
                    $tableuCategorySelected = ($con -> query($queryCategorySelected)) -> fetch_all(MYSQLI_ASSOC);
                    afficherProduits($tableuCategorySelected);
                ?>
                </div>