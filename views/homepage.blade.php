{{-- Bind The Variable--}}
<!doctype html>
<html>
    {{--header component with stylesheets--}}
    @include('./components/header')
    <body>  
    {{--Include Javascript and Defer--}}
    <script src="assets/js/alpine.min.js" defer></script>
    {{--navbar component--}}
    @include('./components/navbar')
    {{--Products List Front End--}}
    @include('./components/products-list')
        <h1 class="text-3xl font-bold underline">    Hello {{$foo}} ! </h1>

    </body>
</html>