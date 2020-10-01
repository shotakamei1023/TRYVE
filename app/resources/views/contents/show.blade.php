@extends('layouts.base')

@section('content')
<h2>依頼詳細画面</h2>

<table>
<tr>
        <td>{{$content->title}}</td>
        <td>{{$content->prefectures}}</td>
        <td>{{$content->address}}</td>
        <td>{{$content->price}}</td>
        <td>{{$content->order}}</td>
        <td><a href={{$content->gmap}}>goolemapURL</a></td>
<tr>
</table>
@endsection