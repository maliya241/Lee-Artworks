<?php
$pageTitle = "Lee Artworks";
include("inc/data.php");
include("inc/functions.php");
$artwork = array_merge($logo, $fabric, $other, $paintings, $drawings, $digital);
include("inc/header.php"); ?>

      <div class="container">
        <h1 class="hidden-xs-up">Lee Artworks</h1>
        <img src="img/heropicmobile.jpg" alt="" id="mobileheropic" class="heropic hide-mobile img-bb-grey mb-2">               
        <div class="w3-content w3-display-container heropic hide-wide col-md-12 mb-2">
          <img class="mySlides img-bb-grey" src="img/heropic.jpg">
          <img class="mySlides img-bb-grey" src="img/heropicharperdrawing.jpg">
          <img class="mySlides img-bb-grey" src="img/heropicdrawing.JPG">
          <div class="w3-center w3-display-bottommiddle" style="width:100%">
            <div class="w3-left" onclick="plusDivs(-1)">&#10094;</div>
            <div class="w3-right" onclick="plusDivs(1)">&#10095;</div>
            <span class="w3-badge demo w3-border" onclick="currentDiv(1)"></span>
            <span class="w3-badge demo w3-border" onclick="currentDiv(2)"></span>
            <span class="w3-badge demo w3-border" onclick="currentDiv(3)"></span>
          </div>
        </div>
        <br>
        <div class="col-md-12">
          <h2 class="bb-purple slogan">We make art work for you.</h2>
        </div>
        <div class="col-md-6">
          <h2>About Lee Artworks</h2>
          <p class="bb-cyan">Lee Artworks, formerly Barbed Wire Daisy, provides a wide variety of artistic products, including logo design, t-shirts, portraits, home products, and more. Have a product or service but are just a little less "artistically inclined" to complete it? We would love to help! Browse our site to see some pieces we have already created. No matter the reason, we are glad you are here!</p>
        </div>
        <div class="col-md-6">
          <a href="art.php"><h2>Sample Work</h2></a>
          <div class="index-gallery">
            <?php 
              $random = array_rand($artwork, 2);
              foreach($random as $id) {
                echo get_item_html($id,$artwork[$id]);
              }
            ?>
          </div>
        </div>
      </div>
<?php include("inc/footer.php"); ?>