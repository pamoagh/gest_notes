<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'etudiant_id', 'ec_id', 'note', 'session', 'date_evaluation'
    ];}
