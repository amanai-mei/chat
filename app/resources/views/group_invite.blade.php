@extends('layouts.layout')
@section('content')

<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card Regular shadow">
            <div class="card-body">
                <form class="m-5" method="POST" action="{{ route('usergroup.store') }}">
                    <h4 class="text-center p-4 border-top border-bottom mb-5 mt-5">グループの招待</h4>
                    @csrf
                    <div class="form-group row m-5">
                        <label class="text-left m-1" for="user_id">アカデミア生</label>
                        <select name="user_id" class="p-2">
                            <option value="">選択</option>
                            @foreach($users as $user)
                            @if($user['role'] == 0 && $user['del_flg'] ==0)
                            <option value="{{$user['id']}}">{{ $user['name'] }}</option>
                            @endif
                            @endforeach
                        </select>   
                    </div>

                    <div class="form-group row m-5">
                        <label class="text-left m-1" for="group_id">カリキュラム・入社年月</label>
                        <select name="group_id" class="p-2">
                            <option value="">選択</option>
                            @foreach($groups as $group)
                            @if($group['id'] < 13)
                            <option value="{{ $group['id'] }}">{{ $group['group_name'] }}</option>
                            @elseif($group['id'] > 14)     
                            <option value="{{ $group['id'] }}">{{ date('Y年m月', strtotime($group['group_name'])) }}</option>
                            @endif 
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-around m-5">
                        <div>
                            <a class="btn btn-outline-secondary" href="{{ route('display.index') }}">戻る</a>
                        </div>
                        <div class="">
                            <button type='submit' class='btn btn-outline-primary mx-auto'>招待</button>
                        </div> 
                    </div>
                </form>
            </div>
            </div>

        </div>
    </div>
</div>
<style>
    select, option{
  border:#dcdcdc 1px solid;
  border-radius:5px;

}
</style>

@endsection