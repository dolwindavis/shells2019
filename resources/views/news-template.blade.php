@extends('layouts.main')
@section('title','SHELLS2k19 |Newsfeed')



@section('content')

{!!html_entity_decode($news->body)!!}

@endsection