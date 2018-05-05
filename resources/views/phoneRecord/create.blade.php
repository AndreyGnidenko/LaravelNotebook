
@extends('phoneRecord.master')

@section ('subheader')
    <h3>Новая запись</h3>
@endsection

@section ('content')

    {!! Form::open(['route' => 'phoneRecords.store', 'method'=>'POST']) !!}
        <label>ФИО:
            <input type="text" name="fio" placeholder="ФИО"></input>
        </label>
        <label>Номер телефона:
            <input type="text" name="phonenum" placeholder="+7 (900) 123-45-67"></input><br/><br/>
        </label>

        {!! Form::submit('Добавить', ['name' => 'create']) !!}
        {!! Form::submit('Отмена', ['name' => 'cancel']) !!}

        {{csrf_field()}}

    {!! Form::close() !!}

@endsection
