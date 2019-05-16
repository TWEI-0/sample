# サイトマップ自動化

## テンプレートファイルの準備

子テーマのフォルダに「page_sitemap.php」というファイルを用意します。

ファイルの先頭に、以下のコードを記述します。
~~~
<?php
/*
Template Name: Sitemap.
Template Post Type: page
*/
?>
~~~

- Template Name : 任意のテンプレート名を入力。
- Template Post Type : 今回は固定ページなので「page」と入力。

## 処理の手順

1. 親のカテゴリを取得し、それぞれのカテゴリとそのカテゴリに属する記事の表示を行う。
1. 子のカテゴリが存在する場合、再帰的にカテゴリとそのカテゴリに属する記事の表示を行う。

## WordPress関数

**get_categories**  
引数で渡した情報を元にカテゴリを返します。  
「parent」に対して「0」を指定すると、一番先頭のカテゴリのみ取得可能となります。

**get_posts**  
引数で渡した情報を元に記事を返します。  
numberpostsに-1、categoryにIDを指定すると、そのIDのカテゴリの全記事を取得します。

