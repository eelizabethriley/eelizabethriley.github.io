// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    let users = this.responseText.split("\n");
    let numUsers = users.length - 1;
    document.getElementById("num").innerHTML =
    numUsers;
    let list = document.getElementById("users");
    for (i=0; i < numUsers; i++){
        let user = document.createElement("li");
        user.innerHTML = users[i].split("/")[0];
        list.appendChild(user);
    }
  }
  xhttp.open("GET", "output/users.txt");
  xhttp.send();
}