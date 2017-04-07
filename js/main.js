//Last Img Link
$(".logo a").last().css("opacity", "0.5").attr("href", "logo.php");
$(".fabric a").last().css("opacity", "0.5").attr("href", "fabric.php");
$(".other a").last().css("opacity", "0.5").attr("href", "other.php");
$(".paintings a").last().css("opacity", "0.5").attr("href", "paintings.php");
$(".drawings a").last().css("opacity", "0.5").attr("href", "drawings.php");
$(".digital a").last().css("opacity", "0.5").attr("href", "digital.php");
$(".artist-gallery a").last().css("opacity", "0.5").attr("href", "art.php#personal");

//Hide all form questions except for the first one
$(".hidden").hide();
//When t-shirt is selected,
$(".t-shirtoption").click(function() {
  //Show t-shirt form questions
  $(".t-shirtform").show();
  //Show basic information form questions
  $(".basicinfo").show();
  //Hide other form options if accidently selected
  $(".pillowform, .logoform, .otherprojects").hide();
});
//When pillow is selected,
$(".pillowoption").click(function() {
  //Show t-shirt form questions
  $(".pillowform").show();
  //Show basic information form questions
  $(".basicinfo").show();
  //Hide other form options if accidently selected
  $(".t-shirtform, .logoform, .otherprojects").hide();  
});
//When logo is selected,
$(".logooption").click(function() {
  //Show t-shirt form questions
  $(".logoform").show();
  //Show basic information form questions
  $(".basicinfo").show();
  //Hide other form options if accidently selected
  $(".pillowform, .t-shirtform, .otherprojects").hide();
});
$(".otheroption").click(function() {
  //Show more information about further inquiries
  $(".otherprojects").show();
  //Hide other form options if accidently selected
  $(".pillowform, .t-shirtform, .logoform, .basicinfo").hide();
});

//forms
$(function() {
  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });
  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }
      });
  });  
});

//Carousel 
var slideIndex = 1;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1} 
    x[slideIndex-1].style.display = "block"; 
    setTimeout(carousel, 10000); // Change image every 2 seconds
}

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
  setTimeout(showDivs, 10000);
}

