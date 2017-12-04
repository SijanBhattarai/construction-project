@extends('backend.layouts.app')

@section('title', 'AccountHead')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'accounthead.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('backend.accounthead.partials.form', ['header' => 'Create a AccountHead'])
            {{ Form::close() }}
        </div>
    </section>
@stop