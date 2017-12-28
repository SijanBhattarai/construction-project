@extends('backend.layouts.app')

@section('title', 'Customer')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'customer.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('backend.customer.partials.form', ['header' => 'Create a Customer'])
            {{ Form::close() }}
        </div>
    </section>
@stop