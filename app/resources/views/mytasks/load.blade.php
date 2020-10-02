@extends('layouts.base')

@section('content')
@foreach($contents as $content)
<table>
<tr>
        <td>{{$content->user->id}}</td>
        <td>{{$content->user->name}}</td>
        <td><form method="post" action="{{ route('mycontent.permit', ['id' => $content->id]) }}">@method('PATCH')@csrf<input type="submit" value="お願いする" ></form></td>
<tr>
</table>
@endforeach
@endsection

