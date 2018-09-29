@extends("layouts.admin")

@section('title', __('app.slider'))

@section('content')
    <div class="container">
        <h2>{{__('app.slider') }}</h2>
        <div id="tbCt" style="text-align:right;"></div>
        <div id="grid" style="height: 470px;"></div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            var dataSource = utils.createKendoDataSource({
                type: 'aspnetmvc-ajax',
                pageSize: 10,
                transport: {
                    read: "{{ route('slider.read', [App::getLocale()]) }}",
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
                        title: "{{ __('app.subtitle') }}",
                        field: "subtitle_{{App::getLocale()}}",
                        filterable: false
                    }, {
                        width: 250,
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

                                    var href = "{{route("slider.edit",[App::getLocale(), 0])}}";
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
                    location.href = "{{route("slider.create", [App::getLocale()])}}";
                }
            });
            tb.addRefreshBtn();
            tb.resize();

            window.AppointmentConfirm = function(sliderId) {
                alertify.confirm("{{ __('app.slider_delete_confirm') }} ",
                function(r) {
                    var href = "{{route("slider.destroy",[App::getLocale(), "@#id"])}}";

                    console.log(href.replace("@#id" , sliderId));
                    if (r) {
                        utils.ajax({
                            method: 'post',
                            url: href.replace("@#id" , sliderId),
                            data: { _method: "delete", _token: window._token},
                            success: function(result) {
                                if (result.success) {
                                    dataSource.read();
                                    alertify.log("{{ __('app.slider_delete_success') }}");
                                }
                            }
                        });
                    }
                });
            };
        });
    </script>
@endpush