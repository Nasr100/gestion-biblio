<!DOCTYPE html>
<html lang="en" dir="ltr">
    @include('elements.header')
        <body>
            @include('elements.sidebar')
            <section class="home-section"> 
                @yield('content')
            </section>
        </body>
        <script src="js/main.js"></script>
        
</html>
