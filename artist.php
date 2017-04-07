<?php
$pageTitle = "Artist &#124; Lee Artworks";
include("inc/data.php");
include("inc/functions.php");

$artwork = array_merge($paintings, $drawings, $digital);

include("inc/header.php"); ?>
      <div class="container">
        <div class="row">
          <div class="container"><img src="img/Harper-mobile.jpg" alt="Picture of Harper Lee" class="px-0 hide-mobile img-bb-cyan artist-mobile"></div>
          <h2 class="col-sm-12 mt-1">About the Artist</h2>
          <div class="col-sm-12 artist-bio">
            <p class="bb-grey">Art has always been a part of my life. When I was very young, maybe 3 or 4 years old, my parents would take me to art museums and I would sit and sketch my favorite paintings. My crayons and pencils were my favorite toys! Today, I love creating art and, most importantly, I love creating art that encourages and supports others. Art is inspiring, moving, and helpful. Some of my favorite artists include John Singer Sargent, Norman Rockwell, Pablo Picasso, Andy Warhol, and Bill Watterson. I enjoy almost all avenues of art including comics, paintings, animation, and logos. I appreciate your interest in me, and I appreciate your interest in my business!</p>
          </div>
          <img src="img/Harper.jpg" alt="Picture of Harper Lee" class="hide-wide img-bb-cyan px-0 artist-wide">
        </div>
        <div>
          <h2>Experience</h2>
          <p class="bb-purple">Freelance Artist
            <br>Designed, developed, and delivered art pieces to clients according to specifications
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Produced portraits for clients
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Sold various hand-painted fabric pieces
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Painted mural for a local elementary school
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Designed logos for businesses
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Designed logos for sporting events
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Designed invitations and party favors to client specifications
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226; Painted windows for business
          </p>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <h2>Skills</h2>
            <p class="bb-cyan">&#8226; Adobe Illustrator
              <br>&#8226; iMac and Cintique tools
            </p>
           </div>
          <div class="col-sm-8">
            <h2>Honors</h2>
            <p class="bb-grey">&#8226; Donated a painting to be auctioned for the West Tennessee Regional Art Center
              <br>&#8226; 2 Paintings were chosen for display in West Tennessee Student Art Show
              <br>&#8226; Won 1st place for 3D Art in art show at high school
              <br>&#8226; Organized and led Elementary/Middle School Recycled Art Show for 2 years
            </p>
          </div>
        </div>
          <a href="HarpersResume.pdf" target="_blank"><h4 class="clear">Print Resume</h4></a>
        <div>
          <h2 class="mt-2">Artwork</h2>
          <div class="gallery artist-gallery">
            <?php 
              $random = array_rand($artwork, 4);
              foreach($random as $id) {
                echo get_item_html($id,$artwork[$id]);
              }
            ?>
          </div>
        </div>  
      </div>
<?php include("inc/footer.php"); ?>