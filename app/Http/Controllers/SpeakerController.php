<?php
// app/Http/Controllers/SpeakerController.php

namespace App\Http\Controllers;

use App\Models\Speaker;
use App\Models\TalkProposal;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    public function create()
    {
        return view('speaker-form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'bio' => 'required',
            'title' => 'required',
            'abstract' => 'required',
            'preferred_time_slot' => 'required',
        ]);

        $speaker = Speaker::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'bio' => $validatedData['bio'],
        ]);

        $talkProposal = TalkProposal::create([
            'title' => $validatedData['title'],
            'abstract' => $validatedData['abstract'],
            'preferred_time_slot' => $validatedData['preferred_time_slot'],
            'speaker_id' => $speaker->id,
        ]);

        return redirect()->back()->with('success', 'Your talk proposal has been submitted.');
    }
}
