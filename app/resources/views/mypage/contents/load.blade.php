@extends('layouts.app')

@section('title')
<h1 class="font-weight-bold">ヘルパーリスト</h1>
<p>掲載したデートプランを実行してくれる人の管理ができます。</p>
@endsection

@section('content')
<table class="table table-hover">
  <thead class="thead-light">
    <tr>
        <th scope="col">依頼者ID</th>
        <th scope="col">依頼者名</th>
        <th scope="col">申請日時</th>
        <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        @foreach($contentitems as $item)
    <tr>
        <th scope="row">{{$item->user->id}}</th>
        <td>{{$item->user->name}}</td>
        <td>{{$item->content->created_at}}</td>
        <td><form method="post" action="{{ route('mypage.contents.update', ['id' => $item->id,'type' => 'helper']) }}">@method('PATCH')@csrf<input class='btn btn-primary' type="submit" value="デート代行をお願いする" ></form></td>
    </tr>
        @endforeach
  </tbody>
</table>
@endsection

