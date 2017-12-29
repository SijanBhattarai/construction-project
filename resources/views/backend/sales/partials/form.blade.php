<div class="row">
    <div class="col-md-12">
        @include('partials.errors')
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-head">
                <header>Add Sales Details</header>
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
                            {{ Form::number('taxable_sales',old('taxable_sales'),['required', 'id' => 'my-editor']) }}
                            {{ Form::label('taxable_sales','taxable_sales*') }}
                        </div>
                    </div>
                </div>
                {{--<div id="radio">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-sm-12">--}}
                            {{--<div class="form-group">--}}
                                {{--<select v-model="selected">--}}
                                    {{--<option disabled value="">TDS?</option>--}}
                                    {{--<option>Yes</option>--}}
                                    {{--<option>No</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div v-if="selected=='Yes'">--}}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {{ Form::number('tds_percent',old('tds_percent'),['required', 'id' => 'my-editor']) }}
                                    {{ Form::label('tds_percent','tds_percent*') }}
                                </div>
                            </div>
                        </div>
                    {{--</div>--}}
                {{--</div>--}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {{ Form::number('reatation',old('reatation'),['required', 'id' => 'my-editor']) }}
                                {{ Form::label('reatation','reatation*') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {{ Form::number('nbk',old('nbk'),['required', 'id' => 'my-editor']) }}
                                {{ Form::label('nbk','nbk*') }}
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::number('mobilization',old('mobilization'),['required', 'id' => 'my-editor']) }}
                            {{ Form::label('mobilization','mobilization*') }}
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {{ Form::number('tax',old('tax'),['required', 'id' => 'my-editor']) }}
                                {{ Form::label('tax','tax*') }}
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
    <div class="col-md-4">
        <div class="card card-affix affix-4">
            <div class="card-head">
                <div class="tools">
                    <a class="btn btn-default btn-ink" href="{{ route('sales.index') }}">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.js"></script>
    <script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>
    <script src="{{ asset('backend/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('/backend/js/bootstrap-select.js') }}"></script>
        <script>
            new Vue({
                el: '#radio',

                data:{
                    selected:''
                }
            })
        </script>

@endpush
