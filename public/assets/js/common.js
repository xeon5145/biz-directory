// ========================= Dropdown menu =========================
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

// ready state function
$(document).ready(function () {
  // Hide all menus initially
  $(".dropdown-menu").hide().addClass("hidden absolute");
});
// ========================= Dropdown menu =========================


// System Functions
$("#logout-button").click(function () {
  alert("Logout");
  window.location.href = "/auth";
});

// Toggle Password
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
// Toggle Password

// Notifcation Toast function
function slideAlert(type, title, description) {
  const id = `alert-${Date.now()}`;

  const alertStyles = {
    success: "bg-green-500 text-white",
    error: "bg-red-500 text-white",
    warning: "bg-yellow-400 text-black",
    info: "bg-blue-500 text-white",
  };

  const alertType = alertStyles[type] || alertStyles.info;

  // Create notification element
  const notif = document.createElement("div");
  notif.id = id;
  notif.className = `notif-card ${alertType} backdrop-blur-sm shadow-lg rounded-lg p-4 min-w-[18rem] max-w-sm`;
  notif.innerHTML = `
    <div class="flex justify-between items-start">
      <div>
        <h2 class="font-semibold">${title}</h2>
        <p class="text-sm">${description}</p>
      </div>
      <button class="ml-3 font-bold">×</button>
    </div>
  `;

  // Close button support
  notif.querySelector("button").addEventListener("click", () => removeNotif(notif));

  // Append to container
  const container = document.getElementById("system-alert-area");
  container.prepend(notif); // new one goes on top

  // Rearrange stack
  updateStack();

  // Auto dismiss
  setTimeout(() => removeNotif(notif), 4000);
}

function removeNotif(notif) {
  notif.classList.add("hide");
  notif.addEventListener("animationend", () => {
    notif.remove();
    updateStack();
  });
}

function updateStack() {
  const notifs = document.querySelectorAll("#system-alert-area .notif-card");
  notifs.forEach((el, i) => {
    el.style.transform = `translateY(${i * -10}px) scale(${1 - i * 0.05})`;
    el.style.zIndex = 1000 - i; // top-most is highest z
    el.style.opacity = `${1 - i * 0.15}`;
  });
}
