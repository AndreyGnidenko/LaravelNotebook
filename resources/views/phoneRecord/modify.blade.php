
@extends('phoneRecord.master')

@section ('content')

    {!! Form::open(['route' => ['phoneRecords.update', $phoneRecord], 'method'=>'PUT']) !!}
    <label>ФИО:
        <input type="text" name="fio" placeholder="ФИО" value="{{ $phoneRecord->fio }}"></input>
    </label>
    <label>Номер телефона:
        <input type="text" name="phonenum" value="{{ $phoneRecord->phonenum }}" placeholder="+7 (900) 123-45-67"></input><br/><br/>
    </label>
    <input type="submit" name="update" value="Сохранить" />
    <input type="submit" name="cancel" value="Отмена" />

    {{csrf_field()}}

    {!! Form::close() !!}

@endsection
