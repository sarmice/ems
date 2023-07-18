<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalkProposal extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'abstract', 'preferred_time_slot', 'speaker_id'];
}
