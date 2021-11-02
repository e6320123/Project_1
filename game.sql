
CREATE TABLE games(
    id int primary key auto_increment,
    platform varchar(10), 
    name varchar(40), 
    imgsrc varchar(20), 
    imgsize varchar(15)
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



CREATE TABLE members(
    id int primary key auto_increment,
    user varchar(20), 
    pwd varchar(20)
) ;

INSERT INTO members (user, pwd) VALUES("ben", "123");


-- select * from members;
