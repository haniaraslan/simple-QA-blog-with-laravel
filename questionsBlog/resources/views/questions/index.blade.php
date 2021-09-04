@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">welcome!</h1>
                        <p class="pt-2">Enjoy reading our Questions. Click on a Question to show its Answers</p>
                    </div>
                    <div class="col-4 pt-3">
                        <p>Have a new Question?</p>
                        <a href="/questions/create/question" class="btn btn-primary btn-sm">Add it here !</a>
                    </div>
                </div>       
      
                @forelse($questions as $question)
                    <ul>
                        <li><a href="./questions/{{ $question->id }}">{{ ucfirst($question->question) }}</a></li>
                    </ul>
                @empty
                    <p class="text-warning">No Questions available</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection