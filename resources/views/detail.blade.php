@extends('layouts.default')

@section('content')
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
                      
                      <div class="">{{ $recipi->material }}</div>
                      <div class="">{{ $recipi->body }}</div>
                     </div>
                    

                   
                

                
                </div>
        </div>
    </div>
</section>
@endsection