

$(document).ready(function(){
    // password SHOW / HIDE 
    $(".show").on("click", function() {
        var passwordField = $(this).prev("input");
        var fieldType = passwordField.attr("type");

        // Toggle between password and text
        passwordField.attr(
            "type",
            fieldType === "password" ? "text" : "password"
        );
    });
})

