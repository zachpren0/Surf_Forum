window.onload = function() {
    // form submission buttons
    var buttons = document.getElementById("signupForm");
    buttons.addEventListener("submit", checkFields);

    // all required inputs
    var required = document.getElementsByClassName("required");
    required[0].addEventListener("change", (e) => {
        if(required[0].value != "" && required[0].value != null) {
            required[0].style.border = "black solid 1px";
            required[0].style.outline = "black solid 1px";
        } else {
            required[0].style.border = "red solid 1px";
            required[0].style.outline = "red solid 1px";
        }
    });

    required[1].addEventListener("change", (e) => {
        if(required[1].value != "" && required[0].value != null) {
            required[1].style.border = "black solid 1px";
            required[1].style.outline = "black solid 1px";
        } else {
            required[1].style.border = "red solid 1px";
            required[1].style.outline = "red solid 1px";
        }
    });

    required[2].addEventListener("change", (e) => {
        if(required[2].value != "" && required[0].value != null) {
            required[2].style.border = "black solid 1px";
            required[2].style.outline = "black solid 1px";
        } else {
            required[2].style.border = "red solid 1px";
            required[2].style.outline = "red solid 1px";
        }
    });

    required[3].addEventListener("change", (e) => {
        if(required[3].checked == true) {
            required[3].style.border = "black solid 1px";
            required[3].style.outline = "black solid 1px";
        } else {
            required[3].style.border = "red solid 1px";
            required[3].style.outline = "red solid 1px";
        }
    });
    
}

function checkFields(event) {
    var required = document.getElementsByClassName("required");
    for (var i = 0; i < required.length - 1; i++) {
        if (required[i].value == "" || required[i].value == null) {
            event.preventDefault();
            required[i].style.border = "red solid 1px";
        }
    }
    if (required[required.length-1].checked === false) {
        event.preventDefault();
        required[required.length-1].style.outline = "red solid 1px";
    }
}