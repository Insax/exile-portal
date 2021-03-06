@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">
            <div class="pb-16">
                @livewire('manage-portal-instances')
            </div>
        </div>
    </main>
@endsection
