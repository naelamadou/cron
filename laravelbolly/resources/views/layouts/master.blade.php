<!DOCTYPE html>
<html>
<head>
	<title>super titre</title>
	<style type="text/css">
		td,tr{
			border:1px solid black;
			border-collapse: collapse;
		}
		p{
			text-align: justify;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<td>Prenom</td>
			<td>adresse</td>
			<td>email</td>
		</tr>
		<tr>
			<td>Boly</td>
			<td>Rue ecobank</td>
			<td>seneboly@gmail.com</td>
		</tr>
		<tr>
			<td>Mamadou</td>
			<td>Yoff layene</td>
			<td>mamadou@gmail.com</td>
		</tr>
	</table>
	<div>
		@yield('content')
	</div>

	<div>
		@yield('form')
	</div>
	<div>
		@yield('get')
	</div>
</body>
</html>