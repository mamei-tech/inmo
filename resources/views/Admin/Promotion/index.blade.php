@extends("layouts.admin")

@section('content')
    <div class="container">
        <h2>Promociones principales</h2>
        <div id="tbCt" style="text-align:right;"></div>
        <div id="grid" style="height: 300px;"></div>
        <br/>
        <h2>Promociones secundarias</h2>
        <div id="tbCt2" style="text-align:right;"></div>
        <div id="grid2" style="height: 300px;"></div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            var dataSource = utils.createKendoDataSource({
                type: 'aspnetmvc-ajax',
                pageSize: 10,
                transport: {
                    read: "{{ route('promotion.readMain', [App::getLocale()]) }}",
                },
                schema: {
                    data: "Data",
                    total: "Count",
                    model: {
                        id: "Id",
                        fields: {}
                    }
                }
            });
            var dataView = utils.createKendoGrid("#grid",
                {
                    columns: [{
                        title: "Titulo [{{App::getLocale()}}]",
                        field: "title_{{App::getLocale()}}",
                        filterable: false
                    }, {
                        title: "Fecha",
                        field: "created_at",
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
                dataModel: { },
                dataView: dataView
            });

            tb.add({
                type: "button",
                spriteCssClass: "fa fa-plus",
                text: "Adicionar",
                attributes: {"title": "Nuevo"},
                click: function () {
                    location.href="{{route("promotion.create", [App::getLocale(), "type"=>"main"])}}";
                }
            });
            tb.addRefreshBtn();
            tb.resize();



            var dataSource2 = utils.createKendoDataSource({
                type: 'aspnetmvc-ajax',
                pageSize: 10,
                transport: {
                    read: "{{ route('promotion.read', [App::getLocale()]) }}",
                },
                schema: {
                    data: "Data",
                    total: "Count",
                    model: {
                        id: "Id",
                        fields: {}
                    }
                }
            });
            var dataView2 = utils.createKendoGrid("#grid2",
                {
                    columns: [{
                        title: "Titulo [{{App::getLocale()}}]",
                        field: "title_{{App::getLocale()}}",
                        filterable: false
                    }, {
                        title: "Fecha",
                        field: "created_at",
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
                    dataSource: dataSource2,
                    columnMenu: false
                });

            var tb2 = utils.createKendoToolBar("#tbCt2", {
                dataSource: dataSource2,
                dataModel: { },
                dataView: dataView2
            });

            tb2.add({
                type: "button",
                spriteCssClass: "fa fa-plus",
                text: "Adicionar",
                attributes: {"title": "Nuevo"},
                click: function () {
                    location.href="{{route("promotion.create", [App::getLocale(), "type"=>"second"])}}";
                }
            });
            tb2.addRefreshBtn();
            tb2.resize();


        });

    </script>
@endpush