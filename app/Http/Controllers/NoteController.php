<?php

namespace App\Http\Controllers;


use App\Models\Note;
use App\Http\Requests\NoteRequest;

class NoteController extends Controller
{
    protected $note;

    public function __construct(Note $note){
        $this->note = $note;
    }

    public function notes(){
        return view('notes');
    }

    public function store(NoteRequest $request){
        $validated = $request->validated();

        if(!$validated){
            return redirect()->route('notes')->withErrors('Validation Failed');
        }

        $createdNote = $this->note->create($validated);

        if(!$createdNote){
            return redirect()->route('notes')->withErrors('Validation Failed');
        }

        return redirect()->route('notes')->withSuccess("Note Has Been Added Successfully");
    }
}
