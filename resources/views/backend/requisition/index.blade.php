<script src="{{ asset('backend/js/libs/jquery/jquery-1.11.2.min.js') }}"></script>

@extends('backend.layouts.app')
@section('title', 'Requisition')
@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">All Requisition Details</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('requisition.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="requisitionTable" class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="15%">Date</th>
                            <th width="10%">Site</th>
                            <th width="20%">Particulars</th>
                            <th width="10%">Quantity</th>
                            <th width="10%">Unit</th>
                            <th width="15%">Remarks</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($requisitions as $key => $requisition)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$requisition->updated_at->format('M d Y')}}</td>
                                <td>{{str_limit($requisition->site->Name,47)}}</td>
                                <td>{{str_limit($requisition->particulars, 47) }}</td>
                                <td>{{str_limit($requisition->quantity, 47) }}</td>
                                <td>{{str_limit($requisition->unit, 47) }}</td>
                                <td>{{str_limit($requisition->remarks, 47) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Requisition Details available.</td>
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
            $('#requisitionTable').dataTable();
        });
    </script>
@stop