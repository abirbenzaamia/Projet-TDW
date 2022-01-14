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
$('.connexion button').click(function(e){

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
        url: 'inscription_utilisateur.php',
        data: {nom: nom ,prenom: prenom, email:email,tel:numero,adr:adr,mdp:mdp },
        success: function(data){
          //data will contain the vote count echoed by the controller i.e.  
         //then append the result where ever you want like
         if (data==='inscription avec succes') {
          window.location.replace("accueil.php");
         } else {
          $("span#exdj").html(data);
         }
          //data will be containing the vote count which you have echoed from the controller

           }
      });

    }else{ 
      //s'il s'agit d'un transporteur 
      let values = $('.selected-items>span').text();
      var wilayas = values.split('×');
     for (let i = 0; i < wilayas.length; i++) {
       let index = wilayas[i].indexOf("-"); 
       wilayas[i]= wilayas[i].slice(0,index); 
     }
     wilayas.pop();
     let checkedC = $('.cert input').is(':checked'); 
     if (checkedC===false) { //il ne s'agit pas d'un transporteur certifié
      $.ajax({
        type: 'POST',
        url: 'inscription_transporteur_NC.php',
        data: {nom: nom ,prenom: prenom, email:email,tel:numero,adr:adr,mdp:mdp,trajet:wilayas },
        success: function(data){
          //data will contain the vote count echoed by the controller i.e.  
         //then append the result where ever you want like
         if (data==='inscription avec succes') {
          window.location.replace("accueil.php");
         } else {
          $("span#exdj").html(data);
         }
          //data will be containing the vote count which you have echoed from the controller

           }
      });
       
     } else {
       
     }
    }
  }
   
    
});

});