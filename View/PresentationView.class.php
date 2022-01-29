<?php
class PresentationView{
    function displayPrentationDetails($res){
          echo '<section class="section_all bg-light" id="about">
          <div class="container">          
              <div class="row">
                  <div class="col-lg-12">
                      <div class="section_title_all text-center">
                          <h3 class="font-weight-bold">Présentation de notre site </h3>
                          <p class="section_subtitle mx-auto text-muted">Le premier site en Algérie pour la livraison <br/>Avec rapidité des services et confiance illimitée </p>
                      </div>
                  </div>
                  <div class="col-lg-12 text-center">
            <video src="assets/'.$res[0]['video'].'" controls autoplay height="500px"></video>

            </div>
              </div>

              <div class="row vertical_content_manage mt-5">
                  <div class="col-lg-6">
                      <div class="about_header_main mt-3">
                          <div class="about_icon_box">
                              <p class="text_custom font-weight-bold">Cheetah Services</p>
                          </div>
                          <h4 class="about_heading text-capitalize font-weight-bold mt-4">Le premier site en Algérie pour la livraison</h4>
                          <p class="text-muted mt-3">'.$res[0]['texte'].'</p>
   
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="img_about mt-3">
                          <img src="assets/'.$res[0]['image'].'" alt="presentaion" class="img-fluid mx-auto d-block" height="250px" width="auto">
                      </div>
                      
                  </div>
              </div>

              <div class="row mt-3">
                  <div class="col-lg-4">
                      <div class="about_content_box_all mt-3">
                          <div class="about_detail text-center">
                              <div class="about_icon">
                                  <i class="fas fa-pencil-alt"></i>
                              </div>
                              <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Rapidité</h5>
                              <p class="edu_desc mt-3 mb-0 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-4">
                      <div class="about_content_box_all mt-3">
                          <div class="about_detail text-center">
                              <div class="about_icon">
                                  <i class="fab fa-angellist"></i>
                              </div>
                              <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Confiance</h5>
                              <p class="edu_desc mb-0 mt-3 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-4">
                      <div class="about_content_box_all mt-3">
                          <div class="about_detail text-center">
                              <div class="about_icon">
                                  <i class="fas fa-paper-plane"></i>
                              </div>
                              <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Plusieurs destinations</h5>
                              <p class="edu_desc mb-0 mt-3 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>';
    }
}
?>