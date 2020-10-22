@extends('layouts.app')

@section('search')
<h3>依頼申請一覧</h3>
<form action="/mypage/tasks/find" method="post">
@csrf
        <div class="form-row">
                <div class="col">
                        <select name="report_status" placeholder=""　id="select1a" class="form-control">
                        <option value="1"></option>
                        <option value="2">申請中</option>
                        <option value="3">代行中</option>
                        <option value="4">代行完了</option>
                        </select>
                </div>
        <input class='btn btn-secondary' type="submit" value="検索"> 
        </div>
</form>
@endsection

@section('content')
<table class="table table-hover">
  <thead class="thead-light">
    <tr>
        <th scope="col">依頼タイトル</th>
        <th scope="col">依頼者名</th>
        <th scope="col">申請日時</th>
        <th scope="col">ステータス</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        @foreach($contentitems as $contentitem)
    <tr>
        <th scope="row"><a href="{{ route('content.show', ['id' => $contentitem->content->id]) }}"><font color=black>{{$contentitem->content->title}}</font></a></th>
        <td>{{$contentitem->content->owner->name}}さん</td>
        <td>{{$contentitem->created_at->format('Y/m/d')}}</td>
        @if($contentitem->content->helper_id == null)
                <td>{{$contentitem->content->report_text}}</td>
                <td><form method="post" action="{{ route('mytask.destroy', ['id' => $contentitem->id]) }}">@method('DELETE')@csrf<input class='btn btn-danger' type="submit" value="削除" ></form></td>
                <td></td>
        @elseif($contentitem->content->helper_id == Auth::user()->id && $contentitem->content->report_status == 3)
                <td>{{$contentitem->content->report_text}}</td>
                <td><form method="post" action="{{ route('mytask.cancel', ['id' => $contentitem->content->id]) }}">@method('PATCH')@csrf<input type="submit" value="中断" ></form></td>
                <td><button type="button" class="btn btn-primary"><a href="{{ route('mytask.edit', ['id' => $contentitem->content->id]) }}"><font color=white>レポートを提出する</font></a></button></td>
        @elseif($contentitem->content->helper_id == Auth::user()->id && $contentitem->content->report_status == 4)
                <td>{{$contentitem->content->report_text}}</td>
                <td>レポート提出完了</td>
                <td>{{$contentitem->content->value_text}}</td>
        @elseif($contentitem->content->helper_id != Auth::user()->id)
                <td>デート代行が他の方に決定しました。</td>
                <td></td>
                <td></td>
        @endif
    </tr>
        @endforeach
  </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $contentitems->links() }}
</div>
@endsection

