@extends('backend.layouts.app')
@section('title', 'Transaction')
@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all Transactions</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('transaction.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="15%">Name</th>
                            <th width="30%">Account Head</th>
                            <th width="30%">Site</th>
                            <th width="20%">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($transactions as $key => $transaction)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{str_limit($transaction->name, 47) }}</td>
                                <td>{{str_limit($transaction->accounthead->accountname,47)}}</td>
                                <td>{{str_limit($transaction->site->name,47)}}</td>
                                <td>{{str_limit($transaction->amount,47)}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Transactions available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop