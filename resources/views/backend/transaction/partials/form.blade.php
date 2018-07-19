<script src="{{ asset('backend/js/libs/jquery/jquery-1.11.2.min.js') }}"></script>

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
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input id="heading" type="text" name="heading"  class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="site"><b>Site</b></label>
                            <select id="site" name="site" class="form-control item">
                            <option selected="selected" disabled="disabled">Select a Site</option>
                                @foreach($sitesArray as $site)
                                    <option value="<?php  print_r($site['id'])?>"><?php print_r($site['name'])?></option>   
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                   
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                        <label><b>Accounthead:</b></label>
                            <select id="accounthead" name="accounthead" class="form-control">
                                <option selected="selected" disabled="disabled">Select a accounthead</option>
                                @foreach($accountheadsArray as $key=>$accounthead)
                                    <option value="<?php print_r($accounthead['id']) ?>"><?php print_r($accounthead['accountname']) ?></option>   
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Quantity:</label>
                            <input class="form-control" id="quantity" type="number" name="quantity" placeholder="Quantity">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Rate:</label>
                            <input class="form-control" id="rate" type="number" name="rate" placeholder="Rate">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Payment Mode</label>
                            <select class="form-control" id="payment_mode">
                                <option disabled selected="selected">Please select Payment mode</option>
                                <option value="cash">Cash</option>
                                <option value="cheque">Cheque</option>
                                <option value="credit">Credit</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div style="display: none;" id="cheque">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Cheque No:</label>
                                <input class="form-control" id="cheque_no" type="number" name="cheque_no" placeholder="Cheque No">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Cheque_date</label>
                                <input class="form-control" id="cheque_date" type="text" name="cheque_date">
                            </div>
                        </div>
                    </div>
                </div>    
                <div style="display: none;" id="credit" class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Os No:</label>
                            <input id="os_no" class="form-control" type="number" name="os_no">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>DR Amount:</label>
                        <input type="number" name="dr_amount" class="form-control" id="dr_amount">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>CR Amount:</label>
                        <input type="number" name="cr_amount" class="form-control" id="cr_amount">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/nepali.datepicker.v2.2.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('backend/js/libs/jquery/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ asset('backend/js/nepali.datepicker/dist/nepali.datepicker.v2.2.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('/backend/js/bootstrap-select.js') }}"></script>
<script>
$(document).ready(function(){
    $('#payment_mode').change(function(){

        var payment_mode = $(this).val();
        if(payment_mode == 'cheque'){
            $('#cheque').show();
            $('#credit').hide();
        }
        if(payment_mode == 'credit'){
            $('#credit').show();
            $('#cheque').hide();
        }
    });
});
</script>
@endpush
