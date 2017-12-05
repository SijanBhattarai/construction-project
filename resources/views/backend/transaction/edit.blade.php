@extends('backend.layouts.app')

@section('title', 'Trasaction')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($transaction, ['route' =>['transaction.update', $transaction->Name],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }} @include('backend.transaction.partials.form', ['header' => 'Edit Site<span class="text-primary">('.str_limit($transaction->Name, 47).')</span>'])
            {{ Form::close() }}
        </div>
    </section>
@stop