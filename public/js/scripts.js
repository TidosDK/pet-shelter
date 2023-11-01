
function goToSellerFunction() {
    let sellerDiv = document.getElementById("contactFormDiv");
    sellerDiv.scrollIntoView(true);
}

function sendContactMail() {
    window.scrollTo(0,0);
    alert("Your mail has been sent!");

    let textArea = document.getElementById("message");
    let message = textArea.value;
    textArea.value = "";

    let emailInput = document.getElementById("email");
    let email = emailInput.value;
    emailInput.value = "";

    console.log(message);
    console.log(email);
}