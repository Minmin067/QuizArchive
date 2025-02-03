# QuizArchive
所属大学の演習課題として作成
本作品はWeb上で動作する，株式会社Yosterによるスマートフォン向けゲームアプリ，「ブルーアーカイブ」に登場するキャラクターに関するクイズである．(https://bluearchive.jp/)
PHPとMariaDBを用いて作成しており．各キャラクターの画像はブルーアーカイブの公式ホームページからファンキットとして配布されているサークルスタンプ01を使用している.
また，本作品はブルーアーカイブ公式の二次創作に関するガイドラインに添うように制作されている.(https://bluearchive.jp/fankit/Guidelines)

# QuizArchive実行方法
## 環境設定
### XAMPP 7.4.33
1. Mac版のXAMPPをインストールする(https://www.apachefriends.org/jp/index.html).
2. インストール後，XAMPP Controll Panelを起動し，Apacheを起動する．起動後，localhostに移動し，XAMPPが動作しているメッセージを確認する．
3. Apacheの設定を行う．httpd.confファイル内の記述を変更することで設定する．
ファイルはXAMPPのインストールディレクトリ内に存在する．変更を行うのは269行目の
DirectoryIndexの設定で「DirectoryIndex index.php index.html」と書き換える．
設定を変更及び保存したらApacheを再起動する．
4. PHPの設定を変更するためにphp.iniファイルも変更する．このファイルもXAMPPのインストールディレクトリ内に存在する．
default\_charsetを「default\_charset = "UTF-8"」に変更し，date.timezoneを「date.timezone = Asia/Tokyo」に変更する．
mbstringの設定は「mbstring.language = Japanese」，「mbstring.encoding\_translation = On」，「mbstring.detect\_order = UTF-8」，
「mbstring.substitute\_character = none;」にそれぞれ設定する．

### プログラム配置及び実行手順
1. "quizarchive"フォルダをXAMPP/xamppfiles/htdocs/に配置する．
2. "$ /Applications/XAMPP/xamppfiles/bin/mysql -u root -p < ここにquiz.sqlへのパスを記入"でmysqlに接続し,"quiz.sql"を実行する．(root権限で接続するためパスワードは自身のを使用，初期設定なら空欄でenter)
3. SQLファイルが正しく実行されればユーザーとデータベースが作成され，Chromeなどのブラウザから"http://localhost/quizarchive/index.php"に接続

### 制作者
Minmin(https://github.com/Minmin067)