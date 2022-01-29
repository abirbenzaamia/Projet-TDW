<?php
class ContactView{
    function displayContactInfo($res){
      echo '  <div class="col-md-5 col-lg-4 m-15px-tb">
      <div class="contact-name">
          <h5>Email de la DG</h5>
          <p>'.$res['entreprise_email'].'</p>
      </div>
      <div class="contact-name">
      <h5>N° de téléphone</h5>
      <p>'.$res['entreprise_tel'].'</p>
  </div>
      <div class="contact-name">
          <h5>Adresse principal</h5>
          <p>'.$res['adresse'].'</p>
      </div>
     
      <div class="contact-name">
          <h5>Email du support technique</h5>
          <p>'.$res['support_tech_email'].'</p>
      </div>
      <div class="contact-name">
          <h5>N° du support technique</h5>
          <p>'.$res['support_tech_tel'].'</p>
      </div>
      <div class="contact-name">
          <h5>Email du support commercial</h5>
          <p>'.$res['support_com_email'].'</p>
      </div>
      <div class="contact-name">
          <h5>N° du support commercial</h5>
          <p>'.$res['support_com_tel'].'</p>
      </div>
     
  </div>';
}
function displayFormContact(){
echo '<div class="col-md-7 col-lg-8 m-15px-tb">
<div class="contact-form">
<div class="contact-name">
    <h5>Contactez-nous à tranver un email via ce formulaire</h5>
</div>
     <form action="/" method="post" class="contactform contact_form" id="contact_form">
        <div class="returnmessage valid-feedback p-15px-b" data-success="Your message has been received, We will contact you soon."></div>
        <div class="empty_notice invalid-feedback p-15px-b"><span>Please Fill Required Fields</span></div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input id="name" type="text" placeholder="Full Name" class="form-control"> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input id="email" type="text" placeholder="Email Address" class="form-control">  
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <input id="subject" type="text" placeholder="Subject" class="form-control"> 
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <textarea id="message" placeholder="Message" class="form-control" rows="3"></textarea> 
                </div>
            </div>
            <div class="col-md-12">
                <div class="send">
                    <a id="send_message" class="px-btn theme" href="#"><span>Contact Us</span> <i class="arrow"></i></a>
                </div>
            </div>
        </div>
    </form>
</div>
</div>';
}

}
?>