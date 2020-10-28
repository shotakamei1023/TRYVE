@extends('layouts.top')
@section('assets')
@endsection
@section('content')
  <section class="row w-100 mx-0 topView" style="height:100vh">
    <div class="col-xs-10 col-sm-6 col-md-4 px-5" style="padding:30vh 0">
      <div class="mx-auto" style="max-width:350px;width:100%">
      <img id="logo" src="{{ asset('/assets/images/logo.png') }}" alt="ロゴ" class="w-100">
        <button type="button" onclick="location.href='{{ route('mypage.contents.create') }}'" id='top_button1'>デート代行を依頼する方</button>
        <button type="button" onclick="location.href='{{ route('contents.index') }}'" id='top_button2'>デート代行を請け負う方</button>
      </div>
    </div>
    <div class="col-xs-10 col-sm-6 col-md-8 topViewYellow" style="background-color:#FFD800;height:60vh;padding:0 7%">
      <img id="ring" src="{{ asset('/assets/images/ring1.png') }}" alt="リング" class="col-7 d-block mx-auto" style="margin-top:30vh;max-width:600px">
    </div>
      <div style="clear:both"></div>
  </section>
  <section class="w-100" style="padding: 100px 10px 0 10px">
    <h3 class="font-weight-bold text-center">
      What's TRYVE?
    </h3>
      <img id="car" src="{{ asset('/assets/images/car.png') }}" alt="車">
    <div class="text-center">
      <p>TRYVEは、デートをもっとトライしたい人達のために生まれたマッチングサービスです。
      <p><strong>行ったことのないところに行く勇気がない人</strong>と、そこに<strong>下見に行く人</strong>を繋げることでより有意義なデート体験をご提供します。</p>
    </div>
  </section>
  <section class="container" style="padding: 100px 0;">
    <h3 class="font-weight-bold text-center">
      New Requests
    </h3>
    <div id="centre_border-left"></div>
    <div id="centre_border-right"></div>

    <div id="contents">
      <div class="row w-100">
    @foreach($contents as $item)
        <div class="col-xs-10 col-sm-6 col-md-4 mb-3">
        <div class="card p-0 w-100" style="width: 18rem;">
            <div class="card-body p-0">
                <div class="card-title p-3" style="background: #fbc700;">
                        <h5 class="font-weight-bold  d-inline-block" style="height: 45px;">{{$item->title}}</h5>
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

                        <p class="card-text mt-2">{{$item->order}}<a href="{{ route('mypage.contents.review.show', ['id' => $item->id]) }}" class="card-link">もっと詳しく</a></p>
                        

                    </div>
                                            <div class="card-subtitle mb-2 text-muted">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                            </svg>{{$item->contentitem()->whereNull('deleted_at')->count()}}人
                        </div>
                        {{$item->created_at->format('Y/m/d')}}
                </div>
            </div>
        </div>
        </div>
    @endforeach
      </div>
    </div>
    <button type="button" onclick="location.href='{{ route('contents.index') }}'" id="center_button">もっと見る</button>
  </section>
  <section>
    <div id="bottom_messages">
      <div id="bottom_message1">
        Let’s TRYVE!!
      </div>
      <div id="bottom_border-left"></div>
      <div id="bottom_border-right"></div>
      <div id="bottom_message2">
        今すぐ無料で利用する
      </div>
      <div id="bottom_message3_4">
      <div id="bottom_message3">
        最高のデートのために興味のある
      </div>
      <div id="bottom_message4">
        デートスポットの下見をお願いしてみましょう!
      </div>
      </div>
      <div id="bottom_buttons">
      <button type="button" class="col-md-5 mb-3" onclick="location.href='{{ route('mypage.contents.create') }}'" id='bottom_button1'>デート代行を依頼する方</button>
      <button type="button" class="col-md-5 mb-3" onclick="location.href='{{ route('contents.index') }}'" id='bottom_button2'>デート代行を請け負う方</button>
      <div>
    </div>
  </section>
  {{-- <section>
    <footer>
    <div id="footer_box">
      <img id="footer" src="{{ asset('/assets/images/footer.png') }}" alt="footer">
    </div>
    </footer>
  </section> --}}
  <style>
    /* section1 */
    #top_left{
      width: 40%;
      height: 80vh;
      float: left;
      padding: 200px 5%;
    }
    #logo{
      
    }
    #top_button1{
    margin: 20px auto;
    font-size: 15px;
    width: 100%;
    display: block;
    border-radius: 80px;
    background-color: #04A0BB;
    color: white;
    border: none;
    font-weight: bold;
    padding: 20px;
    }
    #top_button2{
      margin: 0 auto;
      font-size: 15px;
      width: 100%;
      display:block;
      border: solid 2px #04A0BB;
      border-radius: 80px;
      background-color: white;
      font-weight: bold; 
      padding: 20px;
    }

    #top_right{
      width: 60%;
      height: 80vh;
      float: right;
      background-color:#FFD800;
      padding: 150px 10%;
    }
    #ring{
      width: 100%;
    }

    /* section2 */
    #top_message1{
      margin-top: 200px;
      text-align: center;
      font-size: 50px;
      font-weight: bold; 
    }
    #car{
      margin: 20px auto;
      display:block;
    }
    #top_message2{
      text-align: center;
      font-size: 20px;
    }
    #top_message3{
      text-align: center;
      font-size: 20px;
    }

    /* section3 */
    #center_message1{
      margin-top: 150px;
      text-align: center;
      font-size: 50px;
      font-weight: bold; 
      display:block;
    }
    #center_border-left{
      border-bottom: 3px solid #04A0BB;
      width: 30%;
      margin: 0 10%;
    }
    #center_border-right{
      border-bottom: 3px solid #04A0BB;
      width: 30%;
      margin: 0 60%;
    }
    #center_message2{
      text-align: center;
      font-size: 30px;
      font-weight: bold; 
    }
    #center_button{
      margin: 40px auto;
      font-size: 18px;
      width: 310px;
      display:block;
      border-radius: 80px;
      background-color: #04A0BB;
      color: white;
      border: none;  
      font-weight: bold;
      padding: 20px; 
    }
    #contents{
      padding: 2.5% 0;
      display: flex;
      flex-direction: row;
      justify-content: space-evenly;
    }
    #contents_body{
      border: 5px solid;
      border-radius: 30px;
      border-color: #04A0BB;
      width: 30%;
    }
    #contents_item{
      margin: 50px auto;
      font-size: 40px;
      text-align: center;
    }
    #contents_button{
      border: solid 5px #FFD800;
      border-radius: 80px;
      background-color: white;
      width: 35%;
      height: 7vh;
      font-size: 24px;
      font-weight: bold; 
    }

    /* section4 */
    #bottom_messages{
      background-color:#04A0BB;
      padding: 100px 0;
    }
    #bottom_message1{
      text-align: center;
      color:white;
      font-size: 40px;
      font-weight: bold; 
      display:block;
    }
    #bottom_message2{
      text-align: center;
      font-size: 20px;
      color:white;
      font-weight: bold; 
    }
    #bottom_message3{
      text-align: center;
      font-size: 20px;
      color:white;
      font-weight: bold; 
    }
    #bottom_message4{
      text-align: center;
      font-size: 20px;
      color:white;
      font-weight: bold; 
    }
    #bottom_border-left{
      border-bottom: 3px solid #FFD800;
      width: 30%;
      margin: 0 10%;
    }
    #bottom_border-right{
      border-bottom: 3px solid #FFD800;
      width: 30%;
      margin: 0 60%;
    }
    #bottom_message3_4{
      margin-top: 20px;
    }
    #bottom_button1{
      border-radius: 80px;
      background-color:#FFD800;
      border: none;
      height: 7vh;
      font-size: 14px;
      font-weight: bold; 
    }
    #bottom_button2{
      border: solid 2px #FFD800;
      border-radius: 80px;
      background-color: white;
      height: 7vh;
      font-size: 14px;
      font-weight: bold; 
      float: right;
    }
    #bottom_buttons{
      margin: 20px auto;
      width: 60%;
    }
    /* section5 */
    #footer_box{
      background-color:#04A0BB;
      height: 20vh;
    }
    #footer{
      margin: auto;
      display:block;
    }


@media screen and (max-width:575px) { 
    /*　画面サイズが480pxからはここを読み込む　*/
  #ring {
    margin-top: 0!important
  }
  .topView {
    height: auto!important;
  }
  .topViewYellow {
    padding:50px 30px !important;
    height: auto !important;
  }
}
    </style>
@endsection