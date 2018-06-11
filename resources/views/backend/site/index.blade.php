<script src="{{ asset('backend/js/libs/jquery/jquery-1.11.2.min.js') }}"></script>

@extends('backend.layouts.app')

@section('title', 'Site')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all Sites</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('site.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="siteTable" class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="25%">Name</th>
                            <th width="25%">location</th>
                            <th width="45%">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($sites as $key => $site)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ str_limit($site->name, 47) }}</td>
                                <td>{{str_limit($site->location,47)}}</td>
                                <td>{{str_limit($site->description,47)}}</td>
                                <td class="text-right">
                                    <a href="{{route('site.edit', $site->name)}}" class="btn btn-flat btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <button type="button" data-url="{{ route('site.destroy', $site->name) }}" class="btn btn-flat btn-primary btn-xs item-delete">
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

    <script type="text/javascript">
        $(document).ready(function(){
            $('siteTable').dataTable();
        });
    </script>
@stop