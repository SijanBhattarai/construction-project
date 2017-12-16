{{ Form::open(['route' => ['accounthead', $accounthead->slug], 'class' => 'form']) }}
<div class="modal fade" id="addSubMenu" tabindex="-1" role="dialog" aria-labelledby="addSubMenuLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="addSubMenuLabel">Add Account Head ({{ $accounthead->accountname }})</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    {{ Form::text('accountname', old('accountname'), ['class' => 'form-control', 'placeholder' => '(Enter the Account Head)']) }}
                    <label class="accountname">Name</label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}