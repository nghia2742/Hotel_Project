//-------------------------FRONTEND--------------------------
function filter_location() {
  var input, filter, ul, li, span, i, txtValue;
  input = document.getElementById("input_location");
  filter = input.value.toUpperCase();
  ul = document.getElementById("list_location");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    span = li[i].getElementsByTagName("span")[0];
    txtValue = span.textContent || span.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}

// --------------------- Date
function dateSetting() {
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1; //January is 0!
  var yyyy = today.getFullYear();

  if (dd < 10) {
    dd = "0" + dd;
  }

  if (mm < 10) {
    mm = "0" + mm;
  }

  today = yyyy + "-" + mm + "-" + dd;
  document.getElementById("dateFrom").setAttribute("min", today);
  document.getElementById("dateTo").setAttribute("min", today);
}

// --------------------- Quantify People
var adult = 0;
var child = 0;
function upQuantify(kind) {
  if (kind == "Adult") {
    $("#quantify" + kind).val(++adult);
    $("#show" + kind).html(adult);
  } else {
    $("#quantify" + kind).val(++child);
    $("#show" + kind).html(child);
  }
}
function downQuantify(kind) {
  if (kind == "Adult") {
    if (adult <= 0) {
      $("#quantify" + kind).val(0);
      $("#show" + kind).html(adult);
    } else {
      $("#quantify" + kind).val(--adult);
      $("#show" + kind).html(adult);
    }
  } else {
    if (child <= 0) {
      $("#quantify" + kind).val(0);
      $("#show" + kind).html(child);
    } else {
      $("#quantify" + kind).val(--child);
      $("#show" + kind).html(child);
    }
  }
}

function priceBarSetting() {
  var rangePrice = document.getElementById("barPrice");
  var minPrice = document.getElementById("minPrice");
  minPrice.innerHTML = rangePrice.value; // Display the default slider value
  var constCur = 4.99;
  // Update the current slider value (each time you drag the slider handle)
  rangePrice.oninput = function () {
    if ($("#minPrice").attr("data-cur") == "$") {
      minPrice.innerHTML = (this.value * constCur).toFixed(2);
    } else {
      minPrice.innerHTML = (this.value * 24.519 * constCur).toFixed(3);
    }
  };
}

function getIdLocation() {
  $("#list_location li span").click(function () {
    if (!$(this).attr("data-val") == "") {
      $("#id_location").val($(this).attr("data-val"));
    }
  });
}

$(document).ready(function () {
  // HOME
  // setTimeout(() => {
  //   $(".loader").addClass("loader--hidden");
  // }, 1500);

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 550) {
      $(".card1").addClass("card1-animation");
    }
    if (scroll >= 850) {
      $(".card2").addClass("card2-animation");
    }
  });

  // BOOKING
  $(".basic_filter4").click(function (e) {
    $(".controller_person").toggle();  
  });
  
  $('#close_controller_person').click(function (e) { 
    $(".controller_person").hide();
  });

  $("#payLater").click(function () {
    $("#formVISA").collapse("hide");
  });

  $("#moveToTop").click(function () {
    window.scroll(0, 0);
  });

  $(".location_dropdown .location_dropdown-item").each(function (
    index,
    element
  ) {
    // element == this
    $(this).click(function (e) {
      $("#input_location").val($(this).html());
    });
  });

  $(".basic_filter1").click(function () {
    $("#input_location").focus();
  });

  dateSetting();
  priceBarSetting();
  getIdLocation();
});

// -------------------BACKEND-----------------------------
function getIdRoom(id) {
  localStorage.setItem("id", id);
}

function deleteRoom() {
  var id = localStorage.getItem("id");
  $.ajax({
    type: "POST",
    url: "/Hotel/Admin/actionRoom",
    data: {
      id: id,
      action: "delete",
    },
    success: function (response) {
      $("#R" + id)
        .parent()
        .parent()
        .fadeOut("slow");
      localStorage.setItem("id", "");
      //Notify Action
      notifyAction("Delete successfully!");
    },
  });
}

function editRoom(id) {
  $.ajax({
    type: "POST",
    url: "/Hotel/Admin/actionRoom",
    data: {
      action: "edit",
      id: id,
      nameRoom: $("#nameRoom" + id).val(),
      kind: $("#kind" + id).val(),
      image: $("#image" + id).val(),
      price: $("#price" + id).val(),
      status: $("#status" + id).val(),
    },
    success: function () {
      notifyAction("Edit successfully!");
      loadDataRooms();
      $(".modal-backdrop").remove();
    },
  });
}

function loadDataRooms() {
  $.ajax({
    type: "GET",
    url: "/Hotel/Ajax/displayRooms",
    success: function (result) {
      $("#bodyRooms").html(result);
    },
  });
}

function notifyAction(txt) {
  $(".tool_notification").text(txt);
  $(".tool_notification").fadeIn("fast");
  var delayInMilliseconds = 2000;
  setTimeout(function () {
    $(".tool_notification").fadeOut("slow");
  }, delayInMilliseconds);
}

function notify(txt) {
  $(".notify").text(txt);
  $(".notify").show("fast");
  var delayInMilliseconds = 2000;
  setTimeout(function () {
    $(".notify").fadeOut("slow");
  }, delayInMilliseconds);
}

//------ BOOKING ------
function loadListRooms() {
  $.ajax({
    type: "GET",
    url: "/Hotel/Ajax/sortRoom",
    beforeSend: function () {
      $("#listRoom").html("");
      $("#loaderContent").removeClass("loader--hidden");
    },
    success: function (result) {
      var timeLoading = 3000;
      setTimeout(() => {
        $("#loaderContent").addClass("loader--hidden");
        $("#listRoom").html(result);
      }, timeLoading);
    },
  });
}

var item = 0;
function moreRoom() {
  item += 2;
  $.ajax({
    type: "post",
    url: "/Hotel/Ajax/moreRoom",
    data: { number: item },
    success: function (response) {
      $("#listRoom").html(response);
    },
  });
}

function sortRoom(element, order) {
  item = 0;
  $.ajax({
    type: "post",
    url: "/Hotel/Ajax/sortRoom",
    data: {
      element: element,
      order: order,
    },
    success: function () {
      loadListRooms();
      $(".listSort ul .list-group-item").each(function (index, element) {
        // element == this
        $(this).removeClass("sortActive");
      });
      $("#" + element).addClass("sortActive");
      if (element == "price" && order == "ASC") {
        $("#lowPrice").addClass("sortActive");
      }
      if (element == "price" && order == "DESC") {
        $("#highPrice").addClass("sortActive");
      }
    },
  });
}

function searchRoom() {
  if ($("#input_location").val() == "") {
    alert("Choose your direction");
  } else {
    $.ajax({
      type: "post",
      url: "/Hotel/Ajax/searchRoom",
      data: {
        search: "true",
        location: $("#id_location").val(),
        dateFrom: $("#dateFrom").val(),
        dateTo: $("#dateTo").val(),
        adult: $("#quantifyAdult").val(),
        children: $("#quantifyChildren").val(),
      },
      beforeSend: function () {
        $("#listRoom").html("");
        $("#loaderContent").removeClass("loader--hidden");
      },
      success: function (response) {
        $(".listSort ul .list-group-item").each(function (index, element) {
          $(this).removeClass("sortActive");
        });
        $("#bestMatch").addClass("sortActive");
        var timeLoading = 3000;
        setTimeout(() => {
          $("#loaderContent").addClass("loader--hidden");
          $("#listRoom").html(response);
        }, timeLoading);
      },
    });
  }
}

function setCurrency(c) {
  $.post(
    "/Hotel/Ajax/setCurrency",
    { currency: c },
    function (data, textStatus, jqXHR) {
      window.location.reload();
    }
  );
}

function detailRoom(idRoom) {
  $.post("/Hotel/Detail/Show", {detailPage: idRoom},
  function (data) {
  }
  );
  window.location.href = "/Hotel/Detail";
}

function loadSession() {
  $.ajax({
    type: "post",
    url: "/Hotel/Ajax/loadSession",
    data: {
      check: "true",
    },
  });
}

function isFillBook(){
  if ($('#nameVal').val() == "" 
  || $('#emailVal').val() == "" 
  || $('#phoneVal').val() == ""
  || $('#dateFromVal').val() == ""
  || $('#dateToVal').val() == ""
  || $('#adultVal').val() == ""  
  ) {
    $(".notify").addClass("notify--error");
    notify("Please, filling out the form before send");
    return true;
  }

  if (!isEmail($('#emailVal').val())) {
    $(".notify").addClass("notify--error");
    notify("Check your email again");
    return true;
  }

  if ($("#phoneVal").val().length < 10) {
    $(".notify").addClass("notify--error");
    notify("Number phone incorrect");
    return true;
  }

  if (!$('#chkPolicy').is(":checked")) {
    $('#noticePolicy').text('Please agree with us!');
    return true;
  }
  return false;
}

function bookRoom() {
  var extSer1 = 0;
  var extSer2 = 0;
  if ($('#extSer1').is(":checked")) {
    extSer1 = 30;
  }
  if ($('#extSer2').is(":checked")) {
    extSer2 = 15;
  }
  $.ajax({
    type: "post",
    url: "/Hotel/Ajax/checkAvailableDate",
    data: {
      send: "true",
      idRoom: $('#idRoomVal').val(),
      dateFrom: $('#dateFromVal').val(),
      dateTo: $('#dateToVal').val()
    },
    success: function (data) {
        if (data == 1) {
          $(".notify").addClass("notify--error");
          notify('That date is unavailable')
        } else {
          if (!isFillBook()) {
            $.ajax({
              type: "post",
              url: "/Hotel/Ajax/getInfoBook",
              data: {
                infoBook: "true",
                name: $('#nameVal').val(),
                email: $('#emailVal').val(),
                phone: $('#phoneVal').val(),
                dateFrom: $('#dateFromVal').val(),
                dateTo: $('#dateToVal').val(),
                adult: $('#adultVal').val(),
                children: $('#childrenVal').val(),
                extSer1: extSer1,
                extSer2: extSer2,
              },
              // beforeSend: function () {  
              // },
              success: function (response) {
                window.location.href = "/Hotel/Detail/Confirmation";
              }
            });
          }
        }
      }
    });  
}

function addReserved() {  
  $.ajax({
    type: "post",
    url: "/Hotel/Ajax/addReserved",
    data: {
      send: 1,
      name: $('#name').val(),
      email: $('#email').val(),
      phone: $('#phone').val(),
      dateFrom: $('#dateFrom').val(),
      dateTo: $('#dateTo').val(),
      price: $('#price').val()
    },
    success: function (response) {
    }
  });
}

// -------------HISTORY---------------------
$('#searchHistory').click(function (e) { 
  $.ajax({
    type: "post",
    url: "/Hotel/Ajax/showHistory",
    data: {
      send: 1,
      email: $(".inputHistory").val()
    },
    success: function (response) {
        $('#bodyHistory').html(response);
    }
  });
});


function viewDetail(idReservation) {  
  $.ajax({
    type: "post",
    url: "/Hotel/Ajax/showViewDetail",
    data: {
      send: 1,
      idReservation: idReservation
    },
    success: function (response) {
      $('#modalViewDetail').html(response)
    }
  });
}




// -------------------------------------------
$(document).ready(function () {
  loadDataRooms();
  loadSession();
  loadListRooms();
  $("#btnInsertRoom").click(function (e) {
    e.preventDefault();
    $.post(
      "/Hotel/Admin/actionRoom",
      {
        action: "add",
        nameRoom: $("#nameRoom").val(),
        kind: $("#kind").val(),
        image: $("#image").val(),
        price: $("#price").val(),
        status: $("#status").val(),
      },
      function (data) {
        loadDataRooms();
        $(".formModal")[0].reset();
        notifyAction("Add new successfully!");
      }
    );
  });

  // ---------------USER LOGIN ------------------------
  // ---- SIGN IN ------
  $("#signIn").click(function (e) {
    $.ajax({
      type: "POST",
      url: "/Hotel/Ajax/actionSignIn",
      data: {
        signIn: "true",
        email: $("#email").val(),
        password: $("#password").val(),
      },
      success: function (data) {
        if (data) {
          window.location.href = "/Hotel/Home";
        } else {
          $(".notify").addClass("notify--error");
          notify("Wrong email or password");
        }
      },
    });
  });

  $(window).keypress(function(e) {
    if (e.which == 13) {
      $("#signIn").click();
      $("#searchHistory").click();
    }
  });

  // ---- UPDATE PASS ----
  $("#btnUpdatePass").click(function (e) {
    if ($("#newPassword").val().length < 6) {
      $(".notify").addClass("notify--error");
      notify("New password must be least 6 characters");
    } else {
      if ($("#newPassword").val() == $("#newPassword2nd").val()) {
        $.ajax({
          type: "POST",
          url: "/Hotel/Ajax/updatePassword",
          data: {
            changePass: "true",
            curPassword: $("#curPassword").val(),
            newPassword: $("#newPassword").val(),
          },
          success: function (data) {
            if (data) {
              $(".notify").addClass("notify--success");
              notify("Your password updated");
            } else {
              $(".notify").addClass("notify--error");
              notify("Your current password is wrong");
            }
          },
        });
      } else {
        $(".notify").addClass("notify--error");
        notify("Your password isn't compatible");
      }
    }
  });

  // ---- SIGN UP -------
  $("#signUp").click(function (e) {
    if (!validateFormSignUp()) {
      $.ajax({
        type: "POST",
        url: "/Hotel/Ajax/actionSignUp",
        data: {
          signUp: "true",
          name: $("#name").val(),
          phone: $("#phone").val(),
          email: $("#email").val(),
          password: $("#password").val(),
        },
        success: function (data) {
          if (data) {
            $(".notify").addClass("notify--success");
            notify("Register successfully!");
            setTimeout(() => {
              window.location.href = "/Hotel/SignIn";
            }, 2000);
          } else {
            $(".notify").addClass("notify--error");
            notify('Email existed');
          }
        },
      });
    }
  });

  // ---- SIGN OUT -----
  $("#signOut").click(function (e) {
    $.ajax({
      type: "POST",
      url: "/Hotel/SignOut",
      data: {},
      success: function () {
        window.location.href = "/Hotel/Home";
      },
    });
  });
});

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function validateFormSignUp() {
  if (
    $("#name").val() == "" ||
    $("#email").val() == "" ||
    $("#phone").val() == "" ||
    $("#password").val() == "" ||
    $("#password2nd").val() == ""
  ) {
    $(".notify").addClass("notify--error");
    notify("Please fill all of information");
    return true;
  }

  if (!isEmail($("#email").val())) {
    $(".notify").addClass("notify--error");
    notify("Check your email again");
    return true;
  }

  if ($("#phone").val().length < 10) {
    $(".notify").addClass("notify--error");
    notify("Number phone incorrect");
    return true;
  }
  if ($("#password").val().length < 6) {
    $(".notify").addClass("notify--error");
    notify("Password least 6 characters");
    return true;
  }
  if ($("#password").val() !== $("#password2nd").val()) {
    $(".notify").addClass("notify--error");
    notify("Confirm password again!");
    return true;
  }
  return false;
}
