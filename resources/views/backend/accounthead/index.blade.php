@extends('backend.layouts.app')

@section('title', 'AccountHead')

@push('styles')
<link type="text/css" rel="stylesheet" href="{{ asset('backend/css/libs/nestable/nestable.css') }}"/>
<style>
    #accounthead-accordion .card-head {
        cursor: pointer;
    }
</style>
@endpush

@section('content')
    <section>
        <div class="section-header text-center">
            <h2 class="style-default-bright">Menu</h2>
        </div>
        <div class="section-body">
            <div class="row">
                @include('partials.errors')
                {{ Form::open(['route' => 'accounthead.update', 'files' => true, 'method' => 'put', 'class' => 'form form-validation', 'novalidate']) }}
                <div class="col-md-8 col-md-offset-2">
                    <article class="margin-bottom-xxl">
                        <button class="btn btn-primary ink-reaction" data-toggle="modal" data-target="#addMenu" type="button">
                            <i class="md md-add"></i>
                            Add
                        </button>
                        <button class="btn btn-primary ink-reaction" type="submit">
                            <i class="md md-save"></i>
                            Save
                        </button>
                    </article>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel-group" id="menu-accordion" data-sortable="true">
                        @foreach($accountheads as $key => $accounthead)
                            <div class="card panel {{ session('collapse_in') == $accounthead->slug ? 'expanded' : '' }}" id="{{ $accounthead->slug }}">
                                <input type="hidden" name="order[]" value="{{ $accounthead->slug }}">
                                <div class="card-head {{ session('collapse_in') == $accounthead->slug ? '' : 'collapsed' }}" data-toggle="collapse" data-parent="#accounthead-accordion" data-target="#accounthead-accordion-{{ $key }}">
                                    <header>{{ $accounthead->accountname }}</header>
                                    {{--<div class="tools">--}}

                                        {{--<button type="button" class="btn btn-icon-toggle btn-add-sub-accounthead" data-url="{{ route('component.subMenuModal', $accounthead->slug) }}" data-toggle="tooltip" data-placement="top" data-original-title="Add Sub Menu"  data-loading-text="<i class='fa fa-spinner fa-spin'></i>">--}}
                                            {{--<i class="md md-add"></i>--}}
                                        {{--</button>--}}
                                        @unless($accounthead->is_primary)
                                            <a class="btn btn-icon-toggle btn-delete" data-url="{{ route('accounthead.destroy', $accounthead->slug) }}">
                                                <i class="md md-delete"></i>
                                            </a>
                                        @endunless
                                    {{--</div>--}}
                                </div>
                                {{--<div id="accounthead-accordion-{{ $key }}" class="{{ session('collapse_in') == $accounthead->slug ? 'collapse in' : 'collapse' }}">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<div class="dd nestable-list">--}}
                                            {{--<ol class="dd-list">--}}
                                                {{--@forelse($accounthead->subMenus->sortBy('order') as $subMenu)--}}
                                                    {{--<li class="dd-item list-group" data-id="{{ $subMenu->order }}">--}}
                                                        {{--<input type="hidden" name="sub_accounthead_order[{{ $accounthead->slug }}][]" value="{{ $subMenu->id }}">--}}
                                                        {{--<div class="dd-handle btn btn-default-light"></div>--}}
                                                        {{--<div class="btn btn-default-light" style="text-transform: none;">--}}
                                                            {{--<div class="row">--}}
                                                                {{--<div class="col-sm-10">--}}
                                                                    {{--{{ $subMenu->name }}--}}
                                                                    {{--({{ $subMenu->url }})--}}
                                                                {{--</div>--}}
                                                                {{--<div class="col-sm-2">--}}
                                                                    {{--<a class="cursor-pointer pull-right btn-delete" data-url="{{ route('accounthead.subMenu.destroy', [$accounthead->slug, $subMenu->slug]) }}">--}}
                                                                        {{--<i class="md md-delete"></i>--}}
                                                                    {{--</a>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</li>--}}
                                                {{--@empty--}}
                                                    {{--<li class="text-center">{{ trans('messages.empty', ['entity' => 'Sub Menu']) }}</li>--}}
                                                {{--@endforelse--}}
                                            {{--</ol>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                        @endforeach
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>

    <div id="subMenuModal"></div>

    <div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="addMenuLabel">
        {{ Form::open(['route' => 'accounthead.store', 'class' => 'form']) }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="addMenuLabel">Add Menu</h4>
                </div>

                    <div class="form-group">
                        {{ Form::text('accountname', old('accountname'), ['class' => 'form-control', 'placeholder' => '(same as page title)']) }}
                        <label class="accountname">Name</label>
                    </div>
                       <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Menu</button>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
@stop

@push('scripts')
<script src="{{ asset('backend/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('backend/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('backend/js/libs/nestable/jquery.nestable.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.nestable-list').nestable();
        $(".btn-add-sub-accounthead").on("click", function (e) {
            e.stopPropagation();
            var $button = $(this);
            $.ajax({
                "type": "GET",
                "url": $button.data("url"),
                "beforeSend": function () {
                  $button.button('loading');
                },
                "complete": function () {
                    $button.button('reset');
                },
                "success": function (response) {
                    $("#subMenuModal").html(response);
                    $(document).find("#addSubMenu").modal();
                },
                "error": function () {
                    bootbox.alert("Error fetching modal!");
                }
            });
        });
        $(".btn-delete").on("click", function (e) {
            e.stopPropagation();
            var $button = $(this);
            bootbox.confirm("Are you sure?", function (response) {
                if (response)
                    $.ajax({
                        "type": "POST",
                        "url": $button.data("url"),
                        "data": {"_method": "DELETE"},
                        "success": function (response) {
                            if (response.Accounthead) {
                                $button.closest(".panel").detach();
                            } else {
                                $button.closest(".dd-item").detach();
                            }
                        },
                        "error": function () {
                            bootbox.alert("Error deleting accounthead!");
                        }
                    });
            });
        });
    });
</script>
@endpush