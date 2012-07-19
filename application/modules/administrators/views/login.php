<?php echo form_open( current_url(), 'class="form-horizontal"' ); ?>
<?php if ( $message ) : ?>
	<div class="alert">
	  <strong>Warning!</strong> <?php echo $message; ?>
	</div>
<?php endif; ?>

<fieldset>
	<legend>Login</legend>
	<?php $login_error = (form_error('email')) ? ' error' : ''; ?>
	<div class="control-group <?php echo $login_error; ?>">
	    <label for="email" class="control-label">E-mail</label>
	    <div class="controls"><input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" /><span class="help-inline"><?php echo strip_tags(form_error('email')); ?></span></div>
    </div>

    <?php $passw_error = (form_error('password')) ? ' error' : ''; ?>
    <div class="control-group <?php echo $passw_error; ?>">
	    <label for="password" class="control-label">Password</label>
	    <div class="controls"><input type="password" name="password" id="password" /><span class="help-inline"><?php echo strip_tags(form_error('password')); ?></span></div>
    </div>

    <div class="form-actions"><button type="submit" class="btn btn-info btn-large"><i class="icon-user icon-white"></i> Go spider, go</button></div>

</fieldset>
<?php echo form_close(); ?>