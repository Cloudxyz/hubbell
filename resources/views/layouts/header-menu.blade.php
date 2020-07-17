@php
    $_current_role = RoleHelper::current();
    $_available_roles = RoleHelper::available();
    $_user = auth()->user();
@endphp

<div class="main-header">
    <div class="logo">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/app/logo-full.png') }}" alt="">
        </a>
    </div>

    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div style="margin: auto"></div>

    <div class="header-part-right">
        <!-- User avatar dropdown -->
        <div class="dropdown">
            <div class="user col align-self-end">
                <img src="{{asset('assets/images/faces/1.jpg')}}" id="userDropdown" alt="" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-header text-uppercase">
                        <i class="i-Lock-User mr-1"></i>
                        {{ $_user->name }}
                    </div>

                    <a class="dropdown-item" href="{{ route('account') }}">
                        {{ __('Account') }}
                    </a>

                    <!-- logout -->
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Sign Out') }}
                    </a> <!-- test -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <hr class="mt-1 mb-1">

                    <a class="dropdown-item app-header-return-to-site-dropdown" href="{{ route('public.home') }}">
                        {{  __('Return to public site') }}
                    </a>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- header top menu end -->
