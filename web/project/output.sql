--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.4
-- Dumped by pg_dump version 9.6.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: games; Type: TABLE; Schema: public; Owner: rqmfstqypvnmxm
--

CREATE TABLE games (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    description character varying(500) NOT NULL,
    msrb character varying(5) NOT NULL,
    rating real,
    genre character varying(20),
    stock integer NOT NULL,
    price real NOT NULL,
    picture character varying(500) NOT NULL,
    system character varying(15) NOT NULL
);


ALTER TABLE games OWNER TO rqmfstqypvnmxm;

--
-- Name: games_id_seq; Type: SEQUENCE; Schema: public; Owner: rqmfstqypvnmxm
--

CREATE SEQUENCE games_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE games_id_seq OWNER TO rqmfstqypvnmxm;

--
-- Name: games_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rqmfstqypvnmxm
--

ALTER SEQUENCE games_id_seq OWNED BY games.id;


--
-- Name: transactions; Type: TABLE; Schema: public; Owner: rqmfstqypvnmxm
--

CREATE TABLE transactions (
    id integer NOT NULL,
    user_id integer NOT NULL,
    game_id integer NOT NULL,
    purchase_date date NOT NULL
);


ALTER TABLE transactions OWNER TO rqmfstqypvnmxm;

--
-- Name: transactions_id_seq; Type: SEQUENCE; Schema: public; Owner: rqmfstqypvnmxm
--

CREATE SEQUENCE transactions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE transactions_id_seq OWNER TO rqmfstqypvnmxm;

--
-- Name: transactions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rqmfstqypvnmxm
--

ALTER SEQUENCE transactions_id_seq OWNED BY transactions.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: rqmfstqypvnmxm
--

CREATE TABLE users (
    id integer NOT NULL,
    username character varying(100) NOT NULL,
    password character varying(100) NOT NULL,
    address character varying(100) NOT NULL,
    city character varying(100) NOT NULL,
    state character varying(50) NOT NULL,
    zip integer NOT NULL,
    payment_type character varying(10) NOT NULL,
    card_num bigint NOT NULL,
    name character varying(50) NOT NULL
);


ALTER TABLE users OWNER TO rqmfstqypvnmxm;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: rqmfstqypvnmxm
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO rqmfstqypvnmxm;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rqmfstqypvnmxm
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: games id; Type: DEFAULT; Schema: public; Owner: rqmfstqypvnmxm
--

ALTER TABLE ONLY games ALTER COLUMN id SET DEFAULT nextval('games_id_seq'::regclass);


--
-- Name: transactions id; Type: DEFAULT; Schema: public; Owner: rqmfstqypvnmxm
--

ALTER TABLE ONLY transactions ALTER COLUMN id SET DEFAULT nextval('transactions_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: rqmfstqypvnmxm
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: games; Type: TABLE DATA; Schema: public; Owner: rqmfstqypvnmxm
--

COPY games (id, name, description, msrb, rating, genre, stock, price, picture, system) FROM stdin;
2	Destiny 2	Destiny 2 is an online-only multiplayer first-person shooter video game developed by       Bungie and published by Activision.	T	4.80000019	FPS/RPG	7	59.9900017	http://gameranx.com/wp-content/uploads/2017/03/Destiny-2-1080P-Wallpaper-1.jpg	Xbox One
3	Overwatch	Overwatch is a mobaesque FPS with colorful characters that emphasises teamwork.	T	4.69999981	FPS	10	39.9900017	http://gameranx.com/wp-content/uploads/2016/02/overwatch-1080-Wallpaper-1.jpg	Xbox One
4	Witcher 3	The Witcher 3 is the third installment of the record breaking RPG that has had fans going wild for years.  Join Geralt on his quest to once again save the world.	M	5	RPG	20	30	https://images2.alphacoders.com/600/thumb-1920-600255.jpg	Xbox One
5	Star Wars BattleFront II	Were you let down by the first installment? Get ready to be let down again	T	0.200000003	FPS	100	59.9900017	https://i.redd.it/5ecwfdoht3ry.jpg	Xbox One
6	Far Cry 5	Enjoy a new groundbreaking installment in the Far Cry series, set it america.	M	4.5	FPS	3	59.9900017	https://i.ytimg.com/vi/mcq9Ci9uhEM/maxresdefault.jpg	Xbox One
\.


--
-- Name: games_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rqmfstqypvnmxm
--

SELECT pg_catalog.setval('games_id_seq', 6, true);


--
-- Data for Name: transactions; Type: TABLE DATA; Schema: public; Owner: rqmfstqypvnmxm
--

COPY transactions (id, user_id, game_id, purchase_date) FROM stdin;
15	7	2	2017-10-21
16	7	4	2017-10-21
17	8	2	2017-10-21
18	8	4	2017-10-21
19	9	2	2017-10-21
20	9	4	2017-10-21
21	10	2	2017-10-21
22	10	4	2017-10-21
23	10	6	2017-10-21
25	12	2	2017-10-26
26	12	4	2017-10-26
27	14	2	2017-10-27
28	14	3	2017-10-27
29	14	4	2017-10-27
30	15	2	2017-10-27
31	15	3	2017-10-27
32	15	5	2017-10-27
33	15	4	2017-10-27
34	15	2	2017-10-27
35	15	3	2017-10-27
36	15	3	2017-10-27
37	15	5	2017-10-27
38	15	6	2017-10-27
39	15	5	2017-10-27
40	15	6	2017-10-27
41	16	2	2017-10-27
42	16	3	2017-10-27
43	18	2	2017-10-27
44	18	4	2017-10-27
45	18	2	2017-10-27
46	18	5	2017-10-27
47	18	6	2017-10-27
48	22	4	2017-10-28
\.


--
-- Name: transactions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rqmfstqypvnmxm
--

SELECT pg_catalog.setval('transactions_id_seq', 48, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: rqmfstqypvnmxm
--

COPY users (id, username, password, address, city, state, zip, payment_type, card_num, name) FROM stdin;
7	jacob	jacob	one street	one city	one state	85632	visa	1234567936	jacob
8	Brittany	Brittany	one street	one city	one state	25365	visa	1234567936	Brittany
9	jose	jose	street	city	state	86598	visa	1234567936	jose
10	jane	jane	one street	one city	one state	85469	visa	1234567936	jane
11	testing	$2y$10$TkKr88rR7l835ryM9PSWgOQ8D97kEybFtZ4.fzLRS3YtpTl6GXJ66	test street	test city	test state	4556	visa	4556	joseph
12	testing1	dude	morechanged	morechanged	morechanged	456	visa	456	Jacob
13	testing34	dude	test street	test city	test state	4556	visa	4556	joseph
14	testing3	$2y$10$buKQDic8LT8bBhbU30..k.18sxSPHECYBl1P/wADnHvth/auDbqy2	test street	test city	test state	4556	visa	4556	joseph
15	dude	$2y$10$qZdSn3rw62LKYHHtJznbLuNQArk9okr842ZHh.PvPHf3SR.w8frJC	test street	test city	test state	4556	visa	4556	joseph
16	brittany	$2y$10$GJyF0gKeKDOyxicYK5cDTuSVUwT6z8yBrRHMMBrdaRKzWopmeh0nO	test street	test city	test state	4556	visa	4556	joseph
17	testing34567	$2y$10$rifSjSFyCDXCujh9CtFzae2px4hOiFtgjT2ryinc2xzY1NDsJ7pTy	test street	test city	test state	4556	visa	4556	joseph
18	rolo	$2y$10$sPZ0lTAWiQEJtYy47pZxgObav1gBB7TwrwXpQeK56vgomUzkkgdaO	rolo	rolo	rolo	456	visa	456	rolo
19	Ronald	$2y$10$1QxCYq5uNSj6RJfaptxOtO4Skzw9TUhFbvKs2G35wZZ0Pynx714m6	23 fdskljfl sd	dufkt kdfjkfd	UT	85695	visa	5555555766632448	jason
20	jacobthehun	$2y$10$lXWbPC4ib8OS1j.M1QsolemeEcAW3hivrmfS1vUxL96RkJWhBD3Ve	fdjkls	fdjkslsd	UT	46585	visa	5555555766632448	jacob
21	jacabugoth	$2y$10$fC/tq0Q/ffZ8vpEvopS..O2fwBiBEURCwHIk1RgWmTF0U7deChMuu	jkl	jkl	UT	86595	visa	5555555555555555	jkl
22	Melo_ink	$2y$10$JYF6ifa4MI8nQUoFrJw.TO6QttQmf7wCvjEYWb8o5eELXq1dn6UQy	one street	jkl	ID	88475	visa	5555555555555555	Jordan
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rqmfstqypvnmxm
--

SELECT pg_catalog.setval('users_id_seq', 22, true);


--
-- Name: games games_pkey; Type: CONSTRAINT; Schema: public; Owner: rqmfstqypvnmxm
--

ALTER TABLE ONLY games
    ADD CONSTRAINT games_pkey PRIMARY KEY (id);


--
-- Name: transactions transactions_pkey; Type: CONSTRAINT; Schema: public; Owner: rqmfstqypvnmxm
--

ALTER TABLE ONLY transactions
    ADD CONSTRAINT transactions_pkey PRIMARY KEY (id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: rqmfstqypvnmxm
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: users users_username_key; Type: CONSTRAINT; Schema: public; Owner: rqmfstqypvnmxm
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_username_key UNIQUE (username);


--
-- Name: transactions transactions_game_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rqmfstqypvnmxm
--

ALTER TABLE ONLY transactions
    ADD CONSTRAINT transactions_game_id_fkey FOREIGN KEY (game_id) REFERENCES games(id);


--
-- Name: transactions transactions_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rqmfstqypvnmxm
--

ALTER TABLE ONLY transactions
    ADD CONSTRAINT transactions_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: rqmfstqypvnmxm
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO rqmfstqypvnmxm;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO rqmfstqypvnmxm;


--
-- PostgreSQL database dump complete
--

