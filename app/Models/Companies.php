<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'website',
        'country',
        'city',
        'address',
        'zip_code',
        'bank_name',
        'bank_account',
        'employee_id',
    ];

    public function created_by()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
