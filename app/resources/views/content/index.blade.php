  @extends('layouts.app')
@foreach($items as $item)
<table>
<tr>
        <td>{{$item->title}}</td>
        <td>{{$item->address_first}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->user->name}}</td>
<tr>
</table>
@endforeach