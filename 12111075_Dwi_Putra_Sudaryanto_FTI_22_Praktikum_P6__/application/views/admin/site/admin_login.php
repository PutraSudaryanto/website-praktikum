<?php echo form_open('admin/site/login'); ?>
	<fieldset>
		<div class="clearfix">
			<label for="LoginFormAdmin_email">Email</label>
			<div class="desc">
				<input placeholder="Email" name="LoginFormAdmin[email]" id="LoginFormAdmin_email" type="text" />
				<div class="errorMessage" id="LoginFormAdmin_email_em_" style="display:none"></div>
			</div>
		</div>
		<div class="clearfix">
			<label for="LoginFormAdmin_password">Password</label>
			<div class="desc">
				<input placeholder="Password" name="LoginFormAdmin[password]" id="LoginFormAdmin_password" type="password" />
				<div class="errorMessage" id="LoginFormAdmin_password_em_" style="display:none"></div>
			</div>
		</div>
		<div class="clearfix">
			<label></label>
			<div class="desc">
				<input onclick="setEnableSave()" type="submit" name="yt0" value="Login" />
			</div>
		</div>
	</fieldset>
<?php echo form_close(); ?>