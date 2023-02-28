window.onload = function() {
    // form submission buttons
    var buttons = document.getElementById("commentForm");
    buttons.addEventListener("submit", checkFields);

    // all required inputs
    var required = document.getElementsByClassName("required");
    required[0].addEventListener("change", (e) => {
        if(required[0].value != "" && required[0].value != null) {
            required[0].style.border = "black solid 1px";
        } else {
            required[0].style.border = "red solid 1px";
        }
    });

    required[1].addEventListener("change", (e) => {
        if(required[1].value != "" && required[0].value != null) {
            required[1].style.border = "black solid 1px";
        } else {
            required[1].style.border = "red solid 1px";
        }
    });
    
}

function checkFields(event) {
    var required = document.getElementsByClassName("required");
    for (var i = 0; i < required.length; i++) {
        if (required[i].value == "" || required[i].value == null) {
            event.preventDefault();
            required[i].style.border = "red solid 1px";
        }
    }
}