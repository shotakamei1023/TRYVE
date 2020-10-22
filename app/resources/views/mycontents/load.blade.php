@extends('layouts.app')

@section('content')
<h3>依頼者リスト</h3>
<table class="table table-hover">
  <thead class="thead-light">
    <tr>
        <th scope="col">依頼者ID</th>
        <th scope="col">ステータス</th>
        <th scope="col">申請日時</th>
        <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        @foreach($contentitems as $contentitem)
    <tr>
        <th scope="row">{{$contentitem->user->id}}</th>
        <td>{{$contentitem->user->name}}</td>
        <td>{{$contentitem->content->created_at}}</td>
        <td><form method="post" action="{{ route('mycontent.permit', ['id' => $contentitem->id]) }}">@method('PATCH')@csrf<input class='btn btn-primary' type="submit" value="デート代行をお願いする" ></form></td>
    </tr>
        @endforeach
  </tbody>
</table>
@endsection
