@extends('layouts.app')

@section('search')
<h3>依頼作成画面</h3>
<form action="/mypage/contents/find" method="post">
@csrf
        <div class="form-row">
                <div class="col">
                        <select name="content_status" placeholder=""　id="select1a" class="form-control">
                        <option value="1">受付中</option>
                        <option value="2">申請が届きました</option>
                        <option value="3">代行依頼中</option>
                        <option value="4">依頼完了</option>
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
        <th scope="col">ステータス</th>
        <th scope="col">作成日時</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        @foreach($contents as $content)
    <tr>
        <th scope="row"><a href="{{ route('content.show', ['id' => $content->id]) }}"><font color=black>{{$content->title}}</font></a></th>
        <td>{{$content->content_text}}</td>
        <td>{{$content->created_at->format('Y/m/d')}}</td>
        @if ($content->content_status == 1 )
                <td><button type="button" class="btn btn-secondary"><a href="{{ route('mycontent.edit', ['id' => $content->id]) }}"><font color=white>編集</font></a></button></td>
                <td><form method="post" action="{{ route('mycontent.destroy', ['id' => $content->id]) }}">@method('DELETE')@csrf<input class='btn btn-danger' type="submit" value="削除" ></form></td>
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
    </tr>
        @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $contents->links() }}
</div>
@endsection

@section('create')
        <button type="button" class="btn btn-success"><a href="{{ action('ContentsController@create') }}"><font color=white>依頼作成</font></a></button>
@endsection

