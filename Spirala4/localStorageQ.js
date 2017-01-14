function quotevalidacija() {
    var x, y, text;

    // Get the value of the input field with id="numb"
    x = document.getElementById("imeinput").value;
    y = document.getElementById("komentarinput").value;

    // If x is Not a Number or less than one or greater than 10
    if (x=="") {
        text = "Unesite ime";
    }else if (y==""){
      
      text = "Unesite omiljeni citat";
    }
    
     else {
        text = "Hvala! Citat ulazi u razmatranje...";
    }
    document.getElementById("demoquote").innerHTML = text;
}

window.onload = function(){
  

  var ime = localStorage.getItem("imeinput");
  var ime1 = document.getElementById("imeinput");
  if (ime != null) ime1.value = ime;
  var komentar = localStorage.getItem("komentarinput");
  var komentar1 = document.getElementById("komentarinput");
  if (komentar != null) komentar1.value = komentar;
  

}
function smjestiUStorageg(){
  var ime = document.getElementById("imeinput");
  ime.style.color = "blue";
  localStorage.setItem("imeinput", imeinput.value);
  var komentar = document.getElementById("komentarinput");
  localStorage.setItem("komentarinput", komentarinput.value);
 
}
function objeq(){
  
  quotevalidacija();
  
  smjestiUStorageq();
  


}

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}
