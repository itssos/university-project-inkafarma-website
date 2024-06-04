

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inkafarma | Sobre nosotros</title>
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/831507abf0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel='stylesheet' type='text/css' href='css/about.css'>
</head>

<body>

    <?php require_once("assets/template/navbar.php"); ?>

    <main>     
    <div id="NSlider">

        <ul class="slider">
            <li id="slide1">
                <img src="img/slider02.jpg" />
            </li>
            <li id="slide2">
                <img src="img/slider01.jpg" />
            </li>
            <li id="slide3">
                <img src="img/slider03.jpg" />
            </li>
        </ul>

        <ul class="menuSlider">
            <li>
                <a href="#slide1">1</a>
            </li>
            <li>
                <a href="#slide2">2</a>
            </li>
            <li>
                <a href="#slide3">3</a>
            </li>
        </ul>

    </div>

    


    <div class="nosotros">    
        <div class="historia">   
            <div class="historia-contenido">
                <h3>HISTORIA</h3>
                <div class="historia-contenido__text">
                    <img src="img/historia.jpeg" alt="">        
                    <p>Inkafarma es una cadena de farmacias en Perú fundada en 1994. 
                        Desde entonces, ha experimentado un crecimiento significativo,
                        expandiendo su presencia en todo el país. En 2012, fue adquirida
                        por el grupo Intercorp, una de las mayores empresas peruanas,
                        lo que permitió una mayor inversión en tecnología y mejoras
                        en el servicio al cliente. En la actualidad, Inkafarma
                        cuenta con más de 1,200 tiendas y es una de las cadenas
                        de farmacias más grandes y reconocidas en Perú, ofreciendo
                        una amplia gama de productos y servicios farmacéuticos y
                        de cuidado personal.</p>
                </div>
            </div>
        </div>       
        <div class="valores">        
            <div class="valores-contenido">
                <h3>NUESTROS VALORES</h3>    
                <div class="valores-contenido__text">
                    <p>Nuestros valores incluyen integridad, orientación al cliente,
                        trabajo en equipo, innovación, responsabilidad social y compromiso.
                        Nuestra empresa se esfuerza por mantener altos estándares éticos y
                        de transparencia, priorizando la satisfacción del cliente y 
                        promoviendo la colaboración y el trabajo en equipo. Inkafarma
                        busca ser una empresa innovadora, comprometida con el bienestar
                        social y ambiental, y con una constante mejora en su servicio al
                        cliente para mantener su liderazgo en el mercado farmacéutico peruano.</p>
                    <img src="img/valores.jpeg" alt="">
                </div> 
            </div>
        </div>

    
    </div>
    </main>

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