<x-app-layout>
    @push('styles')
        <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/searchpanes/2.1.0/css/searchPanes.dataTables.min.css" rel="stylesheet">
        <style>
            .dtsp-searchPanes {
                width: 250px !important;
                /* Ajusta el tamaño a lo que necesites */
            }

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
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($destinatarios as $item)
                            <tr>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->cargo }}</td>
                                <td>{{ $item->correo }}</td>
                                <td>{{ $item->asistencia }}</td>
                                <td>Editar</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('scripts')
        <!-- jQuery -->
        <!-- DataTables Core -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

        <!-- Extensions -->
        <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
        <script src="https://cdn.datatables.net/searchpanes/2.1.0/js/dataTables.searchPanes.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>


        <script>
            $('#destinatarios').DataTable({
                pageLength: 10,
                order: [
                    [0, "asc"]
                ],
                dom: 'Plfrtip',
                searchPanes: {
                    cascadePanes: true,
                    viewTotal: true,
                    layout: 'columns-1'
                },
                columnDefs: [{
                    searchPanes: {
                        show: true
                    },
                    targets: [3]
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
