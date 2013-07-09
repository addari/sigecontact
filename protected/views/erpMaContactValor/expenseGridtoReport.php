<?php if ($model !== null):?>
<table border="0">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      id_contact		</th>
 		<th width="80px">
		      id_tipo_valor		</th>
 		<th width="80px">
		      valor		</th>
 		<th width="80px">
		      timestamp		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->id_contact; ?>
		</td>
       		<td>
			<?php echo $row->id_tipo_valor; ?>
		</td>
       		<td>
			<?php echo $row->valor; ?>
		</td>
       		<td>
			<?php echo $row->timestamp; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
