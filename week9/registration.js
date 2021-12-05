function checkNumeric(ele, name, size) {
  var postVal = $(`#${ele}`).val();
  if (postVal.length == 0) {
    $(`.${ele}-alert`).html(`*Enter ${name}`);
  } else if (postVal.length != size) {
    $(`.${ele}-alert`).html(`*Length should be ${size}`);
  } else {
    $(`#${ele}`).css("border", "");
    $(`.${ele}-alert`).css("visibility", "hidden");
    return true;
  }
  $(`#${ele}`).css("border", "2px solid red");
  $(`.${ele}-alert`).css("visibility", "visible");
  return false;
}
function checkName(ele, name, size) {
  var elem = $(`#${ele}`).val();
  if (elem.length == 0) {
    $(`.${ele}-alert`).html(`*Enter Your ${name}`);
  } else if (elem.length < size) {
    $(`.${ele}-alert`).html(`*Length should atleast be ${size} characters`);
  } else {
    $(`#${ele}`).css("border", "");
    $(`.${ele}-alert`).css("visibility", "hidden");
    return true;
  }
  $(`#${ele}`).css("border", "2px solid red");
  $(`.${ele}-alert`).css("visibility", "visible");
  return false;
}

function checkLeapYear(d) {
  var num = Number(d[2]);
  if ((num % 4 == 0 && num % 100 != 0) || num % 400 == 0) {
    if (d[1] <= 29) return true;
  } else {
    if (d[1] <= 28) return true;
  }
  return false;
}

function checkDays(d) {
  var num = {
    1: 31,
    3: 31,
    4: 30,
    5: 31,
    6: 30,
    7: 31,
    8: 31,
    9: 30,
    10: 31,
    11: 30,
    12: 31,
  };
  return d[1] <= num[`${Number(d[0])}`];
}

function checkDOB() {
  var d = Date.parse($("#dob").val());
  var dd = $("#dob").val().split("/");
  if (!isNaN(d) && (Number(dd[0]) != 2 ? checkDays(dd) : checkLeapYear(dd))) {
    $(`#dob`).css("border", "");
    $(".dob-alert").css("visibility", "hidden");
    return true;
  } else {
    $(`#dob`).css("border", "2px solid red");
    $(".dob-alert").css("visibility", "visible");
    return false;
  }
}

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
function checkCnfrm() {
  if ($("#pswd").val() == $("#cnfrm").val()) {
    $("#cnfrm").css("border", "");
    $(`.cnfrm-alert`).css("visibility", "hidden");
    return true;
  } else {
    $("#cnfrm").css("border", "2px solid red");
    $(`.cnfrm-alert`).html("*passwords don't match");
    $(`.cnfrm-alert`).css("visibility", "visible");
    return false;
  }
}

function checkRegex(ele, msg, reg) {
  var checkReg = $(`#${ele}`).val();
  if (reg.test(checkReg)) {
    $(`.${ele}-alert`).css("visibility", "hidden");
    return true;
  } else {
    $(`.${ele}-alert`).html(`*Only ${msg} allowed`);
    $(`.${ele}-alert`).css("visibility", "visible");
    return false;
  }
}

function checkUsername() {
  var usrVal = $("#uname").val();
  if (
    usrVal.search(/[A-Z]/) != -1 &&
    usrVal.search(/\d/) != -1 &&
    usrVal.search(/[a-z]/) != -1
  ) {
    $(".uname-alert").css("visibility", "hidden");
    return true;
  } else {
    $(".uname-alert").css("visibility", "visible");
    return false;
  }
}

function checker() {
  var firstName =
    checkName("fname", "First name", 8) &&
    checkRegex("fname", "alphabets", /^[A-Za-z]+$/);
  var lastName =
    checkName("lname", "Last name", 8) &&
    checkRegex("fname", "alphabets", /^[A-Za-z]+$/);
  var gen = checkGender();
  var dateOfBirth = checkDOB();
  var Password = checkName("pswd", "Password", 8);
  var confirm = checkName("cnfrm", "Password", 8) && checkCnfrm();
  var post =
    checkNumeric("post", "Postal Code", 6) &&
    checkRegex("post", "numbers", /^[0-9]+$/);
  var num =
    checkNumeric("num", "Mobile number", 10) &&
    checkRegex("num", "numbers", /^[0-9]+$/);
  var ema = checkRegex(
    "email",
    "mails with<br> mailid@domainname.com<br>format is",
    /^[A-Za-z._0-9]+@[A-Za-z]+\.com$/
  );
  var username = checkUsername();
  return (
    firstName &&
    lastName &&
    gen &&
    dateOfBirth &&
    Password &&
    confirm &&
    post &&
    num &&
    username &&
    ema
  );
}
$(document).ready(function () {
  $("form").submit(function (e) {
    if (!checker()) {
      e.preventDefault();
    }
  });
});
