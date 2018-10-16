@extends("layouts.admin")

@section('title', __('app.testimonials'))

@section('content')
    <div class="container">
        <div style="margin-bottom: 20px;">
            <a class="btn btn-light btn-sm" href="{{ url('/admin') }}" role="button"><div class="fa fa-arrow-circle-left" style="margin-right: 10px;"></div>{{ __('app.back') }}</a>
        </div>

        <h2>{{__('app.testimonials') }}</h2>
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
                    read: "{{ route('testimonials.read', [App::getLocale()]) }}",
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
                        title: "{{ __('app.name') }}",
                        field: "name",
                        filterable: false
                    }, {
                        title: "{{ __('app.testimonials') }}",
                        field: "testimonials",
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

                                    var href = "{{route("testimonials.edit",[App::getLocale(), 0])}}";
                                    location.href = href.replace('0', data.id);
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

            tb.addRefreshBtn();
            tb.resize();

            window.AppointmentConfirm = function (testimonialsId) {
                alertify.confirm("{{ __('app.testimonials_delete_confirm') }} ",
                    function (r) {

                        var href = "{{route("testimonials.destroy",[App::getLocale(), "@#id"])}}";
                        if (r) {
                            utils.ajax({
                                method: 'post',
                                url: href.replace("@#id", testimonialsId),
                                data: {_method: "delete", _token: window._token},
                                success: function (result) {
                                    console.log(result)
                                    if (result.success) {
                                        dataSource.read();
                                        alertify.log("{{ __('app.testimonials_delete_success') }}");
                                    }
                                },
                                error:function (e) {
                                    console.log(e)
                                }
                            });
                        }
                    });
            };
        });
    </script>
@endpush