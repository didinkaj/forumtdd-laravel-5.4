<div class="panel panel-default">
    <div class="panel-heading">
        <div class="level">
            <h5 class="flex">
                <a href="#">
                    foobar </a>
                said {{$thread->created_at->diffForHumans()}}
            </h5>
            <div>

                <form method="POST" action="/replies/{{$reply->id}}/favorites">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-default {{$reply->isFavorited() ? 'disabled': ''}}">
                        {{$reply->favorites_count}} {{str_plural('Favourite'),$reply->favorites_count}}
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="panel-body">
        {{$reply->body}}
    </div>
</div>