<?php
// Check if data is received via POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('./conDB.php');
    // Retrieve data sent via AJAX
    $id = $_POST['idProduct'];
    $queryProductImages = "SELECT * FROM photos WHERE idProduit=$id";
    $resultProductImages = $con -> query($queryProductImages);
    $mainPhoto = ($resultProductImages -> fetch_assoc())['photo'];
    // get product informations
    $queryProductInfo = "SELECT * FROM produits WHERE idProduit=$id";
    $resultProduitInfo = $con -> query($queryProductInfo) -> fetch_assoc();

    // is the product in a promotion ?
    $queryIsPromotion = "SELECT tauxPromotion as promotionTaux FROM promotions WHERE idProduit = $id AND CURDATE() BETWEEN dateDebut AND dateFin";
    $isInPromotion = $con -> query($queryIsPromotion) -> num_rows;
    $promotion = $con -> query($queryIsPromotion) -> fetch_assoc();

?>

<div class="bg-white bg-white-subtle position-absolute top-0 start-0 end-0 bottom-0 mx-5 my-5 px-3 py-3 shadow rounded-3" style="z-index: 100;">
    <button id="closeProductInfo" class=" m-0 p-2 btn btn-danger badge float-end">X</button>
    <div class="col-12">
        <div class="row">
            <div class="col-4">
                <div class="" style="width:100%;height:500px">
                    <img src="./uploads/<?= $mainPhoto ?>" alt="" class="" id="mainPhoto" style="width:100%">
                </div>

                <div class="col overflow-scroll overflow-scroll w-100" style="width:100%">
                <?php
                    $resultProductImages->data_seek(0);
                    while ($row = $resultProductImages -> fetch_assoc()){
                ?>
                <img src="./uploads/<?=$row['photo']?>" style="width:70px; height:70px" alt="product" class=" m-1 shadow-sm border p-0 rounded" id="secondaryPhoto">
                <?php
                    }
                ?>
            </div>
            </div>
            <div class="col-5">
                
                <h2 class=" mt-4 justify-content-between d-lg-flex align-items-end">
                    <span><?= $resultProduitInfo['libelle'] ?></span>
                </h2>
                <h3>
                <span class=" text-success fw-bold">
                    <?= $isInPromotion ? "<s class=' text-danger fs-5'>" . $resultProduitInfo['prix'] . " </s>  <span class=' text-success fw-bold'> " . ($resultProduitInfo['prix'] - ($resultProduitInfo['prix'] * $promotion['promotionTaux']) / 100) . "</span>" :  "<span class=' text-success fw-bold'>" . $resultProduitInfo['prix'] . "</span>"?>
                </span><span class="fs-5"> MAD</span>
                </h3>
                <p><?= $resultProduitInfo['description'] ?></p>
                <span class=" fw-bold" style="font-size:80px">4.5</span>
                <div class="stars">
                    <img src="./uploads/fullStar.png" alt="" style="width:2em">
                    <img src="./uploads/fullStar.png" alt="" style="width:2em">
                    <img src="./uploads/fullStar.png" alt="" style="width:2em">
                    <img src="./uploads/fullStar.png" alt="" style="width:2em">
                    <img src="./uploads/halfStar.png" alt="" style="width:2em">
                </div>
                <h3 class=" mt-3">Reviews</h3>
                <div class="row bg-light shadow-sm p-2 rounded-4">
                    <div class="col-12 d-flex justify-content-between">
                        <span class="fs-5 fw-bold">
                            Kishyassin
                        </span> 
                        <span>12/2993</span>                               
                    </div>
                    <div class="col-12">
                        <div class="stars">
                            <img src="./uploads/fullStar.png" alt="" style="width:1em">
                            <img src="./uploads/fullStar.png" alt="" style="width:1em">
                            <img src="./uploads/fullStar.png" alt="" style="width:1em">
                            <img src="./uploads/fullStar.png" alt="" style="width:1em">
                            <img src="./uploads/halfStar.png" alt="" style="width:1em">
                        </div>
                    </div>
                    <div class="col-12">
                        <p>
                            Kishyassin Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, repellat.
                        </p>                               
                    </div>
                </div>
            </div>
            <div class="col-3 p-3">
                <div class="col-12 shadow-sm border w-100 h-100 rounded-4 bg-light d-flex flex-column justify-content-start">
                    <div class="row d-flex justify-content-between flex-column align-items-center h-100">
                        <h3 class="mt-4 text-center">Add To Cart <i class="fa-solid fa-cart-shopping"></i></h3>
                        <img src="./uploads/<?= $mainPhoto ?>" class=" w-75" alt="">
                        <div>
                            <label for="quantity" class=" p-2 fs-4">Quantity</label>
                            <div class="input-group px-2">
                                <div class="input-group-text dicrement" style="cursor:pointer;">-</div>
                                <input type="text" class="form-control p-2 shadow-none border-2 quantity" name="quantity" autocomplete="off" value=1>
                                <div class="input-group-text increment" style="cursor:pointer;">+</div>
                            </div>
                            <div class=" p-2">
                                <button class=" my-1 w-100 btn btn-danger rounded" id="buyNow" data-id="<?= $id ?>">Buy Now !</button>
                                <button class="btn my-1 w-100 btn-outline-danger rounded">Add To Chart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

    
} else {
    // Handle the case when the script is accessed directly
    echo "This script should be accessed via POST request.";
}

?>