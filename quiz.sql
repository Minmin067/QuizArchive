DROP USER IF EXISTS 'user'@'localhost';

CREATE USER 'user'@'localhost';

GRANT ALL PRIVILEGES ON *.* TO 'user'@'localhost';

DROP DATABASE IF EXISTS quizarchivedb;
CREATE DATABASE quizarchivedb;

use quizarchivedb;

DROP TABLE IF EXISTS quiz;
CREATE TABLE quiz (
    id          MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    first_name 	VARCHAR(50),
    last_name  	VARCHAR(50),
    birthday   	CHAR(4),
    school      VARCHAR(50),
    club        VARCHAR(50),
    hobby       VARCHAR(50),
    imageurl    VARCHAR(50),
    PRIMARY KEY (id)
);

INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('阿慈谷','ヒフミ','1127','トリニティ総合学園','補習授業部','ペロログッズ集め','images/03.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('栗村','アイリ','0130','トリニティ総合学園','放課後スイーツ部','美味しいスイーツ探し','images/04.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('剣先','ツルギ','0624','トリニティ総合学園','正義実現委員会','映画鑑賞','images/05.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('鷲見','セリナ','0106','トリニティ総合学園','救護騎士団','病院のボランティア','images/06.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('伊草','ハルカ','0513','ゲヘナ学園','便利屋68','雑草を育てること','images/07.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('浅黄','ムツキ','0729','ゲヘナ学園','便利屋68','爆弾収集','images/08.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('陸八魔','アル','0312','ゲヘナ学園','便利屋68','経営の勉強','images/09.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('空崎','ヒナ','0219','ゲヘナ学園','風紀委員会','睡眠','images/10.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('早瀬','ユウカ','0314','ミレニアムサイエンススクール','セミナー','計算','images/11.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('才羽','ミドリ','1208','ミレニアムサイエンススクール','ゲーム開発部','絵を描くこと','images/12.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('才羽','モモイ','1208','ミレニアムサイエンススクール','ゲーム開発部','ゲーム','images/13.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('天童','アリス','0325','ミレニアムサイエンススクール','ゲーム開発部','ゲーム(特にRPG)','images/14.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('花岡','ユズ','0812','ミレニアムサイエンススクール','ゲーム開発部','ゲーム制作','images/15.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('春原','シュン','0205','山海経高級中学校','教育支援部梅花園','子供たちと遊ぶこと','images/16.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('和楽','チセ','0713','百鬼夜行連合学院','陰陽部','俳句','images/17.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('砂狼','シロコ','0516','アビドス高等学校','対策委員会','ジョギング','images/18.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('小鳥遊','ホシノ','0102','アビドス高等学校','対策委員会','昼寝','images/19.png');
INSERT  INTO quiz (first_name, last_name, birthday, school, club, hobby, imageurl)  VALUES('連河','チェリノ','1027','レッドウィンター連邦学園','レッドウィンター事務局','粛清','images/20.png');