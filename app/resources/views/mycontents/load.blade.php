@extends('layouts.app')

@section('content')
@foreach($contentitems as $contentitem)
<table>
<tr>
        <td>{{$contentitem->user->id}}</td>
        <td>{{$contentitem->user->name}}</td>
        <? var_dump($contentitem->id); ?>
        <td><form method="post" action="{{ route('mycontent.permit', ['id' => $contentitem->id]) }}">@method('PATCH')@csrf<input type="submit" value="お願いする" ></form></td>
<tr>
</table>
@endforeach
@endsection

