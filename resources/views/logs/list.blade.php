@extends('layouts.app')

@section('content')
    @foreach($logs as $log)
        <p class="text-center">{!! $log->log_entry !!}}</p>

    @endforeach
@endsection
