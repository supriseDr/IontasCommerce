{{-- Bind The Variable--}}
<!doctype html>
<html>
    {{--header component with stylesheets--}}
    @include('./components/header')
    <body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">  
    {{--Include Javascript and Defer--}}
    <script src="assets/js/alpine.min.js" defer></script>
    {{--navbar component--}}
    @include('./components/navbar')
    @include('./components/carousel')
    {{--Products List Front End--}}
    @include('./components/products-list')
        <h1 class="text-3xl font-bold underline">    Hello {{$foo}} ! </h1>

    </body>
</html>