@extends('layouts.master')

@section('title')
    View
@endsection

@section('content')
    {{ $site->url }}
    {{ $content_length_kb }}KB
    {{ $content_md5 }}
@endsection