@extends('layouts.base')

@section('content')
@foreach($items as $item)
<table>
<tr>
        <td>{{$item->id}}</td>
        <td>{{$item->title}}</td>
        <td>{{DB::table('content_items')->where('content_id','=',$item->id)->count()}}</td>
        <td><button type="button" class="btn btn-secondary"><a href="{{ route('mycontent.edit', ['id' => $item->id]) }}"><font color=white>編集</font></a></button></td>
        <td><button type="button" class="btn btn-danger"><a href="{{ route('mycontent.destroy', ['id' => $item->id]) }}"><font color=white>削除</font></a></button></td>
<tr>
</table>
@endforeach
@endsection

