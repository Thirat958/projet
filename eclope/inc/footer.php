<div class="fleche"><i class="fas fa-arrow-up"></i></div>

<footer>
    <div class="fcontainer">
        <div class="block">
            <ul>
                <li><i class="fas fa-map-marker-alt"></i> Art de vivre, 1 Rue du Bas Noyer, 95610 Éragny</li>
                <li><a href=""><i class="fas fa-phone-alt"></i> 01.31.31.31.31</a></li>
                <li><a href=""><i class="fas fa-envelope"></i> eclope@gmail.com</a></li>

            </ul>
        </div>
        <hr>
        <div class="block">
            <h3>À propos de nous</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat quos tenetur aut ea aliquam deleniti
                maxime quibusdam perferendis delectus explicabo.</p>
            <div class="reseaux">
                <a target="_blank" href="https://www.facebook.com/"><i class="fab fa-facebook"></i> </a>
                <a target="_blank" href="https://www.twitter.com/"><i class="fab fa-twitter"></i> </a>
                <a target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram"></i> </a>
                <a target="_blank" href="https://www.pinterest.com/"><i class="fab fa-pinterest"></i> </a>
            </div>
        </div>
    </div>
    <div class="fin">
        <div class="copyright">
            <p>© 2019 - Eclope - Tous droits réservés</p>
        </div>
        <div class="mentions">
            <a target="_blank" href="<?= URL."mentions.php"?>">Mentions légales</a>

            <a target="_blank" href="<?= URL."mentions.php"?>">RGPD</a>
        </div>
    </div>
</footer>
<script>
    $("#modif").on("click", function(){
    $(".modif").removeAttr("disabled")    });

$("#deconnexion").click( function() {
      return  (confirm('Êtes-vous sur de vouloir vous déconnecter ?'));
    });</script>
</body>

</html>