<br>
<div class="card">
    <div class="card-header">
        <div class="level">
            <div class="flex">
                <a href="/profiles/{{ $reply->owner->name }}">
                    {{ $reply->owner->name }}
                </a> said {{ $reply->created_at->diffForHumans() }}...
            </div>
            <div>
                <form method="POST" action="/replies/{{ $reply->id }}/favorites">
                    @csrf
                    <button type="submit" class="btn btn-default" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                        {{ $reply->favorites_count }} {{ str_plural( 'Favorite', $reply->favorites_count ) }}
                    </button>
                </form>
            </div>

        </div>

    </div>
    <div class="card-body">
        {{ $reply->body }}
    </div>
</div>
