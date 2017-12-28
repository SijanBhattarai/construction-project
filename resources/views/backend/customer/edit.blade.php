@extends('backend.layouts.app')

@section('title', 'Customer')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($customer, ['route' =>['customer.update', $customer->name],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }} @include('backend.customer.partials.form', ['header' => 'Edit Customer<span class="text-primary">('.str_limit($customer->name, 47).')</span>'])
            {{ Form::close() }}
        </div>
    </section>
@stop