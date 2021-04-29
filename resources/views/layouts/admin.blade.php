<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>CMS</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="{{asset('/admin/assets/js/config.js')}}"></script>
    <script src="{{asset('/admin/vendors/overlayscrollbars/OverlayScrollbars.min.js')}}"></script>
    <link href="{{asset('/admin/vendors/dropzone/dropzone.min.css')}}" rel="stylesheet" />


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="{{asset('/admin/vendors/overlayscrollbars/OverlayScrollbars.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/assets/css/theme-rtl.min.css')}}" rel="stylesheet" id="style-rtl">
    <link href="{{asset('/admin/assets/css/theme.min.css')}}" rel="stylesheet" id="style-default">
    <link href="{{asset('/admin/assets/css/user-rtl.min.css')}}" rel="stylesheet" id="user-style-rtl">
    <link href="{{asset('/admin/assets/css/user.min.css')}}" rel="stylesheet" id="user-style-default">
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>


<body>

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container" data-layout="container">
        <script>
            var isFluid = JSON.parse(localStorage.getItem('isFluid'));
            if (isFluid) {
                var container = document.querySelector('[data-layout]');
                container.classList.remove('container');
                container.classList.add('container-fluid');
            }
        </script>
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
            <script>
                var navbarStyle = localStorage.getItem("navbarStyle");
                if (navbarStyle && navbarStyle !== 'transparent') {
                    document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
                }
            </script>
            <div class="d-flex align-items-center">
                <div class="toggle-icon-wrapper">

                    <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span
                                class="toggle-line"></span></span></button>

                </div>
                <a class="navbar-brand" href="#">
                    <div class="d-flex align-items-center py-3">
                        <span
                            class="font-sans-serif">CMS
                        </span>
                    </div>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                <div class="navbar-vertical-content scrollbar">
                    <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                        <li class="nav-item">
                            <!-- label-->
                            <div class="row navbar-vertical-label-wrapper mb-2">
                                <div class="col-auto navbar-vertical-label">Dashboard
                                </div>
                                <div class="col ps-0">
                                    <hr class="mb-0 navbar-vertical-divider"/>
                                </div>
                            </div>
                            <!-- parent pages-->
                            <a class="nav-link active" href="{{route('admin.categories.index')}}" role="button">
                                <div class="d-flex align-items-center">

                                    <span class="nav-link-text ps-1">Categories</span>
                                </div>
                            </a>
                            <!-- parent pages-->
                            <a class="nav-link active" href="{{route('admin.subcategories.index')}}" role="button">
                                <div class="d-flex align-items-center">

                                    <span class="nav-link-text ps-1">SubCategories</span>
                                </div>
                            </a>

                            <a class="nav-link active" href="{{route('admin.items.index')}}" role="button">
                                <div class="d-flex align-items-center">

                                    <span class="nav-link-text ps-1">Items</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

                <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                        aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
                    <span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                <a class="navbar-brand me-1 me-sm-3" href="index.html">
                    <div class="d-flex align-items-center"><img class="me-2" src=""
                                                                alt="" width="40"/><span
                            class="font-sans-serif">CMS</span>
                    </div>
                </a>

                <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">

                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" id="navbarDropdownUser" href="#"
                                                     role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                     aria-expanded="false">
                            <div class="avatar avatar-xl">
                                <img class="rounded-circle" src="assets/img/team/3-thumb.png" alt=""/>

                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                            <div class="bg-white dark__bg-1000 rounded-2 py-2">
                                <a class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>


            @yield('content')


        </div>

    </div>
</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->






<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="{{asset('/admin/vendors/dropzone/dropzone.min.js')}}"></script>
<script src="{{asset('/admin/vendors/popper/popper.min.js')}}"></script>
<script src="{{asset('/admin/vendors/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('/admin/vendors/anchorjs/anchor.min.js')}}"></script>
<script src="{{asset('/admin/vendors/is/is.min.js')}}"></script>
<script src="{{asset('/admin/vendors/echarts/echarts.min.js')}}"></script>
<script src="{{asset('/admin/vendors/progressbar/progressbar.min.js')}}"></script>
<script src="{{asset('/admin/vendors/fontawesome/all.min.js')}}"></script>
<script src="{{asset('/admin/vendors/lodash/lodash.min.js')}}"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="{{asset('/admin/vendors/list.js/list.min.js')}}"></script>
<script src="{{asset('/admin/assets/js/theme.js')}}"></script>



</body>

</html>
