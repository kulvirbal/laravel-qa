<div class="row justify-content-center mt-4">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ $answerCount.' '.Illuminate\Support\Str::plural('Answer', $question->answer_count)  }}</h2>
                </div>
                @include('layouts._messages')
                
                <hr>
                @foreach($answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a href="" title="This answer is useful" class="vote-up">
                                <i class="fa fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">11</span>
                            <a href="" title="This answer is not useful" class="vote-down off">
                                <i class="fa fa-caret-down fa-3x"></i>
                            </a>
                            <a href="" title="Mark it as best answer" class="vote-accept mt-2 vote-accepted">
                                <i class="fa fa-check fa-2x"></i>
                            </a>
                            <span class="check-count">11</span>
                        </div>
                        <div class="media-body">
                            {{ $answer->body }}
                            <div class="float-right mt-4">
                                <span class="text-muted">Answered {{ $answer->created_date }}</span>
                                <div class="media mt-1">
                                    <a href="{{ $answer->user->url }}" class="pr-2">
                                        <img src="{{ $answer->user->avatar }}" alt="">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>