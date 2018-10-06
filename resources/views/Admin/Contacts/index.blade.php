@extends("layouts.admin")

@section('title', __('app.contacts'))

@section('content')
    <div class="container">
        <h2>{{__('app.contacts') }}</h2>
        <div id="tbCt" style="text-align:right;"></div>
        <div id="grid" style="height: 470px;"></div>
    </div>

    <div id="exampleModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('app.message') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="contact-message"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-yellow" data-dismiss="modal">{{ __('app.close') }}</button>
                </div>
            </div>
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
                    read: "{{ route('contacts.read', [App::getLocale()]) }}",
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
                        title: "{{ __('app.email') }}",
                        field: "email",
                        filterable: false
                    }, {
                        title: "{{ __('app.phone') }}",
                        field: "phone",
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
                                template: "<a class='k-grid-edit btn btn-default btn-sm fa fa-envelope-o' style='height:12px;' title='{{ __('app.show') }}'></a>",
                                click: function (e) {
                                    e.preventDefault();
                                    var tr = $(e.target).closest("tr");
                                    var data = this.dataItem(tr);

                                    ShowMessage(data);
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

            window.AppointmentConfirm = function (contactsId) {
                alertify.confirm("{{ __('app.contacts_delete_confirm') }} ",
                    function (r) {
                        var href = "{{route("contacts.destroy",[App::getLocale(), "@#id"])}}";

                        console.log(href.replace("@#id", contactsId));
                        if (r) {
                            utils.ajax({
                                method: 'post',
                                url: href.replace("@#id", contactsId),
                                data: {_method: "delete", _token: window._token},
                                success: function (result) {
                                    if (result.success) {
                                        dataSource.read();
                                        alertify.log("{{ __('app.contacts_delete_success') }}");
                                    }
                                }
                            });
                        }
                    });
            };

            window.ShowMessage = function (data) {
                $('#contact-message').text(data.text);
                $("#exampleModal").modal('show');
            };
        });
    </script>
@endpush