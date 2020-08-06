@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Questions') }}</div>

                <div class="card-body">
                    @foreach($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters">
                                <div class="votes">
                                    <strong> {{ $question->votes }}</strong> {{ Illuminate\Support\Str::plural('vote', $question->votes) }}
                                </div>
                                <div class="status {{ $question->status }}">
                                    <strong> {{ $question->answers }}</strong> {{ Illuminate\Support\Str::plural('answers', $question->answers) }}
                                </div>
                                <div class="view">
                                    {{ $question->views ." ". Illuminate\Support\Str::plural('views', $question->views) }}
                                </div>
                            </div>
                            <div class="media-body">
                                <h3 class="mt-0">
                                    <a href="{{ $question->user->url }}">
                                        {{ $question->title }}
                                    </a>
                                </h3>
                                <p class="lead">
                                    Asked By: 
                                    <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    <small class="text-muted">{{ $question->created_date }}</small>
                                </p>
                                {{ Illuminate\Support\Str::limit($question->body, 250) }}
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
