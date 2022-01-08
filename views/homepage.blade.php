{{-- Bind The Variable--}}
<!doctype html>
<html>
    {{--header component with stylesheets--}}
    @include('./components/header')
    <body>  
    {{--navbar component--}}
    @include('./components/navbar')
    @include('./components/products-list')
        <h1 class="text-3xl font-bold underline">    Hello {{$foo}} ! </h1>
    </body>
</html>