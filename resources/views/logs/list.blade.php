@extends('layouts.app')

@section('content')
    @foreach($logs as $log)
        <p class="text-center">{{var_dump($log)}}</p>
    @endforeach
@endsection
