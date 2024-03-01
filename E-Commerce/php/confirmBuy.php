<?php
session_start();
require_once('./conDB.php');
if(isset($_POST['idProduct'])){
    if(isset($_SESSION['cart']))
        $index = count($_SESSION['cart']);
    else
        $index = 0;

    $_SESSION['cart'][$index]['idProduct'] = $_POST['idProduct'];
    $_SESSION['cart'][$index]['quantity'] = $_POST['quantity'];
    $_SESSION['cart'][$index]['price'] = $_POST['price'];
    $_SESSION['cart'][$index]['libelle'] = $_POST['libelle'];
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$con->autocommit(false);
$con->begin_transaction();
try {
    if (isset($_SESSION['cart'])) {
        $date = date("Y-m-d H:i:s");
        $idClient = $_SESSION['member']['idClient'];
        $adresse = $_SESSION['member']['adresse'];

        // add new Commande Row 
        $queryNewCommande = "INSERT INTO commandes VALUES (NULL,?,0,?,?)"; // (idCommande , dateCommande , etat , adresse , idClient)
        $statementNewCommande = $con->prepare($queryNewCommande);
        $statementNewCommande->bind_param("ssi", $date, $adresse, $idClient);
        $statementNewCommande->execute();
        $idCommande = $statementNewCommande->insert_id;

        // prepare insertion in details 
        $queryNewDetail = "INSERT INTO details VALUES (NULL,?,?,?,?)";  // prixVente , Quantite , idCommande , idProduit 
        $statementNewDetail = $con->prepare($queryNewDetail);

        // prepare update of quantity stock
        $queryUpdateStock = "UPDATE produits SET qteStock = qteStock - ? WHERE idProduit = ?";  // quantity , idProduct
        $statementUpdateStock = $con->prepare($queryUpdateStock);

        foreach ($_SESSION['cart'] as $product) {
            $idProduct = $product['idProduct'];
            $price = $product['price'];
            $quantity = $product['quantity'];

            // new detail row execution 
            $statementNewDetail->bind_param("diii", $price, $quantity, $idCommande, $idProduct);
            $statementNewDetail->execute();

            // update Stock execution 
            $statementUpdateStock->bind_param("ii", $quantity, $idProduct);
            $statementUpdateStock->execute();
        }
        unset($_SESSION['cart']);
        $con->commit();
?>


<div class="container d-flex justify-content-center align-self-center position-absolute offset-1" style="z-index:1000" id="buyConfirmFromBuyNow">
    <div class="col-11">
        <div class="rounded-2 p-4 mt-3 bg-white shadow-sm position-relative">
            <div id="closeLogin" class=" m-2 p-2 btn btn-danger top-0 badge float-end position-absolute end-0">X</div>
            <div class="row">
                <h2><?= $_SESSION['member']['nom'] .' '. $_SESSION['member']['prenom'] ?> <i class="fa fa-check-circle"></i></h2>
            </div>
            <div class="row">
                <div class="alert alert-success">
                    <h5>Your Commande N°<?= $idCommande ?> of <?= $date ?> Added successfully</h5>
                </div>
                <div class="col">
                    <button class="btn btn-outline-success w-100" id="downloadInvoice" data-id="<?= $idCommande ?>">Download Invoice</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    }
} catch (mysqli_sql_exception $e) {
    $con->rollback();
    echo $e->getMessage();
} catch (Exception $e) {
    $con->rollback();
    echo $e->getMessage();
} finally {
    // Close the prepared statements
    if (isset($statementNewCommande)) {
        $statementNewCommande->close();
    }
    if (isset($statementNewDetail)) {
        $statementNewDetail->close();
    }
    if (isset($statementUpdateStock)) {
        $statementUpdateStock->close();
    }
}
?>