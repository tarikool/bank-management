@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Bank account

                        <a href="{{route('bank-accounts.create')}}" class="btn btn-primary btn-sm float-right">Create new</a>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Account Name</th>
                                <th>Bank</th>
                                <th>Account No</th>
                                <th>branch</th>
                                <th>Account Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach( $bankAccounts as $account )
                                <tr>
                                    <td>{{$account->account_name}}</td>
                                    <td>{{$account->bank->name}}</td>
                                    <td>{{$account->account_no}}</td>
                                    <td>{{$account->branch}}</td>
                                    <td>{{$account->getAccountType()}}</td>
                                    <td>
                                        <div class="row">

                                            <a href="{{route('bank-accounts.edit', $account->id)}}" class="btn btn-primary">Edit</a>

                                            <form action="{{route('bank-accounts.destroy', $account->id)}}" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="_method" value="DELETE">

                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>

                                        </div>


                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table>

                        {{$bankAccounts->links()}}



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function () {

            $(document).on('click', 'button', function () {


            })

        })
    </script>
@endpush
