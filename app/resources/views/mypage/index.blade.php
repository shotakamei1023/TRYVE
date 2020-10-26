
@extends('layouts.app')
@section('title')
<h1 class="font-weight-bold">マイページ</h1>
<p>デート状況や新着情報を確認することができます。</p>
@endsection
@section('content')
    <h2 class="font-weight-bold text-center">{{ Auth::user()->name }}<a href="{{ route('mypage.edit') }}" class="font-weight-normal pl-1" style="font-size:1rem">アカウント登録情報変更</a></h2>
            
    @if($avg == null)
    <h4 class="font-weight-bold text-center">あなたの代行評価はありません</h4>
    @else
    <h4 class="font-weight-bold text-center">あなたの代行評価は{{$avg}}です。</h4>
    @endif
    <h3 class="font-weight-bold">マイデート新着一覧</h3>
    <div class="row">
      @foreach($contents as $item)
          <div class="col-xs-10 col-sm-6 col-md-4">
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

                          <p class="card-text mt-2">{{$item->order}}<a href="{{ route('contents.show', ['id' => $item->id]) }}" class="card-link">もっと詳しく</a></p>
                          

                      </div>
                          依頼作成日 {{$item->created_at->format('Y/m/d')}}
                                  <a href="{{ route('mypage.contents.helper', ['id' => $item->id]) }}" class="btn btn-success btn-lg w-100 mt-2"><font color=white>申請者リストを見る</font></a>
                                  <form method="post" action="{{ route('mypage.contents.destroy', ['id' => $item->id]) }}">@method('DELETE')@csrf<input class='btn btn-danger btn-lg w-100 mt-2 d-block' type="submit" value="削除" ></form>

                  </div>
              </div>
          </div>
          </div>
          @endforeach
    </div>
    <h3 class="font-weight-bold">デート一覧</h3>
    <div class="row">
    @foreach($contentitems as $item)
        <div class="col-xs-10 col-sm-6 col-md-4 mb-3">
        <div class="card p-0 w-100" style="width: 18rem;">
            <div class="card-body p-0">
                <div class="card-title p-3" style="background: #fbc700;">
                        <h5 class="font-weight-bold  d-inline-block" style="height: 45px;">
                                <div class="badge badge-secondary badge-danger mr-1">
                                                <td>{{$item->content->report_text}}</td>
                                </div>
                                {{$item->content->title}}</h5>
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
                            {{$item->content->owner->name}}
                        </div>
                </div>
                <div class="pr-3 pl-3 pb-3">
                        <div style="height:100px">

                                <p class="card-text mt-2">{{$item->content->order}}<a href="{{ route('contents.show', ['id' => $item->content->id]) }}" class="card-link">もっと詳しく</a></p>
                                

                        </div>

                                <td><form method="post" action="{{ route('mypage.tasks.update', ['id' => $item->content->id,'type' => 'cancel']) }}">@method('PATCH')@csrf<input class='btn btn-warning' type="submit" value="中断" ></form></td>
                                <td><button type="button" class="btn btn-primary"><a href="{{ route('mypage.tasks.edit', ['id' => $item->content->id]) }}"><font color=white>レポートを提出する</font></a></button></td>
                        </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
