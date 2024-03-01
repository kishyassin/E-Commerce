<?php
require_once('./conDB.php');
if(isset($_POST['idCommandeToPrint'])) {
    $id = $_POST['idCommandeToPrint'];
    $queryCommandeInfos = "SELECT * FROM commandes JOIN clients ON commandes.idClient = clients.idClient WHERE idCommande = $id";
    $resultCommandeClientInfo = ($con ->query($queryCommandeInfos)) -> fetch_assoc();

?>

    <h1>Command N° : <?= $id ?></h1>
    <h4>Client First Name : <?= $resultCommandeClientInfo['nom'] ?></h4>
    <h4>Client Family Name : <?= $resultCommandeClientInfo['prenom'] ?></h4>
    <h4>Client adresse : <?= $resultCommandeClientInfo['adresse'] ?></h4>
    <table width="100%">
        <tr>
            <td>
                id
            </td>
            <td>
                libelle
            </td>
            <td>
                prix
            </td>
            <td>
                Quantité 
            </td>
            <td>
                Montant
            </td>
        </tr>
        <?php
            $queryCommandeDetails = "SELECT * FROM details JOIN produits ON produits.idProduit = details.idProduit WHERE idCommande = $id";
            $resultCommandeDetails = ($con -> query($queryCommandeDetails));
            $counter = 0;
            $totalMontant = 0;
            while($row = $resultCommandeDetails -> fetch_assoc()){
                $totalMontant += $row['prixVente'] * $row['quantite'] ;
        ?>
        <tr>
            <td>
                <?= $counter++ ?>
            </td>
            <td>
                <?= $row['libelle'] ?>
            </td>
            <td>
                <?= $row['prixVente'] ?>
            </td>
            <td>
                <?= $row['quantite'] ?>
            </td>
            <td>
                <?= $row['prixVente'] * $row['quantite'] ?>
            </td>
        </tr>
        <?php
            }
        ?>
        <tr>
            <td>
                
            </td>
            <td>
                
            </td>
            <td>
                
            </td>
            <td>
                Total 
            </td>
            <td>
                <?= $totalMontant ?>
            </td>
        </tr>
    </table>

<?php
}else {
    echo "idCommande is not set.";
}
?>