<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('template/partials/_header')
<body>
	@include('template/partials/_nav')
		<section>
			 @yield('content')
		</section>
	@include('template/partials/_footer')
</body>
</html>