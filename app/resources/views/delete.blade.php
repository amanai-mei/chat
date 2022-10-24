@extends('layouts.layout')
@section('content')
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form class="m-5" method="POST" action="{{ route('admin.update',['admin' => $user_id['id']]) }}" enctype='multipart/form-data'>
                        <h4 class="text-center p-4 border-top border-bottom">削除</h4>
                        @method('patch')
                        @csrf
                        @if($image)
                        <img class="rounded-circle mx-auto d-block p-4" width="200" height="200" src="{{ asset('storage/image/'.$image) }}">
                        @else
                        <img class="mx-auto d-block p-4" width="200" height="180" src="/images/noimage.jpeg">
                        @endif
                        <div class="form-group row">
                            <label for="name" class="text-left m-1">{{ __('名前') }}</label>
                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user_id['name'] }}" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="text-left m-1">{{ __('メールアドレス') }}</label>
                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user_id['email'] }}" disabled="disabled" >
                            </div>
                        </div>
                        <div class="d-flex justify-content-around m-5">
                            <div>
                                <a class="btn btn-outline-secondary" href="{{ route('display.index') }}">戻る</a>
                            </div>                    
                            <div class="">
                                <button class="btn btn-outline-primary mx-auto">削除</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




