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
                            <th width="5%">Date</th>
                            <th width="10%">Heading</th>
                            <th width="10%">Account Head</th>
                            <th width="10%">Site</th>
                            <th width="5%">Quantity</th>
                            <th width="10%">Rate</th>
                            <th width="5%">Amount</th>
                            <th width="10%">Cheque No</th>
                            <th width="10%">Cheque Date</th>
                            <th width="10%">OS No</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($transactions as $key => $transaction)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$transaction->updated_at->format('M d Y')}}</td>
                                <td>{{str_limit($transaction->heading, 47) }}</td>
                                <td>{{str_limit($transaction->accounthead->accountname,47)}}</td>
                                <td>{{str_limit($transaction->site->Name,47)}}</td>
                                <td>{{str_limit($transaction->quantity,47)}}</td>
                                <td>{{str_limit($transaction->rate,47)}}</td>
                                <td>{{str_limit($transaction->amount,47)}}</td>
                                <td>{{str_limit($transaction->cheque_no,47)}}</td>
                                <td>{{str_limit($transaction->cheque_date,47)}}</td>
                                <td>{{str_limit($transaction->of_no,47)}}</td>
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