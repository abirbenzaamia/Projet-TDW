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

  $(".conn a ").click(function(){
    document.getElementById('id01').style.display='block';
  }
  );
  var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

//script de l'authentification en utilisant ajax
$('form>div.container button').click(function(e){

  let valid = this.form.checkValidity(); 
  if (valid) {
    let email =$('input#email').val();
    let mdp = $('input#mdp').val();
    e.preventDefault();
    //s'il s'agit d'un utilisateur simple 

      $.ajax({
        type: 'POST',
        url: 'connexion.php',
        data: {email:email,mdp:mdp },
        success: function(data){
          //data will contain the vote count echoed by the controller i.e.  
         //then append the result where ever you want like
         if (data==='success') {
          window.location.replace("accueil.php");
         } else {
          $("span#erreur").html(data);
         }
          //data will be containing the vote count which you have echoed from the controller

           }
      });
   
}
});

//script pour ajouter une annonce 
$("body > div.btn_ajout_annonce > a ").click(function(){
  document.querySelector('.ajout_annonce').style.display='block';
}
);

$('body > div.col-lg-7.contact-form__wrapper.p-5.order-lg-1.ajout_annonce > form > div > div:nth-child(8) > button').click( function(e){

  let valid = this.form.checkValidity(); 
  var me = $(this);
  if ( me.data('requestRunning') ) {
    return;
}
me.data('requestRunning', true);
  if (valid) {
    let wilaya_dep = $("#dep").val();
    let wilaya_arv = $("#arv").val();
    let type_transp = $("#type_transp").val();
    let id_poids = $("#poids").val();
    let taille = $("#volume").val();
    let moyen_transp = $("#moy_transp").val();
    let desc =  $("#description").val();
    console.log(wilaya_dep,wilaya_arv,type_transp,id_poids,taille,moyen_transp);
    e.preventDefault();
        $.ajax({
          type: 'POST',
          url: 'Controller/MainController.php',
          data: {pub:'pub',wilaya_dep:wilaya_dep,wilaya_arv:wilaya_arv,type_transp:type_transp,id_poids:id_poids,taille:taille,moyen_transp:moyen_transp,desc:desc },
          success: function(data){
            //$("span#pub").html(data);
            //data will contain the vote count echoed by the controller i.e.  
           //then append the result where ever you want like
            swal({
              title: "L'annonce est ajoutée !",
              text: "Veuillez attendre la validation du site'",
              icon: "success",
            });
           
            
            //window.location.replace("accueil.php");
         
            //data will be containing the vote count which you have echoed from the controlle
             },
             complete: function() {
              me.data('requestRunning', false);
          }
        });
   
}
});


}


