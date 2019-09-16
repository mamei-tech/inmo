@extends("layouts.admin")

@section('title', __('app.users'))

@section('content')
    <div class="container">
        <div style="margin-bottom: 20px;">
            <a class="btn btn-light btn-sm" href="{{ url('/admin') }}" role="button"><div class="fa fa-arrow-circle-left" style="margin-right: 10px;"></div>{{ __('app.back') }}</a>
        </div>

        <h2>{{__('app.users') }}</h2>
        <div id="tbCt" style="text-align:right;"></div>
        <div id="grid" style="height: 300px;"></div>

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
                    read: "{{ route('users.read', [App::getLocale()]) }}",
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
                        title: "{{ __('app.name') }}",
                        field: "name",
                        filterable: false
                    }, {
                        title: "{{ __('app.provider') }}",
                        field: "provider",
                        filterable: false
                    }, {
                        width: 300,
                        title: "{{ __('app.date') }}",
                        field: "created_at",
                        filterable: false
                    }, {
                        width: 80,
                        command: [
                            {
                                name: "rem",
                                template: " <a class='k-grid-rem btn btn-default btn-sm fa fa-lock' style='height:16px;' title='{{ __('app.delete') }}'></a>",
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
                alertify.confirm("{{ __('app.user_lock_confirm') }} ",
                function(r) {
                    if (r) {
                        utils.ajax({
                            method: 'post',
                            url: '{{ route('users.lock', [App::getLocale()]) }}',
                            data: {
                                id: emailId,
                                _token: window._token},
                            success: function(result) {
                                if (result.success) {
                                    dataSource.read();
                                    alertify.log("{{ __('app.user_lock_success') }}");
                                }
                            }
                        });
                    }
                });
            };
        });
    </script>
@endpush