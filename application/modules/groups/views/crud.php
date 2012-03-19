<?php echo form_open( current_url(), 'class="form-horizontal"'); ?>
	<fieldset>
		<legend>Groups CRUD</legend>
		
		<?php $form_error = (form_error('name')) ? ' error' : ''; ?>
		<div class="control-group <?php echo $form_error; ?>">
			<label for="name" class="control-label">Name</label>
			<div class="controls">
				<input type="text" id="name" name="name" value="<?php echo set_value('name', (isset($item)) ? $item->name : ''); ?>" />
				<span class="help-inline"><?php echo strip_tags(form_error('name')); ?></span>
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
			<a href="<?php echo site_url('groups/admin/remove/' . $item->id); ?>" class="btn btn-large btn-danger"><i class="icon-trash icon-white"></i> Remove</a>
			<?php endif; ?>
			<button type="submit" class="btn btn-info btn-large"><i class="icon-ok icon-white"></i> Submit</button>
		</div>
		
	</fieldset>
<?php echo form_close(); ?>