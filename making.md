# ツイートしかできないTwitterを作る

私は技術系のツイートをするためのツイッターアカウントを運用している

技術系のツイートを思いつくのは仕事中のときが多い

しかしおおっぴらにツイッターを開くのは周りの目が気になる

席を外してスマホからツイートしてもよいが、ついTLを眺めてしまい時間を使いがち

メモ間隔でツイートしかできないブラウザアプリがあればな〜と思って軽く探したが見つからず

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

