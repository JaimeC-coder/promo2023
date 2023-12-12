<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmacion de Asistencia promoción 2023</title>
    <style>
        .texto {
            font-size: 21px;
            font-weight: 800;
            color: #323edf;
            font-family: sans-serif;
            text-transform: uppercase;
        }

        body {
            margin: 0;
            overflow: hidden;
        }

        video {
            position: fixed;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translate(-50%, -50%);
            z-index: -1;
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            color: #000000;
            text-align: center;
        }

        .card {
            width: 450px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            // box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .card-body {
            padding-bottom: 10px;
        }

        .card-footer {
            font-style: italic;
            color: #ccc;
            font-size: 0.9em;
        }

        .confirm-radio {
            margin-top: 15px;
        }

        .boton {
            background-color: #131da7;
            border-radius: 100px;
            color: white;
            padding: 10px 32px;
            margin: 10px 0;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .content-hidden {
            display: none;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

</head>

<body ontouchstart="mostrarAlert()" onclick="mostrarAlert()">

    <video autoplay muted loop>
        <source src="{{ asset('utils/fondo.mp4') }}" type="video/mp4">
        Tu navegador no soporta la etiqueta de video.
    </video>

    <div class="content">
        <div class="card">
            <div class="card-header texto titulo">INVITACIóN</div>
            <div class="card-body">

                <p class="texto" id="mensaje">
                    La promoción "Milagrinos dejando huellas 2023" de la IEP "señor de los milagros", tenemos el agrado
                    de invitar a
                    usted a la fiesta de promoción a realizarse el dia Viernes 15 de diciembre a las 7.pm en el local
                    Costa Brava de esta ciudad
                </p>
                <p class="texto">Te esperamos</p>
                <p class="texto">Por favor confirme su asistencia</p>

                <div class="cont">
                    <label class="texto">
                        <input type="radio" name="confirmacion" value="si" class="confirm-radio" se>
                        Sí, asistiré
                    </label>

                    <label class="texto">
                        <input type="radio" name="confirmacion" value="no" class="confirm-radio">
                        No, asistiré
                    </label>


                </div>

                <div class="cont">
                    <button type="button" class="boton">Enviar</button>

                </div>




            </div>
            <div class="card-footer">
                <p class="texto texto2">Atte: Comite de aula 2023</p>

                <div class="content-hidden">
                    <audio src="{{ asset('utils/example.mp3') }}" id="audio"></audio>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Obtener todos los radio buttons
        const confirmRadios = document.querySelectorAll('.confirm-radio');
        const mensaje = document.getElementById('mensaje');
        const audio = document.getElementById('audio');
        const urlActual = window.location.href;
        const params = window.location.search;
        const param = new URLSearchParams(params);
        const valorInvitado = param.get('invitado');
        window.addEventListener('load', function() {

        });
        confirmRadios.forEach(confirmRadio => {
            // Agregar evento change a cada radio button
            confirmRadio.addEventListener('change', function() {
                // Obtener el valor del radio button seleccionado
                const confirmValue = this.value;

                // Mostrar el valor en consola
                console.log(confirmValue);
            });
        });

        function mostrarAlert() {
            audio.play();
        }
    </script>

</body>

</html>
