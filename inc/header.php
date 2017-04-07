<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8"> 
      <title><?php echo $pageTitle; ?></title>
      <link rel="stylesheet" href="css/normalize.css">
      <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="css/main.css">
      <link rel="stylesheet" href="css/responsive.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <link rel="icon" href="img/favicon.icon" type="image/x-icon">
      <meta name="description" content="Lee Artworks is a business that creates custom artwork. The main artwork projects are logo, pillow, and t-shirt designs. Other art projects are also invited." />
      <meta name="keywords" content="Lee Artwork, Harper Lee, Harper, Lee, art, artwork, custom, logo, shoes, pillows, design, drawing, painting, digital" />
      <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
      <link rel="icon" type="image/png" href="favicon/favicon-32x32.png" sizes="32x32">
      <link rel="icon" type="image/png" href="favicon/favicon-16x16.png" sizes="16x16">
      <link rel="manifest" href="favicon/manifest.json">
      <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#9a6d8e">
      <meta name="theme-color" content="#9a6d8e">
    </head>
    <body>
      <header>
        <nav class="navimg hide-wide">
          <div class="container">
            <a href="index.php"><img src="img/leelogo.png" alt="Lee Artworks Logo" class="img-fluid primary leelogo" id="navleelogo"></a>
            <ul class="nav-sprite">
              <li class="artist"><a href="artist.php"></a></li>
              <li class="artwork"><a href="art.php"></a></li>
              <li class="order"><a href="order.php"></a></li>
            </ul>
          </div>
        </nav>
        <nav class="navbar hide-mobile">
          <a href="index.php"><img src="img/leelogo.png" alt="Lee Artworks Logo" class="img-fluid leelogomobile leelpadding-top"></a>
          <div class="navbutton">
            <button class="navbar-toggler hide-mobile" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
          </div>
          <div class="collapse navbar-toggleable-md" id="navbarResponsive">
            <ul class="nav navbar-nav nav-sprite">
              <li class="nav-item artist"><a class="nav-link" href="artist.php"></a></li>
              <li class="nav-item artwork"><a class="nav-link" href="art.php"></a></li>
              <li class="nav-item order"><a class="nav-link" href="order.php"></a></li>
            </ul>
          </div>
        </nav>
      </header>
