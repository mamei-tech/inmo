<h2><a href='https://webdevetc.com/'>Admin Panel</a></h2>
<p>{{ __('blog.welcome_admin_panel')  }}</p>


<ul class="list-group mb-3">
    <li class="list-group-item justify-content-between lh-condensed">
        <div>
            <h6 class="my-0"><a href="{{ route('blogetc.admin.index') }}">BlogEtc Admin Home</a>
             <span class="text-muted">(<?php
                 $categoryCount = \WebDevEtc\BlogEtc\Models\BlogEtcPost::count();

                 echo $categoryCount . " " . str_plural("Post", $categoryCount);

                 ?>)</span>
            </h6>
            <small class="text-muted">Overview of your posts</small>

            <div class="list-group ">

                <a href='{{ route('blogetc.admin.index') }}'
                   class='list-group-item list-group-item-action @if(\Request::route()->getName() === 'blogetc.admin.index') active @endif  '><i
                            class="fa fa-th fa-fw"
                            aria-hidden="true"></i>
                    {{ __('blog.all_posts') }}</a>
                <a href='{{ route('blogetc.admin.create_post', [App::getLocale()]) }}'
                   class='list-group-item list-group-item-action  @if(\Request::route()->getName() === 'blogetc.admin.create_post') active @endif  '><i
                            class="fa fa-plus fa-fw" aria-hidden="true"></i>
                    {{ __('blog.add_post') }}</a>
            </div>
        </div>

    </li>


    <li class="list-group-item justify-content-between lh-condensed">
        <div>
            <h6 class="my-0"><a href="{{ route('blogetc.admin.comments.index', [App::getLocale()]) }}">{{ __('blog.comments') }}</a>

                            <span class="text-muted">(<?php
                                $commentCount = \WebDevEtc\BlogEtc\Models\BlogEtcComment::withoutGlobalScopes()->count();

                                echo $commentCount . " " . str_plural(__('blog.comment'), $commentCount);

                                ?>)</span>
            </h6>
            <small class="text-muted">{{ __('blog.manage_comments', [App::getLocale()]) }}</small>

            <div class="list-group ">
                <a href='{{ route('blogetc.admin.comments.index', [App::getLocale()]) }}'
                   class='list-group-item list-group-item-action  @if(\Request::route()->getName() === 'blogetc.admin.comments.index' && !\Request::get("waiting_for_approval")) active @endif   '><i
                            class="fa  fa-fw fa-comments" aria-hidden="true"></i>
                    {{ __('blog.all_comments') }}</a>


                <?php $comment_approval_count = \WebDevEtc\BlogEtc\Models\BlogEtcComment::withoutGlobalScopes()->where("approved", false)->count(); ?>

                <a href='{{ route('blogetc.admin.comments.index', [App::getLocale()]) }}?waiting_for_approval=true'
                   class='list-group-item list-group-item-action  @if(\Request::route()->getName() === 'blogetc.admin.comments.index' && \Request::get("waiting_for_approval")) active @elseif($comment_approval_count>0) list-group-item-warning @endif  '><i
                            class="fa  fa-fw fa-comments" aria-hidden="true"></i>
                    {{ $comment_approval_count }}
                    Waiting for approval </a>

            </div>
        </div>
    </li>


    <li class="list-group-item  justify-content-between lh-condensed" style="display: none">
        <div>
            <h6 class="my-0"><a href="{{ route('blogetc.admin.categories.index', [App::getLocale()]) }}">{{ __('blog.categories') }}</a>
                    <span class="text-muted">(<?php
                        $postCount = \WebDevEtc\BlogEtc\Models\BlogEtcCategory::count();
                        echo $postCount . " " . str_plural(__("blog.category"), $postCount);
                        ?>)</span>
            </h6>


            {{--<small class="text-muted">Blog post categories</small>--}}

            <div class="list-group ">
                <a href='{{ route('blogetc.admin.categories.index', [App::getLocale()]) }}'
                   class='list-group-item list-group-item-action  @if(\Request::route()->getName() === 'blogetc.admin.categories.index') active @endif  '><i
                            class="fa fa-object-group fa-fw" aria-hidden="true"></i>
                    {{ __('blog.all_categories') }}</a>
                <a href='{{ route('blogetc.admin.categories.create_category', [App::getLocale()]) }}'
                   class='list-group-item list-group-item-action  @if(\Request::route()->getName() === 'blogetc.admin.categories.create_category') active @endif  '><i
                            class="fa fa-plus fa-fw" aria-hidden="true"></i>
                    {{ __('blog.add_category') }}</a>
            </div>
        </div>

    </li>

    @if(config("blogetc.image_upload_enabled"))
    <li class="list-group-item  justify-content-between lh-condensed">
        <div>
            <h6 class="my-0"><a href="{{ route('blogetc.admin.images.upload', [App::getLocale()]) }}">Upload images</a></h6>


            <div class="list-group ">

                <a href='{{ route('blogetc.admin.images.all', [App::getLocale()]) }}'
                   class='list-group-item list-group-item-action  @if(\Request::route()->getName() === 'blogetc.admin.images.all') active @endif  '><i
                            class="fa fa-picture-o fa-fw" aria-hidden="true"></i>
                    View All</a>



                <a href='{{ route('blogetc.admin.images.upload', [App::getLocale()]) }}'
                   class='list-group-item list-group-item-action  @if(\Request::route()->getName() === 'blogetc.admin.images.upload') active @endif  '><i
                            class="fa fa-upload fa-fw" aria-hidden="true"></i>
                    Upload</a>


            </div>


        </div>

    </li>
        @endif


</ul>