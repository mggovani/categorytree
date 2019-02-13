<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    @include('include.head')

    <body>
        <div id="app">
            <div class="app-content">

                @include('include.sidebar')
                @include('include.navbar')
                
            </div>
             <div  id="main-content">
                    <section class="wrapper">
                        @yield('content')
                        <!-- @include('include.modals') -->
                    </section>
                </div>
        </div>
      
        @include('include.script')  
        
    </body>
</html>