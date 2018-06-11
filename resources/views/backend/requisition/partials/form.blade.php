<div class="row">
    <div class="col-md-12">
        @include('partials.errors')
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-head">
                <header>Add Requisitions Details</header>
                <div class="tools visible-xs">
                    <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                        <i class="md md-arrow-back"></i>
                        Back
                    </a>
                    <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Save Draft">
                    <input type="submit" name="publish" class="btn btn-primary ink-reaction" value="Publish">
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {{ Form::select('site', $sites, null, ['class' => 'form-control', 'placeholder' => 'Select a Site']) }}
                                {{ Form::label('site','site*') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {{ Form::text('issued_to',old('issued_to'),['required', 'id' => 'my-editor']) }}
                                {{ Form::label('issued_to','issued_to*') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {{ Form::text('particulars',old('particulars'),['required', 'id' => 'my-editor']) }}
                                {{ Form::label('particulars','particulars*') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {{ Form::number('quantity',old('quantity'),['required', 'id' => 'my-editor']) }}
                                {{ Form::label('quantity','quantity*') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {{ Form::text('unit',old('unit'),['required', 'id' => 'my-editor']) }}
                                {{ Form::label('unit','unit*') }}
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::text('remarks',old('remarks'),['id' => 'my-editor']) }}
                            {{ Form::label('remarks','remarks') }}
                        </div>
                    </div>
                </div>
                   <div class="card-actionbar">
                        <div class="card-actionbar-row">
                            <input type="submit" name="draft" class="btn btn-info ink-reaction" value="Save">
                            <button type="reset" class="btn btn-default ink-reaction">Reset</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
            <div class="col-md-4">
                <div class="card card-affix affix-4">
                    <div class="card-head">
                        <div class="tools">
                            <a class="btn btn-default btn-ink" href="{{ route('requisition.index') }}">
                                <i class="md md-arrow-back"></i>
                                Back
                            </a>
                        </div>
                    </div>
                    {{ Form::hidden('view', old('view')) }}
                </div>
            </div>
</div>
        @push('styles')
            <link href="{{ asset('backend/css/libs/dropify/dropify.min.css') }}" rel="stylesheet">
            <link rel="stylesheet" href="{{ asset('/backend/css/bootstrap-select.min.css') }}">
        @endpush

        @push('scripts')
            <script src="{{ asset('backend/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
            <script src="{{ asset('backend/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
            <script src="{{ asset('/backend/js/bootstrap-select.js') }}"></script>

@endpush
