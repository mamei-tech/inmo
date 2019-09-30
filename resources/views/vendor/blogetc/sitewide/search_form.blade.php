<div class='form-group'>
    <form method='get' action='{{route("blogetc.search")}}' class='text-center'>
        <div class="input-group" style="">
            <input type="text" class="form-control" name='s' placeholder='@lang('app.search')' value='{{\Request::get("s")}}'>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" style="border-left: none !important;background: white;border: 1px solid #ced4da;border-radius: .25rem;">
                    <span class="fa fa-search fa-2x" style="color: #939393;"></span>
                </button>
            </div>
        </div>
    </form>
</div>
