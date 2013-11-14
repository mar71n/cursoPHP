<tr class='<?php echo $impar ?>'>
	<td class='<?php echo $css ?>'><img src='<?php echo $img ?>' height='64px' /></td>
	<td class='genero'><?php echo $u['usuario']	?></td>
	<td><?php echo "$u[nombre] $u[apellido]"?></td>
	<td><?php echo $u['sector']	?></td>
	<td><a href='mailto:<?php echo $u['email']?>'><img src='app_img/email.png' /></a></td>
	<td><?php echo $u['edad']?></td>
	<td><?php echo $botonEditar ?></td>
	<td><?php echo $botonBorrar ?></td>
</tr>