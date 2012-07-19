<?php if ( $message) : ?>
	<p><?php echo $message; ?></p>
<?php endif; ?>

<table cellpadding="0" cellspacing="0" class="table table-stripped">
	<thead>
		<tr>
			<td width="1%">ID</td>
			<td>Name</td>
			<td>E-mail</td>
			<td width="4%">&nbsp;</td>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="4" style="text-align: right;"><a href="<?php echo site_url('administrators/admin/add'); ?>" class="btn btn-info btn-large"><i class="icon-plus icon-white"></i> New</a></td>
		</tr>
	</tfoot>
	<tbody>
		<?php foreach ( $administrators as $admin ) : ?>
			<tr>
				<td><?php echo $admin->id; ?></td>
				<td><?php echo $admin->name; ?></td>
				<td><?php echo $admin->email; ?></td>
				<td><?php echo anchor('administrators/admin/edit/' . $admin->id, '<i class="icon-pencil"></i>', 'title="Edit"'); ?></td>
			</tr>
		<?php endforeach; ?>
	<tbody>
</table>