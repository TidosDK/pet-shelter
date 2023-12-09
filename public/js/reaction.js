window.onload = function () {
    document.getElementById("like-button").addEventListener("click", displayReactions);
    document.getElementById("reaction-buttons").style.display = 'none';
}

function displayReactions() {
    const reactionsDiv = document.getElementById("reaction-buttons");
    const likeButton = document.getElementById("like-button");

    if (reactionsDiv.style.display == 'none') {
        reactionsDiv.style.display = 'block';
        likeButton.value = "^";
    }
    else {
        reactionsDiv.style.display = 'none';
        likeButton.value = "Like";
    }
}