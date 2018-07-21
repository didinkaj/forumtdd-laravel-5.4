<div class="panel panel-default">
    <div class="panel-heading">
        <a href="{{$reply->owner->name}}">
            {{$reply->owner->name}} said {{$thread->created_at->diffForHumans()}}
        </a>
    </div>
    <div class="panel-body">
        {{$reply->body}}
    </div>
</div>