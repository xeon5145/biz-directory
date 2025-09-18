// Handle dropdown menu
$(document).on("click", ".dropdown-btn", function (e) {
  e.stopPropagation();

  const $btn = $(this);
  const menuId = $btn.attr("data-id");
  const $menu = $("#" + menuId);

  // hide all other menus
  $(".dropdown-menu")
    .not("#" + menuId)
    .fadeOut(200);

  // calculate position
  const pos = $btn.offset();
  const top = pos.top + $btn.outerHeight();
  const left = pos.left;

  // position & toggle this menu
  $menu
    .css({
      position: "absolute",
      top: top,
      left: left,
      zIndex: 9999,
      marginTop: "0.5rem",
    })
    .fadeToggle(200);
});

// close on outside click
$(document).on("click", function (e) {
  if (!$(e.target).closest(".dropdown-btn, .dropdown-menu").length) {
    $(".dropdown-menu").fadeOut(200);
  }
});

// Day night switcher // Will work on this later
// $("#theme-mode").click(function () {
//   $(this).toggleClass("fa-moon fa-sun");
// });

// ready state function
$(document).ready(function () {
  // Hide all menus initially
  $(".dropdown-menu").hide().addClass("hidden absolute");
});

// System Functions
$("#logout-button").click(function () {
  alert("Logout");
  window.location.href = "/auth";
});

const togglePassword = (element, id) => {
  const $input = $(`#${id}`);
  const elementId = $(element).attr("id");
  if ($input.attr("type") === "password") {
    $input.attr("type", "text");
    $(`#${elementId}`).toggleClass("fa-eye-slash fa-eye");
  } else {
    $input.attr("type", "password");
    $(`#${elementId}`).toggleClass("fa-eye-slash fa-eye");
  }
};

const slideAlert = (type,title, description) => {
  let currentTimeStamp = Date.now();

  let alertType = "";
  switch (type) {
    case "success":
      alertType = "bg-green-500 text-white";
      break;
    case "error":
      alertType = "bg-red-500 text-white";
      break;
    case "warning":
      alertType = "bg-yellow-500 text-white";
      break;
    case "info":
      alertType = "bg-blue-500 text-white";
      break;
    default:
      alertType = "";
      break;
  }

  let component = `
  <div class="absolute card ${alertType} min-h-20 min-w-70 z-[10000]" style="right: -20rem;" id="${currentTimeStamp}">
    <div class="flex flex-col justify-center items-start">
      <h2>${title}</h2>
      <p>${description}</p>
    </div>
  </div>`;

  $("#system-alert-area").append(component);

  // Slide in and out
  $(`#${currentTimeStamp}`)
    .animate({ right: "0rem" }, 200)
    .delay(2000)
    .animate({ right: "-20rem" }, 200, function () {
      $(this).remove();
    });
};
