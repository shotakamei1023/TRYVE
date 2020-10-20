@extends('layouts.app')

@section('content')
@foreach($contents as $content)
<table>
<tr>
        <td>{{$content->id}}</td>
        <td>{{$content->title}}</td>
        @if ($content->content_status == 1 )
                <td>{{DB::table('content_items')->where('content_id','=',$content->id)->count()}}人デート代行を申請しています</td>
                <td><button type="button" class="btn btn-secondary"><a href="{{ route('mycontent.edit', ['id' => $content->id]) }}"><font color=white>編集</font></a></button></td>
                <td><form method="post" action="{{ route('mycontent.destroy', ['id' => $content->id]) }}">@method('DELETE')@csrf<input type="submit" value="削除" ></form></td>
        @elseif ($content->content_status == 2)
                <td><button type="button" class="btn btn-info"><a href="{{ route('mycontent.load', ['id' => $content->id]) }}"><font color=white>申請者リストを見る</font></a></button></td>
                <td></td>
        @elseif ($content->content_status == 3)
                <td>{{$content->helper->name}}さんにお願いしました </td>
                <td></td>
        @elseif ($content->content_status == 4)
                @if(isset($content->value))
                        <td>{{$content->helper->name}}さんから届いたレポートを評価しました</td>
                        <td><button type="button" class="btn btn-info"><a href="{{ route('mycontent.show', ['id' => $content->id]) }}"><font color=white>評価したレポートを確認する</font></a></button></td>
                @else
                        <td>{{$content->helper->name}}さんからレポートが届きました</td>
                        <td><button type="button" class="btn btn-primary"><a href="{{ route('mycontent.revue', ['id' => $content->id]) }}"><font color=white>レポートを評価する</font></a></button></td>     
                @endif 
        @endif

<tr>
</table>
@endforeach
@endsection

