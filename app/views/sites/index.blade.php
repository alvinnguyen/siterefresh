@extends('layouts.master')

@section('title')
    Sites

@endsection

@section('content')
    @if (count($sites) == 0)
        Too bad, no site
    @endif
@endsection