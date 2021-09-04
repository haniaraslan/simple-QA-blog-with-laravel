@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 pt-4">
            <a href="/questions" class="btn btn-outline-primary btn-sm">Go back</a>
            <div class="row pt-4">
                <div class="col-8">
                    <h1 class="display-one">{{ ucfirst($question->question) }}</h1>
                </div>
                <div class="col-4">
                    <form id="q-delete-frm" class="" action="" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn">Delete Question</button>
                    </form>
                </div>
            </div>
            <div class="row col-7 pt-1">
                <div class="col-1">
                    <form id="q-like-frm" class="" action="/questions/like" method="POST">
                        @csrf
                        <input type="hidden" id="question_id" name="question_id" value="{{$question->id}}">
                        <button class="btn btn-success">Like</button>
                    </form>
                </div>
                <div class="col-1">
                    <form id="q-dislike-frm" class="" action="/questions/dislike" method="POST">
                        @csrf
                        <input type="hidden" id="question_id" name="question_id" value="{{$question->id}}">
                        <button class="btn btn-danger">dislike</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <hr>
    
    <div class="row">
        <div class="col-12 pt-4">
            @if ( !$question->hasAnswer )
            <p> This question has not been answered yet.</p>
            @else
            <ul>
                @foreach( $question->answers as $answer )

                <div class="row">
                    <div class="col-12 pt-2">
                        <p>{{ e($answer->answer) }} </p>
                    </div>
                </div>

                <div class="row col-10">
                    <div class="col-1">
                        <form id="a-like-frm" class="" action="/questions/like/answer" method="POST">
                            @csrf
                            <input type="hidden" id="answer_id" name="answer_id" value="{{$answer->id}}">
                            <button class="btn btn-success btn-sm">Like</button>
                        </form>
                    </div>
                    <div class="col-1">
                        <form id="a-dislike-frm" class="" action="/questions/dislike/answer" method="POST">
                            @csrf
                            <input type="hidden" id="answer_id" name="answer_id" value="{{$answer->id}}">
                            <button class="btn btn-dark btn-sm">dislike</button>
                        </form>
                    </div>
                    <div class="col-4">
                        <form id="a-delete-frm" class="" action="/questions/delete/answer" method="POST">
                            <input type="hidden" id="question_id" name="question_id" value="{{$question->id}}">
                            <input type="hidden" id="answer_id" name="answer_id" value="{{$answer->id}}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">Delete Answer</button>
                        </form>
                    </div>
                </div>
                <!-- </li> -->
                @endforeach
            </ul>
            @endif
        </div>

    </div>
    <br>

    <div class="row pb-4">
        <div id="answers">
            <legend class="text-center">Add an Answer!!</legend>
        </div>
        <form action="/questions/create/answer" method="POST">
            @csrf

            <div class="row">
                <div class="control-group col-12 mt-2">
                    <input type="hidden" id="question_id" name="question_id" value="{{$question->id}}">
                    <textarea id="answer" class="form-control" name="answer" placeholder="Enter answer" rows=""
                        required></textarea>
                </div>
            </div>
            <div class="row mt-2">
                <div class="control-group col-12 text-center">
                    <button id="btn-submit" class="btn btn-primary">
                        Publish Answer
                    </button>
                </div>
            </div>
        </form>
        <br>
    </div>
</div>
@endsection