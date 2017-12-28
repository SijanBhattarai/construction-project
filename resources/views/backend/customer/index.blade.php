@extends('backend.layouts.app')

@section('title', 'Customer')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all Customers</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('customer.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="25%">Name</th>
                            <th width="25%">Address</th>
                            <th width="25%">Email</th>
                            <th width="25%">Contact</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($customers as $key => $customer)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ str_limit($customer->name, 47) }}</td>
                                <td>{{ str_limit($customer->address, 47) }}</td>
                                <td>{{str_limit($customer->email,47)}}</td>
                                <td>{{str_limit($customer->contact,47)}}</td>
                                <td class="text-right">
                                    <a href="{{route('customer.edit', $customer->name)}}" class="btn btn-flat btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <button type="button" data-url="{{ route('customer.destroy', $customer->name) }}" class="btn btn-flat btn-primary btn-xs item-delete">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Customers available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop