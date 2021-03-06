@extends('backend.layouts.app')

@section('title', 'AccountHead')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($accounthead, ['route' =>['accounthead.update', $accounthead->Name],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }} @include('backend.accounthead.partials.form', ['header' => 'Edit AccountHead<span class="text-primary">('.str_limit($accounthead->Name, 47).')</span>'])
            {{ Form::close() }}
        </div>
    </section>
@stop