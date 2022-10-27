@extends('layouts.layout')
@section('content')

<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card Regular shadow">
                <div class="card-body">
                    <form class="m-5" method="POST" action="{{ route('admin.store') }}">
                        <h4 class="text-center p-4 border-top border-bottom mb-5">入社日の登録</h4>
                        @csrf
                        <label for="group_name" class="text-left m-1">{{ __('グループ名') }}</label>
                        <div class="">
                            <input id="group_name" type="month" class="form-control @error('name') is-invalid @enderror" name="group_name">
                        </div>
                        <div class="d-flex justify-content-around m-5">
                            <div>
                                <a class="btn btn-outline-secondary" href="{{ route('display.index') }}">戻る</a>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-outline-primary mx-auto">登録</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection




