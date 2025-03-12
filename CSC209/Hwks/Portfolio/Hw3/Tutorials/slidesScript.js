
const SLIDENUM = 3;
const imgPaths = ["Images/guillermo-mota.jpg", "Images/sarah-olive.jpg", "Images/silje-midtgard.jpg"];
const captions = ["Roan Horse", "Chestnut Horse", "Pinto Horse"]
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

  // <div class="mySlides fade">
  //   <div class="numbertext">CRT / TOTAL</div>
  //   <img src="Images/guillermo-mota.jpg" style="width:100%">
  //   <div class="text">Roan Horse</div>
  // </div>

// Replace the numbers automatically
for (let i = 1; i <= SLIDENUM; i++){
	var crtSlide = CURRENT.replace("CRT", "" + i);
	var total = SLIDENUM;
	var numbertext = crtSlide + " / " + SLIDENUM;
	var slides;
	document.getElementById("slideshow")[0].innerHTML += slides;
}