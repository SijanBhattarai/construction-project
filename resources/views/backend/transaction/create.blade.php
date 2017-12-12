@extends('backend.layouts.app')

@section('title', 'Transaction')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'transaction.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('backend.transaction.partials.form', ['header' => 'Create a Transaction'])
            {{ Form::close() }}
        </div>
    </section>
@stop