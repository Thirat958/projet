$(function(){


    $('.fleche').click( function() {
      var speed = 750; 
    
      $('html, body').stop().animate(
        { scrollTop: 0},
        speed
      );
    });
    $(".burger").click(function () {
        $(".listeburger").stop().slideToggle("swing");;
      });
      $(window).resize(function () {
        if ($(window).width() > 780) {
            $(".burger").find("input").prop("checked", false);
            $(".listenav").slideDown("swing");
            $(".listeburger").slideUp(0);
        }
      })
  
      
});