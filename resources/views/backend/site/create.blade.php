@extends('backend.layouts.app')

@section('title', 'Site')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'site.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('backend.site.partials.form', ['header' => 'Create a Site'])
            {{ Form::close() }}
        </div>
    </section>
@stop