$(document).ready(function(){

$(window).scroll(function () {
    if ($(this).scrollTop() > 10) {
      $('.fleche').fadeIn();
    } else {
      $('.fleche').fadeOut();
    }
});
$(".burger").click(function () {
  $(".listburger").stop().slideToggle("swing");;
});
$(window).resize(function () {
  if ($(window).width() > 800) {
    $(".burger").find("input").prop("checked", false);
    $(".menuprincipal").slideDown("swing");
    $(".listburger").slideUp(0);
  }
})

$('.fleche').click(function () {
    var speed = 750;

    $('html, body').stop().animate(
      { scrollTop: 0 },
      speed
    );
  });
  $('.menuprincipal a').click(function (e) {
    e.preventDefault()
    var page = $(this).attr('href');
    var speed = 750;
  
    $('html, body').stop().animate(
        { scrollTop: $(page).offset().top - 50 },
        speed
    );
  });  
  $('.listburger a').click(function (e) {
    e.preventDefault()
    var page = $(this).attr('href');
    var speed = 750;
    $('.listburger').slideUp('swing');
  
    $('html, body').stop().animate(
        { scrollTop: $(page).offset().top - 50 },
        speed
    );
  }); 
    
    
    });
    



