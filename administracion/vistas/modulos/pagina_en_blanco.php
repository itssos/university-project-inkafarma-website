
<?php require_once "modelos/conexionBD.php"; ?>

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Inicio</a>
                    </li>
                    <li class="breadcrumb-item">
                        Dashboard
                    </li>
                </ol>
            </div>
        </div>
    </div>

</section>

<section class="content">

    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div> -->

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Ganancias (Mensuales)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                        $stmt = Conexion::conectar()->prepare("SELECT SUM(Total) FROM ventas WHERE MONTH(Fecha) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH);");
                                        $stmt->execute();
                                        echo 's/'.json_encode($stmt->fetchColumn());
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Ganancias (Anuales)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                        $stmt = Conexion::conectar()->prepare("SELECT SUM(Total) FROM ventas;");
                                        $stmt->execute();
                                        echo 's/'.json_encode($stmt->fetchColumn());
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ventas
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <?php
                                                $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM ventas;");
                                                $stmt->execute();
                                                echo json_encode($stmt->fetchColumn());
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Usuarios</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM usuarios;");
                                        $stmt->execute();
                                        echo json_encode($stmt->fetchColumn());
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7 mx-auto">
                <div class="card shadow mb-4">
                    <!-- Card Body -->
                    <center class="mt-1">Tabla</center>
                    <div class="card-body col-12">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->


</section>

<?php

$stmt = Conexion::conectar()->prepare("SELECT Fecha FROM ventas");
$stmt->execute();
$datosVentas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$ventasPorMes = array_fill(0, 12, 0); 

foreach ($datosVentas as $venta) {
    $fecha = new DateTime($venta['Fecha']);
    $mes = $fecha->format('n') - 1; // Obtener el mes (enero = 0, febrero = 1, etc.)
    $ventasPorMes[$mes]++; // Incrementar la cantidad de ventas para el mes correspondiente
}

$ventasPorMesJSON = json_encode($ventasPorMes);

// $ventasEnero = 10; // Aquí reemplaza con tus datos reales de ventas de enero
// $ventasFebrero = 5; // Aquí reemplaza con tus datos reales de ventas de febrero
// $ventasMarzo = 8; 
// $datosVentas = [$ventasEnero, $ventasFebrero, $ventasMarzo];
// $datosVentasJSON = json_encode($datosVentas);

 

?>

<script>
const ctx = document.getElementById('myAreaChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets: [
            {
                label: '# de Ventas',
                data: <?php echo $ventasPorMesJSON;?>,
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
