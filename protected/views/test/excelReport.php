<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      nombre		</th>
 		<th width="80px">
		      email		</th>
 		<th width="80px">
		      image		</th>
 		<th width="80px">
		      url		</th>
 		<th width="80px">
		      descripcion		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->nombre; ?>
		</td>
       		<td>
			<?php echo $row->email; ?>
		</td>
       		<td>
			<?php echo $row->image; ?>
		</td>
       		<td>
			<?php echo $row->url; ?>
		</td>
       		<td>
			<?php echo $row->descripcion; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
