@include('inc.header')

<body>
    <section class="body2">
        {{-- @include('common.errors') --}}
        @yield('content');
    </section>

    {{-- start: js --}}
    @include('inc.footer')
    {{-- end: js --}}
</body>

</html>