{{-- Logout Forms --}}
<div class="section-sigin-sigout">

    <div class="section-sigin-sigout-text" style="cursor: pointer;" data-toggle="collapse" href="#collapseLogout" role="button" aria-expanded="false" aria-controls="collapseLogout">
        <h3 class="color-white">{{\Illuminate\Support\Facades\Auth::user()->name}}</h3>

        <div class="arrow-floating">
            <span class="arrow-toggle-line" ></span>
        </div>
    </div>

    <div class="collapse container-signin-signout row" id="collapseLogout">

        <div class="container-signin-signout-aux">
        </div>

        <div class="container-signin-signout-content">
            <div class="container-signin-signout-button" style="width: 20%; float: right;">

                <button type="button" class="btn btn-yellow" style="margin-right: 15px">
                    <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('auth.exit') }}
                    </a>
                </button>

                <form id="logout-form" action="{{ route('logout', [App::getLocale()]) }}" method="POST" style="display: none;">
                    <input name="from" type="text" value="blog">
                    @csrf
                </form>

            </div>
        </div>
    </div >

</div>