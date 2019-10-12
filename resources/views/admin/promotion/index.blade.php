@extends("layouts.admin")

@section('title', __('app.promotion'))

@section('content')
    <div class="container">
        <div style="margin-bottom: 20px;">
            <a class="btn btn-light btn-sm" href="{{ url('/admin') }}" role="button"><div class="fa fa-arrow-circle-left" style="margin-right: 10px;"></div>{{ __('app.back') }}</a>
        </div>

        <h2>{{__('app.main_promotion') }}</h2>
        <div id="tbCt" style="text-align:right;"></div>
        <div id="grid" style="height: 300px;"></div>
        <br/>
        <h2>{{ __('app.second_promotion') }}</h2>
        <div id="tbCt2" style="text-align:right;"></div>
        <div id="grid2" style="height: 300px;"></div>

        <div style="margin-top: 20px;">
            <a class="btn btn-light btn-sm" href="{{ url('/admin') }}" role="button"><div class="fa fa-arrow-circle-left" style="margin-right: 10px;"></div>{{ __('app.back') }}</a>
        </div>
    </div>
@endsection



@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            var dataSource = utils.createKendoDataSource({
                type: 'aspnetmvc-ajax',
                pageSize: 5,
                transport: {
                    read: "{{ route('promotion.readMain', [App::getLocale()]) }}",
                },
                schema: {
                    data: "Data",
                    total: "Count",
                    model: {
                        id: "id",
                        fields: {}
                    }
                }
            });
            var dataView = utils.createKendoGrid("#grid",
                {
                    columns: [{
                        title: "{{ __('app.title') }}",
                        field: "title_{{App::getLocale()}}",
                        filterable: false
                    }, {
                        title: "{{ __('app.date') }}",
                        field: "created_at",
                        filterable: false
                    }, {
                        width: 120,
                        command: [
                            {
                                name: "edit",
                                template: " <a class='k-grid-edit btn btn-default btn-sm fa fa-pencil-square-o' style='height:12px;' title='{{ __('app.edit') }}'></a>",
                                click: function (e) {
                                    e.preventDefault();
                                    var tr = $(e.target).closest("tr");
                                    var data = this.dataItem(tr);

                                    var href = "{{route("promotion.edit",[App::getLocale(), 0])}}";
                                    location.href = href.replace('0' , data.id);
                                }
                            },
                            {
                                name: "rem",
                                template: " <a class='k-grid-rem btn btn-default btn-sm fa fa-trash' style='height:16px;' title='{{ __('app.delete') }}'></a>",
                                click: function (e) {
                                    e.preventDefault();
                                    var tr = $(e.target).closest("tr");
                                    var data = this.dataItem(tr);
                                    AppointmentConfirm(data.id);
                                }
                            }]
                    }
                    ],
                    dataSource: dataSource,
                    columnMenu: false
                });

            var tb = utils.createKendoToolBar("#tbCt", {
                dataSource: dataSource,
                dataModel: {},
                dataView: dataView
            });

            tb.add({
                type: "button",
                spriteCssClass: "fa fa-plus",
                text: "{{ __('app.add') }}",
                attributes: {"title": "{{ __('app.add') }}"},
                click: function () {
                    location.href = "{{route("promotion.create", [App::getLocale(), "type"=>"main"])}}";
                }
            });
            tb.addRefreshBtn();
            tb.resize();


            var dataSource2 = utils.createKendoDataSource({
                type: 'aspnetmvc-ajax',
                pageSize: 5,
                transport: {
                    read: "{{ route('promotion.read', [App::getLocale()]) }}",
                },
                schema: {
                    data: "Data",
                    total: "Count",
                    model: {
                        id: "id",
                        fields: {}
                    }
                }
            });
            var dataView2 = utils.createKendoGrid("#grid2",
                {
                    columns: [{
                        title: "{{ __('app.title') }}",
                        field: "title_{{App::getLocale()}}",
                        filterable: false
                    }, {
                        title: "{{ __('app.date') }}",
                        field: "created_at",
                        filterable: false
                    }, {
                        width: 120,
                        command: [
                            {
                                name: "edit",
                                template: " <a class='k-grid-edit btn btn-default btn-sm fa fa-pencil-square-o' style='height:12px;' title='{{ __('app.edit') }}'></a>",
                                click: function (e) {
                                    e.preventDefault();
                                    var tr = $(e.target).closest("tr");
                                    var data = this.dataItem(tr);
                                    var href = "{{route("promotion.edit",[App::getLocale(), 0])}}";
                                    location.href = href.replace('0' , data.id);
                                }
                            },
                            {
                                name: "rem",
                                template: "<a class='k-grid-rem btn btn-default btn-sm fa fa-trash' style='height:16px;' title='{{ __('app.delete') }}'></a>",
                                click: function (e) {
                                    e.preventDefault();
                                    var tr = $(e.target).closest("tr");
                                    var data = this.dataItem(tr);
                                    AppointmentConfirm(data.id);
                                }
                            }]
                    }
                    ],
                    dataSource: dataSource2,
                    columnMenu: false
                });

            var tb2 = utils.createKendoToolBar("#tbCt2", {
                dataSource: dataSource2,
                dataModel: {},
                dataView: dataView2
            });

            tb2.add({
                type: "button",
                spriteCssClass: "fa fa-plus",
                text: "{{ __('app.add') }}",
                attributes: {"title": "{{ __('app.add') }}"},
                click: function () {
                    location.href = "{{route("promotion.create", [App::getLocale(), "type"=>"second"])}}";
                }
            });
            tb2.addRefreshBtn();
            tb2.resize();

            window.AppointmentConfirm = function(appointmentId) {
                alertify.confirm("{{ __('app.promotion_delete_confirm') }} ",
                function(r) {
                    var href = "{{route("promotion.destroy",[App::getLocale(), "@#id"])}}";

                    if (r) {
                        utils.ajax({
                            method: 'post',
                            url: href.replace("@#id" , appointmentId),
                            data: { _method: "delete", _token: window._token},
                            success: function(result) {
                                if (result.success) {
                                    dataSource.read();
                                    dataSource2.read();
                                    alertify.log("{{ __('app.promotion_delete_success') }}");
                                }
                            }
                        });
                    }
                });
            };
        });
    </script>
@endpush