<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UE extends Model
{
    public function ecs()
    {
        return $this->hasMany(EC::class);
    }


    public function calculMoyenne($etudiant_id)
    {
        $totalNotes = 0;
        $totalCoefficients = 0;

        foreach ($this->ecs as $ec) {
            $note = $ec->notes()->where('etudiant_id', $etudiant_id)->first();
            if ($note) {
                $totalNotes += $note->note * $ec->coefficient;
                $totalCoefficients += $ec->coefficient;
            }
        }

        return $totalCoefficients > 0 ? $totalNotes / $totalCoefficients : 0;
    }
}
    
    
