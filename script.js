/*function quotevalidacija() {
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
}*/

/* function favoritevalidacija() {
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
*/

 function contactvalidacija() {
    var x, y, text;

    // Get the value of the input field with id="numb"
    x = document.getElementById("emailinput").value;
    y = document.getElementById("pitanjeinput").value;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    // If x is Not a Number or less than one or greater than 10
    if (!x.match(mailformat)) {
        text = "Neispravan e-mail. Unesite ponovo.";
    }else if (y==""){
      
      text = "Unesite pitanje";
    }
    
     else {
        text = "Zahvaljujemo od srca :)";
    }
    document.getElementById("democontact").innerHTML = text;
}


window.onload = function(){
  

  var email = localStorage.getItem("emailinput");
  var email1 = document.getElementById("emailinput");
  if (email != null) email1.value = email;
  var pitanje = localStorage.getItem("pitanjeinput");
  var pitanje1 = document.getElementById("pitanjeinput");
  if (pitanje != null) pitanje1.value = pitanje;


}

function smjestiUStorage(){
  var email = document.getElementById("emailinput");
  email.style.color = "blue";
  localStorage.setItem("emailinput", emailinput.value);
  var pitanje1 = document.getElementById("pitanjeinput");
  localStorage.setItem("pitanjeinput", pitanjeinput.value);
  


}


/*function smjestiUStorageq(){
  
  var ime = document.getElementById("imeinput");
  ime.style.color = "blue";
  localStorage.setItem("imeinput", imeinput.value);
  var komentar = document.getElementById("komentarinput");
  localStorage.setItem("komentarinput", komentarinput.value);

}*/



function obje(){
  contactvalidacija();

  smjestiUStorage();



}

/*function objeq(){
  
  quotevalidacija();
  
  smjestiUStorageq();

}*/

/*  function clickCounter(form) {
  localStorage.jedan = form.emailinput.value;
        localStorage.dva = form.pitanjeinput.value;
        localStorage.tri = form.imeinput.value;
        localStorage.dva = form.quoteinput.value;
        localStorage.dva = form.komentarinput.value;
        localStorage.setItem("E-mail", document.getElementById(emailinput).value);
        
        console.log("set up complete again");
        document.getElementById("emailinput").innerHTML = localStorage.getItem("E-mail");
    
}*/ 


