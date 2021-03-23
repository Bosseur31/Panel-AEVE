<?php

session_start();


if (!isset($_SESSION['password'])) { $_SESSION['location'] = 'contact.php'; header("Location: password.php"); EXIT; }

$identifiant = $_SESSION['password'];

include('mysql.php');
include('head.html');
include('nav-bar.html');


?>




 <!doctype html>
<html lang="fr">
  <body>
  
<section class="page-section" id="contact" style="margin-top: 5%;">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Proposition de disponibilité pour <?php $prenom ?></h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-envelope"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form name="sentMessage" id="contactForm" novalidate="novalidate">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nom</label>
                <input class="form-control" id="name" type="text" placeholder="Nom et prenom" required="required" data-validation-required-message="Entrer votre nom est obligatoire.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Adresse Email</label>
                <input class="form-control" id="email" type="email" placeholder="Adresse Email" required="required" data-validation-required-message="Entrer votre adresse Email est obligatoire.">
                <p class="help-block text-danger"></p>
              </div>
            </div><br><br>
            


      <div class="control-group">
                
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" id="date" size="16" type="text" value="Proposition de date" readonly>
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-remove">
                        
                      </span>
                    </span>
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar">
                        
                      </span>
                    </span>
               </div>
                <input type="hidden" id="dtp_input2" value="" /><br>
      </div><br><br><br>
      

      <div class="control-group">
                
                <div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                    <input class="form-control" id="heure" size="16" type="text" value="Heure de disponibilité" readonly >
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-remove">
                      
                      </span>
                    </span>
                    <span class="input-group-addon">
                    
                     <span class="glyphicon glyphicon-time">
                       
                     </span>
                    </span>
                </div>
                <input type="hidden" id="dtp_input3" value="" /><br><br><br><br>
      </div>
           


            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Message non obligatoire, vous pouvez entrer la date ici si vous le désirez</label>
                <textarea class="form-control" id="message" rows="5" placeholder="Message ( optionnel : vous pouvez entrer la date ICI )" ></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br><br><br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Envoyer</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>

<script type="text/javascript">
  $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  true,
        startDate: '+1d',
    autoclose: 1,
    todayHighlight: true,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
  $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        startDate: '+1d',
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minView: 0,
    maxView: 4,
    forceParse: 0
    });
</script>

  </body>
</html>
