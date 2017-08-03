<!doctype html>
<html class="error-page no-js" lang="">

<!-- Mirrored from sublime.nyasha.me/admin/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Mar 2015 03:35:56 GMT -->
<head>


    @include('templates.head')

</head>

<body class="bg-primary">

<div class="center-wrapper">
    <div class="center-content text-center">
        <div class="error-number animated bounceIn">503</div>
        <div class="mb25">BE RIGHT BACK</div>
        <p>Service unavailable now.</p>
        <!-- <div class="search">
            <form class="form-inline" role="form">
                <div class="search-form">
                    <button class="search-button" type="submit" title="Search">
                        <i class="ti-search"></i>
                    </button>
                    <input type="text" class="form-control no-b" placeholder="Search Admin Panel">
                </div>
            </form>
        </div> -->
        <?php
        $profil = App\Model\Pengaturan\Profil::find(1);
        ?>
        <ul class="mt25 error-nav">
            <li>
                <a href="javascript:;">&copy;
                    <span id="year" class="mr5"></span>
                    @if(count($profil)==0)Koperasi @else{{ $profil->nama_koperasi }}@endif
                </a>
            </li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    var el = document.getElementById("year"),
            year = (new Date().getFullYear());
    el.innerHTML = year;
</script>
</body>


<!-- Mirrored from sublime.nyasha.me/admin/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Mar 2015 03:35:56 GMT -->
</html>
