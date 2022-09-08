@extends('layouts.default')
@section('title', 'トップページ')

@section('content')
<section class="bg-gray-100">
  <div class="container mx-auto py-40 relative">
    <h1 class="mt-2 text-4xl font-bold font-heading text-center">さぁ、みんなでご飯を楽しもう！！</h1>
   
    
  </div>
</section>

<section class="mt-16">
  <div class="container mx-auto">
    <p class="text-center text-2xl">食形態から探そう</p>
   
  
</section>
<div class="text-center">
<h1>検索条件を入力してください</h1>
<form action="{{ url('/serch')}}" method="post">
  {{ csrf_field()}}
  {{method_field('get')}}
 
    <div class="form-group">
     <label>食形態</label>
     <select class="form-control col-md-5" name="foodform">
       <option selected value="0">選択...</option>
       <option value="1">ペースト食</option>
       <option value="2">マッシュ</option>
       <option value="3">きざみ食</option>
       <option value="4">ポタージュ</option>
     </select>
   </div>

  {{-- <div class="form-group">
     <label>カテゴリ別</label>
     <select class="form-control col-md-5" name="type">
       <option selected value="0">選択...</option>
       <option value="1">肉料理</option>
       <option value="2">魚料理</option>
       <option value="3">大豆・豆腐</option>
       <option value="4">めん類</option>
       <option value="5">ごはんもの</option>
       <option value="6">サラダ</option>
       <option value="7">スープ・汁物</option>
       <option value="8">スイーツ</option>
     </select>
   </div> --}}

  <button type="submit" class="btn btn-primary col-md-5">検索</button>
</form>

@if(session('flash_message'))
<div class="alert alert-primary" role="alert" style="margin-top:50px;">{{ session('flash_message')}}</div>
@endif
<div style="margin-top:50px;">
</div>

  </div>

  <div class="mb-6 py-4 bg-white rounded">
        <div class="flex px-6 pb-4 border-b justify-center">
            <h2 class="text-xl font-bold">レシピ一覧</h2>
        </div>
        <div class="pt-4 px-4 overflow-x-auto">
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
                    <td class="flex px-4 py-3 recipis-center justify-center">
                        <img class="w-12 h-12 mr-4 object-cover rounded-md" src="{{ asset('storage/'.$recipi->image) }}" alt="">
                        <p class="font-medium"><a href="{{ route('detail',['recipi' => $recipi->id]) }}">{{ $recipi->title }}</a></p>
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
        </div>
</section>
@endsection