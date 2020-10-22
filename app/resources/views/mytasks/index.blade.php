@extends('layouts.app')

@section('search')
<h2>依頼申請一覧</h2>
<form action="/mypage/tasks/find" method="post">
@csrf
<div class="form-group">
  <label for="select1a">ステータスを入力することで絞り込むことができます。</label>
  <select name="report_status" placeholder=""　id="select1a" class="form-control">
        <option value="1"></option>
        <option value="2">申請中</option>
        <option value="3">代行中</option>
        <option value="4">代行完了</option>
  </select>
</div>
<input type="submit" value="検索"> 
</form>
@endsection

@section('content')
<tr><th>依頼ID</th><th>依頼名</th><th>依頼者</th><th>ステータス</th></tr>
@foreach($contentitems as $contentitem)
<table>
<tr>
        <td>{{$contentitem->content->title}}</td>
        <td>{{$contentitem->content->owner->name}}さんからの依頼です</td>
        @if($contentitem->content->helper_id == null)
                <td>{{$contentitem->content->report_text}}</td>
                <td><form method="post" action="{{ route('mytask.destroy', ['id' => $contentitem->id]) }}">@method('DELETE')@csrf<input type="submit" value="削除" ></form></td>
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
        @endif


        {{-- <td>{{$contentitem->content->id}}</td>
        <td>{{$contentitem->content->title}}</td>
        <td>{{$contentitem->content->owner->name}}さんからの依頼です</td>
        <td>{{$contentitem->content->report_text}}</td>
        @if($contentitem->content->report_status == 2)
        <td><form method="post" action="{{ route('mytask.destroy', ['id' => $contentitem->id]) }}">@method('DELETE')@csrf<input type="submit" value="削除" ></form></td>
        @elseif($contentitem->content->report_status == 3)
        <td><form method="post" action="{{ route('mytask.cancel', ['id' => $contentitem->content->id]) }}">@method('PATCH')@csrf<input type="submit" value="中断" ></form></td>
        <td><button type="button" class="btn btn-primary"><a href="{{ route('mytask.edit', ['id' => $contentitem->content->id]) }}"><font color=white>レポートを提出する</font></a></button></td>
        @elseif($contentitem->content->report_status == 4)
        <td>レポート提出完了</td>
        <td>{{$contentitem->content->value_text}}</td>
        @else
        @endif --}}
<tr>
</table>
@endforeach
<div class="d-flex justify-content-center">
    {{ $contentitems->links() }}
</div>
@endsection

