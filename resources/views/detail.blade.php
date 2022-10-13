@extends('layouts.default')

@section('content')
<!-- cssの呼び出し -->
<link href="css/tailwind/tailwind.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet">
<!-- jsファイルの呼び出し -->
<script src="js/main.js" type="text/javascript"></script>
<section class="py-8">
    <div class="container px-4 mx-auto">
        <div class="py-4 bg-white rounded">
                  <div class="flex px-6 pb-4 border-b">
                    <h3 class="text-xl font-bold">レシピ詳細</h3>
                   
                </div>

                <div class="pt-4 px-6">
                    <!-- ▼▼▼▼エラーメッセージ▼▼▼▼　-->
                   @if($errors->any())
                    <div class="mb-8 py-4 px-6 border border-red-300 bg-red-50 rounded">
                        <ul>
                            @foreach ($errors->all() as $error )
                            
                            <li class="text-red-400">{{ $error }}</li>
                            @endforeach
                        </ul>
                     @endif
                    </div>
                    <!-- ▲▲▲▲エラーメッセージ▲▲▲▲　-->
                    <div class="mb-6 text-green-500 text-xl">
                        <div>タイトル</div>
                        <div>{{ $recipi->title }}</div>
                    </div>
                        <div>{{ $recipi->type }}</div>
                        <div class="">{{ $recipi->foodform }}</div>
                    <div class="mb-6">
                        <div class="flex items-end">
                            <img id="previewImage" src="{{ asset('storage/'.$recipi->image) }}" data-noimage="{{ asset('storage/'.$recipi->image) }}" alt="" class="rounded shadow-md ">
                        </div>
                    </div>
                    <div class="mb-6">
                                          
                      <div class="textarea">{{ $recipi->material }}</div>
                      <div class="textarea">{{ $recipi->body }}</div>
                     </div>
                   <a class="inline-block px-4 py-3 text-xs font-semibold leading-none bg-green-500 hover:bg-green-600 text-white rounded" href="/project">TOPに戻る</a>

                </div>
        </div>
    </div>
</section>
@endsection
