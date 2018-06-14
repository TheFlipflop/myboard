<br>
<reply-component :attributes="{{ $reply }}" inline-template v-cloak>
    <div id="reply-{{ $reply->id }}" class="card">
        <div class="card-header">
            <div class="level">
                <div class="flex">
                    <a href="/profiles/{{ $reply->owner->name }}">
                        {{ $reply->owner->name }}
                    </a> said {{ $reply->created_at->diffForHumans() }}...
                </div>
                <div>
                    <favorite-component :reply="{{ $reply }}"></favorite-component>
                </div>

            </div>

        </div>
        <div class="card-body">
            <div v-if="editing">
                <div class="form-group">
                    <textarea class="form-control" v-model="body" name="" id=""></textarea>
                </div>
                <button class="btn btn-sm btn-primary" @click="update">Update</button>
                <button class="btn btn-sm btn-link" @click="editing = false">Cancel</button>
            </div>

            <div v-else v-text="body"></div>
        </div>

        @can('update', $reply)
            <div class="card-footer level">
                <button class="button btn-sm mr-1" @click="editing = true">Edit</button>
                <button class="button btn-danger btn-sm mr-1" @click="destroy">Delete</button>
            </div>
        @endcan
    </div>
</reply-component>