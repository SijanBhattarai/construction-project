@extends('backend.layouts.app')

@section('title', 'Transaction')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all transactions</header>
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
                            <th width="60%">Name</th>
                            <th width="20%" class="text-center">location</th>
                            <th width="15%" class="text-right">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($transactions as $key => $transaction)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ str_limit($transaction->name, 47) }}</td>
                                <td class="text-right">
                                    <a href="{{route('transaction.edit', $transaction->name)}}" class="btn btn-flat btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <button type="button" data-url="{{ route('transaction.destroy', $transaction->name) }}" class="btn btn-flat btn-primary btn-xs item-delete">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Sites available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop