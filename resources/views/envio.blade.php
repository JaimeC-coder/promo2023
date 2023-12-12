<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e466ec6b27.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container p-4">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                <h2 class="text-center text-uppercase"> Registro de invitados a la promoción 2023 </h2>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-8 mb-3 mx-auto">
                <div class="card">
                    <div class="card-header text-center text-black text-uppercase font-weight-bold bg-info">
                        <strong class="text-center font-weight-bold">Registro de invitados</strong>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label text-uppercase">
                                INGRESE EL NOMBRE DEL INVITADO
                            </label>
                            <input type="text" class="form-control" id="nombre" placeholder="NOMBRE DEL INVITADO">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label text-uppercase">
                                INGRESE EL NUMERO DE TELEFONO
                            </label>
                            <input type="number" class="form-control" id="numero" placeholder="NUMERO DE TELEFONO">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label text-uppercase">
                                ELIJA EL TIPO DE INVITADO
                            </label>
                            <select class="form-select" aria-label="Default select example" id="tipo">
                                <option selected value="">SELECCIONE UNA OPCION</option>
                                <option value="profesor">PROFESOR</option>
                                <option value="familia">FAMILIAR DE ALUMNO</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="button" class="btn btn-success btn-block" id="envio">
                            REGISTRAR INVITADO
                        </button>
                        <button type="button" class="btn btn-danger btn-block" id="cancelar">
                            CANCELAR
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @if ($url != null)
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                    {{-- card para poner y copiar contenido --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-sm-12 col-md-12 col-lg-11">
                                    <input type="text" class="form-control" id="link"
                                        value="{{ $url }}" readonly>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-1">
                                    <button class="btn btn-light btn-block" onclick="copiarLink()">
                                        <i class="fa-solid fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tabla">
                <thead class="table-info">
                    <tr class="text-center">
                        <th scope="col">Nombre del Invitado</th>
                        <th scope="col">Numero </th>
                        <th>Copiar Msg</th>
                        <th scope="col">Asistencia</th>
                    </tr>
                </thead>
                <tbody class="table-light" id="tbody">
                    @if (count($admins) == 0)
                        <tr class="text-center">
                            <td colspan="3" class="text-center">Aun no hay invitados </td>
                        </tr>
                    @else
                        @foreach ($admins as $items)
                            <tr class="text-center">
                                <td>{{ $items->nombre }}</td>
                                <td>{{ $items->numero }}</td>
                                <td>
                                    <button class="btn btn-light btn-block" onclick="copiar('{{ $items->url }}')">
                                        <i class="fa-solid fa-copy"></i>
                                    </button>
                                </td>
                                <td>
                                    @if ($items->asistencia == null)
                                        <span class="badge bg-danger p-2">No confirmado</span>
                                    @else
                                        {{ $items->asistencia }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tabla').DataTable({
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, 'Todos']
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                }
            });
        });
        const ENVIO = document.getElementById('envio');
        const NOMBRE = document.getElementById('nombre');
        const NUMERO = document.getElementById('numero');
        const TIPO = document.getElementById('tipo');
        const CANCELAR = document.getElementById('cancelar');

        NOMBRE.addEventListener('keyup', () => {
            NOMBRE.value = NOMBRE.value.toUpperCase();
            console.log(NOMBRE.value);
        });

        // Numero tiene que ser de 9 digitos y no mas
        NUMERO.addEventListener('keyup', () => {
            if (NUMERO.value.length > 9) {
                NUMERO.value = NUMERO.value.slice(0, 9);
            }
        });

        ENVIO.addEventListener('click', () => {
            const nombre = NOMBRE.value;
            const numero = NUMERO.value;
            const tipo = TIPO.value;
            if (numero.length !== 9) {
                Swal.fire({
                    icon: "warning",
                    title: "Atencion",
                    text: "El numero debe ser de 9 digitos"
                });
            } else {
                if (nombre.length > 0 && (numero.length > 0) && tipo.selected != 0) {
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
                            const {
                                info,
                                message,
                                invitado
                            } = data;
                            if (data.success) {
                                Swal.fire({
                                    title: "Buen trabajo",
                                    text: message,
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false
                                }).then(() => {
                                    window.location.href = '/admin?link=true&invitado=' + invitado;
                                });
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
                        icon: "warning",
                        title: "Atencion",
                        text: "No puede dejar campos vacios"
                    });
                }
            }
        });
        function copiar(msg) {
            const link = document.createElement('textarea');
            link.value = msg;
            document.body.appendChild(link);
            link.select();
            link.setSelectionRange(0, 99999);
            document.execCommand('copy');
            Swal.fire({
                text: "Link copiado",
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                document.body.removeChild(link);
            });
        }
        function copiarLink() {
            const link = document.getElementById('link');
            link.select();
            link.setSelectionRange(0, 99999);
            document.execCommand('copy');
            Swal.fire({
                text: "Link copiado",
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = '/admin';
            });
        }
        CANCELAR.addEventListener('click', () => {
            NOMBRE.value = '';
            NUMERO.value = '';
            TIPO.value = '';
        });
    </script>
</body>

</html>
