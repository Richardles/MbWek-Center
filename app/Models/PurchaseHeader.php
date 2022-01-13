<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseHeader extends Model
{
    use HasFactory;
    protected $primaryKey = 'purchase_header_id';
    protected $table = 'purchase_headers';
}
