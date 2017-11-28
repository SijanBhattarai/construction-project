@extends('backend.layouts.app')

@section('title', 'Site')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($site, ['route' =>['site.update', $site->name],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }} @include('backend.site.partials.form', ['header' => 'Edit Site <span class="text-primary">('.str_limit($site->name, 47).')</span>'])
            {{ Form::close() }}
        </div>
    </section>
@stop