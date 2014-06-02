<?php
/**
 * @package pray-in-life
 * @version 1.0
 */
/*
Plugin Name: Pray In Life
Plugin URI: http://wordpress.org/plugins/pray-in-life/
Description: This is not just a plugin, from "nukagajunko.com" to display words like prayer.
Author: Nukaga
Version: 1.1
Author URI: http://nukagajunko.com/
*/

function pray_in_life_get_lyric() {
	$lyrics = "“その中で確実に残るものはあり、それが大切なものなのだ”、と。
羽根が開きっぱなしになっていたレンズを直してもらった。
鳥は羽ばたく時、真っ直ぐ上に行くのではなく一度下に向かうと写真を撮るようになって知った。
光はいつも刹那だ。
世界はいつも何を切り取ったって美しくて、それはある意味とても残酷だ。
写真はそれを閉じこめるのか、放つのか、ということを良く考える。
骨身を惜しまず勉強する。そして頭でっかちにならぬよう手を動かす。身体を動かす。
失くしたものを紙の左側に書いて、得たものを右側に書いて、それを眺めているような生き方はしたくない。
傷ついたり傷つけるのを怖がって近づくことを避ける事はしたくないと思う。
開いて欲しかったら、まず自分から開かなくっちゃ。
ぐらり。
這い蹲るようにしてでも生きる、しなやかな葉になれたらと、憧れる。
香りは自分のために。それから、どこかで同じ匂いを嗅いだ時に、私のことを思い出してくれるといいな、という暗い欲望のために。
誰かとわけたいと思う時間と色。
そして、どうかあなたに夜が優しくありますように。と。
花を散らさないで、と思うけれども、花は散るもので。昨日の雨の激しさを思い出す。
こたえあわせ。
色を追いかけてると思っていたのに、色は光が作るんだという事を、知らされる。
世界を恋人にするように。
ガチャン、ツーツーツー。どうか回線はまだ切らないで。
風はいつだって海から吹いてくる。
翼を持っていないのに飛びたいと願ったって、墜落するだけだから。かっこ悪くったって、地を這いつくばって進むしかない。
そこは「生きている海」だった。
夕暮れに浮かび上がる輪郭。雪が舞い落ちた肩。跳ね返る光。
バッターボックスに立たなきゃヒットは打てない。
自分より写真の方が知っているのかもしれない。
飛びたいと想えば想うほど、潜っていくことになる。
頑なにならない。勝手に完結しない。阿らない。孤独に酔わない。自分の正義を疑い続ける。";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function pray_in_life() {
	$chosen = pray_in_life_get_lyric();
	echo "<p id='pray'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'pray_in_life' );

// We need some CSS to position the paragraph
function pray_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#pray{
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'pray_css' );

?>