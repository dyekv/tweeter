# ツイートしかできないTwitterを作る

私は技術系のツイートをするためのツイッターアカウントを運用している

技術系のツイートを思いつくのは仕事中のときが多い

しかしおおっぴらにツイッターを開くのは周りの目が気になる

席を外してスマホからツイートしてもよいが、ついTLを眺めてしまい時間を使いがち

メモ間隔でツイートしかできないブラウザアプリがあればな〜と思って軽く探したが見つからず

ちゃんと探せばいっぱいあるのかもしれないが、練習のために自作することにした

node.jsかLaravelかで迷ったが今触ってるLaravelを選択

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

サーバ起動後、localhostに接続して起動確認

```
php -S localhost:8000 -t public
```

調べた所、
