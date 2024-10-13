<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $fillable =['branch_id','email_address'];

    public function branch()  {
        return $this->belongsTo(Branch::class);
    }
}
