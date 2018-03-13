@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        
        <table id="task" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th>Id</th>
            <th>UserId</th>
            <th>Question1</th>
            <th>question2</th>
            <th>question3</th>
        </tr>
        </thead>
        <tbody>
                @foreach ($collectQuiz as $quiz) 
                <tr>
                        <td> {{ $quiz->id }}</td>
                        <td>{{ $quiz->user_id }}</td>
                        <td>{{ $quiz->question1  }}</td>
                        <td>{{$quiz->question2 }}</td>
                        <td>{{ $quiz->question3 }}</td>
                </tr>
                @endforeach    
        </tbody>
    </table>
    </div>
</div>
  
@endsection
