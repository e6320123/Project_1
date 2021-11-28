




CREATE TABLE members(
    id int primary key auto_increment,
    user varchar(20), 
    pwd varchar(70)
) ;

INSERT INTO members (user, pwd) VALUES("ben", "123");


-- select * from members;
-- select * from games;

drop TABLE `games`;
drop TABLE `news`;
drop TABLE `pages`;
drop TABLE `message`;

-- CREATE TABLE cnt( htmlstr TEXT NOT NULL)DEFAULT CHARSET=utf8mb4;

-- INSERT INTO cnt (htmlstr) VALUES("{$cnnt}");

 CREATE TABLE pages(
    id int primary key auto_increment,
    htmlstr text
 )DEFAULT CHARSET=utf8mb4;

 CREATE TABLE message(
    id int primary key auto_increment,
    user varchar(20),
    user_imgsrc varchar(15), 
    content varchar(1000)
 )DEFAULT CHARSET=utf8mb4;

CREATE TABLE games(
    id int primary key auto_increment,
    page_id int,
    platform varchar(10), 
    name varchar(40), 
    imgsrc varchar(20), 
    imgsize varchar(15),
    foreign key(page_id) references pages(id)
)DEFAULT CHARSET=utf8mb4;



INSERT INTO games (platform, name, imgsrc, imgsize) VALUES("Online", "魔獸世界：決戰艾澤拉斯" , "wow.png", "120x120");
INSERT INTO games (platform, name, imgsrc, imgsize) VALUES("PC", "帝國：全軍破敵" ,"etw.jpg", "100x130");
INSERT INTO games (platform, name, imgsrc, imgsize) VALUES("PC","刺客教條 2" , "ac2.jpg", "100x130");
INSERT INTO games (platform, name, imgsrc, imgsize) VALUES("PC","全軍破敵：三國" , "ttw.jpg", "100x130");
INSERT INTO games (platform, name, imgsrc, imgsize) VALUES("PS4","惡靈古堡 2 重製版" ,  "bio2.png", "100x130");
INSERT INTO games (platform, name, imgsrc, imgsize) VALUES("Online", "暗黑破壞神 3：奪魂之鐮" , "d3.png", "120x120");
INSERT INTO games (platform, name, imgsrc, imgsize) VALUES("PS4","惡魔獵人 5" ,"dmc5.jpg", "100x130");
INSERT INTO games (platform, name, imgsrc, imgsize) VALUES("PS4","漫威蜘蛛人" ,"spm.png",  "100x130");
INSERT INTO games (platform, name, imgsrc, imgsize) VALUES("NS","勇者鬥惡龍 XI S 尋覓逝去的時光 – Definitive Edition" ,"dq.png", "100x130");
INSERT INTO games (platform, name, imgsrc, imgsize) VALUES("PS4","魔物獵人 世界" , "mons.png","100x130");
INSERT INTO games (platform, name, imgsrc, imgsize) VALUES("PC","巫師 3：狂獵" ,  "witch.jpg","100x130");
INSERT INTO games (platform, name, imgsrc, imgsize) VALUES("NS","寶可夢 劍" , "poke.png","100x130");
INSERT INTO games (platform, name, imgsrc, imgsize) VALUES("NS","薩爾達傳說 曠野之息" ,"zelda.png","100x130");
INSERT INTO games (platform, name, imgsrc, imgsize) VALUES("Online", "佩里亞編年史" ,  "peria.jpg","120x120");
INSERT INTO games (platform, name, imgsrc, imgsize) VALUES("NS", "哆啦 A 夢 牧場物語" ,"dora.png", "100x130");


update games set page_id = "17" WHERE id =1;
update games set page_id = "18" WHERE id =2;
update games set page_id = "19" WHERE id =3;
update games set page_id = "20" WHERE id =4;
update games set page_id = "21" WHERE id =5;
update games set page_id = "22" WHERE id =6;
update games set page_id = "23" WHERE id =7;
update games set page_id = "24" WHERE id =8;
update games set page_id = "25" WHERE id =9;
update games set page_id = "26" WHERE id =10;
update games set page_id = "27" WHERE id =11;
update games set page_id = "28" WHERE id =12;
update games set page_id = "29" WHERE id =13;
update games set page_id = "30" WHERE id =14;
update games set page_id = "31" WHERE id =15;


update news set page_id = "32" WHERE id =1;
update news set page_id = "33" WHERE id =2;
update news set page_id = "34" WHERE id =3;
update news set page_id = "35" WHERE id =4;
update news set page_id = "36" WHERE id =5;
update news set page_id = "37" WHERE id =6;
update news set page_id = "38" WHERE id =7;
update news set page_id = "39" WHERE id =8;
update news set page_id = "40" WHERE id =9;
update news set page_id = "41" WHERE id =10; 

 

INSERT INTO news (area_id, platform, title, content, imgsrc) VALUES("1", "PS4","《魔物獵人世界：Iceborne》將推出PS4 主機上蓋、控制器及穿戴式揚聲器等相關產品" , "", "ps4/1.jpg");
INSERT INTO news (area_id, platform, title, content, imgsrc) VALUES("1", "","《戰爭機器 5》將推出特別款式 Xbox One X 主機同捆組 伴隨凱特揭露以血束縛的真相" , "", "xb/xb1.jpg");
INSERT INTO news (area_id, platform, title, content, imgsrc) VALUES("1", "","由迪士尼正版授權，西山居遊戲推出的《神鬼奇航 榮耀之海 》（iOS / Android）日前於 ChinaJoy 2019 中亮相。" , "", "pirate/pirate1.jpg");
INSERT INTO news (area_id, platform, title, content, imgsrc) VALUES("1", "PS4","《俠盜獵車手 5》線上模式「鑽石賭場度假村」發放開幕參與者獎勵" , "", "gta5/gta5.jpg");
  
INSERT INTO news (area_id, platform, title, content, imgsrc) VALUES("2", "PC", "《勇者鬥惡龍XI S》體驗版近期公開！《魔導少年》真島浩設計服裝同步發表" , "日本 Square Enix 預定於 2019 年 9 月 27日在 Nintendo Switch 主機上推出，將之前在 PS4／N3DS 等平台推出的人氣RPG《DQXI》重新加強移植的《勇者鬥惡龍XI S 尋覓逝去的時光 Definitive Edition》（ドラゴンクエストXI過ぎ去りし時を求めてS），宣布將於近期推出遊戲體驗版讓玩家們搶先試玩！本作為一款將之前於 PS4／N3DS 主機上推出的《DQXI》給重新移植到 Switch主機上重新推出，並追加角色語...", "dxi/1.jpg");

INSERT INTO news (area_id, platform, title, content, imgsrc) VALUES(
"2", ""                   
,"【評測】與其奔波勞碌廝殺拚命，不如回《神鵰俠侶2》做比翼雙飛"
,"由中國完美時空出品的重大IP製作《神鵰俠侶2》，歷經近一年的封測與調校，於7月底正式開啟內地全平台公測。細緻畫質任君選擇與之前版本不同的，主要在於畫面細膩度與3D視角的自由移動。目前大多數的手遊雖然已經可以自由切換 ..."
,"zinyu/2.jpg"
);
INSERT INTO news (area_id, platform, title, content, imgsrc) VALUES(
"2", ""                   
,"人氣PC圖像益智猜謎問答手機移植版《Koongya Catch Mind》8月8日韓國雙平台同步推出"
,"韓國 Netmarble（網石遊戲）預定於 2019 年在韓國手機平台上推出的圖像益智猜謎問答遊戲《Koongya Catch Mind》（쿵야 캐치마인드），正式宣布將決定於 8 月 8 日起在韓國 App Store／Google Play 推出上架！本作為一款將 200...."
,"bee.jpg"             
);
INSERT INTO news (area_id, platform, title, content, imgsrc) VALUES(
"2", ""                   
,"《決勝時刻：現代戰爭》多人對戰宣傳預告曝光！跨平台連線公測日期同步公布"
,"由 Infinity Ward 所開發的《決勝時刻：現代戰爭》在今年 5 月首次曝光後便獲得了不小的關注，而隨著正式的發售日期已確立為 10 月 25 日後，更是讓不少系列粉絲更為期待。而官方近期也釋出了新的遊戲展示預告，讓玩家一窺該作的多..."
,"cod/1.jpg"         
);
INSERT INTO news (area_id, platform, title, content, imgsrc) VALUES(
"2", ""                   
,"《魔獸爭霸 3》重製版新資訊曝光！索爾、泰蘭妲及多個單位高畫質遊戲模組亮相"
,"《魔獸爭霸 3》重製版在 2018 年的 Blizzcon 上曝光後，不少死忠玩家便都在等待該款作品再次以高品質的重製再次登場，不過官方至今依然沒有給出明確的上市日期，僅表示遊戲預計於今年正式登場，想必是讓不少人等的相當痛苦吧？..."
,"wc3/wc3.jpg"            
);
INSERT INTO news (area_id, platform, title, content, imgsrc) VALUES(
"2", ""                   
,"《跑跑卡丁車》世界爭霸賽國家代表決賽 4名國家代表將赴韓爭奪世界冠軍 "
,"遊戲橘子今年首度舉辦的《跑跑卡丁車》世界爭霸賽，於昨（4）日在世貿漫畫博覽會現場舉行 2019《跑跑卡丁車》世界爭霸賽國家代表最終戰，來自各方實力強勁的代表隊在經過一連串精采絕倫的賽事後，最終由「爆哥」、「睏平」..."
,"cadin/2.jpg"             
);


                
            
                
DROP TABLE IF EXISTS `members`;
DROP TABLE IF EXISTS `games`;
DROP TABLE IF EXISTS `news`;
DROP TABLE IF EXISTS `pages`;
DROP TABLE IF EXISTS `message`;           
                            
            
INSERT INTO news2 (platform, title, content, imgsrc) VALUES(
""                   
,"人氣PC圖像益智猜謎問答手機移植版《Koongya Catch Mind》8月8日韓國雙平台同步推出"
,"韓國 Netmarble（網石遊戲）預定於 2019 年在韓國手機平台上推出的圖像益智猜謎問答遊戲《Koongya Catch Mind》（쿵야 캐치마인드），正式宣布將決定於 8 月 8 日起在韓國 App Store／Google Play 推出上架！本作為一款將 200...."
,"bee.jpg"             
);


delete from news where id >10;

COLLATE utf8_general_ci

drop TABLE `news2`;

CREATE TABLE news2(
    id int primary key auto_increment, 
    page_id int,
    msg_id int,
    area_id int,
    platform varchar(10),
    title varchar(40) ,
    content varchar(200),
    imgsrc varchar(20),
    foreign key(page_id) references pages(id),
    foreign key(msg_id) references message(id)
) DEFAULT CHARSET=utf8mb4;

INSERT INTO news2 (area_id, platform, title, content, imgsrc) VALUES(
"2", ""                   
,"人氣PC圖像益智猜謎問答手機移植版《Koongya Catch Mind》8月8日韓國雙平台同步推出"
,"（쿵야 캐치마인드），（ドラゴンクエストXI過ぎ去りし時を求め"
,"bee.jpg"             
);



SET NAMES 'utf8mb4';

select * from news2\G;

show variables like '%character%';
show variables like '%collation%';

