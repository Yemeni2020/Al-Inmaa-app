<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $fillable =['branch_id','phone_number'];

    public function branch()  {
        return $this->belongsTo(Branch::class);
    }
}
