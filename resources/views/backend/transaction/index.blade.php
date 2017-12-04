@extends('backend.layouts.app')

@section('title', 'Transaction')

@push('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('backend/css/libs/nestable/nestable.css') }}"/>
    <style>
        #transaction-accordion .card-head {
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
    <section>
        <div class="section-header text-center">
            <h2 class="style-default-bright">Transaction</h2>
        </div>
        <div class="section-body">
            <div class="row">
                @include('partials.errors')
                {{ Form::open(['route' => 'transaction.update', 'files' => true, 'method' => 'put', 'class' => 'form form-validation', 'novalidate']) }}
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
                        @foreach($transactions as $key => $transaction)
                            <div class="card panel {{ session('collapse_in') == $transaction->slug ? 'expanded' : '' }}" id="{{ $transaction->slug }}">
                                <input type="hidden" name="order[]" value="{{ $transaction->slug }}">
                                <div class="card-head {{ session('collapse_in') == $transaction->slug ? '' : 'collapsed' }}" data-toggle="collapse" data-parent="#transaction-accordion" data-target="#transaction-accordion-{{ $key }}">
                                    <header>{{ $transaction->name }}</header>
                                    {{--<div class="tools">--}}

                                    {{--<button type="button" class="btn btn-icon-toggle btn-add-sub-transaction" data-url="{{ route('component.subMenuModal', $transaction->slug) }}" data-toggle="tooltip" data-placement="top" data-original-title="Add Sub Menu"  data-loading-text="<i class='fa fa-spinner fa-spin'></i>">--}}
                                    {{--<i class="md md-add"></i>--}}
                                    {{--</button>--}}
                                    @unless($transaction->is_primary)
                                        <a class="btn btn-icon-toggle btn-delete" data-url="{{ route('transaction.destroy', $transaction->slug) }}">
                                            <i class="md md-delete"></i>
                                        </a>
                                    @endunless
                                    {{--</div>--}}
                                </div>
                                {{--<div id="transaction-accordion-{{ $key }}" class="{{ session('collapse_in') == $transaction->slug ? 'collapse in' : 'collapse' }}">--}}
                                {{--<div class="card-body">--}}
                                {{--<div class="dd nestable-list">--}}
                                {{--<ol class="dd-list">--}}
                                {{--@forelse($transaction->subMenus->sortBy('order') as $subMenu)--}}
                                {{--<li class="dd-item list-group" data-id="{{ $subMenu->order }}">--}}
                                {{--<input type="hidden" name="sub_transaction_order[{{ $transaction->slug }}][]" value="{{ $subMenu->id }}">--}}
                                {{--<div class="dd-handle btn btn-default-light"></div>--}}
                                {{--<div class="btn btn-default-light" style="text-transform: none;">--}}
                                {{--<div class="row">--}}
                                {{--<div class="col-sm-10">--}}
                                {{--{{ $subMenu->name }}--}}
                                {{--({{ $subMenu->url }})--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-2">--}}
                                {{--<a class="cursor-pointer pull-right btn-delete" data-url="{{ route('transaction.subMenu.destroy', [$transaction->slug, $subMenu->slug]) }}">--}}
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
        {{ Form::open(['route' => 'transaction.store', 'class' => 'form']) }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="addMenuLabel">Add Menu</h4>
                </div>

                <div class="form-group">
                    {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) }}
                    <label class="name">Name</label>
                {{--</div> <div class="form-group">--}}
                    {{--{{ Form::text('accounthead', old('accounthead'), ['class' => 'form-control', 'placeholder' => '']) }}--}}
                    {{--<label class="accounthead">AccountHead</label>--}}
                {{--</div>--}}
                <div class="form-group">
                {{ Form::select('accounthead', $accountheads, null, ['class' => 'form-control', 'placeholder' => 'Select a accounthead or leave blank (#)']) }}
                <label class="accounthead">Account Head</label>
                </div>
                <div class="form-group">
                    {{ Form::text('site', old('site'), ['class' => 'form-control', 'placeholder' => '']) }}
                    <label class="site">Site</label>
                </div> <div class="form-group">
                    {{ Form::text('amount', old('amount'), ['class' => 'form-control', 'placeholder' => '']) }}
                    <label class="amount">Amount (in figure)</label>
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
            $(".btn-add-sub-transaction").on("click", function (e) {
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
                                if (response.Transaction) {
                                    $button.closest(".panel").detach();
                                } else {
                                    $button.closest(".dd-item").detach();
                                }
                            },
                            "error": function () {
                                bootbox.alert("Error deleting transaction!");
                            }
                        });
                });
            });
        });
    </script>
@endpush