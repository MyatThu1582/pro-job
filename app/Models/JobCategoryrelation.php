<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobCategoryrelation extends Model
{
    //
    public function Job(){
        return $this->belongsTo(Job::class);
    }

    public function Job_Category(){
        return $this->belongsTo(JobCategory::class);
    }

}
