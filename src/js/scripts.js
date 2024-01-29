var $ = require("jquery");
var validate = require("jquery-validation");

$(".js-mobile-menu-open").on("click", function(){
  $(this).addClass("hidden");
  $(".js-mobile-menu-close").removeClass("hidden");
  $(".mobile-menu").removeClass("-translate-x-full").addClass("translate-x-0");
});

$(".js-mobile-menu-close").on("click", function(){
  $(this).addClass("hidden");
  $(".js-mobile-menu-open").removeClass("hidden");
  $(".mobile-menu").removeClass("translate-x-0").addClass("-translate-x-full");
});