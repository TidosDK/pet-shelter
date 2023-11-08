
function goToSellerFunction() {
    let sellerDiv = document.getElementById("contactFormDiv");
    sellerDiv.scrollIntoView(true);
}

function sendContactMail() {
    window.scrollTo(0,0);
    
    let textArea = document.getElementById("message");
    let message = textArea.value;
    textArea.value = "";
    
    let emailInput = document.getElementById("email");
    let email = emailInput.value;
    emailInput.value = "";

    let alert = document.getElementById('alert-message-area');
    alert.style.display = 'block';
    alert.innerHTML = '<div class="alert alert-success mt-3" role="alert">Your message has been sent</div>';
    setTimeout(() => {
        alert.style.display = 'none';
      }, 3000);
    //console.log(message);
    //console.log(email);
}