<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $table = 'payments';

    public $fillable = [
        'user_id',
        'order_id',
        'amount',
        'currency',
        'payment_method'
    ];
}
