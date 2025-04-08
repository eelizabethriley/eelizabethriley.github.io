function addEventListeners(){
  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", toggleFunction);
  }
}

function toggleFunction() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }

function addSection(i){
  let myContainer = document.getElementById("accordionContainer");
  let button = document.createElement("button");
  let num = i+1;
  button.setAttribute("class", "accordion");
  button.innerHTML = "Download " + num;
  myContainer.appendChild(button);
  let panel = document.createElement("div");
  panel.setAttribute("class", "panel");
  let para = document.createElement("p");
  para.innerHTML = "Download image " + num;
  let link = document.createElement("a");
  link.setAttribute("href", images[i]);
  link.innerHTML = " here";
  para.appendChild(link);
  panel.appendChild(para);
  myContainer.appendChild(panel);
}

function addAllSections(){
  for (i = 0; i < NRIMAGES; i++){
    addSection(i);
  }
}