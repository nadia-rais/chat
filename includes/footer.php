<footer class="page-footer black">
  <div class="container">
    <div class="row center">
        <img src="img/chat-logo1.png" alt="logo-sayhi" width="200px" height="200px">
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col l4 m4 s12">
        <h5 class="white-text link-footer">CONTACT</h5>
        <hr class="footer-border">
        <p class="grey-text text-lighten-4 footer-contact">Nous nous engageons à répondre à vos demandes par email dans les 24h après l'envoi de votre message.</p>
        <a href="mailto:hello@sayhi.com"><i class="material-icons left">mail_outline</i>hello@sayhi.com</a>
      </div>
      <div class="col l4 m4 s12">
        <h5 class="white-text link-footer">SOCIAL</h5>
        <hr class="footer-border">
          <ul id="footer-social">
            <!-- Facebook -->
            <li><a href="https://www.facebook.com" class="icon-social" title="Facebook"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="white" d="M0 0v24h24v-24h-24zm16 7h-1.923c-.616 0-1.077.252-1.077.889v1.111h3l-.239 3h-2.761v8h-3v-8h-2v-3h2v-1.923c0-2.022 1.064-3.077 3.461-3.077h2.539v3z"/></svg></a></li>
            <!-- Twitter -->
            <li><a href="https://www.twitter.com" class="icon-social" title="Twitter"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="white" d="M0 0v24h24v-24h-24zm18.862 9.237c.208 4.617-3.235 9.765-9.33 9.765-1.854 0-3.579-.543-5.032-1.475 1.742.205 3.48-.278 4.86-1.359-1.437-.027-2.649-.976-3.066-2.28.515.098 1.021.069 1.482-.056-1.579-.317-2.668-1.739-2.633-3.26.442.246.949.394 1.486.411-1.461-.977-1.875-2.907-1.016-4.383 1.619 1.986 4.038 3.293 6.766 3.43-.479-2.053 1.079-4.03 3.198-4.03.944 0 1.797.398 2.396 1.037.748-.147 1.451-.42 2.085-.796-.245.767-.766 1.41-1.443 1.816.664-.08 1.297-.256 1.885-.517-.44.656-.997 1.234-1.638 1.697z"/></svg></a></li>
            <!-- LinkedIn -->
            <li><a href="https://www.linkedin.com" class="icon-social" title="LinkedIn"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="white" d="M0 0v24h24v-24h-24zm8 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.397-2.586 7-2.777 7 2.476v6.759z"/></svg></a></li>
          </ul>
      </div>
      <div class="col l4 m4 s12">
        <h5 class="white-text link-footer">REJOINS-NOUS</h5>
        <hr class="footer-border">
        <ul>
          <?php if (isset($_SESSION['user']['id_user'])){
                  if ($_SESSION['user']['droits'] == 1) {
          ?>
            <li><a class="grey-text text-lighten-3" href="admin.php">espace admin</a></li>
          <?php } ?>
            <li><a class="grey-text text-lighten-3 link-footer" href="profil.php">profil</a></li>
            <li><a class="grey-text text-lighten-3 link-footer" href="#!">déconnexion</a></li>
          <?php }else{ ?>
            <li><a class="grey-text text-lighten-3" href="connexion.php">connexion</a></li>
            <li><a class="grey-text text-lighten-3 link-footer" href="inscription.php">inscription</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container right-align">
      © 2020 @sayhi!
    </div>
  </div>
</footer>
