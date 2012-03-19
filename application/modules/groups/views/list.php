<?php if ( $message) : ?>
	<p><?php echo $message; ?></p>
<?php endif; ?>
<table cellpadding="0" cellspacing="0" class="table table-stripped">
	<thead>
		<tr>
			<td width="1%">ID</td>
			<td>Name</td>
			<td width="4%">&nbsp;</td>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="3" style="text-align: right;"><a href="<?php echo site_url('groups/admin/add'); ?>" class="btn btn-info btn-large"><i class="icon-plus icon-white"></i> New</a></td>
		</tr>
	</tfoot>
	<tbody>
		<?php foreach ( $groups as $g ) : ?>
			<tr>
				<td><?php echo $g->id; ?></td>
				<td><?php echo $g->name; ?></td>
				<td><?php echo anchor('groups/admin/edit/' . $g->id, '<i class="icon-pencil"></i>', 'title="Edit"'); ?></td>
			</tr>
		<?php endforeach; ?>
	<tbody>
</table>