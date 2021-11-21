




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

CREATE TABLE news(
    id int primary key auto_increment, 
    page_id int,
    msg_id int,
    platform varchar(10),
    title varchar(40),
    content varchar(200),
    imgsrc varchar(20),
    foreign key(page_id) references pages(id),
    foreign key(msg_id) references message(id)
) DEFAULT CHARSET=utf8mb4;


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


update games set page_id = "1" WHERE id =1;
update games set page_id = "2" WHERE id =2;
update games set page_id = "3" WHERE id =3;
update games set page_id = "4" WHERE id =4;
update games set page_id = "5" WHERE id =5;
update games set page_id = "6" WHERE id =6;
update games set page_id = "7" WHERE id =7;
update games set page_id = "8" WHERE id =8;
update games set page_id = "9" WHERE id =9;
update games set page_id = "10" WHERE id =10;
update games set page_id = "11" WHERE id =11;
update games set page_id = "12" WHERE id =12;
update games set page_id = "13" WHERE id =13;
update games set page_id = "14" WHERE id =14;
update games set page_id = "15" WHERE id =15;