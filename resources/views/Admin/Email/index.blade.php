@extends("layouts.admin")

@section('title', __('app.emails'))

@section('content')
    <div class="container">
        <h2>{{__('app.emails-guide') }}</h2>
        <div id="tbCt" style="text-align:right;"></div>
        <div id="grid" style="height: 300px;"></div>

        <br />
        <br />

        <h2>{{__('app.emails-contact') }}</h2>
        <div id="tbCt1" style="text-align:right;"></div>
        <div id="grid1" style="height: 300px;"></div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            var dataSource = utils.createKendoDataSource({
                type: 'aspnetmvc-ajax',
                pageSize: 5,
                transport: {
                    read: "{{ route('emails.readGuide', [App::getLocale()]) }}",
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
                        title: "{{ __('app.email') }}",
                        field: "email",
                        filterable: false
                    }, {
                        width: 400,
                        title: "{{ __('app.date') }}",
                        field: "created_at",
                        filterable: false
                    }, {
                        width: 80,
                        command: [
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

            var dataSource1 = utils.createKendoDataSource({
                type: 'aspnetmvc-ajax',
                pageSize: 5,
                transport: {
                    read: "{{ route('emails.readContact', [App::getLocale()]) }}",
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
            var dataView1 = utils.createKendoGrid("#grid1",
                {
                    columns: [{
                        title: "{{ __('app.email') }}",
                        field: "email",
                        filterable: false
                    }, {
                        width: 400,
                        title: "{{ __('app.date') }}",
                        field: "created_at",
                        filterable: false
                    }, {
                        width: 80,
                        command: [
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
                    dataSource: dataSource1,
                    columnMenu: false
                });

            var tb1 = utils.createKendoToolBar("#tbCt1", {
                dataSource: dataSource1,
                dataModel: {},
                dataView: dataView1
            });

            tb1.addRefreshBtn();
            tb1.resize();

            window.AppointmentConfirm = function(emailId) {
                alertify.confirm("{{ __('app.email_delete_confirm') }} ",
                function(r) {
                    var href = "{{route("emails.destroy",[App::getLocale(), "@#id"])}}";

                    console.log(href.replace("@#id" , emailId));
                    if (r) {
                        utils.ajax({
                            method: 'post',
                            url: href.replace("@#id" , emailId),
                            data: { _method: "delete", _token: window._token},
                            success: function(result) {
                                if (result.success) {
                                    dataSource.read();
                                    dataSource1.read();
                                    alertify.log("{{ __('app.email_delete_success') }}");
                                }
                            }
                        });
                    }
                });
            };
        });
    </script>
@endpush