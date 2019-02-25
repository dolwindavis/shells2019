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
            <th>S.no.</th>
            <th>Name</th>
            <th>College Name</th>
            <th>user ID</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>
        </thead>
    
        <tbody>
            @php
              $i=1;  
            @endphp
       @foreach( $data['students'] as $student )
            <tr>
                <td>{{$i++}}</td>
                <td>{{ $student->name}}</td>
                <td>{{ $student->collegeDetails->name }}</td>
                <td>{{ $student->userDetails->username }}</td> 
                <td>{{ $student['email'] }}</td>
                <td>{{ $student['phone'] }}</td>
            </tr>
        @endforeach 
        </tbody>
    
    </table>
</body>
</html>