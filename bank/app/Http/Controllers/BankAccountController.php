<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountRequest;
use App\Models\BankAccount;
use App\Models\FinancialOrganization;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankAccounts = BankAccount::with('bank')->simplePaginate(10);

        return view('admin.accounts.index', compact('bankAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['organizations'] = FinancialOrganization::all();
        $data['types'] = BankAccount::$account_type;

        return view('admin.accounts.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankAccountRequest $request, BankAccount $bankAccount)
    {
        $bankAccount->account_name = $request->account_name;
        $bankAccount->financial_organization_id = $request->organization_id;
        $bankAccount->account_no = $request->account_no;
        $bankAccount->account_type = $request->account_type;
        $bankAccount->branch = $request->branch;
        $bankAccount->swift_code = $request->swift_code;
        $bankAccount->route_no = $request->route_no;
        $bankAccount->save();

        return redirect('bank-accounts')->with('success', 'Account Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BankAccount $bankAccount)
    {
        $data['organizations'] = FinancialOrganization::all();
        $data['types'] = BankAccount::$account_type;

        return view('admin.accounts.edit', compact('data', 'bankAccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BankAccountRequest $request, BankAccount $bankAccount)
    {
        $bankAccount->account_name = $request->account_name;
        $bankAccount->financial_organization_id = $request->organization_id;
        $bankAccount->account_no = $request->account_no;
        $bankAccount->account_type = $request->account_type;
        $bankAccount->branch = $request->branch;
        $bankAccount->swift_code = $request->swift_code;
        $bankAccount->route_no = $request->route_no;
        $bankAccount->save();

        return redirect('bank-accounts')->with('success', 'Account Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankAccount $bankAccount)
    {
        $bankAccount->delete();

        return redirect('bank-accounts');
    }
}
