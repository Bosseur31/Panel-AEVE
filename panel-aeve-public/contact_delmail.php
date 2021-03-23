<?php

session_start();


if (!isset($_SESSION['password'])) { $_SESSION['location'] = 'contact_delmail.php'; header("Location: password.php"); EXIT; }

include('head.html');
?>

 <!doctype html>
<html lang="fr">

  <body>
  
<section class="page-section" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Entrer votre mail pour le supprimer</h2>

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
          <form method="POST" action="delmail.php" enctype="multipart/form-data">
    <br><br><br>       
  <div class="form-group">
    <label for="exampleFormControlInput1">Entrer mail </label>
    <input type="email" class="form-control" name="delmail" placeholder="Entrer votre mail pour le supprimer">
  </div>

            
            <br><br><br><br>

            <div  id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Envoyer</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>

  </body>
</html>