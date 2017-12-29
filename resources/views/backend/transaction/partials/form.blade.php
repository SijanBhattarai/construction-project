<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.js"></script>
<script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>
<div class="row">
    <div class="col-md-12">
        @include('partials.errors')
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-head">
                <header>Add Transaction</header>
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
                            {{ Form::text('heading',old('heading'),['class'=>'form-control', 'required']) }}
                            {{ Form::label('heading','heading*') }}
                        </div>
                    </div>
                </div>

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
                            {{ Form::select('accounthead', $accountheads, null, ['class' => 'form-control', 'placeholder' => 'Select a Account Head']) }}
                            {{ Form::label('accounthead','accounthead*') }}
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
                            {{ Form::number('rate',old('rate'),['required', 'id' => 'my-editor']) }}
                            {{ Form::label('rate','rate*') }}
                        </div>
                    </div>
                </div>
                <div id="radio">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {{--<p>Payment Mode</p>--}}
                                <select v-model="selected">
                                    <option disabled value="">Please select Payment mode</option>
                                    <option>Cash</option>
                                    <option>Cheque</option>
                                    <option>Credit</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div v-if="selected=='Cheque'">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {{ Form::number('cheque_no',old('cheque_no'),['required', 'id' => 'my-editor']) }}
                                    {{ Form::label('cheque_no','cheque_no*') }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {{ Form::Date('cheque_date',old('cheque_date'),['required', 'id' => 'my-editor']) }}
                                    {{ Form::label('cheque_date','cheque_date*') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="selected=='Credit'">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {{ Form::number('os_no',old('os_no'),['required', 'id' => 'my-editor']) }}
                                    {{ Form::label('os_no','os_no*') }}
                                </div>
                            </div>
                        </div>
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
                    <a class="btn btn-default btn-ink" href="{{ route('transaction.index') }}">
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
