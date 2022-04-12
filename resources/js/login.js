$(document).ready(function () {
  if ($('#error').hasClass('alert-danger')) {
    $('#loginModal').modal();
    $('#closeFormLogin').css('display', 'block');
    $('#btnLogin').addClass('link-login')
    $('#closeRegisterForm').css('display', 'none');
    $('#btnRegister').removeClass('link-register')
  }
  if ($('input').hasClass('login')) {
    $('#loginModal').modal();
    $('#closeFormLogin').css('display', 'block');
    $('#closeRegisterForm').css('display', 'none');
    $('#btnLogin').addClass('link-login')
    $('#btnRegister').removeClass('link-register')
  }
})
