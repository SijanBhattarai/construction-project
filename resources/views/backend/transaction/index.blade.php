@extends('backend.layouts.app')

@section('title', 'Transaction')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">All transactions</header>
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
                            <th width="40%">Name</th>
                            <th width="20%" class="text-center">Site</th>
                            <th width="15%" class="text-right">Heading</th>
                            <th width="20%" class="text-center">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($transactions as $key => $transaction)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ str_limit($transaction->name, 47) }}</td>
                                <td>{{ str_limit($transaction->site,47) }}</td>
                                <td>{{ str_limit($transaction->accounthead, 47) }}</td>
                                <td>{{ str_limit($transaction->amount, 47) }}</td>

                                {{--<td class="text-right">--}}
                                    {{--<a href="{{route('transaction.edit', $transaction->name)}}" class="btn btn-flat btn-primary btn-xs">--}}
                                        {{--Edit--}}
                                    {{--</a>--}}
                                    {{--<button type="button" data-url="{{ route('transaction.destroy', $transaction->name) }}" class="btn btn-flat btn-primary btn-xs item-delete">--}}
                                        {{--Delete--}}
                                    {{--</button>--}}
                                {{--</td>--}}
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