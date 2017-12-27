@extends('backend.layouts.app')
@section('title', 'Sales')
@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">All Sales Details</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('sales.create') }}">
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
                            <th width="10%">Date</th>
                            <th width="10%">Site</th>
                            <th width="15%">Heading</th>
                            <th width="20%">Total Payable</th>
                            <th width="15%">TDS</th>
                            <th width="15%">Mobilization</th>
                            {{--<th width="10%">Edit</th>--}}

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($sales as $key => $sale)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$sale->updated_at->format('M d Y')}}</td>
                                <td>{{str_limit($sale->site->Name,47)}}</td>
                                <td>{{str_limit($sale->heading, 47) }}</td>
                                <td>{{str_limit($sale->total_payable, 47) }}</td>
                                <td>{{str_limit($sale->tds_percent, 47) }}</td>
                                <td>{{str_limit($sale->mobilization, 47) }}</td>
                                {{--<td class="text-right">--}}
                                    {{--<a href="{{route('sales.edit', $sale->slug)}}" class="btn btn-flat btn-primary btn-xs">--}}
                                        {{--Edit--}}
                                    {{--</a>--}}
                                {{--</td>--}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Sales Details available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop