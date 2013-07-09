<?php if ($model !== null):?>
<table border="0">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      id_categoria		</th>
 		<th width="80px">
		      nombre		</th>
 		<th width="80px">
		      validacion		</th>
 		<th width="80px">
		      timestamp		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->id_categoria; ?>
		</td>
       		<td>
			<?php echo $row->nombre; ?>
		</td>
       		<td>
			<?php echo $row->validacion; ?>
		</td>
       		<td>
			<?php echo $row->timestamp; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
