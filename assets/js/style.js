$(document).ready(function(){
     $('.parallax').parallax();

// Menentukan elemen yang dijadikan sticky yaitu nav
var stickyNavTop = $('nav').offset().top;
var stickyNav = function(){
   var scrollTop = $(window).scrollTop();
   // Kondisi jika discroll maka menu akan selalu diatas, dan sebaliknya
   if (scrollTop > stickyNavTop) {
       $('nav').css({ 'position': 'fixed', 'top':0, 'z-index':9999 });
   } else {
       $('nav').css({ 'position': 'relative' });
   }
};
// Jalankan fungsi
stickyNav();
$(window).scroll(function() {
   stickyNav();
});
});
