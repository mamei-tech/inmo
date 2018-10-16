@extends("layouts.admin")

@section('title', __('app.guides'))

@section('content')
    <div class="container">
        <div style="margin-bottom: 20px;">
            <a class="btn btn-light btn-sm" href="{{ url('/admin') }}" role="button"><div class="fa fa-arrow-circle-left" style="margin-right: 10px;"></div>{{ __('app.back') }}</a>
        </div>

        <h2>{{__('app.guides') }}</h2>
        <div id="tbCt" style="text-align:right;"></div>
        <div id="grid" style="height: 470px;"></div>

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
                pageSize: 10,
                transport: {
                    read: "{{ route('guide.read', [App::getLocale()]) }}",
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
                        title: "{{ __('app.guides') }}",
                        field: "text_{{App::getLocale()}}",
                        filterable: false
                    }, {
                        width: 300,
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

                                    var href = "{{route("guide.edit",[App::getLocale(), 0])}}";
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
                    location.href = "{{route("guide.create", [App::getLocale()])}}";
                }
            });
            tb.addRefreshBtn();
            tb.resize();

            window.AppointmentConfirm = function(guideId) {
                alertify.confirm("{{ __('app.guide_delete_confirm') }} ",
                function(r) {
                    var href = "{{route("guide.destroy",[App::getLocale(), "@#id"])}}";

                    console.log(href.replace("@#id" , guideId));
                    if (r) {
                        utils.ajax({
                            method: 'post',
                            url: href.replace("@#id" , guideId),
                            data: { _method: "delete", _token: window._token},
                            success: function(result) {
                                if (result.success) {
                                    dataSource.read();
                                    alertify.log("{{ __('app.guide_delete_success') }}");
                                }
                            }
                        });
                    }
                });
            };
        });
    </script>
@endpush