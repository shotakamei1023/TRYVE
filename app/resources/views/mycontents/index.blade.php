@extends('layouts.app')
@section('title')
<h1 class="font-weight-bold">マイデート</h1>
<p>自分が掲載したデートプランの確認ができます。</p>
@endsection


@section('content')
@if (session('msg_success'))
        <div class="msg_success alert alert-success">
                {{ session('msg_success') }}
        </div>
@endif
<form action="/mypage/contents/find" method="post" class="mb-4 mt-2 p-4 bg-light">
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
        <div class="row row-cols-3">
        @foreach($contents as $item)
        <div class="col p-3">
        <div class="card p-0 w-100" style="width: 18rem;">
            <div class="card-body p-0">
                <div class="card-title p-3" style="background: #fbc700;">
                        <h5 class="font-weight-bold  d-inline-block" style="height: 45px;"><div class="badge badge-secondary badge-danger mr-1">
                                {{$item->content_text}}
                        </div>{{$item->title}}</h5>
                        <div>
                        <div class="badge badge-light">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bicycle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1v.5h4.14l.386-1.158A.5.5 0 0 1 11 4h1a.5.5 0 0 1 0 1h-.64l-.311.935.807 1.29a3 3 0 1 1-.848.53l-.508-.812-2.076 3.322A.5.5 0 0 1 8 10.5H5.959a3 3 0 1 1-1.815-3.274L5 5.856V5h-.5a.5.5 0 0 1-.5-.5zm1.5 2.443l-.508.814c.5.444.85 1.054.967 1.743h1.139L5.5 6.943zM8 9.057L9.598 6.5H6.402L8 9.057zM4.937 9.5a1.997 1.997 0 0 0-.487-.877l-.548.877h1.035zM3.603 8.092A2 2 0 1 0 4.937 10.5H3a.5.5 0 0 1-.424-.765l1.027-1.643zm7.947.53a2 2 0 1 0 .848-.53l1.026 1.643a.5.5 0 1 1-.848.53L11.55 8.623z"/>
                            </svg>
                            {{$item->prefectures}}
                        </div>
                        <div class="badge badge-light">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M15 4H1v8h14V4zM1 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1z"/>
                                <path d="M13 4a2 2 0 0 0 2 2V4h-2zM3 4a2 2 0 0 1-2 2V4h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 12a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                            </svg>
                            {{$item->price}}
                        </div>
                        <div class="badge badge-light">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            {{$item->owner->name}}
                        </div>
                        </div>
                </div>
                <div class="pr-3 pl-3 pb-3">
                    <div style="height:100px">

                        <p class="card-text mt-2">{{$item->order}}<a href="{{ route('mypage.contents.revue.show', ['id' => $item->id]) }}" class="card-link">もっと詳しく</a></p>
                        

                    </div>
                                            <div class="card-subtitle mb-2 text-muted">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                            </svg>{{$item->contentitem()->whereNull('deleted_at')->count()}}人
                        </div>
                        {{$item->created_at->format('Y/m/d')}}
                        <a href="{{ route('mypage.contents.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-lg w-100 mt-2"><font color=white>編集</font></a>
                        <form method="post" action="{{ route('mypage.contents.destroy', ['id' => $item->id]) }}">@method('DELETE')@csrf<input class='btn btn-danger btn-lg w-100 mt-2 d-block' type="submit" value="削除" ></form>
                </div>
            </div>
        </div>
        </div>



    {{-- <tr>
        <th scope="row"><a href="{{ route('content.show', ['id' => $item->id]) }}"><font color=black>{{$item->title}}</font></a></th>
        <td>{{$item->content_text}}</td>
        <td>{{$item->created_at->format('Y/m/d')}}</td>
        @if ($item->content_status == 1 )
                <td><button type="button" class="btn btn-secondary"><a href="{{ route('mycontent.edit', ['id' => $item->id]) }}"><font color=white>編集</font></a></button></td>
                <td><form method="post" action="{{ route('mycontent.destroy', ['id' => $item->id]) }}">@method('DELETE')@csrf<input class='btn btn-danger' type="submit" value="削除" ></form></td>
        @elseif ($item->content_status == 2)
                <td><button type="button" class="btn btn-info"><a href="{{ route('mycontent.load', ['id' => $item->id]) }}"><font color=white>申請者リストを見る</font></a></button></td>
                <td><form method="post" action="{{ route('mycontent.destroy', ['id' => $item->id]) }}">@method('DELETE')@csrf<input class='btn btn-danger' type="submit" value="削除" ></form></td>
        @elseif ($item->content_status == 3)
                <td>{{$item->helper->name}}さんにお願いしました </td>
                <td></td>
        @elseif ($item->content_status == 4)
                @if(isset($item->value))
                        <td>{{$item->helper->name}}さんから届いたレポートを評価しました</td>
                        <td><button type="button" class="btn btn-info"><a href="{{ route('mycontent.show', ['id' => $item->id]) }}"><font color=white>評価したレポートを確認する</font></a></button></td>
                @else
                        <td>{{$item->helper->name}}さんからレポートが届きました</td>
                        <td><button type="button" class="btn btn-primary"><a href="{{ route('mycontent.revue', ['id' => $item->id]) }}"><font color=white>レポートを評価する</font></a></button></td>     
                @endif 
        @endif
    </tr> --}}
        @endforeach
          </div>
<div class="d-flex justify-content-center">
    {{ $contents->links() }}
</div>
@endsection

@section('create')
        {{-- <button type="button" class="btn btn-success"><a href="{{ action('ContentsController@create') }}"><font color=white>依頼作成</font></a></button> --}}
@endsection

