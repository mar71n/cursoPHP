<tr class='<?php echo $impar ?>'>
	<td class='<?php echo $css ?>'><img src='<?php echo $img ?>' height='64px' /></td>
    <td><?php echo $u['idusuario']?></td>
	<td class='genero'><?php echo $u['usuario']	?></td>
	<td><?php echo "$u[nombre] $u[apellido]"?></td>
	<td><?php echo $u['sector']	?></td>
	<td><a href='mailto:<?php echo $u['email']?>'><img src='app_img/email.png' /></a></td>
	<td><?php echo $u['edad']?></td>
	<td><a href='?action=editar&id=<?php echo $u['idusuario']	?>'><img src='app_img/editar.png' /></a></td>
	<td><a onclick='return confirm("�Est� seguro que desea eliminar al usuario?");' href='?action=borrar&id=<?php echo $u['idusuario']	?>'><img src='app_img/borrar.png' /></a></td>
</tr>