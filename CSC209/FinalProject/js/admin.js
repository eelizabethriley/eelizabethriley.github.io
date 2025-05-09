function loadUsers() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        const users = JSON.parse(this.responseText);
        document.getElementById("num").innerHTML = users.length;

        let table = document.getElementById("users");
        table.innerHTML = ""; 

        let header = document.createElement("tr");
        let userLabel = document.createElement("td");
        userLabel.innerHTML = "Username";
        header.appendChild(userLabel);
        let passLabel = document.createElement("td");
        passLabel.innerHTML = "Password";
        header.appendChild(passLabel);
        table.appendChild(header);
        

        for (let i = 0; i < users.length; i++) {
            let row = document.createElement("tr");
            let username = document.createElement("td");
            username.innerHTML = users[i]["username"];
            row.appendChild(username);
            let password = document.createElement("td");
            password.innerHTML = users[i]["password"];
            row.appendChild(password);
            let remove = document.createElement("td");
            let removeButton = document.createElement("button");
            removeButton.innerHTML = "Remove";
            removeButton.onclick = function () {
                removeUser(users[i]["username"]);
            };
            remove.appendChild(removeButton);
            row.appendChild(remove);
            table.appendChild(row);
        }
    };
    xhttp.open("GET", "output/users.json", true);
    xhttp.send();
}

function removeUser(username) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        console.log(this.responseText);
        loadUsers();
    };
    xhttp.open("POST", "php/removeUser.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username=" + username);
}