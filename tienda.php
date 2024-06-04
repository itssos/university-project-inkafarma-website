<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inkafarma | Tienda</title>
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/831507abf0.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    require_once("assets/template/navbar.php");
    require_once("controller/ProductController.php")
    ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.ctfassets.net/l9x8e72nkkav/3WmIgSv2uAGwnDjeifQ1N1/59941c3346ec094ac03a43881a0d004f/inka_web_slide_CyberInka_3-promos-dermo.jpg"
                    class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="https://images.ctfassets.net/l9x8e72nkkav/282jQzrLIE554PfKBPJDP1/bbf1626e11cf7d196903149509b29c60/inka_web_slide_CyberInka_3-promos-cp.jpg"
                    class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="https://images.ctfassets.net/l9x8e72nkkav/75CPqw0k4QU89CfhRzkAjC/36893644c235ce78350b0c8c71cc0d9b/inka_web_slide_CyberInka_2-promos-ci.gif"
                    class="d-block w-100" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- TIENDA ------------------------------------------------------- -->

    <div class="container mt-5">
        <div class="container-items row">
        <?php
        foreach($matrizProducts as $p){
            if (isset($p["img"]) && filter_var($p["img"], FILTER_VALIDATE_URL)) {
                $i = $p["img"];
            } else {
                $i= "assets/img/no-image.jpg"; // URL predeterminada para imagen no disponible
            }
            if($p["Estado"]==1){
                echo '
            <div class="col-sm-4 mt-3">
                <div class="card">
                    <img src="'.$i.'"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">'.$p["Nombre"].'</h5><p class="price">s/'.$p["Precio"].'</p>
                        <p class="card-text">'.$p["Descripcion"].'</p>
                        <button class="btn btn-primary btn-add-cart">Agregar al carrito</button>
                    </div>
                </div>
            </div>
            ';
            }
        }
        
        ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

        <script src="js/cart.js"></script>
</body>

</html>