@extends('layouts.app')

@section('content')
    <thread-view :initial-replies-count="{{ $thread->replies_count }}" inline-template>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="level">
                            <span class="flex">
                                <a href="/profiles/{{ $thread->creator->name }}">{{ $thread->creator->name }}</a> posted: {{ $thread->title }}
                            </span>
                                <span>
                                @can('update', $thread)
                                        <form action="{{ $thread->path() }}" method="POST">
                                    @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-link">Delete Thread</button>
                                </form>
                                    @endcan
                            </span>
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $thread->body }}
                        </div>
                    </div>

                    <replies-component :data="{{ $thread->replies }}" @removed="repliesCount--"></replies-component>

                    <br>

                    @if(auth()->check())
                        <form method="POST" action="{{ $thread->path() . '/replies' }}">
                            @csrf
                            <textarea name="body" id="body" class="form-control" placeholder="Your reply"></textarea>

                            <button type="submit" class="btn btn-default">Post</button>
                        </form>

                    @else
                        <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in forum</p>
                    @endif
                </div>

                <div class="col-md-4">
                    <div class="card">

                        <div class="card-body">
                            This thread was published {{ $thread->created_at->diffForHumans() }} by <a
                                    href="#">{{ $thread->creator->name }}</a>,
                            and currently has <span v-text="repliesCount"></span> {{ str_plural('comment', $thread->replies_count) }}.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </thread-view>
@endsection
