<!DOCTYPE html>
<html lang="en">
<head>
 @include('frontend.templates.party.head');
</head><!--/head-->
<body>
@include('frontend.templates.party.header');

@include('frontend.templates.party.navigation');

    @yield('content');

    @include('frontend.templates.party.footer');

@include('frontend.templates.party.script');
</body>
</html>
