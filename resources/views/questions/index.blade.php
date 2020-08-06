@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{ __('All Questions') }}</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary"> Ask Question</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('layouts._messages')

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
                                <div class="d-flex align-items-center">
                                    <h3 class="mt-0">
                                        <a href="{{ $question->url }}">
                                            {{ $question->title }}
                                        </a>
                                    </h3>
                                    <div class="ml-auto">
                                        @if(Auth::user()->can('update-question', $question))
                                            <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-outline-primary btn-sm"> Edit</a>
                                        @endif
                                        
                                        @if(Auth::user()->can('delete-question', $question))
                                            <form class="delete-form" action="{{ route('questions.destroy', $question->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="confirm('Are you sure to delete this question?')"> Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                                
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
