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
                               <label for="channel_id">Choose a Channel</label>
                               <select type="text" name="channel_id" class="form-control" id="channel_id" required>
                                   <option value="">Choose one...</option>
                                   @foreach($channels as $channel)
                                     <option value="{{$channel->id}}" {{old('channel_id') == $channel->id ? 'selected' :'' }}>{{$channel->name}}</option>
                                    @endforeach
                               </select>
                           </div>
                           <div class="form-group">
                               <label for="title">Title</label>
                               <input type="text" name="title" class="form-control" id="title" placeholder="title" value="{{old('title')}}" required>
                           </div>
                           <div class="form-group">
                               <lable for="body">Body</lable>
                               <textarea name="body" id="body" class="form-control"  rows="8" required>{{old('body')}}</textarea>
                           </div>
                           <button type="submit" class="btn btn-default">Publish</button>

                       </form>
                        @if(count($errors))
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
