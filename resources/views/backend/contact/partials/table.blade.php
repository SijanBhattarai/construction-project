<tr>
    <td>{{++$key}}</td>
    <td>{{ str_limit($contact->name) }}</td>
    <td>{{ str_limit($contact->email) }}</td>
    <td>{{ str_limit($contact->message, 47) }}</td>
    <td>{{ str_limit($contact->mobile) }}</td>
    <td class="text-right">
        <a type="button" href="#myModal{{ $contact->id }}" data-toggle="modal" class="btn btn-primary btn-xs">
            View Email
        </a>

    </td>
</tr>

<div id="myModal{{$contact->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document" style="padding-top: 50px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">{{$contact->name}} has sent you following enquiry</h4>

            </div>
            <div class="modal-body edit-content">
                <div class="form-group">
                    <label class="name"><h3>Name :</h3></label>
                    {{ $contact->name }}

                </div>
                <div class="form-group">
                    <label class="name"><h3>Subject :</h3></label>
                    {{ $contact->subject }}

                </div>
                <div class="form-group">
                    <label class="name"><h3>Mobile :</h3></label>
                    {{ $contact->mobile }}

                </div>
                <div class="form-group">
                    <label class="name"><h3>Email :</h3></label>
                    {{ $contact->email }}

                </div>
                <div class="form-group">
                    <label class="name"><h3>Message :</h3></label>
                    {{ $contact->message }}

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>