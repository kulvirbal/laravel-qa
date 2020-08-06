@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{ __('Edit Question') }}</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary"> Back to All Questions</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('questions.update', $question->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="question-title">Question Title</label>
                            <input type="text" name="title" value="{{ $question->title }}" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''  }}" id="question-title">

                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    <strong>
                                        {{ $errors->first('title') }}
                                    </strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="question-body">Explian in more detail</label>
                            <textarea name="body" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : ''  }}" id="question-body">{{ $question->body }}
                            </textarea>

                            @if($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong>
                                        {{ $errors->first('body') }}
                                    </strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Update this question</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
