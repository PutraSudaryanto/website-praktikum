<?php 
//echo base_url()
//echo base_url("blog/post/123");
//echo anchor('news/local/123', 'My News', 'title="News title"');

echo form_open($form_action);?>
<div class="dialog-content">
	<fieldset>
		<div class="clearfix">
			<?php echo form_label('Level'); ?>
			<div class="desc">
				<?php 
				$level_id = isset($form_data->level_id) ? $form_data->level_id : '';
				echo form_dropdown('Model[level_id]', $form_level, $level_id);?>
				<?php echo form_error('level_id'); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo form_label('First Name'); ?>
			<div class="desc">
				<?php
				$first_name = isset($form_data->first_name) ? $form_data->first_name : '';
				echo form_input(array(
					'name' => 'Model[first_name]',
					'value' => $first_name,
					'class'=> 'span-7',
					'required'=> 'true',
				));?>
				<?php echo form_error('first_name'); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo form_label('Last Name'); ?>
			<div class="desc">
				<?php
				$last_name = isset($form_data->last_name) ? $form_data->last_name : '';
				echo form_input(array(
					'name' => 'Model[last_name]',
					'value' => $last_name,
					'class'=> 'span-7',
					'required'=> 'true',
				));?>
				<?php echo form_error('last_name'); ?>
			</div>
		</div>
		<?php if(!empty($form_data)) {?>
			<div class="clearfix">
				<?php echo form_label('Diplayname'); ?>
				<div class="desc">
					<?php
					$displayname = isset($form_data->displayname) ? $form_data->displayname : '';
					echo form_input(array(
						'name' => 'Model[displayname]',
						'value' => $displayname,
						'class'=> 'span-7',
						'required'=> 'true',
					));?>
					<?php echo form_error('displayname'); ?>
				</div>
			</div>
		<?php }?>
		<div class="clearfix">
			<?php echo form_label('Username'); ?>
			<div class="desc">
				<?php 
				$username = isset($form_data->username) ? $form_data->username : '';
				echo form_input(array(
					'name' => 'Model[username]',
					'value' => $username,
					'class'=> 'span-7',
					'required'=> 'true',
				));?>
				<?php echo form_error('username'); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo form_label('Email'); ?>
			<div class="desc">
				<?php
				$email = isset($form_data->email) ? $form_data->email : '';
				echo form_input(array(
					'name' => 'Model[email]',
					'value' => $email,
					'class'=> 'span-7',
					'required'=> 'true',
				));?>
				<?php echo form_error('email'); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo form_label('Password'); ?>
			<div class="desc">
				<?php
				$password = '';
				echo form_password(array(
					'name' => 'password',
					'value' => $password,
					'class'=> 'span-7',
					'required'=> 'true',
				));?>
				<?php echo form_error('password'); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo form_label('Enable'); ?>
			<div class="desc">
				<?php
				$enabled = isset($form_data->enabled) ? $form_data->enabled : 1;
				echo form_hidden('Model[enabled]', 0);
				if($enabled == 1)
					echo form_checkbox('Model[enabled]', 1, TRUE);
				else	
					echo form_checkbox('Model[enabled]', 1);?>
				<?php echo form_error('enabled'); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo form_label('Verified'); ?>
			<div class="desc">
				<?php
				$verified = isset($form_data->verified) ? $form_data->verified : 1;
				echo form_hidden('Model[verified]', 0);
				if($verified == 1)
					echo form_checkbox('Model[verified]', 1, TRUE);
				else
					echo form_checkbox('Model[verified]', 1);?>
				<?php echo form_error('verified'); ?>
			</div>
		</div>
	</fieldset>
</div>
<div class="dialog-submit">
	<?php $submit = empty($form_data) ? 'Create' : 'Save';?>
	<input type="submit" value="<?php echo $submit;?>">
	<input type="button" id="closed" value="Cancel">
</div>
<?php echo form_close(); ?>