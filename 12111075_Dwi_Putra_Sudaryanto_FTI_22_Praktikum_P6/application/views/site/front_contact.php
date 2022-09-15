<!-- Single -->
<div class="column-two-third single">
	<div class="outerwide">
		<h5 class="line"><span><?php echo $pageTitle;?>.</span></h5>
	</div>
	<div class="contact-form">
		<?php echo form_open($form_action, array(
			'id' => 'contactForm',
			'name' => 'contactForm',
		));?>
			<div class="form">
				<label>Name*</label>
				<div class="input">
					<span class="name"></span>
					<input type="text" class="name"  name="Model[displayname]" id="yourname" />
				</div>
			</div>
			<div class="form">
				<label>Email*</label>
				<div class="input">
					<span class="email"></span>
					<input type="text" class="name"  name="Model[email]" id="email" />
				</div>
			</div>
			<div class="form">
				<label>Message*</label>
				<textarea name="Model[message]" rows="10" cols="20"></textarea>
			</div>
			<div class="form2">
				<input type="submit" value="Send Message" class="send">
			</div>
		<?php echo form_close(); ?>	
		
		<div class="alertMessage"></div>
	</div>
</div>
<!-- /Single -->
