            <!-- New Products  -->
            <div class="col-7 p-0 ps-3">
                <div class="row col-12">
                    <div class="">
                        <h2>
                            New Products
                        </h2>
                    </div>
                </div>
                
                <?php
                    $queryNewProducts = "SELECT 
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
                    produits p
                    ORDER BY p.dateMiseEnVente DESC
                    LIMIT 3";
                    $tableuNewProducts = ($con -> query($queryNewProducts)) -> fetch_all(MYSQLI_ASSOC);
                    afficherProduits($tableuNewProducts);
                ?>   
                
                
            <!-- Product Most Bought -->
            <div class="row col-12 mt-4">
                <div class="">
                    <h2>
                        Most Bought Products
                    </h2>
                </div>
                </div>
                <?php
                    $queryMostBoughtProducts = "SELECT 
                    p.idProduit,
                    p.libelle,
                    p.description,
                    p.prix,
                    COUNT(d.idProduit) AS details_count,
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
                        produits p 
                    LEFT JOIN 
                        details d ON d.idProduit = p.idProduit
                    GROUP BY 
                        p.idProduit, p.libelle, p.description, p.prix
                    ORDER BY 
                        COUNT(d.idProduit) DESC
                    LIMIT 3;
                    ";
                    $tableuMostBoughtProducts = ($con -> query($queryMostBoughtProducts)) -> fetch_all(MYSQLI_ASSOC);
                    afficherProduits($tableuMostBoughtProducts);
                ?>


    
            <!-- Product top Promotion -->
            <div class="row col-12 mt-4">
                <div class="">
                    <h2>
                        TOP Promotion Products
                    </h2>
                </div>
                </div>
                <?php
                    $queryTopPromotion = "SELECT 
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
                        produits p 
                    ORDER BY 
                        promotionTaux DESC
                    LIMIT 3;
                    ";
                    $tableuTopPromotion = ($con -> query($queryTopPromotion)) -> fetch_all(MYSQLI_ASSOC);
                    afficherProduits($tableuTopPromotion);
                ?>
            </div>