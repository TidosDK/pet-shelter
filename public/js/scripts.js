
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

function handleData()
{
    var form_data = new FormData(document.querySelector("form"));
    console.log("form data: ");
    for(var pair of form_data.entries())
    {
        console.log(pair[0]+ ' : '+ pair[1]);
    }
    return false;
}

// function showListofAnimal() {
//       var animals = document.getElementById('json/types_of_pets.json');
//       var animalSelect = document.getElementById('animalList');
//       for(var i = 0; i < animals.length; i++){
//         animalOption = document.createElement("option");
//         animalOption.text = animals[i];
//         animalOption.value = animals[i];
//         animalSelect.append(animalOption);
//       }
// }

// function createPostButton() {
//     let petName = document.getElementById('petName');
//     let petNameVar = petName.value;

//     let petAge = document.getElementById('petAge');
//     let petAgeVar = petAge.value;

//     let petWeight = document.getElementById('petWeight');
//     let petWeightVar = petWeight.value;

//     let petGenderSelect = document.getElementById('genderSelect');
//     let petGender = petGenderSelect.value;

//     let animalListSelect = document.getElementById('animalList');
//     let animalList = animalListSelect.value;

//     var castrationCheck = document.getElementById('castrateCheck').checked;
//     castrate = castrationCheck.Boolean;

//     var friendlyCheck = document.getElementById('multipleAnimalsFriendlyCheck').checked;
//     friendly = friendlyCheck.Boolean;

//     var kidFriendlyCheck = document.getElementById('kidFriendlyCheck').checked;
//     kidFriendly = kidFriendlyCheck.Boolean;

//     let breedListSelect = document.getElementById('breedList');
//     let petBreed = breedListSelect.value;

//     let petComment = document.getElementById('petComment');
//     let comment = petComment.value;

//     let price = document.getElementById('price');
//     let petPrice = price.value;
// }
