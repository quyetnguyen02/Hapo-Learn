$(document).ready(function (){
  if ($("#success").hasClass("alert-success")){
    $('#loginModal').modal();
    $('#closeFormLogin').css('display','block');
    $('#btnLogin').addClass('link-login')
    $('#closeRegisterForm').css('display','none');
    $('#btnRegister').removeClass('link-register')
  }
})
