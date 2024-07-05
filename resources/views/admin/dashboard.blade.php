@extends('layouts.admin')

@section('content')
    Bem vindo(a), {{ auth()->user()->name }}!
@endsection
