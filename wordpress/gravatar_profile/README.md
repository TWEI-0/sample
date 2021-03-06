# GravatarAPIを利用したプロフィール表示処理

## ハッシュ値の取得

指定したメールアドレスのハッシュ値を取得します。  
メールアドレスは、Gravatarに登録してあるメールアドレスを指定します。

~~~
$hash = md5(strtolower(trim("メールアドレスを入力")));
~~~

- trim() : 文字列の両端の余計な空白文字を取り除きます。
- strtolower() : 文字列を小文字に変換します。
- md5() : ハッシュ値を取得します。

## プロフィール情報の取得

先ほど取得したハッシュ値を用いてプロフィール情報を取得するためのAPIを利用します。  

~~~
https://www.gravatar.com/avatar/ハッシュ値.php
~~~

処理が完了すると、プロフィール情報が格納された配列を取得できます。  
連想配列で格納されているので、取得したい情報の要素を指定します。

- displayName : 表示名
- aboutMe : 紹介文

これらの情報を元にHTMLを組んでいきます。  

最後に、記事内にショートコードが含まれていれば、ショートコードをプロフィール用のHTML文で置換します。  

~~~
[gravatar]
~~~  

![実行結果](https://twei-blog.com/wp-content/uploads/2019/05/001-2.png)

[リンク元のブログ記事 | TWEI blog](https://twei-blog.com/blog/wordpress/gravatar-show-profile/)
