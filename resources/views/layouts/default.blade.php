<!DOCTYPE html>
<html lang="ja">
<head>
    <title>@yield('title', 'E-CARE')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="/css/tailwind/tailwind.min.css">

    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
    <script src="/js/main.js"></script>
</head>
<body class="antialiased bg-body text-body font-body">

<!-- ▼▼▼▼共通ヘッダー▼▼▼▼　-->
<header class="bg-yellow-400 ">
    <div class="container px-4 mx-auto">
        <nav class="flex items-center justify-between py-6">
            <a class="text-3xl font-semibold leading-none text-white" href="/index">E-CARE</a>
            <ul class="hidden lg:flex ml-12 mr-auto space-x-12">
                <li><a class="text-sm text-white hover:text-blueGray-500" href="#">レシピ一覧</a></li>
                <li><a class="text-sm text-white hover:text-blueGray-500" href="#">カテゴリ検索</a></li>
            </ul>
            <div>
                <a class="inline-block px-4 py-3 text-xs font-semibold leading-none bg-blue-500 hover:bg-blue-600 text-white rounded" href="/admin/login">管理者ページ</a>
            </div>
        </nav>
    </div>
</header>
<!-- ▲▲▲▲共通ヘッダー▲▲▲▲　-->

<!-- ▼▼▼▼ページ毎の個別内容▼▼▼▼　-->
<main>
@yield('content')
</main>
<!-- ▲▲▲▲ページ毎の個別内容▲▲▲▲　-->

<!-- ▼▼▼▼共通フッター▼▼▼▼　-->
<footer class="bg-yellow-400">
    <div class="px-4 container mx-auto p-10 flex justify-center">
        <div class="text-white text-center">
            <h2 class="text-xl font-semibold">E-CARE</h2>
            <p>〒123-4567</p>
            <p>長崎市〇〇町12-34</p>
        </div>

       
    </div>
</footer>
<!-- ▲▲▲▲共通フッター▲▲▲▲　-->
</body>
</html>

