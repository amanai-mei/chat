@extends('layouts.layout')
@section('content')

<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <!-- <div class="card-header text-center">{{ __('') }}</div> -->
                    <div class="card-body">
                        <form class="m-5" method="POST" action="{{ route('admin.store') }}">
                            <h4 class="text-center p-4">入社日の登録</h4>
                            @csrf
                                <label for="group_name" class="text-left m-1">{{ __('グループ名') }}</label>
                                <div class="">
                                    <input id="group_name" type="month" class="form-control @error('name') is-invalid @enderror" name="group_name">
                                        <!-- @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror -->
                                </div>
                            </div>
                            <div class="text-center pb-3 pt-3">
                                <button type="submit" class="btn btn-outline-primary mx-auto">登録</button>
                            </div>
                                <!-- <a class="btn btn-outline-primary mx-auto" href="{{ route('display.edit', ['display' => Auth::user()->id]) }}">削除</a> -->
                        </form>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
@endsection




