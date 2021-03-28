<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'account_name' => 'required|string|max:255',
            'organization_id' => 'required|exists:financial_organizations,id',
            'account_no' => 'required|numeric',
            'account_type' => 'required|in:1,2,3',
            'branch' => 'required|string|max:255',
            'swift_code' => 'required|string|max:255',
            'route_no' => 'required|numeric',
        ];
    }


    public function attributes()
    {
        return [
            'account_name' => 'Account name',
            'organization_id' => 'Bank',
            'account_no' => 'Account number',
            'account_type' => 'Account type',
            'branch' => 'Branch',
            'swift_code' => 'Swift code',
            'route_no' => 'Route number',
        ];
    }

}
