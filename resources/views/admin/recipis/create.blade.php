@extends('layouts.admin')

@section('content')
<section class="py-8">
    <div class="container px-4 mx-auto">
        <div class="py-4 bg-white rounded">
            <form action="{{ route('admin.recipis.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex px-6 pb-4 border-b">
                    <h3 class="text-xl font-bold">レシピ登録</h3>
                    <div class="ml-auto">
                        <button type="submit" class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">保存</button>
                    </div>
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
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="title">タイトル</label>
                        <input id="title" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="title" value="{{ old('title') }}">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="image">画像</label>
                        <div class="flex items-end">
                            <img id="previewImage" src="/images/admin/noimage.jpg" data-noimage="/images/admin/noimage.jpg" alt="" class="rounded shadow-md w-64">
                            <input id="image" class="block w-full px-4 py-3 mb-2" type="file" accept='image/*' name="image">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="foodform">食形態</label>
                        <div class="flex">
                            <select id="foodform" class="appearance-none block pl-4 pr-8 py-3 mb-2 text-sm bg-white border rounded" name="foodform">
                              <option>ペースト食</option>
                                <option>マッシュ</option>
                                <option>きざみ食</option>
                                <option>ポタージュ</option>
                            </select>
                            <div class="pointer-events-none transform -translate-x-full flex items-center px-2 text-gray-500">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="material">材料</label>
                        <textarea id="material" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="material" rows="5">{{ old('material') }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="body">作り方</label>
                        <textarea id="body" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="body" rows="5">{{ old('body') }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="type">カテゴリ</label>
                        <div class="flex">
                            <select id="type" class="appearance-none block pl-4 pr-8 py-3 mb-2 text-sm bg-white border rounded" name="type">
                                <option>肉料理</option>
                                <option>魚料理</option>
                                <option>大豆・豆腐</option>
                                <option>めん類</option>
                                <option>ごはんもの</option>
                                <option>サラダ</option>
                                <option>スープ・汁物</option>
                                <option>スイーツ</option>
                            </select>
                            <div class="pointer-events-none transform -translate-x-full flex items-center px-2 text-gray-500">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">登場するねこ</label>
                        <select id="js-pulldown" class="mr-6 w-full" name="" multiple>
                            <option selected>Option 1</option>
                            <option>Option 2</option>
                            <option selected>Option 3</option>
                            <option>Option 4</option>
                        </select>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    // ねこちゃんたち追加
    $('#js-pulldown').select2();

    // 画像プレビュー
    document.getElementById('image').addEventListener('change', e => {
        const previewImageNode = document.getElementById('previewImage')
        const fileReader = new FileReader()
        fileReader.onload = () => previewImageNode.src = fileReader.result
        if (e.target.files.length > 0) {
            fileReader.readAsDataURL(e.target.files[0])
        } else {
            previewImageNode.src = previewImageNode.dataset.noimage
        }
    })
</script>
@endsection