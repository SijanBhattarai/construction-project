@extends('backend.layouts.app')

@section('title', 'Post')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all gallery</header>
                    <div class="tools">
                     <a class="btn btn-primary ink-reaction" href="{{ route('gallery.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="20%">Name</th>
                            <th width="50%">Published</th>
                            <th width="15%" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('backend.gallery.partials.table', $gallery, 'gallery')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop