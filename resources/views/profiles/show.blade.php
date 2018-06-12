@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card-header">
                    <div class="level"></div>
                    <h1>
                        {{ $profileUser->name }}
                        <small>Since {{ $profileUser->created_at->diffForHumans() }}</small>
                    </h1>
                </div>
                <br>
                @foreach($threads as $thread)
                    <div class="card">
                        <div class="card-header">
                            <div class="level">
                        <span class="flex">
                            <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> posted:
                            <a href="{{ $thread->path() }}"></a>{{ $thread->title }}
                        </span>
                                <span>
                            {{ $thread->created_at->diffForHumans() }}
                        </span>
                            </div>

                        </div>

                        <div class="card-body">
                            {{ $thread->body }}
                        </div>
                    </div>
                    <br>
                @endforeach
                {{ $threads->links() }}
            </div>
        </div>



    </div>
@endsection