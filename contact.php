<?php
require_once('defines.php');
?>

<html>
	<head>
		<?php include("includes/01-htmlhead.php"); ?>
		<title>Contact Us | RecruitML</title>
	</head>

<body class="contact">
	<header>
		<?php include("includes/02-header.php"); ?>
		<blockquote>
			<h1>Contact Us</h1>
		</blockquote>
	</header>
	<main>
		
		<div class="form-container">
			<div class="contact-form-container">
				<form method="post" action="thankyou.php?type=contact" onSubmit="return submitForm()">
					<div class="row">
						<div class="formGroup">
							<label for="name">Name</label>
							<input type="text" name="name" id="name" required > 
						</div>
						<div class="formGroup">
							<label for="company-name">Company Name</label>
							<input type="text" name="company-name" id="company-name" required >
						</div>
					</div>
					<div class="row">
						<div class="formGroup">
							<label for="phone">Phone Number</label>
							<input type="tel" name="phone" id="phone">
						</div>
						<div class="formGroup">
							<label for="email">Email Address</label>
							<input type="email" name="email" id="email" required>
						</div>
					</div>

					<label for="describes">Which describes you best?</label>
					<select name="describes" for="describes" required>
						<option selected="selected" value="">Select Best Description</option>
						<option value="seeker">I’m a job seeker</option>
						<option value="employer">I’m an employer</option>
						<option value="marketing">I am from the media/press</option>
						<option value="partner">I would like to partner with RecruitML</option>
					</select>

					<label>Comments</label>
					<textarea name="message" rows="6" required></textarea>
					
					<br><br>
					
					<div class="g-recaptcha" data-sitekey="<?php echo CAPTCHA_SITE_KEY ?>"></div>
					<script type="text/javascript" 
						src="https://www.google.com/recaptcha/api.js?hl=en">
					</script>								

					<input class="button" type="submit" name="Submit" value="Submit">
				</form>
				<!--
				<div class="contact-info">
					<h4>Sales</h4>
					<p>
					<a href="mailto:advisor@recruitml.com">advisor@recruitml.com</a><br/>
					123-456-7890
					</p>
					<hr>

					<h4>Press</h4>
					<p>
					<a href="mailto:press@recruitml.com">press@recruitml.com</a><br/>
					</p>
					<hr>

					<h4>Address</h4>
					<p>
					596 Bryan Ave,<br/> Sunnyvale CA, 94086
					</p>			
				</div>
				-->
			</div>
		</div>
		
		
		<div class="cta">
			<h4>Join Us</h4>
			<a href="/signup.php" class="button">Sign Up Now</a>
		</div>
	</main>


<?php include("includes/03-footer.php"); ?>