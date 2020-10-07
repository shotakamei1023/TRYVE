@extends('layouts.app')

@section('content')

<table>
<tr>
        <td>{{$content->title}}</td>
        <td>{{$content->prefectures}}</td>
        <td>{{$content->address}}</td>
        <td>{{$content->price}}</td>
        <td>{{$content->order}}</td>
        <td><a href={{$content->gmap}}>goolemapURL</a></td>
        <td>{{$content->report}}</td>
        <td>{{$content->value}}</td>
<tr>
</table>

@endsection

