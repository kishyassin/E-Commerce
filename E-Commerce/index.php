<?php
    session_start();
    require_once('./php/conDB.php');
    require_once('./php/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css">
    <script src="./js/jquery/jQuerySource.js"></script>
    <?php require_once("./php/styleProduitCard.php") ?>
    <!-- <script src="./js/htmlToJs.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- this section shows the informations of a clicked product  -->
    <!-- it's now empty it will be displayed after an ajax requests that returns it's content as html then render it into it  -->
    <div class="productInfo position-fixed bg-opacity-50 bg-dark" style="z-index: 50; display:none; width:100%;height:100vh">
    </div>

    <div id="invoice"></div>
    <div class=" loginSection position-fixed bg-opacity-75 bg-dark" style="z-index: 50; display:none; width:100%;height:100vh">
    </div>

    <!-- inscription section   -->
    <div class="inscriptionSection position-fixed bg-opacity-50 bg-dark" style="z-index: 50; display:none; width:100%;height:100vh">
        <form action="php/createAccount.php" method="post" id="inscription" enctype="multipart/form-data" class="container d-flex justify-content-center align-self-center">
            <div class="col-11">
                <div class="rounded-2 p-4 mt-3 bg-white shadow-sm position-relative">
                    <div id="closeInscription" class=" m-2 p-2 btn btn-danger top-0 badge float-end position-absolute end-0">X</div>
                    <div class="row">
                        <div class="col">
                            <h1>Create New Account</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <input autocomplete="off" type="text" name="fname" placeholder="First Name" class="w-100 form-control border-2 shadow-none" required>
                        </div>
                        <div class="col-6">
                            <input autocomplete="off" type="text" name="lname" placeholder="Last Name" class="w-100 form-control border-2 shadow-none" required>
                        </div>
                    </div>                
                    <div class="row mt-3">
                            <div class="col">
                                <input autocomplete="off" type="text" name="mail" placeholder="Email" class="w-100 form-control border-2 shadow-none" required>
                            </div>
                    </div>
                    <div class="row mt-3">
                        <div class="input-group">
                            <div class="input-group-text">@</div>
                            <input autocomplete="off" type="text" class="form-control p-2 shadow-none border-2" placeholder="Username" name="username" id="username" autocomplete="off" value="" required>
                        </div>                    
                        <div id="validation" class="col"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input autocomplete="off" type="text" class="form-control w-100 shadow-none border-2" placeholder="Country" name="country" id="country" autocomplete="off" value="" required>
                        </div>                
                        <div class="col">
                            <input autocomplete="off" type="text" class="form-control w-100 shadow-none border-2" placeholder="Job" name="fonction" id="fonction" autocomplete="off" value="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col row position-absolute" style="z-index:100;">
                            <div class="col-6">
                                <div class="list-group col" id="suggestionList"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="input-group ">
                            <input autocomplete="off" type="password" name="password" id="password" class="form-control border-2 shadow-none border-2 " placeholder="Password" required value="">
                            <div class="input-group-text show">Show</div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="input-group ">
                            <input autocomplete="off" type="password" name="confirmPassword" id="confirmPassword" class="form-control border-2 shadow-none border-2 " placeholder="Confirm Password" required value="">
                            <div class="input-group-text show">Show</div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <span>Upload you Profile Picture</span>
                            <input type="file" class="form-control w-100 shadow-none border-2" name="pfp" id="pfp">
                        </div>
                    </div>
                    <div class="row" id="confirmation">

                    </div>
                    <div class="col mt-2">
                        <input autocomplete="off" type="checkbox" name="logmein" id="logmein" class="form-check-input border-3 shadow-sm">
                        <label for="logmein" class="form-label px-1 ">Log Me In </label>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <input autocomplete="off" type="submit" name="signup" class="form-control border-2 shadow-none border-2 btn btn-success" id="signup" required value="Create">
                        </div>
                    </div>
                    <div class="col">
                        <p class="mt-1">Already Have an Account? <span class=" text-primary" id="toggleLoginInscription" style="cursor:pointer">Log In</span> </p>
                    </div>
                </div>
            </div>
        </form>

    </div>


    <div class="container-fluid bg-light">
        <div class="row py-3">
            <div class="col">
                <span class=" fw-bold">iEcommerce</span>
            </div>
            <div class="col">
                <a href="">Home</a>
            </div>
            <div class="col">
                <a href="">Home</a>
            </div>
            <div class="col">
                <a href="">Home</a>
            </div>
            <div class="col">
                <a href="">Home</a>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div class="col-12">
                        <span class=" fw-bold fs-5 btn btn-secondary w-100 rounded-0 disabled">Categories</span>
                    </div>
                    <?php
                        $queryCategories = "SELECT categories.idCategorie , designationCat , COUNT(idProduit) countProduitCat FROM categories JOIN produits ON categories.idCategorie=produits.idCategorie GROUP BY categories.idCategorie";
                        $tabCategories = ($con -> query($queryCategories)) ->fetch_All(MYSQLI_ASSOC);
                        foreach($tabCategories as $categorie){
                            if(isset($_GET['idCategorie'])and $_GET['idCategorie']==$categorie['idCategorie']){
                                $thisCategory="active";
                                $categorieName =$categorie['designationCat'];
                            }
                            else $thisCategory = "";
                    ?>
                    <div class="col-12">
                        <a class=" fs-5 text-black btn w-100 btn-outline-light rounded-0 <?= $thisCategory ?>" href="index.php?idCategorie=<?= $categorie['idCategorie'] ?>"><?= $categorie['designationCat'] ?> <span class="badge bg-success float-end"><?= $categorie['countProduitCat'] ?></span></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Product top Promotion -->

            <?php
            if(isset($_GET['idCategorie']))
                include('./php/categorieSelected.php');
            else
                include_once('./php/defaultHomePageProduct.php');
            ?>
            <div class="col-2">
                <div class="row col-12">
                    <div class="col-12">
                        <span class=" fw-bold fs-5 btn btn-secondary w-100 rounded-0 disabled">Panier</span>
                    </div>
                    <div class="col-12">
                        <a href="" class="btn w-100 btn-outline-dark rounded-0">Test</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        
        $(document).ready(function(){ 
            // hide product info     
            $(document).on('click', '#closeProductInfo', function() {
                $('.productInfo').fadeToggle();
            })

            // hide Login section     
            $(document).on('click', '#closeLogin', function() {
                $('.loginSection').fadeToggle();
                $('.productInfo').fadeToggle();
            })

            // hide inscription section     
            $(document).on('click', '#closeInscription', function() {
                $('.inscriptionSection').fadeToggle();
                $('.productInfo').fadeToggle();
            })


            // don't have an account yet 
            // or already have an account    
            $(document).on('click', '#toggleLoginInscription', function() {
                $('.inscriptionSection').fadeToggle();
                $('.loginSection').fadeToggle();
            })


            // on click on buy now button 
            // check if the user is loged i or not 
            // send ajax request to verify that the user is logged in
            $(document).on('click', '#buyNow', function() {
                $('.productInfo').fadeToggle();
                $('.loginSection').fadeToggle();

                var dataToSend = {
                    quantity : $('.quantity').val(),
                    idProduct : $(this).data('id') 
                };

                // Ajax Post Request 
                $.ajax({
                    type: 'POST',
                    url:'php/buyNow.php',
                    data: dataToSend,
                    success:function(response){
                        $('.loginSection').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            })

            // show product infos
            $('.product').each(function() {
                $(this).click(function() {
                    $('.productInfo').fadeToggle();

                    // Data to be sent
                    var dataToSend = {
                        idProduct: $(this).data('id')
                    };

                    // AJAX POST request
                    $.ajax({
                        type: 'POST',
                        url: 'php/showProductInfo.php',
                        data: dataToSend,
                        success: function(response) {
                            $('.productInfo').html(response)
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });


            // user clicks on login button 
            $(document).on('click', '#loginBtn', function() {

                var dataToSend = {
                    login: $('#usernameLogin').val(),
                    password: $('#passwordLogin').val(),
                    quantity : $('.quantity').val(),
                    idProduct : $(this).data('id') 
                };

                // Ajax Post Request 
                $.ajax({
                    type: 'POST',
                    url:'php/login.php',
                    data: dataToSend,
                    success:function(response){
                        $('.loginSection').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            })


            // user clicks on buy now that appears on confirmation buy button 
            $(document).on('click', '#confirmBuy', function() {
                // Get the value of the input field associated with the clicked button
                var quantity = $(this).closest('.item').find('.quantity').val();
                var dataToSend = {
                    quantity : quantity,
                    idProduct : $(this).data('id'),
                    price:$(this).data('price'),
                    libelle:$(this).data('libelle')
                };

                // Ajax Post Request 
                $.ajax({
                    type: 'POST',
                    url:'php/confirmBuy.php',
                    data: dataToSend,
                    success:function(response){
                        $('.loginSection').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            })

            $(document).on('click', '.increment', function() {
                // Find the associated input field and increment its value
                var inputField = $(this).prev(".quantity");
                inputField.val(parseInt(inputField.val()) + 1);
            });
            
            $(document).on('click', '#downloadInvoice', function() {
                var dataToSend = {
                    idCommandeToPrint: $(this).data('id'),
                    test:2
                };
                $.ajax({
                    type: 'POST',
                    url: './php/generatePdfInvoice.php',
                    data: dataToSend,
                    success: function(response) {
                        // Convert the response HTML to PDF
                        var element = document.getElementById('invoice')
                        element.html(response)
                        html2pdf(element, {
                            margin: 10,
                            filename: 'invoice.pdf',
                            image: { type: 'jpeg', quality: 0.98 },
                            html2canvas: { dpi: 192, letterRendering: true },
                            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // password SHOW / HIDE 
            $(document).on('click', '.show', function() {
                var passwordField = $(this).prev("input");
                var fieldType = passwordField.attr("type");

                // Toggle between password and text
                passwordField.attr(
                    "type",
                    fieldType === "password" ? "text" : "password"
                );
            });

            
            // Set click event handler for the decrement button
            $(document).on('click', '.dicrement', function() {
                // Find the associated input field and decrement its value if it's greater than 1
                var inputField = $(this).next(".quantity");
                var currentValue = parseInt(inputField.val());
                if(currentValue > 1) {
                inputField.val(currentValue - 1);
                }
            });

            // like button 
            $(document).on('click', '#likeButton', function() {
                // Toggle between regular and solid heart
                $(this).find('i').toggleClass('fa-regular fa-solid');
            });

            // hover on mini  image of product info 
            $(document).on('mouseenter', '#secondaryPhoto', function() {
                // Toggle between regular and solid heart
                var secondarySrc = $(this).attr('src')
                $('#mainPhoto').attr('src', secondarySrc)
            });
        })
    </script>
</body>
</html>