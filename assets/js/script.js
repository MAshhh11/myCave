
  // SEARCH AREA
  $(document).ready(function(){
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#results div").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});


// CONFIRM : FONCTION CLICK MODAL AUTOGENERE 
$(function() {
  $('.confirm').click(function(e) {
      e.preventDefault();
      if (window.confirm("Are you sure? This will delete the entire entry !")) {
          location.href = this.href;
      }
  });
});
	
// Main title animation
var textWrapper = document.querySelector('.ml3');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml3 .letter',
    opacity: [0,1],
    easing: "easeInOutQuad",
    duration: 2250,
    delay: (el, i) => 150 * (i+1)
  }).add({
    targets: '.ml3',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 10000
  });

 