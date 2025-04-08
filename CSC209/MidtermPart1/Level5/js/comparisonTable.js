function addRow(BASIC, PRO){
  let newRow = ROW;
  newRow = newRow.replace("CHECKCROSSBASIC", "fa " + BASIC);
  newRow = newRow.replace("CHECKCROSSPRO", "fa " + PRO);
  document.getElementById("myTable").innerHTML += newRow;
}