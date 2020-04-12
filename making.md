# ツイートしかできないTwitterを作る

私はIT技術系のツイートをするためのツイッターアカウントを運用している

技術系のツイートを思いつく（したくなる）のは仕事中のときが多い

しかしおおっぴらにツイッターを開くのは周りの目が気になるお年頃・・・

また、席を外してスマホからツイートしてもよいが、ついTLを眺めてしまい時間を浪費しがち

Twitterとバレずに、ツイートしかできないブラウザアプリがあればな〜と思い探したが見つからず

ちゃんと探せばいっぱいあるのかもしれないが、練習のために自作することにした

node.jsかLaravelかで迷ったが今触ってるLaravelを選択

# 準備

Twitter Developerに登録してAPIキーとアクセストークンを取得

PHP/composer/laravel/gitなどをインストール

# 手順

まずはともあれディレクトリ作成とGit管理

```
$ laravel new tweeter
$ cd tweeter
$ git init
$ git add .
$ git commit
$ git remote add origin git@github.com:kogaya/tweeter.git
$ git push -u origin master
```

サーバ起動後、`localhost:8000`に接続して起動確認

```
php -S localhost:8000 -t public
```

調べた所、twitterOAuthという便利なプラグインがあるっぽいので追加

```
composer require abraham/twitteroauth
```

`.env`ファイルにAPIKeyなどを記述する

```
TWITTER_CLIENT_ID = 1fhhdGADQXttesdfzJ9FKoQKoFlowEr9-n10G1rL
TWITTER_CLIENT_SECRET = QsFJDsU19fmyjS8EvSvlasVL6Krhdma34icgfdjJLu3evr3VxWay155
TWITTER_CLIENT_ID_ACCESS_TOKEN = 11915728ksdgilh-2e2txmfHy84Fk4I1KcUfkawKyTo7k8WmccKhmw
TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET = CZJIz093dgT6ahfnFla9bfuTyVMsJZNGCLEdL3N0WvytVk4s
// 値はダミー
```

Tweetコントローラー作成

```
php artisan make:controller TweetController
```

生成されたコントローラに下記のように記述

```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class TweetController extends Controller
{
    public function tweet(Reauest $request){
        $twitter = new TwitterOAuth(env('TWITTER_CLIENT_ID'),
            env('TWITTER_CLIENT_SECRET'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET'));

            $twitter->post("statuses/update",[
                "status"=>'test投稿'
            ]);
    }
}
```

ボタンを押したらTweetコントローラを呼ぶだけの画面を作る

`resource/views/welcom.blade.php`

```
<body>
    <h1>テストTweet</h1>
    <button 
        onClick="location.href='{{route('tweet')}}'"
        style="padding:20px">
        TEST TWEET
    </button>
</body>
```

