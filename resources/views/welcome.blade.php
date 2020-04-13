<body>
    <h1>テストTweet</h1>
    <form action="/" method="POST">
    <textarea name="tweetString"></textarea>
    {{csrf_field()}}
    <input type="submit" value="ツイートする">
    </form>
    <button 
        onClick="location.href='{{route('tweet')}}'"
        style="padding:20px">
        TEST TWEET
    </button>
</body>