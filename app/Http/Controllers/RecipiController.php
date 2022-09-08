<?php

namespace App\Http\Controllers;

use App\Models\Recipi;
use Illuminate\Http\Request;

class RecipiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $recipis = Recipi::all();
        // return response()->json([
        //     'message' => 'ok',
        //     'data'    => $recipis,
        // ], 200, [], JSON_UNESCAPED_UNICODE);

        $recipis = Recipi::all();
        return view('index', ['recipis' => $recipis]);
    }


    public function serch(Request $request)
    {
        $keyword_type = $request->type;
        $keyword_foodform = $request->foodform;

        if ($keyword_foodform == 0) {
            $message = "条件を選択してください";
            return view('/serch')->with([
                'message' => $message,
            ]);
        } elseif ($keyword_foodform == 1) {
            $query = Recipi::query();
            $recipis = $query->where('foodform', 'ペースト食')->get();
            $message = "ペースト食の検索が完了しました";
            return view('/serch')->with([
                'recipis' => $recipis,
                'message' => $message,
            ]);
        } elseif ($keyword_foodform == 2) {
            $query = Recipi::query();
            $recipis = $query->where('foodform', 'マッシュ食')->get();
            $message = "マッシュ食の検索が完了しました";
            return view('/serch')->with([
                'recipis' => $recipis,
                'message' => $message,
            ]);
        } elseif ($keyword_foodform == 3) {
            $query = Recipi::query();
            $recipis = $query->where('foodform', 'きざみ食')->get();
            $message = "きざみ食の検索が完了しました";
            return view('/serch')->with([
                'recipis' => $recipis,
                'message' => $message,
            ]);
        } elseif ($keyword_foodform == 4) {
            $query = Recipi::query();
            $recipis = $query->where('foodform', 'ポタージュ')->get();
            $message = "ポタージュ食の検索が完了しました";
            return view('/serch')->with([
                'recipis' => $recipis,
                'message' => $message,
            ]);
            // } elseif (empty($keyword_name) && !empty($keyword_age) && $keyword_foodform == 2) {
            //     $query = User::query();
            //     $users = $query->where('foodform', $keyword_age)->get();
            //     $message = $keyword_age . "歳以下の検索が完了しました";
            //     return view('/serch')->with([
            //         'users' => $users,
            //         'message' => $message,
            //     ]);
            // } elseif (empty($keyword_name) && empty($keyword_age) && $keyword_type == 1) {
            //     $query = User::query();
            //     $users = $query->where('type', '肉料理')->get();
            //     $message = "肉料理の検索が完了しました";
            //     return view('/serch')->with([
            //         'users' => $users,
            //         'message' => $message,
            //     ]);
            // } elseif (empty($keyword_name) && empty($keyword_age) && $keyword_type == 2) {
            //     $query = User::query();
            //     $users = $query->where('type', '女')->get();
            //     $message = "女性の検索が完了しました";
            //     return view('/serch')->with([
            //         'users' => $users,
            //         'message' => $message,
            //     ]);
        } else {
            $message = "検索結果はありません。";
            return view('/serch')->with('message', $message);
        }
    }
}
