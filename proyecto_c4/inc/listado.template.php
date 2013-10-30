<form action='' method='get'>
	<input type='text' name='busqueda' placeholder='Término de búsqueda' />
</form>
<table id='listado' width='90%' border='0' cellspacing='0' cellpadding='0'>
	<thead>
		<th><!-- photo --></th>
		<th><a href='ordenar...' class='asc'>usuario</a></th>
		<th><a href='ordenar...' class='asc'>nombre</a></th>
		<th><a href='ordenar...' class='asc'>sector</a></th>
		<th><a href='ordenar...' class='asc'>email</a></th>
		<th><a href='ordenar...' class='asc'>edad</a></th>
		<th><!-- edit --></th>
		<th><!-- delete --></th>
	</thead>
	<tbody>
		<?php echo $listado_body; ?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan='8'>
				<a href=''>anterior</a>
				Pagina 1 de 30 (300 registros)
				<a href=''>siguiente</a>
			</td>
		</tr>
	</tfoot>
</table>