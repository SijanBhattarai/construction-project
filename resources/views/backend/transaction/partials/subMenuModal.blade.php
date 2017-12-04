{{ Form::open(['route' => ['transaction.subMenu.store', $transaction->slug], 'class' => 'form']) }}
<div class="modal fade" id="addSubMenu" tabindex="-1" role="dialog" aria-labelledby="addSubMenuLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="addSubMenuLabel">Add Sub Menu ({{ $transaction->name }})</h4>
            </div>
            <div class="modal-body">
                {{--<div class="form-group">--}}
                    {{--{{ Form::select('page', $pages, null, ['class' => 'form-control', 'placeholder' => 'Select a page or leave blank (#)']) }}--}}
                    {{--<label class="page">Page</label>--}}
                {{--</div>--}}
                <div class="form-group">
                    {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '(same as page title)']) }}
                    <label class="name">Name</label>
                </div>
                {{--<div class="form-group">--}}
                    {{--{{ Form::text('accounthead', old('accounthead'), ['class' => 'form-control', 'placeholder' => '(same as page title)']) }}--}}
                    {{--<label class="accounthead">Name</label>--}}
                {{--</div>--}}
                <div class="form-group">
                    {{ Form::select('accounthead', $accountheads, null, ['class' => 'form-control', 'placeholder' => 'Select a accounthead or leave blank (#)']) }}
                    <label class="accounthead">Account Head</label>
                </div>
                <div class="form-group">
                    {{ Form::text('site', old('site'), ['class' => 'form-control', 'placeholder' => '(same as page title)']) }}
                    <label class="site">Name</label>
                </div>
                <div class="form-group">
                    {{ Form::text('amount', old('amount'), ['class' => 'form-control', 'placeholder' => '(same as page title)']) }}
                    <label class="amount">Name</label>
                </div>
                {{--<div class="form-group">--}}
                    {{--{{ Form::text('custom_url', old('custom_url'), ['class' => 'form-control', 'placeholder' => '(enter your custom URL here..)']) }}--}}
                    {{--<label class="name">Custom URL</label>--}}
                {{--</div>--}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Sub Menu</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}