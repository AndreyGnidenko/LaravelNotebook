
@extends('phoneRecord.master')

@section ('content')

    {!! Form::open(['route' => 'phoneRecords.store', 'method'=>'POST']) !!}
        <label>ФИО:
            <input type="text" name="fio" placeholder="ФИО"></input>
        </label>
        <label>Номер телефона:
            <input type="text" name="phonenum" placeholder="+7 (900) 123-45-67"></input><br/><br/>
        </label>
        <input type="submit" name="create" value="Добавить" />
        <input type="submit" name="cancel" value="Отмена" />

        {{csrf_field()}}

    {!! Form::close() !!}

    @parent

@endsection
