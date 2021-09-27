$(function() {
    $('.close').click(function(){
      $(this).parent().parent().hide();
    });
    $('#signUp').click(function(){
      $('.signIn').hide();
      $('.signUp').css('display', 'flex');
    });
    $('#signIn, #button-signIn ,#cartlogin').click(function(){
      $('.signIn').css('display', 'flex');
      $('.signUp').hide();
  
    })
    // the height of home page
    var winH = $(window).height(),
        navH = $('.nav-bar').innerHeight();
    $('.header').height(winH - navH);
    // access shopnow button in shopping.php
    // $('.shopNow').click(function(){
    //   $(this).parent().siblings().children().css('flex-wrap', 'wrap')
    // })
});