@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card-header">
                    <div class="level"></div>
                    <h1>
                        {{ $profileUser->name }}
                    </h1>
                </div>
                <br>
                @foreach($activities as $date => $activity)
                    <h3 class="page-header">{{ $date }}</h3>
                    @foreach($activity as $record)
                    @include("profiles.activities.{$record->type}", ['activity' => $record])
                    <br>
                    @endforeach
                @endforeach
            </div>
        </div>



    </div>
@endsection