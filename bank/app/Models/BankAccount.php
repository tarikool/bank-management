<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bank_accounts';

    protected $fillable = [
        'financial_organization_id',
        'store_id',
        'account_name',
        'account_no',
        'branch',
        'account_type',
        'swift_code',
        'route_no',
    ];


    public static $account_type = [
        1 => 'Savings Account',
        2 => 'Current Account',
        3 => 'Joint Account',
    ];


    public function bank()
    {
        return $this->belongsTo(FinancialOrganization::class, 'financial_organization_id', 'id');
    }


    public function getAccountType()
    {
        $types = self::$account_type;
        return $types[$this->account_type];
    }


}
