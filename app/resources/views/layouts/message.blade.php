<div class="media">
    <div class="media-body comment-body">
        <div class="row">
            <span class="comment-body-user">{{ $user->name }}</span>
            <span class="comment-body-time">{{ $user->created_at }}</span>
        </div>
        <span class="comment-body-content">
        {!! nl2br(e($user->message)) !!}
        </span>
    </div>
</div>