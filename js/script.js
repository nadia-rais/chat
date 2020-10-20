/*----------------------------------------------------*/
/* HEADER RESPONSIVE
------------------------------------------------------ */
$(document).ready(function(){
    $('.sidenav').sidenav();
});
/*----------------------------------------------------*/
/* DROPDOWN
------------------------------------------------------ */
$(document).ready(function(){
  $(".dropdown-trigger").dropdown();
});


/*----------------------------------------------------*/
/* INDEX PAGE
------------------------------------------------------ */
$(document).ready(function(){
    $('.modal-trigger').leanModal();
});

/*----------------------------------------------------*/
/* INDEX ANIMATION TITLE
------------------------------------------------------ */

$(document).ready(function() {
    $(".title").lettering();
});
  
$(document).ready(function() {
    animation();
}, 1000);
  
  $('.button').click(function() {
    animation();
  });
  
  
  function animation() {
    var title1 = new TimelineMax();
    title1.to(".button", 0, {visibility: 'hidden', opacity: 0})
    title1.staggerFromTo(".title span", 0.5, 
    {ease: Back.easeOut.config(1.7), opacity: 0, bottom: -80},
    {ease: Back.easeOut.config(1.7), opacity: 1, bottom: 0}, 0.05);
    title1.to(".button", 0.2, {visibility: 'visible' ,opacity: 1})
  }


/*----------------------------------------------------*/
/* ACTIVE CLASS POUR LA LISTE DES CHANNELS - PAGE CHANNEL
------------------------------------------------------ */
$(document).ready(function(){

  $('.collection a').filter(function(){
    return this.href === location.href;
  }).addClass('active');

});

//onScroll active menu --one page
$(document).ready(function () {
      $('.header li a').bind('click', function (e) {
          e.preventDefault(); // prevent hard jump, the default behavior
          var target = $(this).attr("href"); // Set the target as variable
          // perform animated scrolling by getting top-position of target-element and set it as scroll target
          $('html, body').stop().animate({
              scrollTop: $(target).offset().top
          }, 600, function () {
              location.hash = target; //attach the hash (#jumptarget) to the pageurl
          });
          return false;
      });
  });
  
  $(document).ready(function () {
  var offsetVal = 50;
  $(window).scroll(function () {
      var scrollDistance = $(window).scrollTop() + $(".header").outerHeight() + offsetVal;
      // Assign active class to nav links while scolling —“pg_section” is page section
      $('.pg_section').each(function (i) {
          if ($(this).position().top <= scrollDistance) {
              $('.header li.current').removeClass('current');
              $('.header li').eq(i).addClass('current');
          }
      });
  }).scroll();
  
});














