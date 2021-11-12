function checkGender() {
  var gender = $('input[type="radio"]:checked').length;
  if (gender == 0) {
    $(".radio-alert").css("visibility", "visible");
    return false;
  } else {
    $(".radio-alert").css("visibility", "hidden");
    return true;
  }
}
function checkName(ele, name) {
  var elem = $(`#${ele}`).val();
  if (elem.length == 0) {
    $(`.${ele}-alert`).html(`*Enter Your ${name}`);
  } else if (elem.length < 8) {
    $(`.${ele}-alert`).html("*Length should atleast be 8 characters");
  } else {
    $(`.${ele}-alert`).css("visibility", "hidden");
    return true;
  }
  $(`.${ele}-alert`).css("visibility", "visible");
  return false;
}
$(document).ready(function () {
  $("form").submit(function (e) {
    e.preventDefault();
    alert(checker());
    if(checker()){
      $("form").submit();
    }
  });
});
