function favoritevalidacija() {
    var x, y, text;

    // Get the value of the input field with id="numb"
    x = document.getElementById("imeinput1").value;
    y = document.getElementById("komentarinput1").value;

    // If x is Not a Number or less than one or greater than 10
    if (x=="") {
        text = "Unesite ime";
    }else if (y==""){
      
      text = "Unesite komentar";
    }
    
     else {
        text = "Zahvaljujemo na komentaru :)";
    }
    document.getElementById("demofavorite").innerHTML = text;
}
window.onload = function(){
  

  var ime = localStorage.getItem("imeinput1");
  var ime1 = document.getElementById("imeinput1");
  if (ime != null) ime1.value = ime;
  var komentar = localStorage.getItem("komentarinput1");
  var komentar1 = document.getElementById("komentarinput1");
  if (komentar != null) komentar1.value = komentar;
  

}
function smjestiUStoragef(){
  var ime = document.getElementById("imeinput1");
  ime.style.color = "blue";
  localStorage.setItem("imeinput1", imeinput1.value);
  var komentar = document.getElementById("komentarinput1");
  localStorage.setItem("komentarinput1", komentarinput1.value);
 
}
function objef(){
  
  favoritevalidacija();
  
  smjestiUStoragef();
  


}