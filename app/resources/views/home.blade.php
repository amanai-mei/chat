
@section('content')
<div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class="card">
            <div class="card-header">Comment</div>
            <div class="card-body chat-card">
            @foreach ($comments as $item)
    @include('components.comment', ['item' => $item])
    @endforeach
            </div>
        </div>
    </div>
</div>

<form method="POST" action="{{route('add')}}">
    @csrf
    <div class="comment-container row justify-content-center">
        <div class="input-group comment-area">
            <textarea class="form-control" id="comment" name="comment" placeholder="input massage"
                aria-label="With textarea"></textarea>
            <button type="submit" class="btn btn-outline-primary comment-btn">Submit</button>
        </div>
    </div>
</form>

@endsection