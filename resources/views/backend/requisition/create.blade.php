@extends('backend.layouts.app')

@section('title', 'Requisition')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'requisition.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('backend.requisition.partials.form', ['header' => 'Add Requisition Details'])
            {{ Form::close() }}
        </div>
    </section>
@stop