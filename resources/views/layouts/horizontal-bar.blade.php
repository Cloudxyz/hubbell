@php
    $_current_role = RoleHelper::current();
@endphp

<div class="horizontal-bar-wrap">
    <div class="header-topnav">
        <div class="container-fluid">
            <div class=" topnav rtl-ps-none" id="" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="menu float-left" id="app-menu">

                    @if ($_current_role->isAllowed('my-lists', 'heading-menu'))
                        <li>
                            <div>
                                <div>
                                    <label class="toggle" for="dropdownMenuBooking">
                                        {{ __('Lists') }}
                                    </label>
                                    <a href="{{ route('lists') }}" class="link-menu">
                                        <i class="nav-icon mr-2 i-Notepad-2 icon-color"></i>
                                        {{ __('Lists') }}
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endif

                    @if ($_current_role->isAllowed('products', 'heading-menu'))
                        <li>
                            <div>
                                <div>
                                    <label class="toggle" for="dropdownMenuBooking">
                                        {{ __('Products') }}
                                    </label>
                                    <a href="{{ route('products') }}" class="link-menu">
                                        <i class="nav-icon mr-2 i-Shopping-Cart icon-color"></i>
                                        {{ __('Products') }}
                                    </a>
                                    <!-- dropdown menu -->
                                    <input type="checkbox" id="dropdownMenuBooking">
                                    <ul>
                                        @if ($_current_role->isAllowed('products', 'categories'))
                                            <li class="nav-item">
                                                <a class="" href="{{ route('categories') }}">
                                                    <span class="item-name">{{ __('Categories') }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endif

                    @if ($_current_role->isAllowed('shops', 'heading-menu'))
                        <li>
                            <div>
                                <div>
                                    <label class="toggle" for="dropdownMenuBooking">
                                        {{ __('Shops') }}
                                    </label>
                                    <a href="{{ route('shops') }}" class="link-menu">
                                        <i class="nav-icon mr-2 i-Shop icon-color"></i>
                                        {{ __('Shops') }}
                                    </a>
                                    <!-- dropdown menu -->
                                    <input type="checkbox" id="dropdownMenuBooking">
                                    <ul>
                                        @if ($_current_role->isAllowed('shops-types', 'heading-menu'))
                                            <li class="nav-item">
                                                <a class="" href="{{ route('shops-types') }}">
                                                    <span class="item-name">{{ __('Types') }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endif

                    @if ($_current_role->isAllowed('settings', 'heading-menu'))
                        <li>
                            <div>
                                <div>
                                    <label class="toggle" for="dropdownMenuBooking">
                                        {{ __('Settings') }}
                                    </label>
                                    <a href="{{ route('settings') }}" class="link-menu">
                                        <i class="nav-icon mr-2 i-Gear-2 icon-color"></i>
                                        {{ __('Settings') }}
                                    </a>
                                    <!-- dropdown menu -->
                                    <input type="checkbox" id="dropdownMenuBooking">
                                    <ul>
                                        @if ($_current_role->isAllowed('settings', 'users'))
                                            <li class="nav-item">
                                                <a class="" href="{{ route('users') }}">
                                                    <span class="item-name">{{ __('Users') }}</span>
                                                </a>
                                            </li>
                                        @endif

                                        @if ($_current_role->isAllowed('settings', 'roles'))
                                            <li class="nav-item">
                                                <a class="" href="{{ route('roles') }}">
                                                    <span class="item-name">{{ __('Roles') }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

</div>
<!--=============== Horizontal bar End ================-->
