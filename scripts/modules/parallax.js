define('parallax', function() {
  var nanaMaster = $(window).height();

  $('.nuvem').attr('data-offset_y', nanaMaster);
  var nana1 = $('.nuvem').data("offset_y");

  function inkmotion_Parallax() {
    var bg = $('#parallax-cfg').data('bg');
    var img1 = $('#parallax-cfg').data('img1');
    var img2 = $('#parallax-cfg').data('img2');
    var img3 = $('#parallax-cfg').data('img3');
    // $('body').css({
    //   background: 'url(' + bg + ') fixed top left no-repeat'
    // });
  }
  var default_x = ($(document).width() / 2 - $('#site .wrapper--site').width());
  var default_y = 50;
  var scroll_y = $('body').scrollTop();
  inkmotion_Parallax();
  $(window).mousemove(function(event) {
    move();
  });
  $(window).scroll(function() {
    move();
  });
  $(window).resize(function() {
    default_x = ($(document).width() / 2 - $('#site .wrapper--site').width());
    move();
  });

  function move() {
    var cursor_x = event.pageX;
    var cursor_y = event.pageY;
    // var bg_center_x = $('.site-header').width() / 2;
    // var bg_center_y = $('.site-header').height() / 2;
    // $('.site-header').css({
    //   "background-position-x": -bg_center_x -cursor_x*0.4,
    //   "background-position-y": -bg_center_y-130 -cursor_y*0.4
    // });
    $('.parallax-item').each(function() {
      var vel_x = $(this).data('vel_x');
      var vel_y = $(this).data('vel_y');
      var offset_x = $(this).data('offset_x');
      var offset_y = $(this).data('offset_y');
      var new_x = -cursor_x * vel_x + offset_x;
      var new_y = -cursor_y * vel_y + offset_y;
      $(this).css({
        "left": new_x
      });
      $(this).css({
        "top": new_y
      });
    })
  }
});
