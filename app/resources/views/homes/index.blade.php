<!DOCTYPE html>
<html>
<head>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  @extends('layouts.app')
</head>
@section('top')
<body>
<section>
  <div id="top_left">
    <img id="logo" src="{{ asset('/assets/images/logo.png') }}" alt="ロゴ">
    <button type="button" onclick="location.href='{{ route('content.create') }}'" id='top_button1'>デート代行を依頼する方</button>
    <button type="button" onclick="location.href='{{ route('content.index') }}'" id='top_button2'>デート代行を請け負う方</button>
  </div>
  <div id="top_right">
    <img id="ring" src="{{ asset('/assets/images/ring1.png') }}" alt="リング">
  </div>
    <div style="clear:both"></div>
</section>
<section>
  <div id="top_message1">
    What's TRYVE?
  </div>
    <img id="car" src="{{ asset('/assets/images/car.png') }}" alt="車">
  <div id="top_message2">
    TRYVEは、デートをもっとトライしたい人達のために生まれたマッチングサービスです。
  </div>
  <div id="top_message3">
    <strong>行ったことのないところに行く勇気がない人</strong>と、そこに<strong>下見に行く人</strong>を繋げることでより有意義なデート体験をご提供します。
  </div>
</section>
<section>
  <div id="centre_message1">
    New Requests
  </div>
  <div id="centre_border-left"></div>
  <div id="centre_border-right"></div>
  <div id="centre_message2">
    新着の依頼
  </div>
  <div id="contents">
  @foreach($contents as $content)
  <div id="contents_body">
  <p id="contents_item">{{$content->title}}</p>
  <p id="contents_item"><button type="button" onclick="location.href='{{ route('content.show', ['id' => $content->id]) }}'" id='contents_button'>詳細</button></p>
  </div>
  @endforeach
  </div>
  <button type="button" onclick="location.href='{{ route('content.index') }}'" id="centre_button">もっと見る</button>
</section>
<section>
  <div id=bottom_messages>
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
    <button type="button" onclick="location.href='{{ route('content.create') }}'" id='bottom_button1'>デート代行を依頼する方</button>
    <button type="button" onclick="location.href='{{ route('content.index') }}'" id='bottom_button2'>デート代行を請け負う方</button>
    <div>
  </div>
</section>
<section>
  <footer>
  <div id="footer_box">
    <img id="footer" src="{{ asset('/assets/images/footer.png') }}" alt="footer">
  </div>
  </footer>
</section>
</body>
@endsection
<style>
  /* section1 */
  #top_left{
    width: 40%;
    height: 80vh;
    float: left;
    padding-top: 200px;
  }
  #logo{
    margin: 20px auto;
    display:block;
  }
  #top_button1{
    margin: 40px auto;
    font-size: 18px;
    width: 40%;
    height: 7vh;
    display:block;
    border-radius: 80px;
    background-color: #04A0BB;
    color: white;
    border: none;  
    font-weight: bold; 
  }
  #top_button2{
    margin: 0 auto;
    font-size: 18px;
    width: 40%;
    height: 7vh;
    display:block;
    border: solid 2px #04A0BB;
    border-radius: 80px;
    background-color: white;
    font-weight: bold; 
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
  #centre_message1{
    margin-top: 150px;
    text-align: center;
    font-size: 50px;
    font-weight: bold; 
    display:block;
  }
  #centre_border-left{
    border-bottom: 3px solid #04A0BB;
    width: 30%;
    margin: 0 10%;
  }
  #centre_border-right{
    border-bottom: 3px solid #04A0BB;
    width: 30%;
    margin: 0 60%;
  }
  #centre_message2{
    text-align: center;
    font-size: 30px;
    font-weight: bold; 
  }
  #centre_button{
    margin: 40px auto;
    font-size: 31px;
    width: 310px;
    display:block;
    border-radius: 80px;
    background-color: #04A0BB;
    color: white;
    border: none;  
    font-weight: bold; 
  }
  #contents{
    padding: 2.5% 0;
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    height: 45vh;
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
    height: 37vh;
  }
  #bottom_message1{
    margin-top: 150px;
    text-align: center;
    color:white;
    font-size: 50px;
    font-weight: bold; 
    display:block;
  }
  #bottom_message2{
    text-align: center;
    font-size: 25px;
    color:white;
    font-weight: bold; 
  }
  #bottom_message3{
    text-align: center;
    font-size: 30px;
    color:white;
    font-weight: bold; 
  }
  #bottom_message4{
    text-align: center;
    font-size: 30px;
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
    width: 20%;
    height: 7vh;
    font-size: 24px;
    margin-left: 25%;
    font-weight: bold; 
  }
  #bottom_button2{
    border: solid 2px #FFD800;
    border-radius: 80px;
    background-color: white;
    width: 20%;
    height: 7vh;
    font-size: 24px;
    margin-left: 10%;
    font-weight: bold; 
  }
  #bottom_buttons{
    margin: 20px auto;
    width: 80%;
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
  </style>