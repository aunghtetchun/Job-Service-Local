@auth
    <div class="aside-left bg-white px-3 pb-2 min-vh-100 shadow">
        <ul class="menu" style="list-style-type: none">
            <li class="brand-icon">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class="brand-icon-img">
                        <small
                            class="text-primary font-weight-bold h5 mb-0 ml-2">{{ \App\Custom::$info['short_name'] }}</small>
                    </div>
                    <button class="btn btn-light d-block d-lg-none aside-menu-close">
                        <i class="feather-x fa-2x"></i>
                    </button>
                </div>
            </li>
            <li>
                <a class="menu-item mt-3" href="{{ route('home') }}">
                    <span>
                        <i class="feather-home"></i>
                        Dashboard
                    </span>
                </a>
            </li>
            {{-- @component('component.nav-spacer')
            @endcomponent

            @component('component.nav-title')
                Post Management
            @endcomponent --}}

            {{-- @component('component.nav-item')
                @slot('icon') <i class="feather-plus-circle"></i> @endslot
                @slot('name') Add Info @endslot
                @slot('link') {{ route('information.create') }} @endslot
            @endcomponent --}}

            {{-- @component('component.nav-item-count')
                @slot('icon')
                    <i class="feather-list"></i>
                @endslot
                @slot('name')
                    Post List
                @endslot
                @slot('link')
                    {{ route('post.index') }}
                @endslot
                @slot('count')
                    {{ \App\Post::get()->count() }}
                @endslot
            @endcomponent --}}
            @component('component.nav-spacer')
            @endcomponent

            @component('component.nav-title')
                User Management
            @endcomponent

            {{-- @component('component.nav-item')
                @slot('icon') <i class="feather-plus-circle"></i> @endslot
                @slot('name') Add Info @endslot
                @slot('link') {{ route('information.create') }} @endslot
            @endcomponent --}}

            @component('component.nav-item-count')
                @slot('icon')
                    <i class="fas fa-users-cog"></i>
                @endslot
                @slot('name')
                    Worker List
                @endslot
                @slot('link')
                    {{ route('user.workerList') }}
                @endslot
                @slot('count')
                    {{ \App\User::where('role', 'worker')->where('count', '=', 1)->withTrashed()->count() }}
                @endslot
            @endcomponent
            @component('component.nav-item-count')
                @slot('icon')
                    <i class="fas fa-users"></i>
                @endslot
                @slot('name')
                    Group Worker List
                @endslot
                @slot('link')
                    {{ route('user.groupWorkerList') }}
                @endslot
                @slot('count')
                    {{ \App\User::where('role', 'worker')->where('count', '>', 1)->withTrashed()->count() }}
                @endslot
            @endcomponent
            @component('component.nav-item-count')
                @slot('icon')
                    <i class="fas fa-user"></i>
                @endslot
                @slot('name')
                    User List
                @endslot
                @slot('link')
                    {{ route('user.userList') }}
                @endslot
                @slot('count')
                    {{ \App\User::where('role', 'user')->withTrashed()->count() }}
                @endslot
            @endcomponent
            @component('component.nav-spacer')
            @endcomponent

            @component('component.nav-spacer')
            @endcomponent

            {{-- @component('component.nav-title')
                Other Management
            @endcomponent

            @component('component.nav-item-count')
                @slot('icon')
                    <i class="fas fa-comment"></i>
                @endslot
                @slot('name')
                    Comment List
                @endslot
                @slot('link')
                    {{ route('comment.index') }}
                @endslot
                @slot('count')
                    {{ \App\Comment::count() }}
                @endslot
            @endcomponent
            @component('component.nav-item-count')
                @slot('icon')
                    <i class="fas fa-comments"></i>
                @endslot
                @slot('name')
                    Recommend List
                @endslot
                @slot('link')
                    {{ route('recommend.index') }}
                @endslot
                @slot('count')
                    {{ \App\Recommend::count() }}
                @endslot
            @endcomponent --}}

            @component('component.nav-title')
                Info Management
            @endcomponent

            @component('component.nav-item')
                @slot('icon')
                <i class="fab fa-unity"></i>
                @endslot
                @slot('name')
                    မြို့နယ် & အလုပ်အမျိုးအစား
                @endslot
                @slot('link')
                    {{ route('information.create') }}
                @endslot
            @endcomponent
            @component('component.nav-item')
                @slot('icon')
                <i class="fas fa-map-marker-alt"></i>
                @endslot
                @slot('name')
                    တည်နေရာ
                @endslot
                @slot('link')
                    {{ route('subcategory.create') }}
                @endslot
            @endcomponent
            @component('component.nav-item')
                @slot('icon')
                <i class="fas fa-briefcase"></i>
                @endslot
                @slot('name')
                    အလုပ်အကိုင်
                @endslot
                @slot('link')
                    {{ route('subcategory.jobCreate') }}
                @endslot
            @endcomponent


            {{-- @component('component.nav-item-count')
                @slot('icon') <i class="feather-list"></i> @endslot
                @slot('name') Info List @endslot
                @slot('link') {{ route('information.index') }} @endslot
                @slot('count') {{ \App\Information::get()->count() }} @endslot
            @endcomponent --}}



            @component('component.nav-spacer')
            @endcomponent
            <li>
                <a class="menu-item alert-secondary" onclick="logout()" href="#">
                    <span>
                        <i class="fas fa-lock"></i>
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </div>


@endauth
