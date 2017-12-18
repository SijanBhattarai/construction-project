@extends('backend.layouts.app')

@section('title', 'Accounthead')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all AccountHeads</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('accounthead.create') }}">
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
                            <th width="60%">Accountname</th>
                            <th width="35%" class="text">Rate</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($accountheads as $key => $accounthead)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ str_limit($accounthead->accountname, 47) }}</td>
                                <td>{{str_limit($accounthead->rate,47)}}</td>
                                <td class="text-right">
                                    <a href="{{route('accounthead.edit', $accounthead->accountname)}}" class="btn btn-flat btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <button type="button" data-url="{{ route('accounthead.destroy', $accounthead->accountname) }}" class="btn btn-flat btn-primary btn-xs item-delete">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No AccountHeads available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop