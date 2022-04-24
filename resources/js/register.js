$(document).ready(function () {
  if ($('#success').hasClass('alert-success')) {
    $('#loginModal').modal('show');
    $('#closeFormLogin').css('display', 'block');
    $('#btnLogin').addClass('link-login')
    $('#closeRegisterForm').css('display', 'none');
    $('#btnRegister').removeClass('link-register')
  }
  if ($('input').hasClass('is-invalid')) {
    $('#loginModal').modal('show');
    $('#closeFormLogin').css('display', 'none');
    $('#closeRegisterForm').css('display', 'block');
    $('#btnLogin').removeClass('link-login')
    $('#btnRegister').addClass('link-register')
  }
})
