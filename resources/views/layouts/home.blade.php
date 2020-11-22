<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Callie HTML Template</title>
    @include('includes.style')
    @stack('addon-style')

<body>
    @include('includes.header')
    @include('includes.sectionA')
    @include('includes.sectionB')
    {{-- @include('includes.sectionC')
    @include('includes.sectionD')
    @include('includes.sectionE') --}}

    @include('includes.footer')

    @include('includes.script')
    @stack('addon-script')

</body>