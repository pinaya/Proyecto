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
                                <h3 class="text-center text secondary">Caja Master Personalizada</h3>
                                <h6>Descripcion:</h6>
                                <p>Caja multiproposito ideal para envasado de productos secos y tambien usado para
                                    mudanzas.
                                </p>
                                <div class="mb-3">
                                    <input id="ancho" class="redond form-control mt-2" type="number" placeholder="Ancho"
                                        aria-label="default input example">
                                </div>
                                <div class="mb-3">
                                    <input id="largo" class="redond form-control mt-2" type="number" placeholder="Largo"
                                        aria-label="default input example">
                                </div>
                                <div class="mb-3">
                                    <input id="alto" class="redond form-control mt-2" type="number" placeholder="Alto"
                                        aria-label="default input example">
                                </div>

                                <button type="button" id="calcular" class="btn btn-primary">Calcular Precio</button>

                                <input id="total" class="redond form-control mt-2" type="text" placeholder="Total"
                                    aria-label="default input example" readonly>

                                <div class="text-center">
                                    <button type="button" id="solicitar" class="btn btn-success mt-2">Solicitar Pedido</button>
                                </div>
                            </form>

                            <script>
                                let precio = 0;

                                document.getElementById("calcular").addEventListener("click", function () {
                                    let ancho = parseFloat(document.getElementById("ancho").value) || 0;
                                    let largo = parseFloat(document.getElementById("largo").value) || 0;
                                    let alto = parseFloat(document.getElementById("alto").value) || 0;

                                    let base = ancho + largo + alto + 3.5 + 8;
                                    let altura = alto + largo + 8;

                                    let area = base * altura;
                                    precio = area / 700;

                                    document.getElementById("total").value = "Bs. " + precio.toFixed(2);
                                });

                                document.getElementById("solicitar").addEventListener("click", function () {
                                    let ancho = document.getElementById("ancho").value;
                                    let largo = document.getElementById("largo").value;
                                    let alto = document.getElementById("alto").value;

                                    // Texto Caja Master ancho x largo x alto
                                    let descripcion = `Caja Master ${ancho}x${largo}x${alto}`;

                                    // redirigir
                                    window.location.href = `solicitud.php?descripcion=${encodeURIComponent(descripcion)}&precio=${precio.toFixed(2)}`;
                                });
                            </script>

                        </div>
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
                            BABYLON.SceneLoader.Append("assets/3dmodels/", "cajaMaster.glb", scene, function () {
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