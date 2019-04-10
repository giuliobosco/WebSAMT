<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>utenti</title>
</head>
<body>

<table>
	<tr>
		<th>email</th>
		<th>nome</th>
		<th>cognome</th>
		<th>nascita</th>
		<th>password</th>
		<th></th>
	</tr>

	<?php foreach ($utenti as $utente): ?>
		<tr>
			<td><?php echo($utente->getEmail()); ?></td>
			<td><?php echo($utente->getNome()); ?></td>
			<td><?php echo($utente->getCognome()); ?></td>
			<td><?php echo($utente->getNascita()); ?></td>
			<td><?php echo($utente->getPassword()); ?></td>
			<td>
				<a href="<?php echo URL . "utenti/delete/";
				echo($utente->getEmail()); ?>">DELETE</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>

<a href="<?php echo URL; ?>utenti/create">Create New User</a>

</body>
</html>