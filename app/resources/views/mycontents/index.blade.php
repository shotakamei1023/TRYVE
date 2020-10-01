@extends('layouts.base')

@section('content')
@foreach($contents as $content)
<table>
<tr>
        <td>{{$content->id}}</td>
        <td>{{$content->title}}</td>
        <td>{{DB::table('content_items')->where('content_id','=',$content->id)->count()}}</td>
        @if ($content->content_status == 1 )
                <td><button type="button" class="btn btn-secondary"><a href="{{ route('mycontent.edit', ['id' => $content->id]) }}"><font color=white>編集</font></a></button></td>
                <td><form method="post" action="{{ route('mycontent.destroy', ['id' => $content->id]) }}">@method('DELETE')@csrf<input type="submit" value="削除" ></form></td>
        @elseif ($content->content_status == 2)
                <td><button type="button" class="btn btn-info"><a href="{{ route('mytask.load', ['id' => $content->id]) }}"><font color=white>申請者リストを見る</font></a></button></td>
                <td></td>
        @elseif ($content->content_status == 3)
        @elseif ($content->content_status == 4)
        @endif

<tr>
</table>
@endforeach
@endsection

