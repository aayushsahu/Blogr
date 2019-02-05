var slideIndex = 0;
var commentIndex = 0;

showSlides(slideIndex);

function plusSlides(n, j) {
   
  showSlides(slideIndex+=n, j);
}

function showSlides(n, j) {
  var i=0;
  var slides = document.getElementsByClassName("mySlides".concat(j));
  var dots = document.getElementsByClassName("dots".concat(j));
  //document.write(slides.length);
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {	
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].style.backgroundColor = "grey";
  }
dots[slideIndex-1].style.backgroundColor = "white";  
slides[slideIndex-1].style.display = "block"; 
  
}




showComment(commentIndex);

function plusComments(m, k) {
  showComment(commentIndex += m, k);
}

function showComment(m, k) {
  var i=0;
  var comments = document.getElementsByClassName("comment".concat(k));
  var dotss = document.getElementsByClassName("dotss".concat(k));
  if (m> comments.length) {commentIndex =1} 
  if (m < 1) {commentIndex = comments.length}
  for (i = 0; i < comments.length; i++) {	
   comments[i].style.display = 'none'; 
  }
  for (i = 0; i < dotss.length; i++) {
      dotss[i].style.backgroundColor = "grey";
  }
  comments[commentIndex-1].style.display = 'block';
  dotss[commentIndex-1].style.backgroundColor = "white";

}
