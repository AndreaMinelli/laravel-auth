<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected function getDescriptionAttribute($value)
    {
        return substr($value, 0, 40) . '...';
    }

    public function getProjectLink()
    {
        $link = $this->project_link;
        if (strlen($link) > 20) {
            $link =  substr($this->project_link, 0, 20) . '...';
        }
        return $link;
    }
}
