create database  SearchEngineDB;

use SearchEngineDB;

create table Anime(
    AnimeName varchar(50) primary key,
    YearCreated year,
    NumberofEpisodes integer,
    AnimeDescription varchar(1000),
    AnimeCreatorFirstName varchar(20),
    AnimeCreatorLastName varchar(20)
);

create table Pets(
	PetName varchar(20) primary key,
    PetSpecies varchar(20),
    PetYOB year,
	PetDescription varchar(1000)
);

create table Courses(
	CourseCode varchar(6) primary key,
    CourseName varchar(50),
    Semester varchar(20),
    CourseDescription varchar(1000)
);

create table Movies(
MovieName varchar(50) primary key,
MainGenre varchar(20),
YearCreated year,
MovieDescription varchar(1000)
);

insert into Anime (AnimeName,YearCreated,NumberofEpisodes,AnimeDescription,AnimeCreatorFirstName,AnimeCreatorLastName) values
(
	"Naruto", 
    1999, 
    220,
	"A massive demon known as the Kyuubi, the Nine-Tailed Fox, attacked 
	the Hidden Leaf Village, just before Naruto Uzumaki was born.
	The Fourth Hokage, the head of the village, gave his life to stop the Nine-Tailed Fox's rampage, 
	sealing the monstrous beast inside the newborn Naruto.Now, Naruto is an energetic, 
	brash ninja who continues to reside in Konohagakure. As a result of the Kyuubi inside of him, 
	Naruto is shunned by the village and struggles to fit in. At the same time, 
	his unquenchable desire to succeed as Konohagakure's Hokage introduces him to both wonderful new allies and dangerous enemies.",
	"Masashi",
	"Kishimoto"
),

(
	"Naruto Shippuden",
    2007, 
    500,
	"After experiencing events that fueled his desire to become stronger, Naruto Uzumaki departed Konohagakure, 
	the Hidden Leaf Village, for intensive training two and a half years ago. 
	The mysterious group of expert rogue ninja known as Akatsuki is now closing in on their grand scheme,
	which could jeopardize the security of the entire shinobi world. 
	Even though Naruto is older and evil events are approaching, 
	his behaviour hasn't changed much he's still boisterous and childish but he is much more confident 
	and even more determined to defend his friends and home.",
	"Masashi",
	"Kishimoto"
),

(
	"Death Note", 
	"2006",
	37,
	"The world of humans is tainted by brutal killings, small-time thefts, and senseless violence. 
	The domain of the death gods, on the other hand, is a mundane, unchanging gambling den. 
	Both the cruel god of death Ryuk and the brilliant 17-year-old Japanese pupil Light Yagami 
	share the conviction that their worlds are corrupt.Ryuk throws his Death Note into the real world 
	for his own enjoyment. The first regulation Light discovers is absurd: The person whose name is listed 
	in this note shall perish. Light experiments by writing a criminal's name, which disturbingly reenacts 
	his first murder, but the temptation is too strong.Light, going by the alias Kira, is aware of the frightening 
	godlike power that has come into his possession, and he pursues it with the intention of purging the world of criminals.",
	"Tsugumi",
	"Ohba"
),

(
	"Attack on Titan",
	"2013", 
	88,
	"Humanity was nearly wiped out by monstrous humanoids known as Titans centuries ago, 
	forcing people to hide in terror behind huge walls. The fact that these giants' 
	appetite for human flesh seems to have been sparked by pleasure rather than hunger is what makes them 
	so terrifying. After the remnants of humanity started constructing protective barriers to guarantee 
	their survival, there were no titan encounters for a century. A massive Titan breaches the 
	outer wall, breaking the fragile calm, reigniting the struggle for life against the man-eating abominations.
	Eren Yeager dedicates his life to the eradication of the invaders by enlisting in the military after experiencing a terrible 
	personal loss at the hands of the creatures.",
	"Hajime",
	"Isayama"
),

(
	"Baki the Grappler", 
	"2001", 
    39,
	"Baki Hanma has only ever known combat under the guidance of his mother, 
	Emi Akezawa, he strengthened every muscle in his body and learned various techniques from various martial arts. 
	He practices to get ready to take on and ultimately surpass his own father, Yuujirou Hanma, 
	who is regarded as the world's strongest being and is feared by the populace as the Ogre.
	Baki, however, decides to become more powerful in his own manner when he realizes his mother's methods are no longer sufficient. 
	He keeps developing both his body and his soul as time passes until the inevitable confrontation with his father, 
	seeking out formidable opponents and establishing unbreakable bonds with them.",
	"Keisuke", 
	"Itagaki"
);


insert into Pets (PetName, PetSpecies, PetYOB,PetDescription)values
(
	"Tippy",
    "Dog",
    "2010",
    "Tippy was an amazing pet, she was truly the embodiment of how a Dog should act. When I was smaller she and I would
    always play football and fetch together. We were inseperable. Sadly she died a few years after I began Highschool at 10 human years."
),

(
"Survivor",
"Dog",
"2018",
"Survivor as her name suggests was a fighter, she was vicious when neccessary and quite tame otherwise. 
She gave birth to three puppies before she died
Kong, King and Kat."
),

(
"Kong",
"Dog",
"2020",
"Kong named after the gorilla was a huge dog, he was always playful. Infact he and his sister, 
Kat would always be playing. Sadly he also died."
),
(
"King",
"Dog",
"2020",
"Named after the first part of the Gorilla's name that his twin brother Kong was named after was also a huge dog,
A few weeks after he was born he was given to someone. King is still alive today"
),
(
"Kat",
"Dog",
"2020",
"Kat is an extremely weird name for a Dog I know. However she walks like a cat and acts like a cat all that is left is for her
to talk like a cat, so she received the name Kat with a K instead of a C. She is just as playful as her brother only thing is she jumps 
up on everyone. Sadly she also passed away."
);

insert into Courses(CourseCode,CourseName,Semester,CourseDescription) values
(
"ITT101",
"Computer Information System",
"Fall 2021",
"Teaches students the basics of computers, knowledge is inclusive of both the hardware and the software components of a computer.
The recommended text for this was a COMPTia book. This course did not have any pre-requisites, because it was a beginner course.
My lecturer for this course was Mrs Jody-Ann Bailey, she is one of the nicest and smartest lecturers I have come across to date at UCC.
"
),
(
"ITT103",
"Programming Techniques",
"Spring 2022",
"My lecturer for this course was Mr. Otis Osbourne, and extremely smart man who from his approach to teaching, you could see that,
he truly cared about his students. Programming Techniques taught me the basics of programming that all programming languages used.
This course had a tremendous imapct on my life as an aspiring Software Engineer/Deveoper.The pre-requisite for this course was
ITT101, Computer Information Systems."
),

(
"ITT200",
"Object Oriented Programming using C++",
"Summer 2022",
"My lecturer for this course was Mr.Andrei Scott, He was extremely smart and really cared about his students. This was my first time
writing Object Oriented code and it was truly different than what I was use to. However under the guidance of my lecturer and hours of practicing I managed to 
grasp the concept of Object Oriented Programming. C++ was something else, especially managing it's memory however, With enough practice everything
can seem easy, which eventually it did. The pre-requisite for this course was Programming Techniques(ITT103)."
),

("ITT210",
"Database Management Systems",
"Fall 2022",
"My lecturer for this course was Mr. Adrian Vanhorne, I learned alot from him in regards to databases, it was quite obvious that 
he had a wealth of knowledge based on his teaching style which was quite effective. With every assignment my knowledge of relational
databases grew. It was also in this class I first used PHP. The pre-requisite for this course was Programming Techniques(ITT103)."
),

("ITT420",
"Mobile Application Development",
"Spring 2023",
"My lecturer for this course was Mr. Henry Osbourne, I learned alot from him in regards to mobile application development, he provided
us with numerous learning resources to help us on our journey. It was also quite obvious that he was a very smart person who cared about his students learning. In this 
course I learned how to Develop apps using Android Studio and the Kotlin programming language. Kotlin is very similar to Java which i taught
myself and Android studio is very similar to IntelliJ IDEA which I used for Java so after learning the basic syntax of kotlin everything else
was easy. The projects made in this course were a great addition to my personal portfolio.This was a final year course, hence it was done as an elective
seeing that I am a second year student"
);

insert into Movies (MovieName, MainGenre,YearCreated, MovieDescription)values
("Creed II",
"Sports",
"2018",
"This movie is a boxing movie, but it is centered arounf more than just a boxing match 
it is a battle between legaices. Ivan Drago killed Adonis Creed's father in a boxing match years ago. 
Now Ivan Drago's son and the star Adonnis will go head to head to settle years of conflict while battling for the title"
),

(
"I am in Love with a Church Girl",
"Romance",
"2013",
"This movie is centered around a Christian Woman turning a drug dealers life around. Along the Journey there are many ups and downs
such as law-enforcement agencies, and a bunch of other stuff. This movie is definetly worth the watch"
),
(
"John Wick",
"Action",
"2014",
"This movie is centered around a man who recently lost his wife. However before her death she had arranged for a puppy to be gifted to him.
A group of gangsters decided to break into his home and during the break in they guilt his dog and burn his house down.
Unknown to the Gangsters John Wick is a retired hitman, because they killed his dog he is now out of retirement and on the hunt."
),
(
"6 Underground",
"Action",
"2019",
"6 individuals have decided to fake their deaths in order to be able to properly do their Job. Their Job is to hunt down the people who
Regular law enforcement cannot touch, and bring justice to people suffering form injustice."
),
(
"Taken",
"Action",
"2008",
"A retired secret service agent daughter is abducted in paris. 
Ofcourse he takes the first flight he gets the chance to hop on and burns down
half of paris until he finds her, this movie is action packed."
);
