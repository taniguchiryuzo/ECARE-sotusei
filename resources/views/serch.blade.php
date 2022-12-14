@extends('layouts.default')

@section('content')
<link href="css/tailwind/tailwind.min.css" rel="stylesheet" type="text/css">
<!-- jsファイルの呼び出し -->
<script src="js/main.js" type="text/javascript"></script>
<div style="margin-top:50px;">
<h1 class="flex justify-center">検索結果</h1>

<a class="flex justify-center px-4 py-3 text-xs font-semibold leading-none bg-contain bg-green-500 hover:bg-green-600 text-white rounded" href="/project">戻る</a>
@if(isset($recipis))
<table class="table-auto w-full">
                <thead>
                <tr class="text-xs text-gray-500 text-left">
                    <th class="font-medium text-center">タイトル</th>
                    <th class="font-medium">カテゴリ</th>
                    <th class="font-medium">食形態</th>
                             
                </tr>
                </thead>
                <tbody>
                    @foreach ($recipis as $recipi )
                    <tr @class(['text-sm'.'bg-gray-50' => $loop->odd])>
                    <td class="flex px-4 py-3 recipis-center justify-start">
                        <img class="w-12 h-12 mr-4 object-cover rounded-md" src="{{ asset('storage/'.$recipi->image) }}" alt="">
                        <p class="font-medium"><a href="{{ route('detail',['recipi' => $recipi->id]) }}"">{{ $recipi->title }}</a></p>
                    </td>
                    <td class="font-medium">{{ $recipi->type }}</td>
                    <td class="font-medium">{{ $recipi->foodform }}</td>
                    {{-- <td>{{ $recipi->updated_at }}</td> --}}
                    <td>
                   </td>
                </tr>
                @endforeach
                </tbody>
            </table>
@endif
@if(!empty($message))
<div class="alert alert-primary flex justify-center" role="alert">{{ $message}}</div>
@endif
</div>
@endsection