@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Passwords <a href="{{route('passwords.create')}}" class="btn btn-sm btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span></a></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th><th>URL</th><th>User</th><th>Password <span class="showHide" style="display:inline-block; text-decoration:underline; color:cornflowerblue; cursor: pointer;">Show/Hide All</span></th><th>Created</th><th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($passwords as $password)
                                <tr data-itemDetail="{{json_encode($password)}}">
                                    <td><span class="showItem" style="cursor:pointer; color:cornflowerblue; text-decoration: underline;">{{$password->name}}</span></td>
                                    <td>@if($password->site)<a href="{{$password->site}}">Link</a>@endif</td>
                                    <td>{{$password->user}}</td>
                                    <td><input disabled style="background-color:white; padding:0; margin:0; border:0;" class="pfield" type="password" value="{{$password->password}}"><span style="cursor:pointer;" class="glyphicon glyphicon-eye-open ptoggle"></span></td>
                                    <td>{{$password->created_at->format('m/d/Y H:i')}}</td>
                                    <td>
                                        <a href="{{route('passwords.edit',$password->id)}}" class="btn btn-sm btn-primary" style="margin-top:-2px; max-height:20px;max-width:20px; padding:2px;"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <button class="btn btn-sm btn-danger delItem" data-id="{{$password->id}}" data-name="{{$password->name}}" style="margin-top:-2px; margin-left:3px; max-height:20px;max-width:20px; padding:2px;"><span class="glyphicon glyphicon-minus"></span></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $('.showItem').click(function(e){
            var protectedFields = [
              'updated_at',
              'deleted_at',
                'id'
            ];
           var data =  JSON.parse($(e.target).closest('tr').attr('data-itemDetail'));
           var dataHTML = '';
            $.each(data, function(k, v) {
                if(!protectedFields.includes(k)){
                    if(k == 'notes') {k = '<br> Notes: <br>'; v = v + '<br/>'} else {k = k + ':';}
                    if(k == 'created_at'){k = 'Created On'; dataHTML += '<b>' + k +':</b> '+ v + '<br/>';}
                    else {dataHTML += '<b>' + k[0].toUpperCase() + k.slice(1) +'</b> '+ v + '<br/>';}

                }
            });

            bootbox.alert({'message':dataHTML});
        });
        $('.ptoggle').click(function(){
            if($(this).hasClass('glyphicon-eye-open')){
                $(this).removeClass('glyphicon-eye-open');
                $(this).addClass('glyphicon-eye-close');
                $($(this).closest('td').children()[0]).attr('type','text');
            } else {
                $(this).addClass('glyphicon-eye-open');
                $(this).removeClass('glyphicon-eye-close');
                $($(this).closest('td').children()[0]).attr('type','password');
            }
        });
        $('.showHide').click(function(){
            $('.ptoggle').click();
        });
        $('.delItem').click(function(e){
            e.preventDefault();
            var row =  $(e.target).closest('tr');
            if($(e.target).hasClass('glyphicon')){
                var iid = $(e.target).closest('.delItem').attr('data-id');
                var iname = $(e.target).closest('.delItem').attr('data-name');
            } else {
                var iid = $(e.target).attr('data-id');
                var iname = $(e.target).attr('data-name');
            }

            bootbox.confirm({'message':'Remove '+iname,'callback':function(result){
                    if(result){
                        var durl = '{{route('passwords.destroy',':id')}}';
                        durl = durl.replace(':id',iid);
                        axios.delete(durl, {
                            'data' : {
                                'id': iid
                            }
                        }).then(function(){
                            /*
                            * TODO: Add Validation to see if it succeeded or not and notify accordingly
                            * Date: 06.154.2018 12:29:41
                            * Assigned: 
                            * Priority: Normal
                            */
                            $.notify({
                                // options
                                message: 'Successfully deleted ' + iname
                            },{
                                // settings
                                type: 'success'
                            });
                            row.remove();
                        });

                    }

                    }, buttons: {
                    'cancel': {
                        label: 'Cancel',
                        className: 'btn-default'
                    },
                    'confirm': {
                        label: 'Remove',
                        className: 'btn-danger'
                    }
                }});
        });

    </script>
@endsection
