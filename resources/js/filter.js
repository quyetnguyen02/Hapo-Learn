$(document).ready(function () {
  $('#filter').click(function () {
    $('.filter-course').toggleClass('show-filter');
  })

  if ($('option').hasClass('pick')) {
    $('.filter-course').toggleClass('show-filter');
  };
})
