<!DOCTYPE html>
<html lang="en">
    @include('sections.head')
    <body>
        @include('sections.topbar')

        @yield('content')

        <!-- Footer Start -->
        @include('sections.footer')
    @include('sections.scripts')
    </body>
</html>