@extends('backend.layouts.app')

@section('title', 'Sales')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($sale, ['route' =>['sales.update', $sale->slug],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }} @include('backend.sales.partials.form',['header' => 'Edit Sales Details <span class="text-primary">('.str_limit($sale->heading, 47).')</span>'])
            {{ Form::close() }}
        </div>
    </section>
@stop