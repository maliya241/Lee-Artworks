<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim(filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
  $email = trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL));
  $checkbox = trim(filter_input(INPUT_POST,"checkbox",FILTER_SANITIZE_STRING));
  $customproject = trim(filter_input(INPUT_POST,"customproject",FILTER_SANITIZE_STRING));
  $tshirtidea = trim(filter_input(INPUT_POST,"tshirtidea",FILTER_SANITIZE_SPECIAL_CHARS));
  $tshirt = trim(filter_input(INPUT_POST,"tshirt",FILTER_SANITIZE_STRING));
  $tshirtnumber = trim(filter_input(INPUT_POST,"tshirtnumber",FILTER_SANITIZE_STRING));
  $pillowidea = trim(filter_input(INPUT_POST,"pillowidea",FILTER_SANITIZE_SPECIAL_CHARS));
  $pillownumber = trim(filter_input(INPUT_POST,"pillownumber",FILTER_SANITIZE_STRING));
  $pillowsize = trim(filter_input(INPUT_POST,"pillowsize",FILTER_SANITIZE_STRING));
  $logoidea = trim(filter_input(INPUT_POST,"logoidea",FILTER_SANITIZE_SPECIAL_CHARS));
  
  if ($name == "" || $email == "" || $checkbox == "") {
    $error_message = "Please fill in the required fields: Name, Email, Agreement to Terms and Conditions";
  }  
  
  if (!isset($error_message) && $_POST["address"] != "") {
    $error_message = "Bad form input";
  }
  
  require("inc/phpmailer/class.phpmailer.php");
  
  $mail = new PHPMailer;
  
  if (!isset($error_message) && !$mail->ValidateAddress($email)) {
    $error_message = "Invalid Email Address";
  }
  
  if (!isset($error_message)) {
    if ($customproject == "T-shirt Design") {
	    $email_body = "Client: $name\nClient's Email: $email\nProject Selection: $customproject\nT-shirt Idea: $tshirtidea\nDesign Only or Design and T-shirts Selection: $tshirt\nNumber of T-shirts: $tshirtnumber\nAgreement to Terms and Conditions: Checked\n";
      $pictures = "tshirtpicture";
    } else if ($customproject == "Pillow Design") {
	    $email_body = "Client: $name\nClient's Email: $email\nProject Selection: $customproject\nPillow Idea: $pillowidea\nNumber of Pillows: $pillownumber\nPillow Size and With or Without Pillow Form Selection: $pillowsize\nAgreement to Terms and Conditions: Checked\n";
      $pictures = "pillowpicture";
    } else if ($customproject == "Logo Design") {
	    $email_body = "Client: $name\nClient's Email: $email\nProject Selection: $customproject\nLogo Idea: $logoidea\nAgreement to Terms and Conditions: Checked\n";
      $pictures = "logopicture";
    }   
      
    if (array_key_exists($pictures, $_FILES)) {
      require ("inc/phpmailer/PHPMailerAutoload.php");
      
      $mail->setFrom('maliya241@gmail.com', 'Lee Artworks Order Form');
      $mail->addAddress('maliya241@gmail.com', 'Lee Artworks');     // Add a recipient
      $mail->AddReplyTo($email, $name);
      $mail->isHTML(false);                                  // Set email format to HTML
  
      $mail->Subject = 'Order From ' . $name;
      $mail->Body    = $email_body;
      
      for ($ct = 0; $ct < count($_FILES[$pictures]['tmp_name']); $ct++) {
        $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES[$pictures]['name'][$ct]));
        $filename = $_FILES[$pictures]['name'][$ct];
        if (move_uploaded_file($_FILES[$pictures]['tmp_name'][$ct], $uploadfile)) {
            $mail->addAttachment($uploadfile, $filename);
        } else {
            $error_message .= 'Failed to move file to ' . $uploadfile;
        }
      }
      
      if($mail->send()) {
          header("location:order.php?status=thanks");
          exit;
      }
    $error_message = 'Message could not be sent.';
    $error_message .= 'Mailer Error: ' . $mail->ErrorInfo;
    }
  }
}
$pageTitle = "Order Form &#124; Lee Artworks";
include("inc/header.php"); 
?>

<div class="content">
	<div class="container wrapper inner">
		<?php if (isset($_GET["status"]) && $_GET["status"] == "thanks") { ?>
			<div class='thankyou' style="margin-bottom: 23em; text-align: center;">
				<h1>Lee Artworks Order Form</h1>
				<h2>Thank You!</h2>
				<p>We will email you back in 2-3 business days with a quote.</p>
				<div class="push"></div>
			</div>
		<?php } else {  
			if (isset($error_message)) {
					echo "<p class='message'>".$error_message . "</p>";
			} 
		?>
		<h1>Lee Artworks Order Form</h1>
		<form method="POST" action="order.php" enctype="multipart/form-data">
			<div class="custommade">
				<h2 class="margin-top">What Kind of Project&#63;</h2>
				<div class="custom-controls-stacked clear">
					<label class="custom-control custom-radio t-shirtoption clear">
						<input id="radioStacked1" value="T-shirt Design"<?php if (isset($customproject) && $customproject == "T-shirt Design") echo " checked";  ?> name="customproject" type="radio" class="custom-control-input">
						<span class="custom-control-indicator"></span>
						<span class="custom-control-description">T-shirt Design <br> While we are not a t-shirt company, we would love to design one for you! Provide us with your idea and let us send you your deisgn through digital download. If you would like for us to place a shirt order for you with our design, we would be happy to coordinate that with an outside printing company. We understand that you want your design to be perfect so leave us your email, and we make sure the design you end up with is just that! No idea is too big or too small. So what are you waiting for? Select this option and fill out the form below.</span>
					</label>
					<label class="custom-control custom-radio pillowoption clear">
						<input id="radioStacked2" value="Pillow Design"<?php if (isset($customproject) && $customproject == "Pillow Design") echo " checked";  ?> name="customproject" type="radio" class="custom-control-input">
						<span class="custom-control-indicator"></span>
						<span class="custom-control-description">Hand-Painted Pillow Design <br>Want a home item that expresses your unique style and personality? Or need the perfect wedding, anniversary, or housewarming gift for someone special? We would love to design a pillow cover for you! Simply provide us with your idea and let us send you your design. We understand that you want your design to be perfect so leave us the following information, and we will make sure your personalized product is just that! No idea is too big or too small. So what are your waiting for? Select this option and fill out the form below.</span>
					</label>
					<label class="custom-control custom-radio logooption clear">
						<input id="radioStacked3" value="Logo Design"<?php if (isset($customproject) && $customproject == "Logo Design") echo " checked";  ?> name="customproject" type="radio" class="custom-control-input">
						<span class="custom-control-indicator"></span>
						<span class="custom-control-description">Logo Design <br>We would LOVE to design a logo for your business, club, or fundraiser. Provide us with your idea and let us send you your logo, in your choice of format, by digital download. We understand that you want your logo to be perfect so select this option and fill out the form, and we will make sure your new logo is just that. </span>
					</label>
					<label class="custom-control custom-radio otheroption clear">
						<input id="radioStacked4" value="Other Option" name="customproject" type="radio" class="custom-control-input">
						<span class="custom-control-indicator"></span>
						<span class="custom-control-description margin-bottom">Other Projects <br>If you have an art project other than the above, then select this option. </span>
					</label>
				</div>
			</div>
			<div class="hidden otherprojects">
				<h2 class="clear margin-top">Further Inquiries</h2>
				<p>Lee Artworks, in the past, has painted murals, donated paintings to banquets and auctions, painted faces at birthday parties, and more. If you have any crazy ideas, or odd art jobs you need done, try emailing us at <a href="mailto:Lee.artworks2015@gmail.com">Lee.artworks2015@gmail.com</a>. We would love to tell you if we can help. <br><br> Please be aware that emailing us means you <strong>agree to participate, acknowledge, and adhere</strong> to Lee Artworks <a href="termsandconditions.php" target="_blank">terms and conditions</a>.</p>
			</div>
			<div class="hidden t-shirtform">
				<h2 class="clear margin-top">T-shirt Design</h2>
				<div class="form-group">
					<h3 class="margin-top">Your Idea (please describe in detail what you have in mind):</h3>
					<div>
						<input class="form-control form-border" type="text" placeholder="please describe what you want. . . " id="example-text-input" name="tshirtidea" value="<?php if (isset($tshirtidea)) { echo $tshirtidea; }?>">
					</div>
					<h3 class="margin-top">Pictures (include a picture you like, want us to use as inspiration, or a personal picture you would like us to copy):</h3>
					<div class="input-group">
						<label class="input-group-btn">
							<input type="hidden" name="MAX_FILE_SIZE" value="100000">
							<span class="btn btn-outline-* file-button">
									Browse&hellip; <input type="file" style="display: none;"  name="tshirtpicture[]" multiple="multiple">
							</span>
						</label>
						<input type="text" class="form-control" readonly>
					</div>
					<h3 class="margin-top">Please Select One:</h3>
					<div class="custom-controls-stacked margin-bottom">
						<label class="custom-control custom-radio">
							<input id="radioStacked5" value="I would just like the design."<?php if (isset($tshirt) && $tshirt == "I would just like the design.") { echo " checked"; } ?> name="tshirt" type="radio" class="custom-control-input">
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">I would just like the design.</span>
						</label>
						<label class="custom-control custom-radio">
							<input id="radioStacked6" value="I would like the design and t-shirts."<?php if (isset($tshirt) && $tshirt == "I would like the design and t-shirts.") { echo " checked"; } ?> name="tshirt" type="radio" class="custom-control-input">
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">I would like the design and t-shirts.</span>
						</label>
					</div>
					<h3 class="clear margin-top">How Many T-shirts&#63;</h3>
					<div>
						<input class="form-control form-border" type="text" placeholder="number of t-shirts" id="example-text-input" name="tshirtnumber" value="<?php if (isset($tshirtnumber)) { echo $tshirtnumber; }?>">
					</div>
					<br>
					<p>Our consultation is always free. Digital design download is &#36;25. Pricing of t-shirts would be determined by outside company at the time of ordering (for example, currently the lowest pricing offer available would be 1 item &#64; &#36;20.95, 10 items &#64; &#36;13.24 each, and 20 items &#64; &#36;8.81 each) and would be in addition to our design fee. </p>
				</div>
			</div>
			<div class="hidden pillowform">
				<h2 class="clear margin-top">Hand-Painted Pillow Design</h2>
				<div class="form-group">
					<h3 class="margin-top">Your Idea (please describe in detail what you have in mind):</h3>
					<div>
						<input class="form-control form-border" type="text" placeholder="please describe what you want. . . " id="example-text-input" name="pillowidea" value="<?php if (isset($pillowidea)) { echo $pillowidea; }?>">
					</div>
					<h3 class="margin-top">Pictures (include a picture you like, want us to use as inspiration, or a personal picture you would like us to copy):</h3>
					<div class="input-group">
						<label class="input-group-btn">
							<input type="hidden" name="MAX_FILE_SIZE" value="100000">
							<span class="btn btn-outline-* file-button">
									Browse&hellip; <input type="file" id="file" style="display: none;" name="pillowpicture[]" multiple="multiple">
							</span>
						</label>
						<input type="text" class="form-control" readonly>
					</div>
					<h3 class="clear margin-top">How Many Pillows&#63; (max three per order)</h3>
					<div>
						<input class="form-control form-border" type="text" placeholder="number of pillows" id="example-text-input" name="pillownumber" value="<?php if (isset($pillownumber)) { echo $pillownumber; }?>">
					</div>
					<h3 class="margin-top">What size&#63;</h3>
					<div class="custom-controls-stacked">
						<label class="custom-control custom-radio">
							<input id="radioStacked7" value="16 inches by 16 inches with pillow form"<?php if (isset($pillowsize) && $pillowsize == "16 inches by 16 inches with pillow form") { echo " checked"; } ?> name="pillowsize" type="radio" class="custom-control-input">
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">16 inches by 16 inches with pillow form (&#36;50 per pillow)</span>
						</label>
						<label class="custom-control custom-radio">
							<input id="radioStacked8" value="16 inches by 16 inches without pillow form"<?php if (isset($pillowsize) && $pillowsize == "16 inches by 16 inches without pillow form") { echo " checked"; } ?> name="pillowsize" type="radio" class="custom-control-input">
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">16 inches by 16 inches without pillow form (&#36;40 per pillow)</span>
						</label>
						<label class="custom-control custom-radio">
							<input id="radioStacked9" value="18 inches by 18 inches with pillow form"<?php if (isset($pillowsize) && $pillowsize == "18 inches by 18 inches with pillow form") { echo " checked"; } ?> name="pillowsize" type="radio" class="custom-control-input">
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">18 inches by 18 inches with pillow form (&#36;55 per pillow)</span>
						</label>
						<label class="custom-control custom-radio">
							<input id="radioStacked10" value="18 inches by 18 inches without pillow form"<?php if (isset($pillowsize) && $pillowsize == "18 inches by 18 inches without pillow form") { echo " checked"; } ?>  name="pillowsize" type="radio" class="custom-control-input">
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">18 inches by 18 inches without pillow form (&#36;45 per pillow)</span>
						</label>
					</div>
				</div>
			</div>  
			<div class="hidden logoform">
				<h2 class="clear margin-top">Logo Design</h2>
				<div class="form-group">
					<h3 class="margin-top">Your Idea (please describe in detail what you have in mind):</h3>
					<div>
						<input class="form-control form-border" type="text" placeholder="please describe what you want. . . " id="example-text-input" name="logoidea" value="<?php if (isset($logoidea)) { echo $logoidea; }?>">
					</div>
					<h3 class="margin-top">Pictures (include a picture you like, want us to use as inspiration, or a personal picture you would like us to copy):</h3>
					<div class="input-group">
						<label class="input-group-btn">
							<input type="hidden" name="MAX_FILE_SIZE" value="100000">
							<span class="btn btn-outline-* file-button">
									Browse&hellip; <input type="file" style="display: none;"  name="logopicture[]" multiple="multiple">
							</span>
						</label>
						<input type="text" class="form-control" readonly>
					</div>
				</div>
				<p>Our consultation is always free. Logo designs range from &#36;60&#45;&#36;150 depending on size and detail. You will be quoted a definite price before final production of the logo.</p>
			</div>
			<div class="hidden basicinfo">
				<h2 class="clear margin-top">Basic Information</h2>
				<div class="form-group">
					<h3 class="margin-top">Name:</h3>
					<div>
						<input class="form-control form-border" type="text" placeholder="please tell us your full name" id="example-text-input" name="name" value="<?php if (isset($name)) { echo $name; }?>">
					</div>
					<h3 class="margin-top">Email:</h3>
					<div>
						<input class="form-control form-border" type="text" placeholder="please tell us your email address" id="example-text-input" name="email" value="<?php if (isset($email)) { echo $email; }?>">
					</div>
					<br>
					<h2>Terms and Agreement</h2>
					<label class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="checkbox">
						<span class="custom-control-indicator"></span>
						<span class="custom-control-description">By clicking terms and agreement, I agree to participate, acknowledge, and adhere to Lee Artworks <a href="termsandconditions.php" target="_blank">terms and conditions</a>.</span>
					</label>
				</div>
				<div style="display:none">
					<h3 for="address">Address </h3>
					<input type="text" id="email" name="address"/><p>Please leave this field blank</p>
				</div> 
				<input class="btn btn-outline-* btn-lg" type="submit" name="submit" value="Submit"> 
			</div>
		</form>
		<?php } ?>
	</div>
</div>


<?php include("inc/footer.php"); ?>