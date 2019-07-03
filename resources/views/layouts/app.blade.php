@include('inc.header')
	<body>
		<section class="body">

			<!-- start: header -->
			@include('inc.menu-header')
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar-left -->
				@include('inc.menu-sidebar-left')
				<!-- end: sidebar-left -->

				<section role="main" class="content-body">
                    @include('inc.menu-navbar')                  
					<!-- start: page -->
                    @yield('content')
					<!-- end: page -->
				</section>
			</div>

            <!-- start: sidebar-right -->
            @include('inc.menu-sidebar-right')
			<!-- end: sidebar-right -->
		</section>

        {{-- start: js --}}
		@include('inc.footer')
		{{-- end: js --}}
	</body>
</html>