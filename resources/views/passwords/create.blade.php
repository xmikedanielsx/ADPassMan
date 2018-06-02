@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create Password Entry</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('errors'))
                        <div class="alert alert-danger">
                            {{ session('errors') }}
                        </div>
                    @endif
                    <form action="{{route('passwords.store')}}" method="POST">
                        <table class="table">
                            <tbody>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" required name="name" value="{{old('name')}}">
                                </div>


                                <div class="form-group">
                                    <label for="site">Site</label>
                                    <input type="text" class="form-control"  name="site" value="{{old('site')}}">
                                </div>
                                <div class="form-group">
                                    <label for="user">User</label>
                                    <input type="text" class="form-control"  name="user" value="{{old('user')}}">
                                </div>

                                <div class="form-group">
                                    <label for="password">Pass</label>
                                    <input type="text" class="form-control" name="password" value="{{old('password')}}">
                                </div>

                                <div class="form-group">
                                    <label for="notes">Notes</label>
                                    <textarea type="text" class="form-control" name="notes" >
                                        {{old('notes')}}
                                    </textarea>
                                </div>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        {{csrf_field()}}
                                        <input type="submit" class="btn btn-primary pull-right">
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $('td span').click(function(){
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
    </script>
@endsection
