@extends('layouts.app')

@section('search')
<h2>依頼作成画面</h2>
<form action="/mypage/contents/find" method="post">
@csrf
<div class="form-group">
  <label for="select1a">ステータスを入力することで絞り込むことができます。</label>
  <select name="content_status" placeholder=""　id="select1a" class="form-control">
        <option value="1">受付中</option>
        <option value="2">申請が届きました</option>
        <option value="3">代行依頼中</option>
        <option value="4">依頼完了</option>
  </select>
</div>
<input type="submit" value="検索"> 
</form>
@endsection

@section('content')
@foreach($contents as $content)
<table>
<tr>
        <td>{{$content->id}}</td>
        <td>{{$content->title}}</td>
        <td>{{$content->content_text}}</td>
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
<div class="d-flex justify-content-center">
    {{ $contents->links() }}
</div>
@endsection

