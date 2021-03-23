
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="css/freelancerpassword.css" rel="stylesheet">
        
        

        <title>Vidéo AEVE</title>
    </head>
    <body>
        <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-lock"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      
      <h1 class="masthead-heading text-uppercase mb-0">Connection Vidéo-AEVE</h1>

      
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-lock"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
    </div>
  </header> 
   
   <div class="cadre">

         <div class="interieur_cadre">
         <form action="traitementpassword.php" method="post" id="connexion">

            <input type="password" class="form-control" name="mot_de_passe" id="inputPassword2" placeholder="Mot de passe" required="required" autofocus data-validation-required-message="Entrer un mot de passe pour accéder au site." />

             <br>
             <div id="alert">   </div>

            <br>
            <input type="submit" class="btn btn-light" value="Valider" />
            

        </form>
             <br><br><br><br>
             <div class=" text-center ml-auto">
                 <a class="btn btn-xl btn-outline-light" href='../panel-aeve-admin/index-admin.php'>
                     <i class="fas fa-tools mr-2"></i>
                     Administration
                 </a>
             </div>
   </div>

     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
     <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
     <script src="js/jqBootstrapValidation.js"></script>
     <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
     <script src="js/freelancer.min.js"></script>
       <script>

           $(document).ready(function(){

               $("#connexion").submit(function(e){
                   e.preventDefault();
                   var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
                   var form_method = $(this).attr("method"); //récupérer la méthode GET/POST du formulaire
                   var form_data = $(this).serialize();
                   $.ajax({
                       url: form_url,
                       type: form_method,
                       data : form_data,
                       success: function(data) {
                           if (data === "no") {
                               $('#alert').html(' <div class="alert alert-danger "> <i class="fas fa-lock"></i> &nbsp; &nbsp;Mot de passe faux ou erroné &nbsp; &nbsp; <i class="fas fa-lock"></i> </div> ');
                           }
                           else {
                               location.href = data;
                           }
                       },
                       error: function() {
                           alert('Une erreur c\'est produite contacté l\'administrateur du site'); }
                   });
               });
           });

       </script>


    </body>
</html>