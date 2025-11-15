<!DOCTYPE html>
<html lang="en">
    @include('sections.head')
    <body>
        <!-- Scroll Progress Bar -->
        <div class="scroll-progress"></div>

        @include('sections.topbar')

        @yield('content')

        <!-- Footer Start -->
        @include('sections.footer')
    @include('sections.scripts')
    </body>
</html>