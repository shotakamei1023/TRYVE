@extends('layouts.app')

@section('content')
<tr><th>依頼ID</th><th>依頼名</th><th>依頼者</th><th>ステータス</th></tr>
@foreach($contentitems as $contentitem)
<table>
<tr>
        <td>{{$contentitem->content->id}}</td>
        <td>{{$contentitem->content->title}}</td>
        <td>{{$contentitem->content->owner->name}}</td>
        <td>{{$contentitem->content->content_status}}</td>
        <td><form method="post" action="{{ route('mytask.destroy', ['id' => $contentitem->id]) }}">@method('DELETE')@csrf<input type="submit" value="削除" ></form></td>
        @if($contentitem->content->report_status == 3)
        <td><button type="button" class="btn btn-primary"><a href="{{ route('mytask.edit', ['id' => $contentitem->content->id]) }}"><font color=white>レポートを提出する</font></a></button></td>
        @elseif($contentitem->content->report_status == 4)
        <td>レポート提出完了</td>
        @else
        @endif
<tr>
</table>
@endforeach
@endsection

