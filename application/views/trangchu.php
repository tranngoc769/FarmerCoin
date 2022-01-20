<body class="animsition site-navbar-small dashboard">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
        <input id="username" value="<?=$username?>" hidden>
        <div class="navbar-header">
            <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided" data-toggle="menubar">
                <span class="sr-only">Toggle navigation</span>
                <span class="hamburger-bar"></span>
            </button>
            <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
                <i class="icon wb-more-horizontal" aria-hidden="true"></i>
            </button>
            <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
                <img class="navbar-brand-logo" src="/style/assets/images/logo.png" title="Remark">
                <span class="navbar-brand-text hidden-xs-down"> Remark</span>
            </div>
            <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search" data-toggle="collapse">
                <span class="sr-only">Toggle Search</span>
                <i class="icon wb-search" aria-hidden="true"></i>
            </button>
        </div>

        <div class="navbar-container container-fluid">
            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                <!-- Navbar Toolbar -->
                <ul class="nav navbar-toolbar">
                    <li class="nav-item hidden-float" id="toggleMenubar">
                        <a class="nav-link" data-toggle="menubar" href="#" role="button">
                            <i class="icon hamburger hamburger-arrow-left">
                                <span class="sr-only">Toggle menubar</span>
                                <span class="hamburger-bar"></span>
                            </i>
                        </a>
                    </li>
                    <li class="nav-item hidden-sm-down" id="toggleFullscreen">
                        <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                            <span class="sr-only">Toggle fullscreen</span>
                        </a>
                    </li>
                    <li class="nav-item hidden-float">
                        <a class="nav-link icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search" role="button">
                            <span class="sr-only">Toggle Search</span>
                        </a>
                    </li>
                    <ul class="nav nav-pills">
                        <li class="nav-item" role="presentation"><a class="active nav-link" href="javascript:void(0)"><img class="mr-1" src="/style/img/usd.png" style="height: 18px;"><span task="USD_price">0</span></a></li>
                        <li class="nav-item" role="presentation"><a class="active nav-link" href="javascript:void(0)"><img class="mr-1" src="/style/img/wax.png" style="height: 18px;"><span task="WAX_price">0</span></a></li>
                        <li class="nav-item" role="presentation"><a class="active nav-link" href="javascript:void(0)"><img class="mr-1" src="/style/img/FWW.png" style="height: 18px;"><span task="FWW_price">0</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="javascript:void(0)"><img class="mr-1" src="/style/img/FWG.png" style="height: 18px;"> <span task="FWG_price">0</span></a></li>
                        <li class="nav-item" role="presentation"><a class="active nav-link" href="javascript:void(0)"><img class="mr-1" src="/style/img/FWF.png" style="height: 18px;"> <span task="FWF_price">0</span></a></li>
                        <li class="nav-item" role="presentation"><a class="active nav-link" href="javascript:void(0)"><img class="mr-1" src="/style/img/FWF.png" style="height: 18px;"> <span task="FEE_price">0</span></a></li>
                        <li class="nav-item" role="presentation"><a class="active nav-link" href="javascript:void(0)"><img class="mr-1" src="/style/img/FWF.png" style="height: 18px;"> <span task="FARM_price">0</span></a></li>
                    </ul>
                    <input hidden id="FWF_price_value" value="0">
                    <input hidden id="FWW_price_value" value="0">
                    <input hidden id="FWG_price_value" value="0">
                    <input hidden id="USD_price_value" value="0">
                    <input hidden id="WAX_price_value" value="0">
                    <input hidden id="FARM_price_value" value="0">
                </ul>
                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up" aria-expanded="false" role="button">
                            <span class="flag-icon flag-icon-us"></span>
                        </a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                <span class="flag-icon flag-icon-gb"></span> English</a>
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                <span class="flag-icon flag-icon-fr"></span> French</a>
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                <span class="flag-icon flag-icon-cn"></span> Chinese</a>
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                <span class="flag-icon flag-icon-de"></span> German</a>
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                <span class="flag-icon flag-icon-nl"></span> Dutch</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                            <span class="avatar avatar-online">
                                <img src="/style/portraits/5.jpg" alt="...">
                                <i></i>
                            </span>
                        </a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Billing</a>
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
                            <div class="dropdown-divider" role="presentation"></div>
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
                        </div>
                    </li>
                </ul>
                <!-- End Navbar Toolbar Right -->
            </div>
            <!-- End Navbar Collapse -->

            <!-- Site Navbar Seach -->
            <div class="collapse navbar-search-overlap" id="site-navbar-search">
                <form role="search">
                    <div class="form-group">
                        <div class="input-search">
                            <i class="input-search-icon wb-search" aria-hidden="true"></i>
                            <input type="text" class="form-control" name="site-search" placeholder="Search...">
                            <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search" data-toggle="collapse" aria-label="Close"></button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End Site Navbar Seach -->
        </div>
    </nav>
    <div class="site-menubar">
        <ul class="site-menu">
            <li class="site-menu-item has-sub">
                <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                    <span class="site-menu-title">Dashboard</span>
                    <span class="site-menu-arrow"></span>
                </a>
                <ul class="site-menu-sub">
                    <li class="site-menu-item active">
                        <a href="index.html">
                            <span class="site-menu-title">Dashboard v1</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="dashboard/v2.html">
                            <span class="site-menu-title">Dashboard v2</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="dashboard/ecommerce.html">
                            <span class="site-menu-title">Ecommerce</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="dashboard/analytics.html">
                            <span class="site-menu-title">Analytics</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="dashboard/team.html">
                            <span class="site-menu-title">Team</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="site-menu-item has-sub">
                <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                    <span class="site-menu-title">Layouts</span>
                    <span class="site-menu-arrow"></span>
                </a>
                <ul class="site-menu-sub">
                    <li class="site-menu-item">
                        <a href="layouts/menu-collapsed.html">
                            <span class="site-menu-title">Menu Collapsed</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="layouts/menu-expended.html">
                            <span class="site-menu-title">Menu Expended</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="layouts/grids.html">
                            <span class="site-menu-title">Grid Scaffolding</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="layouts/layout-grid.html">
                            <span class="site-menu-title">Layout Grid</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="layouts/headers.html">
                            <span class="site-menu-title">Different Headers</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="layouts/panel-transition.html">
                            <span class="site-menu-title">Panel Transition</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="layouts/boxed.html">
                            <span class="site-menu-title">Boxed Layout</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="layouts/two-columns.html">
                            <span class="site-menu-title">Two Columns</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="layouts/bordered-header.html">
                            <span class="site-menu-title">Bordered Header</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <span class="site-menu-title">Page Aside</span>
                            <div class="site-menu-label">
                                <span class="badge badge-danger badge-round mr-25">new</span>
                            </div>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a href="layouts/aside-left-static.html">
                                    <span class="site-menu-title">Left Static</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="layouts/aside-right-static.html">
                                    <span class="site-menu-title">Right Static</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="layouts/aside-left-fixed.html">
                                    <span class="site-menu-title">Left Fixed</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="layouts/aside-right-fixed.html">
                                    <span class="site-menu-title">Right Fixed</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="site-menu-item has-sub">
                <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                    <span class="site-menu-title">Pages</span>
                    <span class="site-menu-arrow"></span>
                </a>
                <ul class="site-menu-sub">
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <span class="site-menu-title">Errors</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a href="pages/error-400.html">
                                    <span class="site-menu-title">400 Bad Request</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="pages/error-403.html">
                                    <span class="site-menu-title">403 Forbidden</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="pages/error-404.html">
                                    <span class="site-menu-title">404 Not Found</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="pages/error-500.html">
                                    <span class="site-menu-title">500 Internal Server Error</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="pages/error-503.html">
                                    <span class="site-menu-title">503 Service Unavailable</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/faq.html">
                            <span class="site-menu-title">FAQ</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/gallery.html">
                            <span class="site-menu-title">Gallery</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/gallery-grid.html">
                            <span class="site-menu-title">Gallery Grid</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/search-result.html">
                            <span class="site-menu-title">Search Result</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <span class="site-menu-title">Maps</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a href="pages/map-google.html">
                                    <span class="site-menu-title">Google Maps</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="pages/map-vector.html">
                                    <span class="site-menu-title">Vector Maps</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/maintenance.html">
                            <span class="site-menu-title">Maintenance</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/forgot-password.html">
                            <span class="site-menu-title">Forgot Password</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/lockscreen.html">
                            <span class="site-menu-title">Lockscreen</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/login.html">
                            <span class="site-menu-title">Login</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/register.html">
                            <span class="site-menu-title">Register</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/login-v2.html">
                            <span class="site-menu-title">Login V2</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/register-v2.html">
                            <span class="site-menu-title">Register V2</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/login-v3.html">
                            <span class="site-menu-title">Login V3</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/register-v3.html">
                            <span class="site-menu-title">Register V3</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/user.html">
                            <span class="site-menu-title">User List</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/invoice.html">
                            <span class="site-menu-title">Invoice</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/blank.html">
                            <span class="site-menu-title">Blank Page</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <span class="site-menu-title">Email</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a href="pages/email-articles.html">
                                    <span class="site-menu-title">Articles</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="pages/email-welcome.html">
                                    <span class="site-menu-title">Welcome</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="pages/email-post.html">
                                    <span class="site-menu-title">Post</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="pages/email-thumbnail.html">
                                    <span class="site-menu-title">Thumbnail</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="pages/email-news.html">
                                    <span class="site-menu-title">News</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/code-editor.html">
                            <span class="site-menu-title">Code Editor</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/profile.html">
                            <span class="site-menu-title">Profile</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/profile-v2.html">
                            <span class="site-menu-title">Profile V2</span>
                            <div class="site-menu-label">
                                <span class="badge badge-info badge-round">new</span>
                            </div>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/profile-v3.html">
                            <span class="site-menu-title">Profile V3</span>
                            <div class="site-menu-label">
                                <span class="badge badge-info badge-round">new</span>
                            </div>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/site-map.html">
                            <span class="site-menu-title">Sitemap</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="pages/project.html">
                            <span class="site-menu-title">Project</span>
                            <div class="site-menu-label">
                                <span class="badge badge-info badge-round">new</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="site-menu-item has-sub">
                <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-bookmark" aria-hidden="true"></i>
                    <span class="site-menu-title">Basic UI</span>
                    <span class="site-menu-arrow"></span>
                </a>
                <ul class="site-menu-sub">
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <span class="site-menu-title">Panel</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a href="uikit/panel-structure.html">
                                    <span class="site-menu-title">Panel Structure</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="uikit/panel-actions.html">
                                    <span class="site-menu-title">Panel Actions</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="uikit/panel-portlets.html">
                                    <span class="site-menu-title">Panel Portlets</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item">
                        <a href="uikit/buttons.html">
                            <span class="site-menu-title">Buttons</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="uikit/cards.html">
                            <span class="site-menu-title">Cards</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="uikit/dropdowns.html">
                            <span class="site-menu-title">Dropdowns</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="uikit/icons.html">
                            <span class="site-menu-title">Icons</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="uikit/list.html">
                            <span class="site-menu-title">List</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="uikit/tooltip-popover.html">
                            <span class="site-menu-title">Tooltip &amp; Popover</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="uikit/modals.html">
                            <span class="site-menu-title">Modals</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="uikit/tabs-accordions.html">
                            <span class="site-menu-title">Tabs &amp; Accordions</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="uikit/images.html">
                            <span class="site-menu-title">Images</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="uikit/badges.html">
                            <span class="site-menu-title">Badges</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="uikit/progress-bars.html">
                            <span class="site-menu-title">Progress Bars</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="uikit/carousel.html">
                            <span class="site-menu-title">Carousel</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="uikit/typography.html">
                            <span class="site-menu-title">Typography</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="uikit/colors.html">
                            <span class="site-menu-title">Colors</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="uikit/utilities.html">
                            <span class="site-menu-title">Utilties</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="site-menu-item has-sub">
                <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-hammer" aria-hidden="true"></i>
                    <span class="site-menu-title">Advanced UI</span>
                    <span class="site-menu-arrow"></span>
                </a>
                <ul class="site-menu-sub">
                    <li class="site-menu-item hidden-sm-down site-tour-trigger">
                        <a href="javascript:void(0)">
                            <span class="site-menu-title">Tour</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="advanced/animation.html">
                            <span class="site-menu-title">Animation</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="advanced/highlight.html">
                            <span class="site-menu-title">Highlight</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="advanced/lightbox.html">
                            <span class="site-menu-title">Lightbox</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="advanced/scrollable.html">
                            <span class="site-menu-title">Scrollable</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="advanced/rating.html">
                            <span class="site-menu-title">Rating</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="advanced/context-menu.html">
                            <span class="site-menu-title">Context Menu</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="advanced/alertify.html">
                            <span class="site-menu-title">Alertify</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="advanced/masonry.html">
                            <span class="site-menu-title">Masonry</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="advanced/treeview.html">
                            <span class="site-menu-title">Treeview</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="advanced/toastr.html">
                            <span class="site-menu-title">Toastr</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="advanced/maps-vector.html">
                            <span class="site-menu-title">Vector Maps</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="advanced/maps-google.html">
                            <span class="site-menu-title">Google Maps</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="advanced/sortable-nestable.html">
                            <span class="site-menu-title">Sortable &amp; Nestable</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="advanced/bootbox-sweetalert.html">
                            <span class="site-menu-title">Bootbox &amp; Sweetalert</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="site-menu-item has-sub">
                <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-plugin" aria-hidden="true"></i>
                    <span class="site-menu-title">Structure</span>
                    <span class="site-menu-arrow"></span>
                </a>
                <ul class="site-menu-sub">
                    <li class="site-menu-item">
                        <a href="structure/alerts.html">
                            <span class="site-menu-title">Alerts</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="structure/ribbon.html">
                            <span class="site-menu-title">Ribbon</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="structure/pricing-tables.html">
                            <span class="site-menu-title">Pricing Tables</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="structure/overlay.html">
                            <span class="site-menu-title">Overlay</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="structure/cover.html">
                            <span class="site-menu-title">Cover</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="structure/timeline-simple.html">
                            <span class="site-menu-title">Simple Timeline</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="structure/timeline.html">
                            <span class="site-menu-title">Timeline</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="structure/step.html">
                            <span class="site-menu-title">Step</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="structure/comments.html">
                            <span class="site-menu-title">Comments</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="structure/media.html">
                            <span class="site-menu-title">Media</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="structure/chat.html">
                            <span class="site-menu-title">Chat</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="structure/testimonials.html">
                            <span class="site-menu-title">Testimonials</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="structure/nav.html">
                            <span class="site-menu-title">Nav</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="structure/navbars.html">
                            <span class="site-menu-title">Navbars</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="structure/blockquotes.html">
                            <span class="site-menu-title">Blockquotes</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="structure/pagination.html">
                            <span class="site-menu-title">Pagination</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="structure/breadcrumbs.html">
                            <span class="site-menu-title">Breadcrumbs</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="site-menu-item has-sub">
                <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-extension" aria-hidden="true"></i>
                    <span class="site-menu-title">Widgets</span>
                    <span class="site-menu-arrow"></span>
                </a>
                <ul class="site-menu-sub">
                    <li class="site-menu-item">
                        <a href="widgets/statistics.html">
                            <span class="site-menu-title">Statistics Widgets</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="widgets/data.html">
                            <span class="site-menu-title">Data Widgets</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="widgets/blog.html">
                            <span class="site-menu-title">Blog Widgets</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="widgets/chart.html">
                            <span class="site-menu-title">Chart Widgets</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="widgets/social.html">
                            <span class="site-menu-title">Social Widgets</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="widgets/weather.html">
                            <span class="site-menu-title">Weather Widgets</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="site-menu-item has-sub">
                <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-library" aria-hidden="true"></i>
                    <span class="site-menu-title">Forms</span>
                    <span class="site-menu-arrow"></span>
                </a>
                <ul class="site-menu-sub">
                    <li class="site-menu-item">
                        <a href="forms/general.html">
                            <span class="site-menu-title">General Elements</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="forms/material.html">
                            <span class="site-menu-title">Material Elements</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="forms/advanced.html">
                            <span class="site-menu-title">Advanced Elements</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="forms/layouts.html">
                            <span class="site-menu-title">Form Layouts</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="forms/wizard.html">
                            <span class="site-menu-title">Form Wizard</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="forms/validation.html">
                            <span class="site-menu-title">Form Validation</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="forms/masks.html">
                            <span class="site-menu-title">Form Masks</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <span class="site-menu-title">Editors</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a href="forms/editor-summernote.html">
                                    <span class="site-menu-title">Summernote</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="forms/editor-markdown.html">
                                    <span class="site-menu-title">Markdown</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="forms/editor-ace.html">
                                    <span class="site-menu-title">Ace Editor</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item">
                        <a href="forms/image-cropping.html">
                            <span class="site-menu-title">Image Cropping</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="forms/file-uploads.html">
                            <span class="site-menu-title">File Uploads</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="site-menu-item has-sub">
                <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-table" aria-hidden="true"></i>
                    <span class="site-menu-title">Tables</span>
                    <span class="site-menu-arrow"></span>
                </a>
                <ul class="site-menu-sub">
                    <li class="site-menu-item">
                        <a href="tables/basic.html">
                            <span class="site-menu-title">Basic Tables</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="tables/bootstrap.html">
                            <span class="site-menu-title">Bootstrap Tables</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="tables/floatthead.html">
                            <span class="site-menu-title">floatThead</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="tables/responsive.html">
                            <span class="site-menu-title">Responsive Tables</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="tables/editable.html">
                            <span class="site-menu-title">Editable Tables</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="tables/jsgrid.html">
                            <span class="site-menu-title">jsGrid</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="tables/footable.html">
                            <span class="site-menu-title">FooTable</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="tables/datatable.html">
                            <span class="site-menu-title">DataTables</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="tables/jqtabledit.html">
                            <span class="site-menu-title">Jquery Tabledit</span>
                            <div class="site-menu-label">
                                <span class="badge badge badge-info badge-round">new</span>
                            </div>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="tables/table-dragger.html">
                            <span class="site-menu-title">Table Dragger</span>
                            <div class="site-menu-label">
                                <span class="badge badge badge-warning badge-round">new</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="site-menu-item has-sub">
                <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-pie-chart" aria-hidden="true"></i>
                    <span class="site-menu-title">Chart</span>
                    <span class="site-menu-arrow"></span>
                </a>
                <ul class="site-menu-sub">
                    <li class="site-menu-item">
                        <a href="charts/chartjs.html">
                            <span class="site-menu-title">Chart.js</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="charts/gauges.html">
                            <span class="site-menu-title">Gauges</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="charts/flot.html">
                            <span class="site-menu-title">Flot</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="charts/peity.html">
                            <span class="site-menu-title">Peity</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="charts/sparkline.html">
                            <span class="site-menu-title">Sparkline</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="charts/morris.html">
                            <span class="site-menu-title">Morris</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="charts/chartist.html">
                            <span class="site-menu-title">Chartist.js</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="charts/rickshaw.html">
                            <span class="site-menu-title">Rickshaw</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="charts/pie-progress.html">
                            <span class="site-menu-title">Pie Progress</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="charts/c3.html">
                            <span class="site-menu-title">C3</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="site-menu-item has-sub">
                <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-grid-4" aria-hidden="true"></i>
                    <span class="site-menu-title">Apps</span>
                    <span class="site-menu-arrow"></span>
                </a>
                <ul class="site-menu-sub">
                    <li class="site-menu-item">
                        <a href="apps/contacts/contacts.html">
                            <span class="site-menu-title">Contacts</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="apps/calendar/calendar.html">
                            <span class="site-menu-title">Calendar</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="apps/notebook/notebook.html">
                            <span class="site-menu-title">Notebook</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="apps/taskboard/taskboard.html">
                            <span class="site-menu-title">Taskboard</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <span class="site-menu-title">Documents</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a href="apps/documents/articles.html">
                                    <span class="site-menu-title">Articles</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="apps/documents/categories.html">
                                    <span class="site-menu-title">Categories</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a href="apps/documents/article.html">
                                    <span class="site-menu-title">Article</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item">
                        <a href="apps/forum/forum.html">
                            <span class="site-menu-title">Forum</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="apps/message/message.html">
                            <span class="site-menu-title">Message</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="apps/projects/projects.html">
                            <span class="site-menu-title">Projects</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="apps/mailbox/mailbox.html">
                            <span class="site-menu-title">Mailbox</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="apps/media/overview.html">
                            <span class="site-menu-title">Media</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="apps/work/work.html">
                            <span class="site-menu-title">Work</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="apps/location/location.html">
                            <span class="site-menu-title">Location</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="apps/travel/travel.html">
                            <span class="site-menu-title">Travel</span>
                            <div class="site-menu-label">
                                <span class="badge badge-info badge-round">new</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="page">
        <div class="page-content container-fluid">
            <div class="row" data-by-row="true">
                <div class="col-lg-12">
                    <!-- Example Panel With Tool -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Kiểm tra tài khoản</h3>
                            <div class="panel-actions">
                                <a class="panel-action icon wb-minus" data-toggle="panel-collapse" aria-expanded="true" aria-hidden="true"></a>
                                <a class="panel-action icon wb-expand" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row" data-by-row="true">
                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input value="qsqg2.wam" id="input_acc" type="text" class="form-control" name="" placeholder="account">
                                            <span class="input-group-btn">
                                                <button id="add_account" class="btn btn-primary"><i class="icon wb-search" aria-hidden="true"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <button id="list_acc" style="text-align:left; width:100%; background:transparent" class="btn btn-primary">
                                            <span>Danh sách</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <button style="width:100%" id="update_account" class="btn btn-primary">Cập nhật</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" data-by-row="true">
                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button id="update_interval_acc" type="button" class="btn btn-danger"><i class="icon wb-link" aria-hidden="true"></i> Cập nhật Acc</button>
                                            </span>
                                            <input id="interval_acc" type="number" class="form-control" placeholder="60s">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-4">
                                    <div class="form-group">
                                        
                                        <div class="input-group">
                                            <div class="radio-custom radio-primary">
                                                <input tag="wax" type="radio" checked name="usdChecked">
                                                <label for="inputChecked">Dùng Wax</label>
                                            </div>
                                            
                                            <div class="radio-custom radio-primary">
                                                <input tag="usd"  type="radio" name="usdChecked">
                                                <label for="inputChecked">Dùng USDT</label>
                                            </div>
                                            
                                            <div class="radio-custom radio-primary">
                                                <input tag="vnd" type="radio" name="usdChecked">
                                                <label for="inputChecked">Dùng VND</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Example Panel With Tool -->
                </div>
            </div>
            <div class="row" data-by-row="true">
                <div class="col-lg-6">
                    <!-- Example Panel With Tool -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Quản lý</h3>
                            <div class="panel-actions">
                                <a class="panel-action icon wb-minus" data-toggle="panel-collapse" aria-expanded="true" aria-hidden="true"></a>
                                <a class="panel-action icon wb-expand" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row" data-by-row="true">
                                <div class="col-12" id="manager">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span style="width: 20%;" class="input-group-addon">Báo cáo</span>
                                            <span style="width: 40%;" class="input-group-addon">Số tiền</span>
                                            <span style="width: 40%;" class="input-group-addon">Chiếm</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span style="width: 20%;" class="input-group-addon">Sẵn sàng rút</span>
                                            <input id="report_withdraw" type="text" class="form-control" placeholder="">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span style="width: 20%;" class="input-group-addon">Đầu tư</span>
                                            <input id="report_nap" type="text" class="form-control" placeholder="">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span style="width: 20%;" class="input-group-addon">Rút vốn</span>
                                            <input id="report_rut" type="text" class="form-control" placeholder="">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span style="width: 20%;" class="input-group-addon">An toàn</span>
                                            <input id="report_staked" type="text" class="form-control" placeholder="">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span style="width: 20%;" class="input-group-addon">Lợi nhuận</span>
                                            <input id="report_profits" type="text" class="form-control" placeholder="">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span style="width: 20%;" class="input-group-addon">Rút vốn</span>
                                            <input id="report_all" type="text" class="form-control" placeholder="">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Example Panel With Tool -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Nhập liệu</h3>
                            <div class="panel-actions">
                                <a class="panel-action icon wb-minus" data-toggle="panel-collapse" aria-expanded="true" aria-hidden="true"></a>
                                <a class="panel-action icon wb-expand" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row" data-by-row="true" >
                                <div class="col-12">
                                    <div class="form" id="input_form">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span style="width: 30%;" class="input-group-addon">Tài khoản</span>
                                                <input value="0"  name="taikhoan" type="text" class="form-control" placeholder="Tài khoản">
                                                <select name="hanhdong" class="form-control">
                                                    <option value="nap" selected>Nạp</option>
                                                    <option value="rut">Rút</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span style="width: 30%;" class="input-group-addon">WAX</span>
                                                <input name="wax" value="0"  type="number" class="form-control" placeholder="WAX">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span style="width: 30%;" class="input-group-addon">Giá WAX</span>
                                                <input name="wax_price" value="0"  type="number" class="form-control" placeholder="Giá WAX">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span style="width: 30%;" class="input-group-addon">Giá USDT</span>
                                                <input name="usd_price" value="0"  type="number" class="form-control" placeholder="Giá USDT">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span style="width: 30%;" class="input-group-addon">USD</span>
                                                <input readonly value="0" name="usd" type="number" class="form-control" placeholder="USD">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span style="width: 30%;" class="input-group-addon">VND</span>
                                                <input readonly name="vnd" type="number" value="0" class="form-control" placeholder="VND">
                                                <span  style="width: 20%;" class="input-group-btn">
                                                    <span id="save_form" style="width: 100%;"  class="btn btn-success btn-file">
                                                        <i class="icon wb-upload" aria-hidden="true"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">ACCOUNTS</h3>
                    <div class="panel-actions">
                        <a class="panel-action icon wb-minus" data-toggle="panel-collapse" aria-expanded="true" aria-hidden="true"></a>
                        <a class="panel-action icon wb-expand" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row" id="row_acc" data-by-row="true">
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-body">
                    <div class="row" data-by-row="true">
                        <div class="col-xl-4 col-lg-5 col-md-5">
                            <div class="card profile_card">
                                <div class="card-header">
                                    <div class="ntf-header media align-items-center mb-3">
                                        <div class="media-body">
                                            <span task="FWF_price" class="badge darken-3 md">0
                                            </span>
                                            <span class="badge darken-3 md">￦
                                            </span>

                                            <span task="FWF_price_percent" class="badge bg-danger">0%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="font-size: 12px;"  id="food_tool_templates">
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5 col-md-5">
                            <div class="card profile_card">
                                <div class="card-header">
                                    <div class="ntf-header media align-items-center mb-3">
                                        <div class="media-body">
                                            <span task="FWW_price" class="badge darken-3 md">0
                                            </span>
                                            <span class="badge darken-3 md">￦
                                            </span>

                                            <span task="FWW_price_percent" class="badge bg-danger">0%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="font-size: 12px;"  id="wood_tool_templates">
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5 col-md-5">
                            <div class="card profile_card">
                                <div class="card-header">
                                    <div class="ntf-header media align-items-center mb-3">
                                        <div class="media-body">
                                            <span task="FWG_price" class="badge darken-3 md">0
                                            </span>
                                            <span class="badge darken-3 md">￦
                                            </span>

                                            <span task="FWG_price_percent" class="badge bg-danger">0%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="font-size: 12px;"  id="gold_tool_templates">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    <div class="row" data-by-row="true">
                        <div class="col-xl-4 col-lg-5 col-md-5">
                            <div class="card profile_card">
                                <div class="card-header">
                                    <div class="ntf-header media align-items-center mb-3">
                                        <div class="media-body">
                                            <span task="FWF_price" class="badge darken-3 md">0
                                            </span>
                                            <span class="badge darken-3 md">￦
                                            </span>

                                            <span task="FWF_price_percent" class="badge bg-danger">0%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="font-size: 12px;"  id="food_member_templates">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-5">
                            <div class="card profile_card">
                                <div class="card-header">
                                    <div class="ntf-header media align-items-center mb-3">
                                        <div class="media-body">
                                            <span task="FWW_price" class="badge darken-3 md">0
                                            </span>
                                            <span class="badge darken-3 md">￦
                                            </span>

                                            <span task="FWW_price_percent" class="badge bg-danger">0%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="font-size: 12px;"  id="wood_member_templates">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-5">
                            <div class="card profile_card">
                                <div class="card-header">
                                    <div class="ntf-header media align-items-center mb-3">
                                        <div class="media-body">
                                            <span task="FWG_price" class="badge darken-3 md">0
                                            </span>
                                            <span class="badge darken-3 md">￦
                                            </span>
                                            <span task="FWG_price_percent" class="badge bg-danger">0%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="font-size: 12px;"  id="gold_member_templates">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    <div class="row" data-by-row="true">
                        <div class="col-xl-4 col-lg-5 col-md-5">
                            <div class="card profile_card">
                                <div class="card-header">
                                    <div class="ntf-header media align-items-center mb-3">
                                        <div class="media-body">
                                            <span task="FWF_price" class="badge darken-3 md">0
                                            </span>
                                            <span class="badge darken-3 md">￦
                                            </span>

                                            <span task="FWF_price_percent" class="badge bg-danger">0%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="font-size: 12px;" id="food_crop_templates">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-5">
                            <div class="card profile_card">
                                <div class="card-header">
                                    <div class="ntf-header media align-items-center mb-3">
                                        <div class="media-body">
                                            <span task="FWW_price" class="badge darken-3 md">0
                                            </span>
                                            <span class="badge darken-3 md">￦
                                            </span>

                                            <span task="FWW_price_percent" class="badge bg-danger">0%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body"  style="font-size: 12px;" id="wood_crop_templates">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-5">
                            <div class="card profile_card">
                                <div class="card-header">
                                    <div class="ntf-header media align-items-center mb-3">
                                        <div class="media-body">
                                            <span task="FWG_price" class="badge darken-3 md">0
                                            </span>
                                            <span class="badge darken-3 md">￦
                                            </span>
                                            <span task="FWG_price_percent" class="badge bg-danger">0%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="font-size: 12px;"  id="gold_crop_templates">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page -->


    <!-- Footer -->
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>


    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- End Page -->


    <!-- Footer -->