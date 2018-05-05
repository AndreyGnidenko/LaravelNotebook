
@extends('phoneRecord.master')

@section ('subheader')
    <h3>Редактирование записи {{ $phoneRecord->fio }}</h3>
@endsection

@section ('content')

    {!! Form::open(['route' => ['phoneRecords.update', $phoneRecord], 'method'=>'PUT']) !!}

        <label>ФИО:
            <input type="text" name="fio" placeholder="ФИО" value="{{ $phoneRecord->fio }}"></input>
        </label>
        <label>Номер телефона:
            <input type="text" name="phonenum" value="{{ $phoneRecord->phonenum }}" placeholder="+7 (900) 123-45-67"></input><br/><br/>
        </label>

        {!! Form::submit('Сохранить', ['name' => 'update']) !!}
        {!! Form::submit('Отмена', ['name' => 'cancel']) !!}

        {{csrf_field()}}

    {!! Form::close() !!}

@endsection
