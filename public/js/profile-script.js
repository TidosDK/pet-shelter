window.onload = function () {
    document.getElementById("editBtn").addEventListener("click", edit);
}

function edit() {
    var displayDiv = document.getElementById("dataForm")
    var editDiv = document.getElementById("editForm");
    var editBut = document.getElementById("edit button");

    if (editDiv.style.display === "none" || editDiv.style.display == "") {
        editDiv.style.display = "block";
        displayDiv.style.display = "none";
        editBut.innerHTML = "save";
        editBut.type = "submit";
        editBut.form = "editForm";
        viewPost.style.display = "none";
        edit.style.display = "none";
    } else {
        editDiv.style.display = "none";
        displayDiv.style.display = "block";
        editBut.innerHTML = "edit";
        editBut.type = "button";
    }
}
