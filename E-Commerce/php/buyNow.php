<?php
session_start();
    if(isset($_POST['idProduct'])){
        if(isset($_SESSION['member'])){
            require_once('./conDB.php');
            $id = $_POST['idProduct'];
            $queryProductImages = "SELECT * FROM photos WHERE idProduit=$id";
            $resultProductImages = $con -> query($queryProductImages);
            $mainPhoto = ($resultProductImages -> fetch_assoc())['photo'];
            // get product informations
            $queryProductInfo = "SELECT * FROM produits WHERE idProduit=$id";
            $resultProduitInfo = $con -> query($queryProductInfo) -> fetch_assoc();
            $price = $resultProduitInfo['prix'];


            // is the product in a promotion ?
            $queryIsPromotion = "SELECT tauxPromotion as promotionTaux FROM promotions WHERE idProduit = $id AND CURDATE() BETWEEN dateDebut AND dateFin";
            $isInPromotion = $con -> query($queryIsPromotion) -> num_rows;
            
            $promotion = $con -> query($queryIsPromotion) -> fetch_assoc();
            if($isInPromotion)
                $price = ($resultProduitInfo['prix'] - ($resultProduitInfo['prix'] * $promotion['promotionTaux']) / 100);
            ?>
<div class="container d-flex justify-content-center align-self-center position-absolute offset-1" style="z-index:1000" id="buyConfirmFromBuyNow">
    <div class="col-11">
        <div class="rounded-2 p-4 mt-3 bg-white shadow-sm position-relative">
            <div id="closeLogin" class=" m-2 p-2 btn btn-danger top-0 badge float-end position-absolute end-0">X</div>
            <div class="row">
                <h2><?= $_SESSION['member']['nom'] .' '. $_SESSION['member']['prenom'] ?> <i class="fa fa-check-circle"></i></h2>
            </div>
            <div class="row">
                <div class="col-4">
                    <img src="./uploads/<?= $mainPhoto ?>" alt="" width="200">
                </div>
                <div class="col">
                    <h4><?= $resultProduitInfo['libelle'] ?></h4>
                    <h3>
                    <span class=" text-success fw-bold">
                        <?= $isInPromotion ? "<s class=' text-danger fs-5'>" . $resultProduitInfo['prix'] . " </s>  <span class=' text-success fw-bold'> " . $price . "</span>" :  "<span class=' text-success fw-bold'>" . $resultProduitInfo['prix'] . "</span>"?>
                    </span><span class="fs-5"> MAD</span>
                    </h3>
                    <div class="item">
                        <label for="quantity" class=" p-2 fs-4">Quantity</label>
                        <div class="input-group px-2">
                            <div class="input-group-text dicrement" style="cursor:pointer;">-</div>
                            <input type="text" class="form-control p-2 shadow-none border-2 quantity" name="quantity" autocomplete="off" value=<?= $_POST['quantity'] ?>>
                            <div class="input-group-text increment" style="cursor:pointer;">+</div>
                        </div>
                        <div class=" p-2">
                            <button class=" my-1 w-100 btn btn-danger rounded" id="confirmBuy" data-id="<?= $id ?>" data-price="<?= $price ?>" data-libelle="<?= $resultProduitInfo['libelle'] ?>">Buy Now !</button>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
        }else{
?>

<div class="container d-flex justify-content-center align-self-center position-absolute offset-1" style="z-index:1000">
    <div class="col-11">
        <div class="rounded-2 p-4 mt-3 bg-white shadow-sm position-relative">
            <div id="closeLogin" class=" m-2 p-2 btn btn-danger top-0 badge float-end position-absolute end-0">X</div>
            <div class="row">
                <h2>Log In </h2>
            </div>
            <div class="row">
                <h5 class=" text-success text-center"><?= isset($_SESSION['created']) ? "Your Account is created successfully" : "" ?></h5>
            </div>
            <div class="row">
                <h5 class="text-danger"><?= isset($_SESSION['falseLogin']) ? "Username Or Password Incorrect" : "" ?></h5>
            </div>
            <div class="row">
                <div class="input-group">
                    <div class="input-group-text">@</div>
                    <input id="usernameLogin" type="text" class="form-control p-2 shadow-none border-2" placeholder="Username" name="usernameLogin" autocomplete="off" value="<?= isset($_SESSION['falseLogin']) ? $_SESSION['falseLogin']['username'] : (isset($_COOKIE['login']) ? $_COOKIE['login'] : '') ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="input-group">
                    <input type="password" name="passwordLogin" id="passwordLogin" class="form-control p-2 border-2 shadow-none border-2" placeholder="Password" required value="<?= isset($_SESSION['falseLogin']) ? $_SESSION['falseLogin']['password'] : (isset($_COOKIE['pwd']) ? $_COOKIE['pwd'] : '') ?>">
                    <div class="input-group-text show" style="cursor:pointer">Show</div>
                </div>
            </div>
            <?php
            unset($_SESSION['falseLogin']);
            unset($_SESSION['created']);
            ?>
            <div class="col mt-2">
                <input type="checkbox" name="rememberMe" id="rememberMe" class="form-check-input border-3 shadow-sm">
                <label for="rememberMe" class="form-label px-1 ">Remember Me</label>
            </div>
            <div class="row mt-1">
                <div class="col">
                    <input autocomplete="off" type="submit" name="login" class="form-control border-2 shadow-none border-2 btn btn-success" required value="Login" id="loginBtn" data-id="<?= $_POST['idProduct'] ?>" >
                </div>
            </div>
            <div class="row">
                <p class="mt-1">Don't Have An Account Yet? <span class=" text-primary" id="toggleLoginInscription" style="cursor:pointer">Sign Un</span> </p>
            </div>
        </div>
    </div>
</div>

<?php    
        }
    }
?>