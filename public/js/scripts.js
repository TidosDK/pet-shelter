
function goToSellerFunction() {
    let sellerDiv = document.getElementById("contactFormDiv");
    sellerDiv.scrollIntoView(true);
}

function sendContactMail() {
    let textArea = document.getElementById("message");
    let message = textArea.value;

    let emailInput = document.getElementById("email");
    let email = emailInput.value;

    var inputs = [textArea, emailInput];

    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].value == '') {
            return false;
        }
        else {
            window.scrollTo(0, 0);
            let alert = document.getElementById('alert-message-area');
            alert.style.display = 'block';
            alert.innerHTML = '<div class="alert alert-success mt-3" role="alert">Your message has been sent</div>';
            setTimeout(() => {
                alert.style.display = 'none';
            }, 3000);
            emailInput.value = "";
            textArea.value = "";
        }
    }
}
function edit(){
    var displayDiv = document.getElementById("dataForm")
    var editDiv = document.getElementById("editForm");
    var editBut = document.getElementById("edit button");
    

    if(editDiv.style.display === "none"){
        editDiv.style.display = "block";
        displayDiv.style.display = "none";
        editBut.innerHTML = "save";
        editBut.type = "submit";
        editBut.form = "editForm";
        viewPost.style.display = "none";
        edit.style.display = "none";
        
    }
    else{
        editDiv.style.display = "none";
        displayDiv.style.display = "block";
        editBut.innerHTML = "edit";
        editBut.type = "button";
    }
}