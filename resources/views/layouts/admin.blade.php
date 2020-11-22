<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Blank Page &mdash; Stisla</title>

    @include('includes.admin.style')
    @stack('addon-style')
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('includes.admin.navbar')

            @include('includes.admin.sidebar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('sub-judul')</h1>
                    </div>

                    @yield('content')

                </section>
            </div>
            @include('includes.admin.footer')
        </div>
    </div>

    @include('includes.admin.script')
    @stack('addon-script')
</body>

</html>