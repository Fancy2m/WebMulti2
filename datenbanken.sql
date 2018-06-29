drop table if exists rating;
drop table if exists film;
drop table if exists director;
drop table if exists benutzer;

create table benutzer(
    user_ID int not null primary key auto_increment,
    username varchar(30),
    passwort varchar(30),
    vorname varchar (30),
	  nachname varchar (30),
    geburtstag date,
    gender varchar (30),
    email varchar(140),
    rechte int
);

insert into benutzer (user_ID, username, passwort, vorname, nachname, geburtstag, gender, email, rechte) VALUES ('NULL', 'Marcel', 'marcel', 'Marcel', 'Rosik', '1994-07-27', 'M', 'marcel.rosik@stud.hs-ruhrwest.de', 2);
insert into benutzer (user_ID, username, passwort, vorname, nachname, geburtstag, gender, email, rechte) VALUES ('NULL', 'Daniel', 'daniel', 'Daniel', 'Keib', '1995-3-22', 'M', 'daniel.keib@stud.hs-ruhrwest.de', 1);
insert into benutzer (user_ID, username, passwort, vorname, nachname, geburtstag, gender, email, rechte) VALUES ('NULL', 'Rebecca', 'becci', 'Rebecca' ,'Fergen', '1995-07-31', 'W', 'rebecca.fergen@stud.hs-ruhrwest.de', 1);
insert into benutzer (user_ID, username, passwort, vorname, nachname, geburtstag, gender, email, rechte) VALUES ('NULL', 'Julic', 'julic', 'Julic', 'Rößling', '1993-04-25', 'M', 'julic.roessling@stud.hs-ruhrwest.de', 0);


create table director(
    director_id int primary key not null auto_increment,
    dvorname varchar(50),
    dnachname varchar(50)
);

insert into director (director_id, dvorname, dnachname) Values ('NULL', 'David', 'Fincher');
insert into director (director_id, dvorname, dnachname) Values ('NULL', 'Quentin', 'Tarantino');
insert into director (director_id, dvorname, dnachname) Values ('NULL', 'Francis', 'Coppola');
insert into director (director_id, dvorname, dnachname) Values ('NULL', 'Christopher', 'Nolan');
insert into director (director_id, dvorname, dnachname) Values ('NULL', 'Frank', 'Darabont');

create table film(
    film_ID int primary key not null auto_increment,
    name varchar(200),
    erscheinungsjahr int,
	  director_fid int not null,
	  beschreibung varchar (2000),
	  avgrating double (2,2),
	  bild varchar (200),
	  fsk int,
	  foreign key (director_fid) references
	  director(director_id) on delete restrict on update cascade
    );

insert into film (film_ID, name, erscheinungsjahr, director_fid, beschreibung, bild, fsk) Values ('NULL', 'Fight Club', '1999', '1', 'Eine ganze Generation von Männern, die Zweitgeborenen der Geschichte,
wanken durch ihr Leben auf der Suche nach einem Sinn, einer Aufgabe, einer Erfüllung ihrer selbst. Doch ein Ziel scheint es in der deprimierenden Konsumgesellschaft nicht zu
geben. Auch der von Edward Norton verkörperte Protagonist und gleichzeitiger Erzähler gehört zu diesen verlorenen Seelen, die ungelenkt ihr Dasein fristen. Als er jedoch eines Tages Tyler Durden (Brad Pitt) kennenlernt,
soll sich alles ändern. Der von beiden Junggesellen ins Leben gerufene Fight Club, entfesselt ungeahnte Möglichkeiten, die jedoch ebenso unkontrollierbares Ausmaß annehmen. Aus der Rache an der modernen Zivilisation
wird schnell ein Kleinkrieg, der seine Opfer fordert. Nicht einmal die verruchte Marla Singer (Helena Bonham Carter) vermag sich diesem unaufhaltsame Treiben zu entziehen. Am Ende stehen sogar Menschenleben auf dem Spiel,
denn aus einer anfangs harmlosen Idee ist eine unaufhaltsame Bestie geworden.',
'/images/fight_club.jpg' ,'18');
insert into  film (film_ID, name, erscheinungsjahr, director_fid, beschreibung, bild, fsk) Values ('NULL', 'Pulp Fiction', '1994', '2', 'Was braucht man für ein gutes Stück Pulp Fiction (zu deutsch: Schundliteratur)?
Ein Gauner-Pärchen, zwei Auftragskiller, eine Uhr, einen Koffer geheimnisvollen gold-glänzenden Inhalts, eine Menge Adrenalin in Form einer Spritze, Gespräche über das europäische metrische System von Fastfood und die Gefährlichkeit
gewisser Fußmassagen, ein Bibelzitat (Ezekiel 25:17), einen versehentlichen Kopfschuss und einen Cleaner, einen Boxer auf der Flucht und die perverse Begegnung mit einem roten Gummiball, göttliche Vorsehung und eine Läuterung.
Und das ist nur ein Bruchteil der Charaktere und Geschichten, die dem Publikum hier auf fundamentale Weise näher gebracht werden. Das Ganze wird auf geschickte Weise miteinander verwoben (gerne auch ohne die zeitliche Abfolge
zu sehr zu berücksichtigen) und untermalt von einem groovenden Soundtrack. Heraus kommt ein Film, der direkt zum Klassiker wurde. Eben ein gutes Stück Pulp Fiction…',
'images/pulp_fiction.jpg', '16');
insert into film (film_ID, name, erscheinungsjahr, director_fid, beschreibung, bild, fsk) Values ('NULL', 'Der Pate', '1972', '3', '‘Ich mache ihm ein Angebot, das er nicht ablehnen kann.’: Don Vito Corleone (Marlon Brando)
ist einer der mächtigsten Mafia-Bosse in New York City und Oberhaupt einer großen Familie: Sonny (James Caan), der älteste Sohn und ein schwer zu kontrollierender Heißsporn; Fredo (John Cazale) ist der Mittlere und eigentlich zu weich
für das harte Tagesgeschäft der Mafia; Connie (Talia Shire), die einzige Tochter; Michael Corleone (Al Pacino) ist der jüngste Sohn und Liebling seines Vaters. Es ist dessen erklärter Wunsch, dass Michael aus den Machenschaften
der Corleones herausgehalten wird; er soll ein bürgerliches Leben führen. Tom Hagen (Robert Duvall) ist Don Vitos Ziehsohn und Anwalt der Familie und wird später zum Consigliere, zum Berater gemacht.
Michael diente im Zweiten Weltkrieg und besucht seine Familie anlässlich der Hochzeit seiner Schwester Connie mit Carlo (Gianni Russo) in Begleitung seiner Freundin Kay (Diane Keaton). Die Fröhlichkeit des Festes währt nicht lange,
der boomende Handel mit Drogen wirft seine hässlichen Schatten voraus. Denn in Don Vitos Augen ist der Drogenhandel anders als Glücksspiel ein dreckiges Geschäft, und so lehnt er eine Zusammenarbeit mit dem Gangster
Virgil ‘Der Türke’ Sollozzo (Al Lettieri) ab. Michael sieht sich genötigt, Farbe zu bekennen, und richtet in einem riskanten Coup seinerseits Sollozzo und den korrupten Captain McCluskey (Sterling Hayden) hin. Die Familie, die um sein Leben fürchtet,
schickt Michael zu seinen Verwandten nach Italien. Kay bleibt in Unkenntnis in New York zurück.
Der wieder genesene Don Vito ist um Frieden bemüht und nimmt dafür auch schweren Herzens den Tod seines Sohnes Sonny in Kauf, der in einen Hinterhalt gelockt erschossen wird. Michael entgeht selber nur knapp einem Bombenanschlag
und kehrt nach Amerika zurück, wo er die Geschäfte seines Vaters übernimmt. Als dieser von einem Herzinfarkt hingerafft wird, ist für Michael der Weg frei, sämtliche seiner Widersacher aus dem Weg zu räumen. Den endgültigen Verlust seines Seelenheils
nimmt er dabei billigend in Kauf, der einmal eingeschlagene Weg kann nicht mehr verlassen werden.',
'images/der_pate.jpg', '16');
insert into film (film_ID, name, erscheinungsjahr, director_fid, beschreibung, bild, fsk) Values ('NULL', 'The Dark Knight', '2008', '4', 'Noch immer spielt Bruce Wayne (Christian Bale) tagsüber den verantwortungslosen Milliardär,
während er nachts als Batman das Verbrechen in Gotham city bekämpft. Unterstützt von Lieutenant Jim Gordon (Gary Oldman) und Staatsanwalt Harvey Dent (Aaron Eckhart) setzt Batman sein Vorhaben fort, das organisierte Verbrechen in Gotham endgültig zu zerschlagen.
Doch das schlagkräftige Dreiergespann sieht sich bald einem genialen, immer mächtiger werdenden Kriminellen gegenübergestellt, der als Joker (Heath Ledger) bekannt ist: Er stürzt Gotham ins Chaos und zwingt den Dunklen Ritter immer näher an die Grenze zwischen
Gerechtigkeit und Rache. Dent, der inzwischen mit Bruce Waynes Jugendliebe Rachel (Maggie Gyllenhaal) liiert ist, rückt in das Fadenkreuz des Jokers…',
'images/dark_knight.jpg', '16');
insert into film (film_ID, name, erscheinungsjahr, director_fid, beschreibung, bild, fsk) Values ('NULL', 'Die Verurteilten', '1994', '5', 'Der Banker Andrew Dufresne (Tim Robbins) wird Anfang der 40er Jahre für den Mord an seiner Frau und ihrem Liebhaber verurteilt,
obwohl er unschuldig ist. Er wird ins Gefängnis nach Shawshank überwiesen, wo er als Bänker nicht gerade gerne gesehen ist. Die ersten Wochen und Monate sind hart, doch er findet auch Freunde an diesem ungewöhnlichen Ort. Allen voran lernt er Red (Morgan Freeman) kennen,
der schon seit gefühlten Ewigkeiten hier einsitzt und das Gefängnis kennt wie seine Westentasche. Durch seine Talente mach sich Andrew im Laufe der Jahrzehnte sogar unentbehrlich, sowohl bei seinen Mitgefangenen, für die er einiges bewegt, als auch bei den Wärtern und dem
Gefängnisdirektor, denen er mit den Erfahrungen in seinem Beruf viel Arbeit und Geld sparen kann.',
'images/die_verurteilten.jpg', '12');


create table rating (
	rating_ID int not null primary key auto_increment,
	user_rid int not null,
	film_rid int not null,
	commnt varchar (2000),
	wert int,
	datum date,
	foreign key (user_rid) references
	benutzer(user_ID) on delete restrict on update cascade,
	foreign key (film_rid) references
	film(film_ID) on delete restrict on update cascade
);

INSERT INTO `rating` (`rating_ID`, `user_rid`, `film_rid`, `commnt`, `wert`, `datum`) VALUES ('1', '2', '1', 'kjdlfkHDSLAKHFLKASHDLKFJ', '7', '2018-06-28');
INSERT INTO `rating` (`rating_ID`, `user_rid`, `film_rid`, `commnt`, `wert`, `datum`) VALUES ('2', '3', '5', 'adjlakshdflkjahsldkjf', '2', '2018-06-28');
INSERT INTO `rating` (`rating_ID`, `user_rid`, `film_rid`, `commnt`, `wert`, `datum`) VALUES ('3', '1', '3', 'LEEEEEEEL', '5', '2018-06-28');
INSERT INTO `rating` (`rating_ID`, `user_rid`, `film_rid`, `commnt`, `wert`, `datum`) VALUES ('4', '4', '4', 'XDDDDDD WAR GOIIIIIL SHEEEESH', '10', '2018-06-28');
