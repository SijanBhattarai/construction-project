<script src="{{ asset('backend/js/libs/jquery/jquery-1.11.2.min.js') }}"></script>
@extends('backend.layouts.app')
@section('title', 'Transaction')
@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all Transactions</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('transaction.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="transactionTable" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Heading</th>
                                <th>Account Head</th>
                                <th>Site</th>
                                <th>Quantity</th>
                                <th>Rate</th>
                                <th>Cheque No</th>
                                <th>Cheque Date</th>
                                <th>OS No</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($transactions as $key => $transaction)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{str_limit($transaction->heading, 25) }}</td>
                                <td>{{str_limit($transaction->account_name,25)}}</td>
                                <td>{{str_limit($transaction->site_name,25)}}</td>
                                <td>{{str_limit($transaction->quantity,25)}}</td>
                                <td>{{str_limit($transaction->rate,25)}}</td>
                                <td>{{str_limit($transaction->cheque_no,25)}}</td>
                                <td>{{str_limit($transaction->cheque_date,25)}}</td>
                                <td>{{str_limit($transaction->os_no,25)}}</td>
                                <td><a id="action" data-transid = "{{$transaction->id}}" href="javascript:void(0)" onclick="editTransaction({{$transaction->id}})">Edit</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Transactions available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

<div id="transaction_edit_modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
      {{ Form::open(['route' =>'transaction.edit','class'=>'form form-validate','role'=>'form', 'files'=>true, 'id'=>'transaction_edit_form', 'novalidate']) }}
      <input type="hidden" name="trans-id" id="transid">
        <div class="row">
            <div class="col-md-12">
                @include('partials.errors')
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-head">
                        <header>Edit Transaction</header>
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
                </div>
            </div>
        </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Edit Transaction</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        {{ Form::close() }}
      </div>
    </div>
</div>
</div>
@stop
<script type="text/javascript">
    $(document).ready(function(){
        $('#transactionTable').dataTable();

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

    function editTransaction(transaction_id)
    {
        var transaction_id = $('#action').data('transid');
        $.ajax({
            type: "POST",
            url: 'transaction/getDetails',
            data: {transaction_id:transaction_id},
            success: function(responseData) {
                var transactionData = jQuery.parseJSON(responseData);
                $('#heading').val(transactionData[0].heading);
                $('#quantity').val(transactionData[0].quantity);
                $('#rate').val(transactionData[0].rate);
                $('#dr_amount').val(transactionData[0].dr_amount);
                $('#cr_amount').val(transactionData[0].cr_amount);
                $('#cheque_date').val(transactionData[0].cheque_date);
                $('#cheque_no').val(transactionData[0].cheque_no);
                $('#transid').val(transactionData[0].id);
                $('#transaction_edit_modal').modal('show');
            }
        })
    }
</script>