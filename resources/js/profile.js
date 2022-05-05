$(document).ready(function () {
  $('#fileInput').change( function() {
    if (fileInput.files && fileInput.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#image').attr('src', e.target.result);
        console.log(e.target.result);
      }
      reader.readAsDataURL(fileInput.files[0]);
    }
  });
})
