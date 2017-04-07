<?php
$pageTitle = "Artwork &#124; Lee Artworks";
include("inc/data.php");
include("inc/functions.php");
include("inc/header.php"); ?>
      <div class="container">
        <h2 class="artsubheadings">Business Projects</h2>
        <a href="logo.php"><h3 class="artsubheadings">Logos</h3></a>
        <div class="gallery artwork-gallery logo">
          <?php 
            $random = array_rand($logo, 4);
            foreach($random as $id) {
              echo get_item_html($id,$logo[$id]);
            }
          ?>
        </div>
        <a href="fabric.php"><h3 class="artsubheadings">Hand Painted Fabric Projects</h3></a>
        <div class="gallery artwork-gallery fabric">
          <?php 
            $random = array_rand($fabric, 4);
            foreach($random as $id) {
              echo get_item_html($id,$fabric[$id]);
            }
          ?>
        </div>
        <a href="other.php"><h3 class="artsubheadings">Other Projects</h3></a>
        <div class="gallery artwork-gallery other">
          <?php 
            $random = array_rand($other, 4);
            foreach($random as $id) {
              echo get_item_html($id,$other[$id]);
            }
          ?>
        </div>
        <h2 class="artsubheadings" id="personal">Personal Projects</h2>
        <a href="paintings.php"><h3 class="artsubheadings">Paintings</h3></a>
         <div class="gallery artwork-gallery paintings">
          <?php 
            $random = array_rand($paintings, 4);
            foreach($random as $id) {
              echo get_item_html($id,$paintings[$id]);
            }
          ?>
          </div>
        <a href="drawings.php"><h3 class="artsubheadings">Drawings</h3></a>
         <div class="gallery artwork-gallery drawings">
          <?php 
            $random = array_rand($drawings, 4);
            foreach($random as $id) {
              echo get_item_html($id,$drawings[$id]);
            }
          ?>
         </div>
        <a href="digital.php"><h3 class="artsubheadings">Digital Works</h3></a>
         <div class="gallery artwork-gallery digital">
          <?php 
            $random = array_rand($digital, 2);
            foreach($random as $id) {
              echo get_item_html($id,$digital[$id]);
            }
          ?>
         </div>
      </div>
<?php include("inc/footer.php"); ?>