<!DOCTYPE html>
<html lang="en">

<head>
    @include('particials/header')
</head>

<body style="background-color: #f9f9f9">
    @include('particials.navbar')
    @yield('content')
    @include('particials/assetJs')
</body>

</html>
