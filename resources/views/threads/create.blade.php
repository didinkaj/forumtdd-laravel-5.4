@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a New Thread</div>

                    <div class="panel-body">
                       <form action="/threads" method="POST" >
                           {{csrf_field()}}
                           <div class="form-group">
                               <label for="title">Title</label>
                               <input type="text" name="title" class="form-control" id="title" placeholder="title">
                           </div>
                           <div class="form-group">
                               <lable for="body">Body</lable>
                               <textarea name="body" id="body" class="form-control"  rows="8"></textarea>
                           </div>
                           <button type="submit" class="btn btn-default">Publish</button>

                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
