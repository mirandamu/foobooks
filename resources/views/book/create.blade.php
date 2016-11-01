@extends('layouts.master')

@section('title')
    Create a book
@stop

@section('content')
    <form method='POST' action='/books'>
    {{ csrf_field() }}
    <input type='text' name='title'>
    <input type='submit' value='Submit'>
</form>
@stop