$(document).ready(function () {
  $('#logoMess').click(function () {
    $('#body').toggleClass('show');
  })

  $('#closeMess').click(function () {
    $('#body').removeClass('show');
  })
})