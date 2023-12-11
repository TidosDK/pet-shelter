window.onload=function(){
    document.getElementById("scrollDownBtn").addEventListener("click",goToSellerFunction);  
    document.getElementById("sendMessageBtn").addEventListener("click",sendContactMail);
  }
  
  function goToSellerFunction() {
      document.getElementById("contactFormDiv").scrollIntoView(true);
  }
  
  function sendContactMail() {
      let textArea = document.getElementById("message");
      let message = textArea.value;
  
      let emailInput = document.getElementById("email");
      let email = emailInput.value;
  
    if (textArea.value != ''&& emailInput.value != '') {
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

function handleData() {
    var form_data = new FormData(document.querySelector("form"));
    console.log("form data: ");
    for (var pair of form_data.entries()) {
        console.log(pair[0] + ' : ' + pair[1]);
    }
    return false;
}
