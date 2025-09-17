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
