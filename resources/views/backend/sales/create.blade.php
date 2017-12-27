@extends('backend.layouts.app')

@section('title', 'Sales')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'sales.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('backend.sales.partials.form', ['header' => 'Add Sales Details'])
            {{ Form::close() }}
        </div>
    </section>
@stop