function addRow(FEATURE, BASIC, PRO){
  // Access the table itself
  let tableContainer = document.getElementById("myTable");
  // Create a new row in the table
  let newRow = document.createElement("tr");
  // Add the feature column data
  let feature = document.createElement("td");
  feature.innerHTML = FEATURE;
  newRow.appendChild(feature);
  // Add the basic column data
  let basic = document.createElement("td");
  let basicIcon = document.createElement("i");
  basicIcon.setAttribute("class", "fa " + BASIC);
  basic.appendChild(basicIcon);
  newRow.appendChild(basic);
  // Add the pro column data
  let pro = document.createElement("td");
  let proIcon = document.createElement("i");
  proIcon.setAttribute("class", "fa " + PRO);
  pro.appendChild(proIcon);
  newRow.appendChild(pro);
  // Add the newly constructed row to the table
  tableContainer.appendChild(newRow);
}

function addAllRows(){
  for (i = 0; i < NRROWS; i++){
    addRow(FEATURES[i], BASIC[i], PRO[i]);
  }
}