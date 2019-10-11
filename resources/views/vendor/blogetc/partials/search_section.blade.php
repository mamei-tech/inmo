<div class="section-search">
    <a href="{{Route("blog", [App::getLocale()])}}" style="text-decoration: none;">
        <h1>@lang('app.blog')</h1>
    </a>
    <div class="search-advance">
        <h3 class="color-gray">
            <a href="{{Route("blogetc.advancesearch", [App::getLocale()])}}" style="color: inherit;font-weight: bold;">@lang('app.advance_search')</a>
        </h3>
        @include("blogetc::sitewide.search_form")
    </div>
</div>