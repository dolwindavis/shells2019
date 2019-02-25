<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
                <tr>
                    <th colspan="5">College Name :- {{$data['college']->name }}</th>
                </tr>
                <tr>
                    <th colspan="5">College Username :- {{$data['college']->user->username}}</th>
                </tr>
        <tr>
            <th>S.no.</th>
            <th colspan="2">Participant Name</th>
            @foreach ($data['events'] as $event)
                <th>{{$event->name .'('. $event->info .')' }}</th>
            @endforeach
            {{-- <th>IT Quiz - Cozmo(2)</th>
            <th>Coding - DeepCoder</th>
            <th>IT Manager - Alpha Techie(1)</th>
            <th>Gaming - Aimbot(4)</th>
            <th>Web Designing - Deepweb(2)</th>
            <th>Google I - Diffbot(2)</th>
            <th>Movie Making - Lens Bians(2)</th>
            <th>Tech Monologue - Amelia</th>
            <th>Treasure Hunt - Navbot(2) </th>
            <th>Event X - Agent - X(6) </th> --}}
        </tr>
        </thead>
    
        <tbody>
            @php
              $i=1;$j=0;  
            @endphp
       @foreach($data['students'] as $key => $student )
            <tr>
                <td>{{$i++}}</td>
                <td colspan="2">{{ $student->name}}</td>
                {{-- <td>{{ $student->events->first() }}</td> --}}
                @foreach ( $data['events'] as $event )
                  <td>
                      
                 @if ($event->id == $student->events->first())
                  <b>yes</b> 
                    @else
                       <b>--</b> 
                    @endif      
                </td>  
                @endforeach
            </tr>

        @endforeach 
        </tbody>
    
    </table>
</body>
</html>