# This is PHP repository.  

勉強用。

reference: よくわかる*PHP*の教科書 たにぐち まこと 著 PHP5.5対応版  
この教科書すばらしい。  

============雑記============

Webサーバ上でPHPを実行させたかった。 レンタルサーバもなんだかなと思い、 VirtualBoxにUbuntu16 (?)　64bitをインストールし、 Webサーバを構築することに。 (地獄のはじまり)

ホストOS (OS X) での構築｡  
なお、 VirtualBox (以下､ VM) にゲストOSをぶち込む過程は割愛します。

以下に手順。

1. VMにいんすこされたゲストOSとホストOSを通信できるようにする。 以下､ 手順通り。  
VM本体の環境設定 (Preference) のネットワーク (Network) を開く。  
Host-only Networkをクリックし、 右側にある＋を押して新しく「なにか」を追加する。 名前が思いつかない。 ここで追加した「なにか」を開いて、 IPアドレスをメモメモ。  
ゲストOSの方のネットワークを設定する。  
NATに割り当てられてるアダプターからポートフォワーディングを設定｡ 一応､ SSHを追加する。  
次にアダプターを追加して、 Host-only Networkを追加する。 追加するのは、 1. で追加した「なにか」。  

ホストOSのターミナルを開き、 管理者ログイン。 (sudo) `nmtui`コマンドでNetWorkManeger設定｡  
enp03 (?) 覚えてないけど、 とりあえずNATアダプターに割り当てられてるほうのIPv6を無効化｡ (Ignore)  
サラミサラミ、 Automatically connectにチェック。 (spaceキー) OKでこっちの設定は終了｡  
enp08 (?) のHost-only Networkに割り当てられてるほうもIPv6無効化｡   
IPv4を固定化｡ さっきメモしたやつとは違うものにする。  
具体的に言えば、 IPアドレスの下3桁を変更｡ (xxx.xxx.xxx.yyy) (yyy = 101) とか。  
Automatically connectにチェック。 OK -> Quitで終了。`# systemctl restart NetworkManeger`で再起｡  

※もし、 enpが出てなかったら`systemctl restart NetworkManeger`で再起かければ出てくる。  

`ping`やらでパケットが送れるか、 `ssh`でログインできるかなどして、 相互通信可能か確かめる。  
`ssh root@xxx.xxx.xxx.yyy`でログインできないなら、 ググってくだされ｡  









