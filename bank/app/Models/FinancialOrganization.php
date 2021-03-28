<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinancialOrganization extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'financial_organizations';

    protected $fillable = [
        'name',
        'short_name',
        'address'
    ];


}
