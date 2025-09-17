// Handle dropdown menu
$(document).on("click", ".dropdown-btn", function (e) {
    e.stopPropagation();
    let menuId = $(this).attr("data-id");
  
    $("[id]").filter(function () {
      return $(this).hasClass("menu");
    }).hide();
  
    $(`#${menuId}`).toggle();
});
  
$(document).on("click", function (e) {
    if (!$(e.target).is(".dropdown-btn") && !$(e.target).is(".dropdown-menu")) {
        $("[id]").filter(function () {
            return $(this).hasClass("dropdown-menu");
        }).hide();
    }
});
// Handle dropdown menu
  

//  ready state function
$(document).ready(function () {

    // Hidding all menus
    $('.dropdown-btn').each(function () {
        let menuId = $(this).attr("data-id");
        let menuHeight = $(`#${menuId}`).height();
        
        $(`#${menuId}`).hide().addClass("hidden absolute dropdown-menu z-999 mt-" + menuHeight);
    });
    // Hidding all menus
});