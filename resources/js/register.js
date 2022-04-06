$(document).ready(function (){
  if ($("div").hasClass("alert-success")){
    $('#login').addClass('active');
    $('#closeFormLogin').css('display','block');
    $('#btnLogin').addClass('link-login')
    $('#closeRegisterForm').css('display','none');
    $('#btnRegister').removeClass('link-register')
  }
})
