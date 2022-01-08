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
    let checked = $('.cocher input').is(':checked'); 
    e.preventDefault();
    //s'il s'agit d'un utilisateur simple 
    if (checked===false) {
      $.ajax({
        type: 'POST',
        url: 'inscription_process.php',
        data: {nom: nom ,prenom: prenom, email:email,tel:numero,adr:adr,mdp:mdp },
      });
    }else{ //s'il s'agit d'un transporteur 

    }
    

  }

});

});