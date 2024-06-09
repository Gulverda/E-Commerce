jQuery.noConflict();


$(document).ready(function() {
  $("#search-icon").click(function() {
      $(".nav").toggleClass("search");
      $(".nav").toggleClass("no-search");
      $(".search-input").toggleClass("search-active");
  });

  $('.menu-toggle').click(function() {
      $(".nav").toggleClass("mobile-nav");
      $(this).toggleClass("is-active");
  });

  $('.element').mouseenter(function() {
      $(this).addClass('active');
      $('.stage').children('.element').not('.active').addClass('inactive');
  }).mouseleave(function() {
      $(this).removeClass('active');
      $('.stage').children('.element').not('.active').removeClass('inactive');
  });
});