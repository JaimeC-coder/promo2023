<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Include a required theme -->
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <title>Document</title>
</head>

<body>

    <div class="container">
        <h1 class="text-center"> Registro de invitados a la promoción 2023 </h1>


        <div class="table-responsive">
            <table class="table table-info">
                <thead>
                    <tr>
                        <th scope="col">Nombre del Invitado</th>
                        <th scope="col">Numero </th>
                        <th scope="col">Asistencia</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($invitados))
                        <tr>
                            <td colspan="3" class="text-center">Aun no hay invitados </td>
                        </tr>
                    @else

                        @foreach ($admins as $items)
                        <tr>
                            <td>{{ $items->nombre }}</td>
                            <td>{{ $items->numero }}</td>
                            <td>{{ $items->asistencia }}</td>
                        </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>


    <div class="container">

        <div class="card">
            <div class="card-header">Registro de invitados a la promoción 2023</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Ingrese el nombre del invitado</label>
                    <input type="text" class="form-control" id="nombre" placeholder="invitado">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Ingrese el numero del invitado</label>
                    <input type="text" class="form-control" id="numero" placeholder="999999999">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Ingrese el Tipo de invitado</label>
                    <select class="form-select" aria-label="Default select example" id="tipo">
                        <option selected>Seleccione el tipo de invitado</option>
                        <option value="profesor">Profesor</option>
                        <option value="familia">Familia del Alumno</option>
                    </select>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="button" class="btn btn-primary" id="envio">Primary</button>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <script>
        const ENVIO = document.getElementById('envio');
        const NOMBRE = document.getElementById('nombre');
        const NUMERO = document.getElementById('numero');
        const TIPO = document.getElementById('tipo');

        ENVIO.addEventListener('click', () => {
            const nombre = NOMBRE.value;
            const numero = NUMERO.value;
            const tipo = TIPO.value;

            if (nombre.length > 0 && numero.length > 0 && tipo.selected != 0) {
                const datos = new FormData();
                datos.append('nombre', nombre);
                datos.append('numero', numero);
                datos.append('tipo', tipo);
                datos.append('_token', '{{ csrf_token() }}');

                fetch('/envio', {
                        method: 'POST',
                        body: datos
                    })
                    .then(res => res.json())
                    .then(data => {
                        console.log(data);
                        if (data.data === 'ok') {
                            Swal.fire({
                                title: "Buen trabajo",
                                text: "Registro exitoso",
                                icon: "success"
                            });
                        //    location.reload();
                        } else {
                            Swal.fire({
                                title: "Oops...",
                                text: "Algo salio mal",
                                icon: "warning"
                            });
                        }
                    })
                    .catch(err => console.log(err));
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "No puede dejar campos vacios"
                });
            }
        });
    </script>
</body>

</html>
