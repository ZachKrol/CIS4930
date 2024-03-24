$(document).ready(function () {
  let formValid = false;
  let feetValid = false;
  let inchesValid = false;
  let weightValid = false;
  let ageValid = false;
  let genderValid = false;
  let activityValid = false;

  $("#submit-btn").click(function () {
    // feet validation
    var feetRegEx = /^[0-8]$/;
    if (!feetRegEx.test($("#feet").val())) {
      $("#feet").addClass("is-invalid");
      $("#feet-feedback").removeClass("d-none");
      feetValid = false;
    } else {
      $("#feet").removeClass("is-invalid");
      $("#feet").addClass("is-valid");
      $("#feet-feedback").addClass("d-none");
      feetValid = true;
    }

    // inches validation
    var inchesRegEx = /^([0-9]|10|11|12)$/;
    if (!inchesRegEx.test($("#inches").val())) {
      $("#inches").addClass("is-invalid");
      $("#inches-feedback").removeClass("d-none");
      inchesValid = false;
    } else {
      $("#inches").removeClass("is-invalid");
      $("#inches").addClass("is-valid");
      $("#inches-feedback").addClass("d-none");
      inchesValid = true;
    }

    // weight validation
    var weightRegEx = /^[1-9]\d{0,2}$/;
    if (!weightRegEx.test($("#weight").val())) {
      $("#weight").addClass("is-invalid");
      $("#weight-feedback").removeClass("d-none");
      weightValid = false;
    } else {
      $("#weight").removeClass("is-invalid");
      $("#weight").addClass("is-valid");
      $("#weight-feedback").addClass("d-none");
      weightValid = true;
    }

    // age validation
    var ageRegEx = /^[1-9]\d{0,2}$/;
    if (!ageRegEx.test($("#age").val())) {
      $("#age").addClass("is-invalid");
      $("#age-feedback").removeClass("d-none");
      ageValid = false;
    } else {
      $("#age").removeClass("is-invalid");
      $("#age").addClass("is-valid");
      $("#age-feedback").addClass("d-none");
      ageValid = true;
    }

    // gender validation
    let maleCheck = $("#male").is(":checked");
    let femaleCheck = $("#female").is(":checked");

    if (maleCheck || femaleCheck) {
      $("#male").removeClass("is-invalid");
      $("#male").addClass("is-valid");
      $("#female").removeClass("is-invalid");
      $("#female").addClass("is-valid");
      $("#female-feedback").addClass("d-none");
      genderValid = true;
    } else {
      $("#female").addClass("is-invalid");
      $("#male").addClass("is-invalid");
      $("#female-feedback").removeClass("d-none");
      genderValid = false;
    }

    // activity validation
    let actVal = $("#activity").val();

    if (actVal > 1) {
      $("#activity").removeClass("is-invalid");
      $("#activity").addClass("is-valid");
      $("#activity-feedback").addClass("d-none");
      activityValid = true;
    } else {
      $("#activity").addClass("is-invalid");
      $("#activity-feedback").removeClass("d-none");
      activityValid = false;
    }
  });

  $("#submit-btn").click(function () {
    // highlight weight classes
    if ($("#light-flyweight").is(":checked")) {
      $("#light-flyweight-info").addClass("active");
    } else {
      $("#light-flyweight-info").removeClass("active");
    }
    if ($("#flyweight").is(":checked")) {
      $("#flyweight-info").addClass("active");
    } else {
      $("#flyweight-info").removeClass("active");
    }
    if ($("#bantamweight").is(":checked")) {
      $("#bantamweight-info").addClass("active");
    } else {
      $("#bantamweight-info").removeClass("active");
    }
    if ($("#featherweight").is(":checked")) {
      $("#featherweight-info").addClass("active");
    } else {
      $("#featherweight-info").removeClass("active");
    }
    if ($("#lightweight").is(":checked")) {
      $("#lightweight-info").addClass("active");
    } else {
      $("#lightweight-info").removeClass("active");
    }
    if ($("#light-welterweight").is(":checked")) {
      $("#light-welterweight-info").addClass("active");
    } else {
      $("#light-welterweight-info").removeClass("active");
    }
    if ($("#welterweight").is(":checked")) {
      $("#welterweight-info").addClass("active");
    } else {
      $("#welterweight-info").removeClass("active");
    }
    if ($("#middleweight").is(":checked")) {
      $("#middleweight-info").addClass("active");
    } else {
      $("#middleweight-info").removeClass("active");
    }
    if ($("#light-heavyweight").is(":checked")) {
      $("#light-heavyweight-info").addClass("active");
    } else {
      $("#light-heavyweight-info").removeClass("active");
    }
    if ($("#heavyweight").is(":checked")) {
      $("#heavyweight-info").addClass("active");
    } else {
      $("#heavyweight-info").removeClass("active");
    }
    if ($("#super-heavyweight").is(":checked")) {
      $("#super-heavyweight-info").addClass("active");
    } else {
      $("#super-heavyweight-info").removeClass("active");
    }
  });

  $("#reset-btn").click(function () {
    $("#feet").removeClass("is-invalid");
    $("#feet").removeClass("is-valid");
    $("#feet-feedback").addClass("d-none");

    $("#inches").removeClass("is-invalid");
    $("#inches").removeClass("is-valid");
    $("#inches-feedback").addClass("d-none");

    $("#weight").removeClass("is-invalid");
    $("#weight").removeClass("is-valid");
    $("#weight-feedback").addClass("d-none");

    $("#age").removeClass("is-invalid");
    $("#age").removeClass("is-valid");
    $("#age-feedback").addClass("d-none");

    $("#male").removeClass("is-invalid");
    $("#male").removeClass("is-valid");
    $("#female").removeClass("is-invalid");
    $("#female").removeClass("is-valid");
    $("#female-feedback").addClass("d-none");

    $("#activity").removeClass("is-invalid");
    $("#activity").removeClass("is-valid");
    $("#activity-feedback").addClass("d-none");

    $("#light-flyweight-info").removeClass("active");
    $("#flyweight-info").removeClass("active");
    $("#bantamweight-info").removeClass("active");
    $("#featherweight-info").removeClass("active");
    $("#lightweight-info").removeClass("active");
    $("#light-welterweight-info").removeClass("active");
    $("#welterweight-info").removeClass("active");
    $("#middleweight-info").removeClass("active");
    $("#light-heavyweight-info").removeClass("active");
    $("#heavyweight-info").removeClass("active");
    $("#super-heavyweight-info").removeClass("active");
  });

  $("#flowchart-btn").click(function () {
    console.log("clicked");
    $("#flowchart").toggleClass("d-none");
  });

  $("#submit-btn").click(function () {
    let age = parseInt($("#age").val());
    let weight = parseInt($("#weight").val());
    let feet = parseInt($("#feet").val());
    let inches = parseInt($("#inches").val());
    let gender = $("input[name='gender']:checked").val();
    let activity = $("#activity").val();

    // determine current weight class
    let weightClass = "";
    if (gender == "male") {
      if (weight < 108) weightClass = "light flyweight";
      else if (weight < 115) weightClass = "flyweight";
      else if (weight < 123) weightClass = "bantamweight";
      else if (weight < 132) weightClass = "lightweight";
      else if (weight < 141) weightClass = "light welterweight";
      else if (weight < 152) weightClass = "welterweight";
      else if (weight < 165) weightClass = "middleweight";
      else if (weight < 178) weightClass = "light heavyweight";
      else if (weight < 201) weightClass = "heavyweight";
      else weightClass = "super heavyweight";
    } else {
      if (weight < 106) weightClass = "flyweight";
      else if (weight < 112) weightClass = "bantamweight";
      else if (weight < 119) weightClass = "featherweight";
      else if (weight < 126) weightClass = "lightweight";
      else if (weight < 132) weightClass = "light welterweight";
      else if (weight < 141) weightClass = "welterweight";
      else if (weight < 152) weightClass = "middleweight";
      else if (weight < 165) weightClass = "light heavyweight";
      else if (weight < 179) weightClass = "heavyweight";
      else weightClass = "super heavyweight";
    }

    // convert weight to kg
    weight = weight * 0.453592;

    // convert height to cm
    let newInches = feet * 12 + inches;
    let height = newInches * 2.54;

    // calculate calories  based on BMR
    let calories = 0;
    if (gender == "male") {
      calories = 66.5 + 13.75 * weight + 5.003 * height - 6.75 * age;
    } else {
      calories = 655.1 + 9.563 * weight + 1.85 * height - 4.676 * age;
    }

    // adjust based on activity level
    calories = Math.round(calories * activity);

    if (
      feetValid &&
      inchesValid &&
      weightValid &&
      ageValid &&
      genderValid &&
      activityValid
    ) {
      formValid = true;
    } else {
      formValid = false;
    }

    if (formValid == true) {
      $("#result").removeClass("d-none");
      $("#result")
        .html(`Your weight class is <b>${weightClass}</b> and you need to
        consume <b>${calories} calories</b> each day to maintain this weight class`);
    } else {
      $("#result").addClass("d-none");
    }
  });
});
