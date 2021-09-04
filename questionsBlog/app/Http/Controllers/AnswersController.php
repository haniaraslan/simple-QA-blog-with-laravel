<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;

use Illuminate\Http\Request;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create(Question $question)
    {
        return view('questions.show', [
            'question' => $question,
        ]);
        // return view('questions.createAnswer');
        // return redirect()::back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $question = Question::find($request->question_id);
        $question->hasAnswer = 1;
        $newAnswer = Answer::create([
            'answer' => $request->answer,
            'question_id' =>  $request->question_id,
        ]);
        $newAnswer->save();
        $question->update();
        return redirect('questions/' . $newAnswer->question_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answers
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer $answers
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answers
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $answer = Answer::find($request->answer_id);
        $answersCount = Answer::where('question_id',$request->question_id)->count();
        if($answersCount-1 == 0){
            $question = Question::find($request->question_id);
            $question->hasAnswer = 0;
            $question->update();
        }

        $answer->delete();
        return redirect('questions/'. $request->question_id);
    }

    public function like(Request $request)
    {
        $answer = Answer::find($request->answer_id);
        $answer->likes += 1;
        $answer->update();

        return redirect('questions/'.$answer->question_id);
    }
    
    public function dislike(Request $request)
    {
        $answer = Answer::find($request->answer_id);
        $answer->likes -= 1;
        $answer->update();
        return redirect('questions/'.$answer->question_id);
    }
}
