<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all()->sortByDesc('likes'); //fetch all blog posts from DB
	    return view('questions.index',[
            'questions' => $questions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('questions.createQuestion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $newQuestion = Question::create([
            'question' => $request->question,
        ]);
        $newQuestion -> save();
        return redirect('questions/' . $newQuestion->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $questions
     * @return \Illuminate\Http\Response
     */

    public function show(Question $question)
    {
        return view('questions.show', [
            'question' => $question,
        ]); //returns the view with the post
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $questions
     * @return \Illuminate\Http\Response
     */

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect('/questions');
    }

    public function like(Request $request)
    {
        $question = Question::find($request->question_id);
        $question->likes += 1;
        $question->update();
        return redirect('questions/'.$request->question_id);
    }
    
    public function dislike(Request $request)
    {
        $question = Question::find($request->question_id);
        $question->likes -= 1;
        $question->update();
        return redirect('questions/'.$request->question_id);
    }
}
