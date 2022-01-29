$(document).ready(function(){
    //recupere la listes des wilayas du fichier json
 
  
  
  $(".cocher input").change(function(){
    var checked = $(this).is(':checked'); // Checkbox state

    
    if(checked){//afficher les autres zones y compris les wilayas si c'est un transporteur
       
        $('.transp').show();
    }else{
      //cacher la zone affcihéé si ce n'est un transporteur
      $('.transp').hide();
    }

 });
 $(".cert input").change(function(){
  var checked = $(this).is(':checked'); // Checkbox state

  
  if(checked){//afficher les autres zones y compris les wilayas si c'est un transporteur

      $('.dmnd').show();
  }else{
    //cacher la zone affcihéé si ce n'est un transporteur
    $('.dmnd').hide();
  }

});
$('.inscription button').click(function(e){

  let valid = this.form.checkValidity(); 
  if (valid) {
    let nom = $('.nom input').val();
    let prenom = $('.prenom input').val();
    let email =$('.email input').val();
    let numero = $('.nmr input').val();
    let adr = $('.adr input').val();
    let mdp = $('.mdp input').val();
    let checkedT = $('.cocher input').is(':checked'); 
    e.preventDefault();
    //s'il s'agit d'un utilisateur simple 
    if (checkedT===false) {
      $.ajax({
        type: 'POST',
        url: 'Controller/MainController.php',
        data: {user:'client',nom: nom ,prenom: prenom, email:email,tel:numero,adr:adr,mdp:mdp },
        success: function(data){
          //data will contain the vote count echoed by the controller i.e.  
         //then append the result where ever you want like
         if (data==='success') {
          swal({
            title: "Inscription avec success!",
            text: "Bienvenu sur notre site",
            icon: "success",
          });
          window.location.replace("accueil.php");
         } else {
          $("span#exdj").html(data);
         }
          //data will be containing the vote count which you have echoed from the controller

           }
      });

    }else{ 

      //s'il s'agit d'un transporteur 
      let values_dep = $('.wilayas_dep .selected-items>span').text();
      var wilayas_dep = values_dep.split('×');
     for (let i = 0; i < wilayas_dep.length; i++) {
       let index = wilayas_dep[i].indexOf("-"); 
       wilayas_dep[i]= wilayas_dep[i].slice(0,index); 
     }
     wilayas_dep.pop();
     let values_arv = $('.wilayas_arv .selected-items>span').text();
      var wilayas_arv = values_arv.split('×');
     for (let i = 0; i < wilayas_arv.length; i++) {
       let index = wilayas_arv[i].indexOf("-"); 
       wilayas_arv[i]= wilayas_arv[i].slice(0,index); 
     }
     wilayas_arv.pop(); 
     console.log(wilayas_dep);
     console.log(wilayas_arv);

     let checkedC = $('.cert input').is(':checked'); 
     if (checkedC===false) { //il ne s'agit pas d'un transporteur certifié
      $.ajax({
        type: 'POST',
        url: 'Controller/MainController.php',
        data: {user:'trasporteurNC',nom: nom ,prenom: prenom, email:email,tel:numero,adr:adr,mdp:mdp,wilayas_dep:wilayas_dep, wilayas_arv: wilayas_arv },
        success: function(data){
          //data will contain the vote count echoed by the controller i.e.  
         //then append the result where ever you want like
         if (data==='success') {
          swal({
            title: "Inscription avec success!",
            text: "Bienvenu sur notre site",
            icon: "success",
          });
          window.location.replace("accueil.php");
         } else {
          $("span#exdj").html(data);
         }
          //data will be containing the vote count which you have echoed from the controller

           }
      });
       
     } else {//il s'agit d'un transporteur certifié
      $.ajax({
        type: 'POST',
        url: 'Controller/MainController.php',
        data: {user:'trasporteurC',nom: nom ,prenom: prenom, email:email,tel:numero,adr:adr,mdp:mdp,wilayas_dep:wilayas_dep, wilayas_arv: wilayas_arv },
        success: function(data){
          //data will contain the vote count echoed by the controller i.e.  
         //then append the result where ever you want like
         if (data==='success') {
          swal({
            title: "Inscription avec success!",
            text: "Bienvenu sur notre site",
            icon: "success",
          });
          window.location.replace("accueil.php");
         } else {
          $("span#exdj").html(data);
         }
          //data will be containing the vote count which you have echoed from the controller

           }
      });
       
     }
    }
  }
   
    
});



// style de l'inscription


});