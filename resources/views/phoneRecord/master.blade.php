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

		@if ($errors->any())
			@foreach ($errors->all() as $error)
				<div style="color:red"> {{ $error }} </div>
			@endforeach
		@endif

		@section ('content')
		
		@if(count($phoneRecs) > 0)
		<br/>	
		<table name="Phones">
				<tr>
					<th>ФИО</th>
					<th>Номер телефона</th>
                    <th>Операции</th>
				</tr>
				
				@foreach ($phoneRecs as $phoneRec)	
					<tr>
						<td> {{ $phoneRec->fio }} </td>
						<td> {{ $phoneRec->phonenum }} </td>
						<td>
							<a href="{{ route('phoneRecords.edit', $phoneRec) }}" style="color: green">Изменить</a>

							{!! Form::open(['route' => ['phoneRecords.destroy', $phoneRec], 'method' => 'DELETE', 'class' => 'frm-link']) !!}
								<button type="submit" name="del" class="btn-link">Удалить</button>
								{{ csrf_field() }}
							{!! Form::close() !!}

						</td>
					</tr>
				@endforeach
				
			</table>
		@else	
			<p>Записная книжка пуста</p>
		@endif
				
        <br/>
        <br/>

		@show

	</body>
</html>
