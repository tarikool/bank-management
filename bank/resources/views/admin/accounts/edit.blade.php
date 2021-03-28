@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bank account</div>

                    <div class="card-body">
                        <form action="{{route('bank-accounts.update', $bankAccount->id)}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="PUT">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Name</label>
                                        <input type="text" name="account_name" class="form-control" value="{{old('account_name', $bankAccount->account_name)}}">
                                        <p class="text-danger">{{ $errors->first('account_name') }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bank</label>
                                        <select name="organization_id" class="form-control">
                                            <option value="">Select a organization</option>
                                            @foreach( $data['organizations'] as $key => $organization )
                                                <option value="{{$organization->id}}"
                                                    {{old('organization_id', $bankAccount->financial_organization_id)==$organization->id?'selected':''}}>
                                                    {{$organization->name}}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('organization_id') }}</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Number</label>
                                        <input type="number" name="account_no" class="form-control" value="{{old('account_no', $bankAccount->account_no)}}">
                                        <p class="text-danger">{{ $errors->first('account_no') }}</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Type</label>
                                        <select name="account_type" class="form-control">
                                            @foreach( $data['types'] as $key => $type )
                                                <option value="{{$key}}" {{old('account_type', $bankAccount->account_type)==$key?'selected':''}}>
                                                    {{$type}}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('account_type') }}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Branch</label>
                                        <input type="text" name="branch" class="form-control" value="{{old('branch', $bankAccount->branch)}}">
                                        <p class="text-danger">{{ $errors->first('branch') }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Swift code</label>
                                        <input type="text" name="swift_code" class="form-control" value="{{old('swift_code', $bankAccount->swift_code)}}">
                                        <p class="text-danger">{{ $errors->first('swift_code') }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Route number</label>
                                        <input type="number" name="route_no" class="form-control" value="{{old('route_no', $bankAccount->route_no)}}">
                                        <p class="text-danger">{{ $errors->first('route_no') }}</p>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Create</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
