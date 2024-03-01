<?php 
    function afficherProduits($result){
?>
<div class="row col-12 p-0">
    <?php 
        foreach ($result as $produit){
            GLOBAL $con;
            $query = "SELECT * FROM photos WHERE idProduit = {$produit['idProduit']}";
            $photo = ($con -> query($query) )-> fetch_assoc();
    ?>
    <div class="col-4 p-2 ">
        <div class="card col m-0 shadow-sm product"  data-id="<?= $produit['idProduit'] ?>"  style="height:470px; cursor:pointer;">
            <img class="card-img-top" src="uploads/<?= $photo['photo'] ?>" alt="Product Image" style="height: 200px; width:auto;">
            <div class="card-body d-flex justify-content-between flex-column">
                <h5 class="card-title nomProduit"><?= $produit['libelle'] ?></h5>
                <span>
                    <?= empty($produit['promotionTaux']) ? "<span class=' text-success fw-bold fs-5'>" . $produit['prix'] . "</span>" : "<s class=' text-danger'>" . $produit['prix'] . " </s>  <span class=' text-success fw-bold fs-5'> " . ($produit['prix'] - ($produit['prix'] * $produit['promotionTaux']) / 100) . "</span>"?>
                </span>
                <p class="card-text descriptionProduit"><?= $produit['description'] ?></p>
                <a href="ajouterPanier?idProduit=<?= $produit['idProduit'] ?>" class="btn btn-primary w-100 align-self-end">Buy Now <i class="fa-solid fa-cart-shopping"></i></a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<?php } 
?>