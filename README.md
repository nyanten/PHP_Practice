# This is PHP repository.  

勉強用。

reference: よくわかる*PHP*の教科書 たにぐち まこと 著 PHP5.5対応版  
この教科書すばらしい。  

====================================雑記========================================

Webサーバ上でPHPを実行させたかった。 レンタルサーバもなんだかなと思い、 VirtualBoxにUbuntu16 (?)　64bitをインストールし、 Webサーバを構築することに。 (地獄のはじまり)

ホストOS (OS X) での構築｡  
なお、 VirtualBox (以下､ VM) にゲストOSをぶち込む過程は割愛します。

以下に手順。VMにいんすこされたゲストOSとホストOSを通信できるようにして、 ホストOSからhtmlやら見れるように。

## 1. VM設定  
VM本体の環境設定 (Preference) のネットワーク (Network) を開く。  
Host-only Networkをクリックし、 右側にある＋を押して新しく「なにか」を追加する。 名前が思いつかない。 ここで追加した「なにか」を開いて、 IPアドレスをメモメモ。  

## 2. VM設定 (ホストOSの方のネットワークを設定)  
NATに割り当てられてるアダプターからポートフォワーディングを設定｡ 一応､ SSHを追加する。  
次にアダプターを追加して、 Host-only Networkを追加する。 追加するのは、 1. で追加した「なにか」。  

## 3. ゲストOSの方のネットワークを設定  
ホストOSのターミナルを開き、 管理者ログイン。 (sudo) `nmtui`コマンドでNetWorkManeger設定｡  

enp03 (?) 覚えてないけど、 とりあえずNATアダプターに割り当てられてるほうのIPv6を無効化｡ (Ignore)  
サラミサラミ、 Automatically connectにチェック。 (spaceキー) OKでこっちの設定は終了｡  

enp08 (?) のHost-only Networkに割り当てられてるほうもIPv6無効化｡   
IPv4を固定化｡ さっきメモしたやつとは違うものにする。  

具体的に言えば、 IPアドレスの下3桁を変更｡ (xxx.xxx.xxx.yyy) (yyy = 101) とか。  
Automatically connectにチェック。 OK -> Quitで終了。`# systemctl restart NetworkManeger`で再起｡  

もし、 enpが出てなかったら`systemctl restart NetworkManeger`で再起かければ出てくる。  

`ping`やらでパケットが送れるか、 `ssh`でログインできるかなどして、 相互通信可能か確かめる。  
`ssh root@xxx.xxx.xxx.yyy`でログインできないなら、 ググってくだされ｡  

## 4. ゲストOSにWebサーバ環境構築  
ぼくはUbuntuなので、 `sudo apt-get`　でApache2､ PHP7.0､ MySQLを導入｡　Apacheの設定やらは割愛｡  
こちらが参考になるかと思います。  
<https://qiita.com/miyamotok0105/items/851a5e27629bfd1e3226>  
両者のWebブラウザで`http://xxx.xxx.xxx.yyy/`を開いて *It Works!* が表示されるか確かめる。  

## 5. コーヒーを淹れながら... Let's do this!! Hello World!!  
PHPのソースをゲストOSで書いて、 ちゃんとホストOSで実行できるか確認する。  

以上､ ざっくりとした説明でした。 なお、 環境構築に7時間かかったことはそっとしておこう。

==============================================================================












