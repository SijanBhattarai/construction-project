<script src="{{ asset('backend/js/libs/jquery/jquery-1.11.2.min.js') }}"></script>

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
                    <table id="salesTable" class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Date</th>
                            <th width="10%">Customer</th>
                            <th width="10%">Site</th>
                            <th width="10%">Taxable Sales</th>
                            <th width="10%">TDS Amount</th>
                            <th width="10%">Mobilization</th>
                            <th width="10%">Reatation Amount</th>
                            <th width="10%">BNK Amount</th>
                            <th width="10%">Tax Amount</th>
                            <th width="10%">Total Payable</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($sales as $key => $sale)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$sale->updated_at->format('M d Y')}}</td>
                                <td>{{str_limit($sale->customer->name,47)}}</td>
                                <td>{{str_limit($sale->site->Name,47)}}</td>
                                <td>{{str_limit($sale->taxable_sales, 47) }}</td>
                                <td>{{str_limit($sale->TdsAmount, 47) }}</td>
                                <td>{{str_limit($sale->mobilization, 47) }}</td>
                                <td>{{str_limit($sale->RetentionAmount, 47) }}</td>
                                <td>{{str_limit($sale->BNKAmount, 47) }}</td>
                                <td>{{str_limit($sale->VatAmount, 47) }}</td>
                                <td>{{str_limit($sale->TotalPayable, 47) }}</td>
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

    <script type="text/javascript">
        $(document).ready(function(){
            $('salesTable').dataTable();
        });
    </script>
@stop