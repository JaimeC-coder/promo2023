<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmacion de Asistencia promoción 2023</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap');

        *,
        *:after,
        *:before {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            font-weight: 400;
            line-height: 1.5em;
            color: #000000;
            background: #000000;
        }

        .wrapper {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #000000;
            opacity: 0.5;
            z-index: -1;
        }

        .texto {

            font-size: 1.2em;
            font-weight: 500;
            color: #fffdfd;
            text-transform: uppercase;
            line-height: 1.5em;
            letter-spacing: 3px;
            width: 100%;
        }

        video {
            position: fixed;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -2;
        }

        .content {
            z-index: 1;
            color: #000000;
            text-align: center;
        }

        .card {
            width: 100%;
            margin: 0 auto;
            padding: 20px 40px;
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); */
        }

        .card-header {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .card-body {
            padding: 20px;
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
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            font-size: 1.2em;
            cursor: pointer;
            border-radius: 5px;

        }

        .content-hidden {
            display: none;
        }

        .titulo {
            font-size: 2em;
        }

        .cont {
            display: flex;
            justify-content: center;
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

    <div class="wrapper">
        <div class="bg"></div>
        <video autoplay muted loop class="video">
            <source src="{{ asset('utils/fondo.mp4') }}" type="video/mp4">
            Tu navegador no soporta la etiqueta de video.
        </video>

        <div class="content">
            <div class="card">
                <div class="card-header texto titulo">INVITACIóN</div>
                <div class="card-body">
                    <p class="texto" id="mensaje">
                        La promoción "Milagrinos dejando huellas 2023" de la IEP "señor de los milagros", tenemos el
                        agrado
                        de invitar a
                        usted a la fiesta de promoción a realizarse el dia Viernes 15 de diciembre a las 7.pm en el
                        local
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
