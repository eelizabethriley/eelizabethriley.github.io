function addRow(BASIC, PRO){
  let newRow = ROW;
  newRow = newRow.replace("CHECKCROSSBASIC", "fa " + BASIC);
  newRow = newRow.replace("CHECKCROSSPRO", "fa " + PRO);
  document.getElementById("myTable").innerHTML += newRow;
}

function addRows(n){
  for (i = 0; i < n; i++){
    addRow("fa-remove", "fa-check");
  }
}