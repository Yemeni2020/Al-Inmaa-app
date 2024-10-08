{{-- vertical-menu --}}
@if ($configData['mainLayoutType'] == 'vertical-menu')
    <div class="main-menu menu-fixed @if ($configData['theme'] === 'light') {{ 'menu-light' }} @else {{ 'menu-dark' }} @endif menu-accordion menu-shadow"
        data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ asset('/') }}">
                        <div class="brand-logo">
                            <svg class="logo"viewBox="0 0 369.7027027027027 47.2972972972973" height="47.2972972972973"
                                width="369.7027027027027"
                                style="width: 369.703px; height: 47.2973px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) scale(0.638216); z-index: 0; cursor: pointer; overflow: visible;">

                                <g id="SvgjsG1032" featurekey="odWo6G-0"
                                    transform="matrix(0.6063756063756064,0,0,0.6063756063756064,147.65246015246015,-217.3856548856549)"
                                    fill="#1e56a0">
                                    <path xmlns="http://www.w3.org/2000/svg"
                                        d="M-167.5,390.5c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2c1.1,0,2,0.9,2,2C-165.5,389.6-166.4,390.5-167.5,390.5z   M-177.5,428.5c-2.2,0-4-1.8-4-4s1.8-4,4-4c2.2,0,4,1.8,4,4S-175.3,428.5-177.5,428.5z M-177.5,410.5c-2.2,0-4-1.8-4-4s1.8-4,4-4  c2.2,0,4,1.8,4,4S-175.3,410.5-177.5,410.5z M-177.5,392.5c-2.2,0-4-1.8-4-4c0-2.2,1.8-4,4-4c2.2,0,4,1.8,4,4  C-173.5,390.7-175.3,392.5-177.5,392.5z M-177.5,374.5c-2.2,0-4-1.8-4-4c0-2.2,1.8-4,4-4c2.2,0,4,1.8,4,4  C-173.5,372.7-175.3,374.5-177.5,374.5z M-194.5,414.5c-3.9,0-7-3.1-7-7c0-3.9,3.1-7,7-7c3.9,0,7,3.1,7,7  C-187.5,411.4-190.6,414.5-194.5,414.5z M-194.5,394.5c-3.9,0-7-3.1-7-7c0-3.9,3.1-7,7-7c3.9,0,7,3.1,7,7  C-187.5,391.4-190.6,394.5-194.5,394.5z M-195.5,374.5c-2.2,0-4-1.8-4-4c0-2.2,1.8-4,4-4c2.2,0,4,1.8,4,4  C-191.5,372.7-193.3,374.5-195.5,374.5z M-195.5,362.5c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2c1.1,0,2,0.9,2,2  C-193.5,361.6-194.4,362.5-195.5,362.5z M-214.5,414.5c-3.9,0-7-3.1-7-7c0-3.9,3.1-7,7-7s7,3.1,7,7  C-207.5,411.4-210.6,414.5-214.5,414.5z M-214.5,394.5c-3.9,0-7-3.1-7-7c0-3.9,3.1-7,7-7s7,3.1,7,7  C-207.5,391.4-210.6,394.5-214.5,394.5z M-213.5,374.5c-2.2,0-4-1.8-4-4c0-2.2,1.8-4,4-4c2.2,0,4,1.8,4,4  C-209.5,372.7-211.3,374.5-213.5,374.5z M-213.5,362.5c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2c1.1,0,2,0.9,2,2  C-211.5,361.6-212.4,362.5-213.5,362.5z M-231.5,374.5c-2.2,0-4-1.8-4-4c0-2.2,1.8-4,4-4c2.2,0,4,1.8,4,4  C-227.5,372.7-229.3,374.5-231.5,374.5z M-231.5,384.5c2.2,0,4,1.8,4,4c0,2.2-1.8,4-4,4c-2.2,0-4-1.8-4-4  C-235.5,386.3-233.7,384.5-231.5,384.5z M-241.5,408.5c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2c1.1,0,2,0.9,2,2  C-239.5,407.6-240.4,408.5-241.5,408.5z M-241.5,390.5c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2c1.1,0,2,0.9,2,2  C-239.5,389.6-240.4,390.5-241.5,390.5z M-231.5,402.5c2.2,0,4,1.8,4,4s-1.8,4-4,4c-2.2,0-4-1.8-4-4S-233.7,402.5-231.5,402.5z   M-231.5,420.5c2.2,0,4,1.8,4,4s-1.8,4-4,4c-2.2,0-4-1.8-4-4S-233.7,420.5-231.5,420.5z M-213.5,420.5c2.2,0,4,1.8,4,4  c0,2.2-1.8,4-4,4c-2.2,0-4-1.8-4-4C-217.5,422.3-215.7,420.5-213.5,420.5z M-213.5,432.5c1.1,0,2,0.9,2,2c0,1.1-0.9,2-2,2  c-1.1,0-2-0.9-2-2C-215.5,433.4-214.6,432.5-213.5,432.5z M-195.5,420.5c2.2,0,4,1.8,4,4c0,2.2-1.8,4-4,4c-2.2,0-4-1.8-4-4  C-199.5,422.3-197.7,420.5-195.5,420.5z M-195.5,432.5c1.1,0,2,0.9,2,2c0,1.1-0.9,2-2,2c-1.1,0-2-0.9-2-2  C-197.5,433.4-196.6,432.5-195.5,432.5z M-167.5,404.5c1.1,0,2,0.9,2,2c0,1.1-0.9,2-2,2c-1.1,0-2-0.9-2-2  C-169.5,405.4-168.6,404.5-167.5,404.5z"
                                        style="fill-rule: evenodd; clip-rule: evenodd;"></path>
                                </g>

                            </svg>
                            {{-- <img class="logo rounded-circle"  src="{{asset('images/ico/log.jpg')}}" alt="" srcset=""> --}}
                            {{-- <svg class="logo" width="26px" height="26px" viewbox="0 0 26 26" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <title>icon</title>
          <defs>
              <lineargradient id="linearGradient-1" x1="50%" y1="0%" x2="50%" y2="100%">
                  <stop stop-color="#5A8DEE" offset="0%"></stop>
                  <stop stop-color="#699AF9" offset="100%"></stop>
              </lineargradient>
              <lineargradient id="linearGradient-2" x1="0%" y1="0%" x2="100%" y2="100%">
                  <stop stop-color="#FDAC41" offset="0%"></stop>
                  <stop stop-color="#E38100" offset="100%"></stop>
              </lineargradient>
          </defs>
          <g id="Sprite" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="sprite" transform="translate(-69.000000, -61.000000)">
                  <g id="Group" transform="translate(17.000000, 15.000000)">
                      <g id="icon" transform="translate(52.000000, 46.000000)">
                          <path id="Combined-Shape" d="M13.5909091,1.77272727 C20.4442608,1.77272727 26,7.19618701 26,13.8863636 C26,20.5765403 20.4442608,26 13.5909091,26 C6.73755742,26 1.18181818,20.5765403 1.18181818,13.8863636 C1.18181818,13.540626 1.19665566,13.1982714 1.22574292,12.8598734 L6.30410592,12.859962 C6.25499466,13.1951893 6.22958398,13.5378796 6.22958398,13.8863636 C6.22958398,17.8551125 9.52536149,21.0724191 13.5909091,21.0724191 C17.6564567,21.0724191 20.9522342,17.8551125 20.9522342,13.8863636 C20.9522342,9.91761479 17.6564567,6.70030817 13.5909091,6.70030817 C13.2336969,6.70030817 12.8824272,6.72514561 12.5388136,6.77314791 L12.5392575,1.81561642 C12.8859498,1.78721495 13.2366963,1.77272727 13.5909091,1.77272727 Z"></path>
                          <path id="Combined-Shape" d="M13.8863636,4.72727273 C18.9447899,4.72727273 23.0454545,8.82793741 23.0454545,13.8863636 C23.0454545,18.9447899 18.9447899,23.0454545 13.8863636,23.0454545 C8.82793741,23.0454545 4.72727273,18.9447899 4.72727273,13.8863636 C4.72727273,13.5378966 4.74673291,13.1939746 4.7846258,12.8556254 L8.55057141,12.8560055 C8.48653249,13.1896162 8.45300462,13.5340745 8.45300462,13.8863636 C8.45300462,16.887125 10.8856023,19.3197227 13.8863636,19.3197227 C16.887125,19.3197227 19.3197227,16.887125 19.3197227,13.8863636 C19.3197227,10.8856023 16.887125,8.45300462 13.8863636,8.45300462 C13.529522,8.45300462 13.180715,8.48740462 12.8430777,8.55306931 L12.8426531,4.78608796 C13.1851829,4.7472336 13.5334422,4.72727273 13.8863636,4.72727273 Z" fill="#4880EA"></path>
                          <path id="Combined-Shape" d="M13.5909091,1.77272727 C20.4442608,1.77272727 26,7.19618701 26,13.8863636 C26,20.5765403 20.4442608,26 13.5909091,26 C6.73755742,26 1.18181818,20.5765403 1.18181818,13.8863636 C1.18181818,13.540626 1.19665566,13.1982714 1.22574292,12.8598734 L6.30410592,12.859962 C6.25499466,13.1951893 6.22958398,13.5378796 6.22958398,13.8863636 C6.22958398,17.8551125 9.52536149,21.0724191 13.5909091,21.0724191 C17.6564567,21.0724191 20.9522342,17.8551125 20.9522342,13.8863636 C20.9522342,9.91761479 17.6564567,6.70030817 13.5909091,6.70030817 C13.2336969,6.70030817 12.8824272,6.72514561 12.5388136,6.77314791 L12.5392575,1.81561642 C12.8859498,1.78721495 13.2366963,1.77272727 13.5909091,1.77272727 Z" fill="url(#linearGradient-1)"></path>
                          <rect id="Rectangle" x="0" y="0" width="7.68181818" height="7.68181818"></rect>
                          <rect id="Rectangle" fill="url(#linearGradient-2)" x="0" y="0" width="7.68181818" height="7.68181818"></rect>
                      </g>
                  </g>
              </g>
          </g>
        </svg> --}}
                        </div>
                        <h2 class="brand-text mb-0">
                            @if (!empty($configData['templateTitle']) && isset($configData['templateTitle']))
                                {{ $configData['templateTitle'] }}
                            @else
                                AL-INMAA
                            @endif
                        </h2>

                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i>
                        <i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary"
                            data-ticon="bx-disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
                data-icon-style="lines">
                @if (!empty($menuData[0]) && isset($menuData[0]))
                    @foreach ($menuData[0]->menu as $menu)
                        @if (isset($menu->navheader))
                            <li class="navigation-header text-truncate"><span>{{ $menu->navheader }}</span></li>
                        @else
                            <li class="nav-item {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                                <a href="@if (isset($menu->url)) {{ asset($menu->url) }} @endif"
                                    @if (isset($menu->newTab)) {{ 'target=_blank' }} @endif>
                                    @if (isset($menu->icon))
                                        <i class="menu-livicon" data-icon="{{ $menu->icon }}"></i>
                                    @endif
                                    @if (isset($menu->name))
                                        <span class="menu-title text-truncate">{{ __('locale.' . $menu->name) }}</span>
                                    @endif
                                    @if (isset($menu->tag))
                                        <span class="{{ $menu->tagcustom }} ml-auto">{{ $menu->tag }}</span>
                                    @endif
                                </a>
                                @if (isset($menu->submenu))
                                    @include('panels.sidebar-submenu', ['menu' => $menu->submenu])
                                @endif
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endif
{{-- horizontal-menu --}}
@if ($configData['mainLayoutType'] == 'horizontal-menu')
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-light navbar-without-dd-arrow
@if ($configData['navbarType'] === 'navbar-static') {{ 'navbar-sticky' }} @endif"
        role="navigation" data-menu="menu-wrapper">
        <div class="navbar-header d-xl-none d-block">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ asset('/') }}">
                        <div class="brand-logo">
                            <img src="{{ asset('images/logo/logo.svg') }}" class="logo" alt="">
                        </div>
                        <h2 class="brand-text mb-0">
                            @if (!empty($configData['templateTitle']) && isset($configData['templateTitle']))
                                {{ $configData['templateTitle'] }}
                            @else
                                Frest
                            @endif
                        </h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="filled">
                @if (!empty($menuData[1]) && isset($menuData[1]))
                    @foreach ($menuData[1]->menu as $menu)
                        <li class="@if (isset($menu->submenu)) {{ 'dropdown' }} @endif nav-item"
                            data-menu="dropdown">
                            <a class="@if (isset($menu->submenu)) {{ 'dropdown-toggle' }} @endif nav-link"
                                href="{{ asset($menu->url) }}"
                                @if (isset($menu->submenu)) {{ 'data-toggle=dropdown' }} @endif
                                @if (isset($menu->newTab)) {{ 'target=_blank' }} @endif>
                                <i class="menu-livicon" data-icon="{{ $menu->icon }}"></i>
                                <span>{{ __('locale.' . $menu->name) }}</span>
                            </a>
                            @if (isset($menu->submenu))
                                @include('panels.sidebar-submenu', ['menu' => $menu->submenu])
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <!-- /horizontal menu content-->
    </div>
@endif

{{-- vertical-box-menu --}}
@if ($configData['mainLayoutType'] == 'vertical-menu-boxicons')
    <div class="main-menu menu-fixed @if ($configData['theme'] === 'light') {{ 'menu-light' }} @else {{ 'menu-dark' }} @endif menu-accordion menu-shadow"
        data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ asset('/') }}">
                        <div class="brand-logo">
                            <img src="{{ asset('images/logo/logo.svg') }}" class="logo" alt="">
                        </div>
                        <h2 class="brand-text mb-0">
                            @if (!empty($configData['templateTitle']) && isset($configData['templateTitle']))
                                {{ $configData['templateTitle'] }}
                            @else
                                Frest
                            @endif
                        </h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                            class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                            class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                            data-ticon="bx-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
                data-icon-style="">
                @if (!empty($menuData[2]) && isset($menuData[2]))
                    @foreach ($menuData[2]->menu as $menu)
                        @if (isset($menu->navheader))
                            <li class="navigation-header text-truncate"><span>{{ $menu->navheader }}</span></li>
                        @else
                            <li class="nav-item {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                                <a href="@if (isset($menu->url)) {{ asset($menu->url) }} @endif"
                                    @if (isset($menu->newTab)) {{ 'target=_blank' }} @endif>
                                    @if (isset($menu->icon))
                                        <i class="{{ $menu->icon }}"></i>
                                    @endif
                                    @if (isset($menu->name))
                                        <span class="menu-title text-truncate">{{ __('locale.' . $menu->name) }}</span>
                                    @endif
                                    @if (isset($menu->tag))
                                        <span class="{{ $menu->tagcustom }} ml-auto">{{ $menu->tag }}</span>
                                    @endif
                                </a>
                                @if (isset($menu->submenu))
                                    @include('panels.sidebar-submenu', ['menu' => $menu->submenu])
                                @endif
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endif
