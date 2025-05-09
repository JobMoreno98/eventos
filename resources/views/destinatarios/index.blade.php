<x-app-layout>
    @push('styles')
        <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/2.3.0/css/dataTables.bootstrap5.min.css" rel="stylesheet"
            integrity="sha384-xkQqWcEusZ1bIXoKJoItkNbJJ1LG5QwR5InghOwFLsCoEkGcNLYjE0O83wWruaK9" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/buttons/3.2.3/css/buttons.bootstrap5.min.css" rel="stylesheet"
            integrity="sha384-DJhypeLg79qWALC844KORuTtaJcH45J+36wNgzj4d1Kv1vt2PtRuV2eVmdkVmf/U" crossorigin="anonymous">

        <link href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/searchpanes/2.1.0/css/searchPanes.dataTables.min.css" rel="stylesheet">

        <link href="https://cdn.datatables.net/searchpanes/2.3.3/css/searchPanes.bootstrap5.min.css" rel="stylesheet"
            integrity="sha384-kCfL8qIiEo0PgaMnJvqVlxd797OkgozSx5pxn/uCJOY5d99ovqdqU545WcRTbo+m" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/select/3.0.0/css/select.bootstrap5.min.css" rel="stylesheet"
            integrity="sha384-TlxQ7BelG5MWHP/TbW8dDV3/3kwuo6rinsUsoQdbLGPvurwx/DA2Z49RVLIOxVrG" crossorigin="anonymous">


        <style>
            .dataTables_searchPanes table {
                width: 100% !important;
            }

            .dataTables_scroll {
                max-height: 100px !important;
                /* o el tamaño que prefieras */
                overflow-y: auto;
                padding: 10px;
                font-size: 0.9rem;
            }


            .dataTables_scrollBody {
                max-height: 100px !important;
            }
        </style>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Destinatarios
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-3 shadow-xl sm:rounded-lg">
                <div class="text-center">
                    <a href="{{ route('enviar.correos') }}" class="btn btn btn-success">Enviar correos</a>
                </div>
                <table class="display w-100" id="destinatarios">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th>Correo</th>
                            <th>Asistencia</th>
                            <th>Enviado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($destinatarios as $item)
                            <tr>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->cargo }}</td>
                                <td>{{ $item->correo }}</td>
                                <td>{{ $item->asistencia }}</td>
                                <td>{{ $item->enviado == 0 ? 'Sin enviar' : 'Enviado' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('scripts')
        <!-- jQuery -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"
            integrity="sha384-+mbV2IY1Zk/X1p/nWllGySJSUN8uMs+gUAN10Or95UBH0fpj6GfKgPmgC5EXieXG" crossorigin="anonymous">
        </script>
        <script src="https://cdn.datatables.net/2.3.0/js/dataTables.min.js"
            integrity="sha384-ehaRe3xJ0fffAlDr3p72vNw3wWV01C1/Z19X6s//i6hiF8hee+c+rabqObq8YlOk" crossorigin="anonymous">
        </script>
        <script src="https://cdn.datatables.net/2.3.0/js/dataTables.bootstrap5.min.js"
            integrity="sha384-G85lmdZCo2WkHaZ8U1ZceHekzKcg37sFrs4St2+u/r2UtfvSDQmQrkMsEx4Cgv/W" crossorigin="anonymous">
        </script>
        <script src="https://cdn.datatables.net/buttons/3.2.3/js/dataTables.buttons.min.js"
            integrity="sha384-zlMvVlfnPFKXDpBlp4qbwVDBLGTxbedBY2ZetEqwXrfWm+DHPvVJ1ZX7xQIBn4bU" crossorigin="anonymous">
        </script>
        <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.bootstrap5.min.js"
            integrity="sha384-BdedgzbgcQH1hGtNWLD56fSa7LYUCzyRMuDzgr5+9etd1/W7eT0kHDrsADMmx60k" crossorigin="anonymous">
        </script>
        <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.html5.min.js"
            integrity="sha384-+E6fb8f66UPOVDHKlEc1cfguF7DOTQQ70LNUnlbtywZiyoyQWqtrMjfTnWyBlN/Y" crossorigin="anonymous">
        </script>
        <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.print.min.js"
            integrity="sha384-FvTRywo5HrkPlBKFrm2tT8aKxIcI/VU819roC/K/8UrVwrl4XsF3RKRKiCAKWNly" crossorigin="anonymous">
        </script>

        <script src="https://cdn.datatables.net/searchpanes/2.3.3/js/dataTables.searchPanes.min.js"
            integrity="sha384-sUuBv4oZPlATC6Uuta8hZSx3oiTAet53rbLe+vHVcTbupVepb13xKgdB4jYsm/oh" crossorigin="anonymous">
        </script>
        <script src="https://cdn.datatables.net/searchpanes/2.3.3/js/searchPanes.bootstrap5.min.js"
            integrity="sha384-lSurcF2KnvB8sCKtogfFCwJO4ZENtGvi0S5C4v6t9qh4R46oqvc3CEzcm2L/YIVg" crossorigin="anonymous">
        </script>
        <script src="https://cdn.datatables.net/select/3.0.0/js/dataTables.select.min.js"
            integrity="sha384-Y/112jU1UJsyj7J/WhficUVfFZTLF2TgmBuDHBvJmYS8f+dGaz3ZNKxgwcg4YgP9" crossorigin="anonymous">
        </script>



        <script>
            $('#destinatarios').DataTable({
                pageLength: 10,
                order: [
                    [0, "asc"]
                ],
                dom: 'BPlfrtip',
                searchPanes: {
                    cascadePanes: true,
                    viewTotal: true,
                },
                columnDefs: [{
                    searchPanes: {
                        show: true
                    },
                    targets: [3, 4]
                }],
                select: true,
                language: {
                    sProcessing: "Procesando...",
                    sLengthMenu: "Mostrar _MENU_ registros",
                    sZeroRecords: "No se encontraron resultados",
                    sEmptyTable: "Ningún dato disponible en esta tabla",
                    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                    sSearch: "Buscar:",
                    oPaginate: {
                        sFirst: "Primero",
                        sLast: "Último",
                        sNext: "Siguiente",
                        sPrevious: "Anterior"
                    },
                    oAria: {
                        sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                        sSortDescending: ": Activar para ordenar la columna de manera descendente"
                    }
                },
                responsive: true,
                buttons: [{
                    extend: 'excelHtml5',
                    title: 'Destinatarios',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                }]
            });
        </script>
    @endpush


</x-app-layout>
