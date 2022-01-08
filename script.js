let myIndex = 0;
carousel();

function carousel() {
  let i;
  let x = document.getElementsByClassName("diapoImg");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1;}    
  x[myIndex-1].style.display = "block";  
  x[myIndex-1].addEventListener("mouseover",mouseOver);
  x[myIndex-1].addEventListener("mouseout",mouseOut);

  let id = setTimeout(carousel, 3000); // changement chaque 3 seconds
  function mouseOver() {
    // x[myIndex-1].style.display = "block"; 
    clearTimeout(id);

  }
  function mouseOut() {
    // x[myIndex-1].style.display = "block"; 
    id = setTimeout(carousel, 3000);

  }

}


