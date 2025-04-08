function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function addTab(i){
  let myContainer = document.getElementById("tabContainer");
  let linkContainer = document.getElementById("tabLinks");
  let city = cities[i];
  // Create button link
  let newButton = document.createElement("button")
  newButton.setAttribute("class", "tablinks");
  newButton.setAttribute("onclick", "openCity(event, '"+city+"')");
  newButton.innerHTML = city;
  linkContainer.appendChild(newButton);
  // Create tab content div
  let newContent = document.createElement("div");
  newContent.setAttribute("id", city);
  newContent.setAttribute("class", "tabcontent");
  let header = document.createElement("h3");
  header.innerHTML = city;
  let para = document.createElement("p");
  para.innerHTML = content[i];
  let image = document.createElement("img");
  image.setAttribute("src", imgPaths[i]);
  image.setAttribute("style", "width:30%");
  newContent.appendChild(header);
  newContent.appendChild(para);
  newContent.appendChild(image);
  myContainer.appendChild(newContent);
}

function addAllTabs(){
  for (i = 0; i < NRTABS; i++){
    addTab(i);
  }
}