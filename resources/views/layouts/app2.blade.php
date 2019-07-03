@include('inc.header')

<body>
    <section class="body2">
        @yield('content');
    </section>

    {{-- start: js --}}
    @include('inc.footer')
    {{-- end: js --}}
</body>

</html>