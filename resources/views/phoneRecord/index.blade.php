
@extends('phoneRecord.master')

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
                        {!! Form::submit('Удалить', ['name' => 'del', 'class'=>'btn-link']) !!}
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

    {!! Form::open(['route' => 'phoneRecords.create', 'method'=>'GET']) !!}

    {!! Form::submit('Создать', ['name' => 'create']) !!}

    {{ csrf_field() }}
    {!! Form::close() !!}

@endsection