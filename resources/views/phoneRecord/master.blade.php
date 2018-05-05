<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Notebook</title>

		<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    </head>
    <body>

        <h2>Записная книжка</h2>

        <br/>

		@yield('subheader', '')

		@if ($errors->any())
			@foreach ($errors->all() as $error)
				<div style="color:red"> {{ $error }} </div>
			@endforeach
		@endif

		@yield('content')

	</body>
</html>
