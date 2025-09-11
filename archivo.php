<!DOCTYPE html>
<html lang="en">

<head>
    <title>CONCARTON A.J. LTDA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">

</head>

<body>
    <?php
    include_once("panel_superior.php");
    ?>
    <?php
    include_once("header.php");
    ?>

    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card">

                        <div class="card-body">

                            <form id="formulario">
                                <h1 class="h3">CAJA PARA ARCHIVOS</h1>
                                <p class="h3 py-2">Bs. 21.35 / unid</p>

                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <h6>Tamaño:</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="text-muted"><strong>26x40x30 (ancho x largo x alto)</strong></p>
                                    </li>
                                    <h6>Descripcion:</h6>
                                    <p>Ideal para guardar documentos y otros archivos fisicos.
                                    </p>

                                </ul>


                                <input id="cantidad" class="redond form-control mt-2" type="number"
                                    placeholder="Cantidad requerida" aria-label="default input example">
                                <button id="btnCalcular" type="button" class="btn btn-primary mt-2">Calcular
                                    Precio</button>

                                <input id="total" class="form-control mt-2" type="text" placeholder="Total"
                                    aria-label="default input example" readonly>
                            </form>
                            <div class="text-center">
                                <button class="btn btn-success mt-2"
                                    onclick="window.location.href='solicitud_abierta.php'">Solicitar Pedido</button>
                            </div>
                        </div>
                        <script>
                            document.getElementById("btnCalcular").addEventListener("click", function () {
                                const cantidad = parseFloat(document.getElementById("cantidad").value) || 0;
                                const precioUnitario = 21.35;
                                const total = (cantidad * precioUnitario).toFixed(2); // redondear a 2 decimales
                                document.getElementById("total").value = "Bs. " + total;
                            });
                        </script>
                    </div>
                </div>

                <div class="col-lg-7 mt-5">
                    <!--ARCHIVO 3D-->

                    <div id="renderCanvasContainer">
                        <canvas id="renderCanvas" style="width: 100%; height: 400px;"></canvas>
                    </div>
                    <script src="https://cdn.babylonjs.com/babylon.js"></script>
                    <script src="https://cdn.babylonjs.com/loaders/babylon.glTF2FileLoader.min.js"></script>
                    <script>
                        // Seleccionar el canvas para renderizar el modelo
                        const canvas = document.getElementById("renderCanvas");

                        // Crear el motor de renderizado
                        const engine = new BABYLON.Engine(canvas, true);

                        // Crear la escena
                        const createScene = () => {
                            const scene = new BABYLON.Scene(engine);

                            // Crear una cámara y posicionarla
                            const camera = new BABYLON.ArcRotateCamera("camera", Math.PI / 1, Math.PI / 4, 13, BABYLON.Vector3.Zero(), scene);
                            camera.attachControl(canvas, true);

                            // Agregar luz a la escena
                            const light = new BABYLON.HemisphericLight("light", new BABYLON.Vector3(1, 1, 0), scene);

                            // Cargar el modelo GLB
                            BABYLON.SceneLoader.Append("assets/3dmodels/", "cajaArchivo.glb", scene, function () {
                                console.log("Modelo cargado exitosamente");
                            }, null, function (scene, message) {
                                console.error("Error al cargar el modelo:", message);
                            });
                            return scene;
                        };

                        const scene = createScene();
                        // Renderizar la escena
                        engine.runRenderLoop(() => {
                            scene.render();
                        });

                        // Ajustar el canvas al redimensionar la ventana
                        window.addEventListener("resize", () => {
                            engine.resize();
                        });
                        scene.clearColor = new BABYLON.Color4(0.24, 0.35, 0.47, 1); // Cambia el fondo a un azul mate

                    </script>

                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <?php
    include_once("footer.php");
    ?>

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            }
            ]
        });
    </script>
    <!-- End Slider Script -->

</body>

</html>