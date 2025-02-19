
const SLIDENUM = 3;
//Note: photos taken from Unsplash
const imgPaths = ["Images/guillermo-mota.jpg", "Images/sarah-olive.jpg", "Images/silje-midtgard.jpg"];
const captions = ["Roan Horse", "Chestnut Horse", "Pinto Horse"]
let slideIndex = 1;
const NUMTEXT = '<div id=numtext class="numbertext">CRT / ' + SLIDENUM + '</div>'
const IMGSRC = '<img src="FILEPATH" style="width:100%">'
const CAPTION = '<div class="text">TEXT</div>'
showSlides(slideIndex); 

// Iterates slide index by 1/-1 when the arrow is pressed
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Updates position to selected marker (n) when clicked
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
// Note: I wasn't able to get this working fully, I am submitting my most functional attempt.
for (let i = 1; i <= SLIDENUM; i++){
  var numbertext = NUMTEXT.replace("CRT", "" + i);
  var imgSrc = IMGSRC.replace("FILEPATH", imgPaths[i-1]);
  var text = CAPTION.replace("TEXT", captions[i-1]);
	var slides = '<div class="mySlides fade"> \n' + numbertext + imgSrc + text + "</div>";
  console.log(slides);
  document.getElementById("slideshow").innerHTML += slides;
}

