@extends('backend.layouts.app')

@section('title', 'Documents')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all contacts</header>

                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">Name</th>
                            <th width="20%">Email</th>
                            <th width="20%">Message
                            <th width="20%">Mobile No.</th>
                            <th class="text-right">Actions</th>
                            <th width="20%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('backend.contact.partials.table', $contacts, 'contact')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection