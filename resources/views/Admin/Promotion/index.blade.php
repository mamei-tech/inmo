@extends("layouts.admin")

@section('content')
    <div class="container">
        <h2>Promociones</h2>
        <div id="tbCt" style="text-align:right;"></div>
        <div id="grid" style="height: 600px;"></div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var model = {
                Title: ''
            };

            var fieldsCfg = {
                Id: {},
                Code: {},
                //updated_at: { type: "date" }
            };

            var schemaCfg = {
                data: "Data",
                total: "Count",
                //errors: "Errors",
                model: {
                    id: "Id",
                    fields: fieldsCfg
                }
            };
            var dataSource = utils.createKendoDataSource({
                type: 'aspnetmvc-ajax',
                transport: {
                    read: "{{ route('promotion.read', [App::getLocale()]) }}",
                },
                schema: schemaCfg
            });
            var dataView = utils.createKendoGrid("#grid",
                {
                    columns: [{
                        title: "Titulo [ES]",
                        field: "title_es",
                        filterable: false
                    }, {
                        title: "Titulo [EN]",
                        field: "title_en",
                        filterable: false
                    }, {
                        title: "Fecha",
                        field: "updated_at",
                        filterable: false
                    }, {
                        width: 160,
                        command: [
                            {
                                name: "det",
                                template: "<a class='k-grid-det btn btn-default btn-sm pe-7s-info' title='Detalles'>D</a> ",
                                click: function (e) {
                                    e.preventDefault();
                                    var tr = $(e.target).closest("tr");
                                    var data = this.dataItem(tr);
                                    location.href = window._baseUrl + "Countries/Details/" + data.Id;
                                }
                            },
                            {
                                name: "edit",
                                template: " <a class='k-grid-edit btn btn-default btn-sm pe-7s-note' title='Editar'>E</a>",
                                click: function (e) {

                                    e.preventDefault();
                                    var tr = $(e.target).closest("tr");
                                    var data = this.dataItem(tr);
                                    location.href = window._baseUrl + "Countries/Edit/" + data.Id;
                                }
                            },
                            {
                                name: "rem",
                                template: " <a class='k-grid-rem btn btn-danger btn-sm pe-7s-trash' title='Eliminar'>R</a>",
                                click: function (e) {
                                    e.preventDefault();
                                    var tr = $(e.target).closest("tr");
                                    var data = this.dataItem(tr);
                                    location.href = window._baseUrl + "Countries/Delete/" + data.Id;
                                }
                            }]
                    }
                    ],
                    dataSource: dataSource,
                    columnMenu: false
                });

            var tb = utils.createKendoToolBar("#tbCt", {
                dataSource: dataSource,
                dataModel: model,
                dataView: dataView
            });

            tb.addRefreshBtn();
            tb.resize();
        });

    </script>
@endpush