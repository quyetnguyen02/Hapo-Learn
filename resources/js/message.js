$(document).ready(function () {
  $('#logoMess').click(function () {
    $('#message').toggleClass('show');
  })

  $('#closeMess').click(function () {
    $('#message').removeClass('show');
  })
})
