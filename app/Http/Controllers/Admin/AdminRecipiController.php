<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreRecipiRequest;
use App\Http\Requests\Admin\UpdateRecipiRequest;
use App\Models\Recipi;
use Illuminate\Support\Facades\Storage;

class AdminRecipiController extends Controller
{
    // レシピ一覧画面
    public function index()
    {
        $recipis = Recipi::all();
        return view('admin.recipis.index', ['recipis' => $recipis]);
    }

    // レシピ投稿画面
    public function create()
    {
        return view('admin.recipis.create');
    }

    // レシピ投稿処理
    public function store(StorerecipiRequest $request)
    {
        $savedImagePath = $request->file('image')->store('recipis', 'public');
        $recipi = new Recipi($request->validated());
        $recipi->image = $savedImagePath;
        $recipi->save();

        return to_route('admin.recipis.index')->with('success', 'レシピを投稿しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    //    指定したIDのレシピの編集画面
    public function edit($id)
    {
        $recipi = Recipi::find($id);
        return view('admin.recipis.edit', ['recipi' => $recipi]);
    }


    public function update(UpdateRecipiRequest $request, $id)
    {
        $recipi = Recipi::findOrFail($id);
        $updateData = $request->validated();

        //   画像を変更する場合
        if ($request->has('image')) {
            // 変更前の画像削除
            Storage::disk('public')->delete($recipi->image);
            // 変更後の画像をアップロード、保存パスを更新対象データにセット
            $updateData['image'] = $request->file('image')->store('recipis', 'public');
        }
        $recipi->update($updateData);

        return to_route('admin.recipis.index')->with('success', 'レシピを更新しました');
    }


    // 指定したIDのレシピの削除処理
    public function destroy($id)
    {
        $recipi = Recipi::findOrFail($id);
        $recipi->delete();
        Storage::disk('public')->delete($recipi->image);

        return to_route('admin.recipis.index')->with('success', 'レシピを削除しました');
    }
}
