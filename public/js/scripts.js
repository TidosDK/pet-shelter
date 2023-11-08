
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