@extends("layouts.admin")

@section('title', __('app.emails'))

@section('content')
    <div class="container">
        <h2>{{__('app.emails') }}</h2>
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
                    read: "{{ route('emails.read', [App::getLocale()]) }}",
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
                        title: "{{ __('app.type') }}",
                        field: "type",
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