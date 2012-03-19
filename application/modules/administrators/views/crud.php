<?php echo form_open( current_url(), 'class="form-horizontal"'); ?>
	<fieldset>
		<legend>Administrators CRUD</legend>
		<?php $form_error = (form_error('group_id')) ? ' error' : ''; ?>
		<div class="control-group <?php echo $form_error; ?>">
			<label for="group_id" class="control-label">Group</label>
			<div class="controls">
				<select name="group_id" id="group_id">
					<?php foreach( $groups as $g ) : ?>
						<option value="<?php echo $g->id; ?>" <?php echo set_select('group_id', $g->id, (isset($item)) ? ($g->group_id == $item->group_id) ? TRUE : FALSE : FALSE); ?>><?php echo $g->name; ?></option>
					<?php endforeach; ?>
				</select>
				<span class="help-inline"><?php echo strip_tags(form_error('group_id')); ?></span>
			</div>
		</div>
		
		<?php $form_error = (form_error('name')) ? ' error' : ''; ?>
		<div class="control-group <?php echo $form_error; ?>">
			<label for="name" class="control-label">Name</label>
			<div class="controls">
				<input type="text" id="name" name="name" value="<?php echo set_value('name', (isset($item)) ? $item->name : ''); ?>" />
				<span class="help-inline"><?php echo strip_tags(form_error('name')); ?></span>
			</div>
		</div>
		
		<?php $form_error = (form_error('email')) ? ' error' : ''; ?>
		<div class="control-group <?php echo $form_error; ?>">
			<label for="email" class="control-label">E-mail</label>
			<div class="controls">
				<input type="email" id="email" name="email" value="<?php echo set_value('email', (isset($item)) ? $item->email : ''); ?>" />
				<span class="help-inline"><?php echo strip_tags(form_error('email')); ?></span>
			</div>
		</div>
		
		<?php $form_error = (form_error('password')) ? ' error' : ''; ?>
		<div class="control-group <?php echo $form_error; ?>">
			<label for="password" class="control-label">Password</label>
			<div class="controls">
				<input type="text" id="password" name="password" />
				<span class="help-inline"><?php echo strip_tags(form_error('password')); ?></span>
			</div>
		</div>
		
		<?php $form_error = (form_error('active')) ? ' error' : ''; ?>
		<div class="control-group <?php echo $form_error; ?>">
			<label for="active" class="control-label">Active</label>
			<div class="controls">
				<select name="active" id="active">
					<option value="1" <?php echo set_select('active', '1', (isset($item)) ? ($item->active == '1') ? TRUE : FALSE : TRUE); ?>>Yes</option>
					<option value="0" <?php echo set_select('active', '0', (isset($item)) ? ($item->active == '0') ? TRUE : FALSE : FALSE); ?>>No</option>
				</select>
				<span class="help-inline"><?php echo strip_tags(form_error('password')); ?></span>
			</div>
		</div>
		
		<div class="form-actions">
			<?php if ( $this->uri->segment(4) ) : ?>
			<a href="<?php echo site_url('administrators/admin/remove/' . $item->id); ?>" class="btn btn-large btn-danger"><i class="icon-trash icon-white"></i> Remove</a>
			<?php endif; ?>
			<button type="submit" class="btn btn-info btn-large"><i class="icon-ok icon-white"></i> Submit</button>
		</div>
		
	</fieldset>
<?php echo form_close(); ?>