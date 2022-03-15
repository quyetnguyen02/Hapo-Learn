$(document).ready(function() {
  $('#menu-bar').click(function() {
    $('#menu-bar').toggleClass('fa-xmark');
    $('#nav').toggleClass('show');
  })

  //click to login/register
  $('#login-register').click(function() {
    $('#login').addClass('active');
    $('#closeFormLogin').css('display','block');
    $('#btnLogin').addClass('link-login')
    $('#closeRegisterForm').css('display','none');
    $('#btnRegister').removeClass('link-register')
  })
  //close form login/register
  $('#close').click(function() {
    $('#login').removeClass('active');
  })

  $('#btnRegister').click(function() {
    $('#closeFormLogin').css('display','none');
    $('#closeRegisterForm').css('display','block');
    $('#btnLogin').removeClass('link-login')
    $('#btnRegister').addClass('link-register')
  })

  $('#btnLogin').click(function() {
    $('#closeFormLogin').css('display','block');
    $('#closeRegisterForm').css('display','none');
    $('#btnLogin').addClass('link-login')
    $('#btnRegister').removeClass('link-register')
  })
})
