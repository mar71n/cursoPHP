<form action='' method='get'>
	<input type='text' name='busqueda' placeholder='Término de búsqueda' />
</form>
<table id='listado' width='90%' border='0' cellspacing='0' cellpadding='0'>
	<thead>
		<?php echo $listado_header; ?>
	</thead>
	<tbody>
		<?php echo $listado_body; ?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan='8'>
				<?php echo $listado_paginado; ?>
			</td>
		</tr>
	</tfoot>
</table>