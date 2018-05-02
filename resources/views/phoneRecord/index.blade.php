
@extends('phoneRecord.master')

@section ('content')

    @parent

    {!! Form::open(['route' => 'phoneRecords.create', 'method'=>'GET']) !!}
    <button type="submit" name="add" value="Создать">Создать</button>
    {{ csrf_field() }}
    {!! Form::close() !!}

@endsection