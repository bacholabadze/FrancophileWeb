$(document).ready(function() {
  $('a.hero-btn').not('.contact-btn').click(function(e) {
    e.preventDefault();

    var target = $($(this).attr('href'));
    var offset = target.offset().top;

    $('html, body').animate({
      scrollTop: offset
    }, 1000);
  });
});