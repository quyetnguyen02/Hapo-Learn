$(document).ready(function() {
  $('#menu-bar').click(function() {
    $('#menu-bar').toggleClass('fa-xmark');
    $('#nav').toggleClass('show');
  })

  //click to login/register
  $('#login-register').click(function() {
    $('#login').addClass('active');
    $('#close-form-login').css('display','block');
    $('#btn-login').addClass('link-login')
    $('#close-register-form').css('display','none');
    $('#btn-register').removeClass('link-register')
  })
  //close form login/register
  $('#close').click(function() {
    $('#login').removeClass('active');
  })

  $('#btn-register').click(function() {
    $('#close-form-login').css('display','none');
    $('#close-register-form').css('display','block');
    $('#btn-login').removeClass('link-login')
    $('#btn-register').addClass('link-register')
  })

  $('#btn-login').click(function() {
    $('#close-form-login').css('display','block');
    $('#close-register-form').css('display','none');
    $('#btn-login').addClass('link-login')
    $('#btn-register').removeClass('link-register')
  })
})
