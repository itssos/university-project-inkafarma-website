

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inkafarma | Contacto</title>
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/831507abf0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" href="css/contact.css?v=<?php echo(rand()); ?>">
</head>

<body>

    <?php require_once("assets/template/navbar.php"); ?>

    <!-- Aquí iría el contenido principal de la página -->    
    <div class="contacto">
        <div class="imagen-telefono">
            <img src="img/hombre_telefono.png" alt="Hombre hablando por teléfono">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contacto-info">
                        <h2>Contacto</h2>
                        <p>¡Contáctanos para cualquier consulta o para hacer un pedido!</p>
                        <ul>
                            <li><i class="fa fa-phone"></i> Teléfono: (01) 314 2020</li>
                            
                            <li><i class="fa fa-envelope"></i> Correo electrónico: inka@farmacia.com</li>
                            
                            <li><i class="fa fa-map-marker"></i> Dirección: AV. Guardia Civil Nro. 263 TDA 1A Y 1B, LIMA</li>
                            <li><i class="fa fa-map-marker"></i> Dirección: Av. Angamos Este 742, LIMA 15047</li>                 
                        </ul>
                        <div class="redes-sociales">
                            <a href="#"><i class="fa-brands fa-facebook fa-2xl"></i></a>
                            <a href="#"><i class="fa-brands fa-whatsapp fa-2xl" style="color: #86e935;"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram fa-2xl" style="color: #cb5cff;"></i></a>
                
                        </div>
                        <div class="col-md-12">
                            <div class="horario">
                                <h2>Horario de atención</h2>
                                <ul>
                                    <li>Lunes a Viernes: 8am - 9pm</li>
                                    <li>Sábados: 9am - 8pm</li>
                                    <li>Domingos: 10am - 6pm</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Pie de pagina -->
    <footer>
		<div class="f1">
			<div class="col col1">
				<h2>Sobre Nosotros</h2>
				<ul>
					<li><a href="terms.php">Preguntas frecuentes</a></li>
					<li><a href="terms.php">Terminos y condiciones</a></li>
				</ul>
			</div>
			<div class="col col2">
				<h2>Sucursales</h2>
				<ul>
					<li>Lima</li>
					<li>Ancash</li>
					<li>Cajamarca</li>
					<li>Arequipa</li>
					<li><a href="">Ver mas...</a></li>
				</ul>
			</div>
			<div class="col col3">
				<h4>¡Llamanos!</h4>
				<ul>
					<li>Lima: (511) 314 2020</li>
					<li>Arequipa: (054) 201565</li>
					<li>Trujillo: (044) 280396</li>
					<li>Chiclayo: (074) 208648</li>
					<li><a href="">Ver mas...</a></li>
				</ul>
			</div>
			<div class="col col4">
				<h4>Redes Sociales</h4>
				<ul>
					<li><a href=""><i class="fa-brands fa-facebook"></i> Facebook</a></li>
					<li><a href=""><i class="fa-brands fa-instagram"></i> Instagram</a></li>
				</ul>
			</div>
		</div>
		<div class="f2">
			<p>Copyright © Inkafarma 2023 Todos los derechos reservados</p>
		</div>
	</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>