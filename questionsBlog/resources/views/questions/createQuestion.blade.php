@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/questions" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="mt-5 pl-4 pr-4 pb-4">
                    <h1 class="display-4">Add a New Question</h1>
                    <p>Fill and submit this form to create a Question</p>
                    <hr>
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="control-group col-12 mt-2">
                                <label for="question">Post Question</label>
                                <textarea id="question" class="form-control" name="question" placeholder="Enter Question"
                                          rows="" required></textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Publish Question
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection