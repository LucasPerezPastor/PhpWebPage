<!DOCTYPE html>
<HTML lang="es">
	<head>
		<?php
		(TEMPLATE)::head('Error Page','Lucas','Esta es la página de error','utf-8', 
		new FacebookOpenGraph(
			new Contenido('titulo','descripcion','url','author'), 
			new Imagen('direccion','alt'),'appId','type','site_name','locale'),
		new TwitterCard(
			new Contenido('titulo','descripcion','url','author'), 
			new Imagen('direccion','alt'),'card','site'));
		?>
	</head>
	<body>
		
	</body>
</HTML>
