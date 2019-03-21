@extends('layouts.main')
@section('title','SHELLS2k19 | STUDENTLIST')

@section('content')

    <div class="container" style="margin-top: 120px;">
        <h2 style="margin-bottom: 20px;">Results</h2>
        <div class="row">
            @foreach($result as $key =>$result)
            @if($key%4 == 0)
            <div class="col-md-4">
                <div class="card card-nav-tabs" style="width: 20rem;">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">{{$result->eventname}}</h4>
                        <p class="category">{{$result->roundname}}</p>
                    </div>
                    <ol style="margin-top: 15px;">
                        @foreach($result->students as $student)
                        <li>{{$student->name}}</li>
                        <!--<li>Dolwin Davis</li>
                        <li>Achuth P</li>
                        <li>Tanmay Shinde</li>--> 
                        @endforeach
                    </ol>
                </div>
            </div>
            @elseif($key%4 == 1)
            <div class="col-md-4">
            
                <div class="card card-nav-tabs" style="width: 20rem;">
                    <div class="card-header card-header-primary">
                    <h4 class="card-title">{{$result->eventname}}</h4>
                    <p class="category">{{$result->roundname}}</p>
                    </div>
                    <ol style="margin-top: 15px;">
                    @foreach($result->students as $student)
                        <li>{{$student->name}}</li>
                        <!--<li>Dolwin Davis</li>
                        <li>Achuth P</li>
                        <li>Tanmay Shinde</li>--> 
                        @endforeach
                    </ol>
                </div>
            </div>
            @elseif($key%4 == 2)
            <div class="col-md-4">
            
                <div class="card card-nav-tabs" style="width: 20rem;">
                    <div class="card-header card-header-danger">
                    <h4 class="card-title">{{$result->eventname}}</h4>
                    <p class="category">{{$result->roundname}}</p>
                    </div>
                    <ol style="margin-top: 15px;">
                        @foreach($result->students as $student)
                        <li>{{$student->name}}</li>
                        <!--<li>Dolwin Davis</li>
                        <li>Achuth P</li>
                        <li>Tanmay Shinde</li>--> 
                        @endforeach
                    </ol>
                </div>
            
            </div>
            @elseif($key%4 == 3)
            <div class="col-md-4">
            
                <div class="card card-nav-tabs" style="width: 20rem;">
                    <div class="card-header card-header-rose">
                    <h4 class="card-title">{{$result->eventname}}</h4>
                    <p class="category">{{$result->roundname}}</p>
                    </div>
                    <ol style="margin-top: 15px;">
                    @foreach($result->students as $student)
                        <li>{{$student->name}}</li>
                        <!--<li>Dolwin Davis</li>
                        <li>Achuth P</li>
                        <li>Tanmay Shinde</li>--> 
                        @endforeach
                    </ol>
                </div>
            
            </div>
            @endif
            @endforeach
        </div>

    </div>

@endsection