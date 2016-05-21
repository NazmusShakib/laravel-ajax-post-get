--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.12
-- Dumped by pg_dump version 9.3.12
-- Started on 2016-04-27 00:35:36 BDT

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 7 (class 2615 OID 24635)
-- Name: acllar; Type: SCHEMA; Schema: -; Owner: knowmadic
--

CREATE SCHEMA acllar;


ALTER SCHEMA acllar OWNER TO knowmadic;

--
-- TOC entry 1 (class 3079 OID 11789)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2023 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = acllar, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 171 (class 1259 OID 24681)
-- Name: migrations; Type: TABLE; Schema: acllar; Owner: knowmadic; Tablespace: 
--

CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE acllar.migrations OWNER TO knowmadic;

--
-- TOC entry 179 (class 1259 OID 33070)
-- Name: password_resets; Type: TABLE; Schema: acllar; Owner: knowmadic; Tablespace: 
--

CREATE TABLE password_resets (
    email character(50) NOT NULL,
    token character(100),
    created_at timestamp without time zone
);


ALTER TABLE acllar.password_resets OWNER TO knowmadic;

--
-- TOC entry 175 (class 1259 OID 33034)
-- Name: roles; Type: TABLE; Schema: acllar; Owner: knowmadic; Tablespace: 
--

CREATE TABLE roles (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    name character varying(255) NOT NULL,
    description character varying(255) NOT NULL
);


ALTER TABLE acllar.roles OWNER TO knowmadic;

--
-- TOC entry 174 (class 1259 OID 33032)
-- Name: roles_id_seq; Type: SEQUENCE; Schema: acllar; Owner: knowmadic
--

CREATE SEQUENCE roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acllar.roles_id_seq OWNER TO knowmadic;

--
-- TOC entry 2024 (class 0 OID 0)
-- Dependencies: 174
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: acllar; Owner: knowmadic
--

ALTER SEQUENCE roles_id_seq OWNED BY roles.id;


--
-- TOC entry 178 (class 1259 OID 33051)
-- Name: user_activations; Type: TABLE; Schema: acllar; Owner: knowmadic; Tablespace: 
--

CREATE TABLE user_activations (
    user_id integer NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE acllar.user_activations OWNER TO knowmadic;

--
-- TOC entry 177 (class 1259 OID 33045)
-- Name: user_role; Type: TABLE; Schema: acllar; Owner: knowmadic; Tablespace: 
--

CREATE TABLE user_role (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    user_id integer NOT NULL,
    role_id integer NOT NULL
);


ALTER TABLE acllar.user_role OWNER TO knowmadic;

--
-- TOC entry 176 (class 1259 OID 33043)
-- Name: user_role_id_seq; Type: SEQUENCE; Schema: acllar; Owner: knowmadic
--

CREATE SEQUENCE user_role_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acllar.user_role_id_seq OWNER TO knowmadic;

--
-- TOC entry 2025 (class 0 OID 0)
-- Dependencies: 176
-- Name: user_role_id_seq; Type: SEQUENCE OWNED BY; Schema: acllar; Owner: knowmadic
--

ALTER SEQUENCE user_role_id_seq OWNED BY user_role.id;


--
-- TOC entry 173 (class 1259 OID 33021)
-- Name: users; Type: TABLE; Schema: acllar; Owner: knowmadic; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    activated boolean DEFAULT false
);


ALTER TABLE acllar.users OWNER TO knowmadic;

--
-- TOC entry 172 (class 1259 OID 33019)
-- Name: users_id_seq; Type: SEQUENCE; Schema: acllar; Owner: knowmadic
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acllar.users_id_seq OWNER TO knowmadic;

--
-- TOC entry 2026 (class 0 OID 0)
-- Dependencies: 172
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: acllar; Owner: knowmadic
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- TOC entry 1889 (class 2604 OID 33037)
-- Name: id; Type: DEFAULT; Schema: acllar; Owner: knowmadic
--

ALTER TABLE ONLY roles ALTER COLUMN id SET DEFAULT nextval('roles_id_seq'::regclass);


--
-- TOC entry 1890 (class 2604 OID 33048)
-- Name: id; Type: DEFAULT; Schema: acllar; Owner: knowmadic
--

ALTER TABLE ONLY user_role ALTER COLUMN id SET DEFAULT nextval('user_role_id_seq'::regclass);


--
-- TOC entry 1887 (class 2604 OID 33024)
-- Name: id; Type: DEFAULT; Schema: acllar; Owner: knowmadic
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- TOC entry 2009 (class 0 OID 24681)
-- Dependencies: 171
-- Data for Name: migrations; Type: TABLE DATA; Schema: acllar; Owner: knowmadic
--

COPY migrations (migration, batch) FROM stdin;
2014_10_12_000000_create_users_table	1
2016_03_31_065856_create_roles_table	1
2016_03_31_070114_create_user_role_table	1
2016_04_12_101758_create_user_activations_table	1
\.


--
-- TOC entry 2017 (class 0 OID 33070)
-- Dependencies: 179
-- Data for Name: password_resets; Type: TABLE DATA; Schema: acllar; Owner: knowmadic
--

COPY password_resets (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 2013 (class 0 OID 33034)
-- Dependencies: 175
-- Data for Name: roles; Type: TABLE DATA; Schema: acllar; Owner: knowmadic
--

COPY roles (id, created_at, updated_at, name, description) FROM stdin;
1	2016-04-25 07:21:42	2016-04-25 07:21:42	User	A normal User
2	2016-04-25 07:21:42	2016-04-25 07:21:42	Author	An Author
3	2016-04-25 07:21:42	2016-04-25 07:21:42	Admin	A Admin
\.


--
-- TOC entry 2027 (class 0 OID 0)
-- Dependencies: 174
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: acllar; Owner: knowmadic
--

SELECT pg_catalog.setval('roles_id_seq', 3, true);


--
-- TOC entry 2016 (class 0 OID 33051)
-- Dependencies: 178
-- Data for Name: user_activations; Type: TABLE DATA; Schema: acllar; Owner: knowmadic
--

COPY user_activations (user_id, token, created_at) FROM stdin;
\.


--
-- TOC entry 2015 (class 0 OID 33045)
-- Dependencies: 177
-- Data for Name: user_role; Type: TABLE DATA; Schema: acllar; Owner: knowmadic
--

COPY user_role (id, created_at, updated_at, user_id, role_id) FROM stdin;
1	\N	\N	1	1
2	\N	\N	2	3
3	\N	\N	3	2
\.


--
-- TOC entry 2028 (class 0 OID 0)
-- Dependencies: 176
-- Name: user_role_id_seq; Type: SEQUENCE SET; Schema: acllar; Owner: knowmadic
--

SELECT pg_catalog.setval('user_role_id_seq', 3, true);


--
-- TOC entry 2011 (class 0 OID 33021)
-- Dependencies: 173
-- Data for Name: users; Type: TABLE DATA; Schema: acllar; Owner: knowmadic
--

COPY users (id, name, phone, email, password, remember_token, created_at, updated_at, activated) FROM stdin;
1	Victor	012	visitor@example.com	$2y$10$UGJqChPaBZSoKWwrIg8WJ.TxWX/Gvar2ysCIUk81knwyK/BAfiyWi	\N	2016-04-25 07:21:42	2016-04-25 07:21:42	t
2	Nazmus Shakib	+88 01737122789	admin@example.com	$2y$10$.pohjNV4YkL3c9sW51h4A.VyFy219P0NxcuoUJnMupMHoEK.gTpDy	MlX7t6d0rkuULY3HT67Yh38qA5ZMnEcsQE4PKDVa3UM0KbyE7tmlmWYrmrHj	2016-04-25 07:21:43	2016-04-25 08:08:55	t
3	Andy	014	author@example.com	$2y$10$L/srfkv/9drwqb6IGZ2JkOIjsIW6m5uxgo3H8YdAOa6xaOJX05cbW	\N	2016-04-25 07:21:43	2016-04-25 07:21:43	t
6	Nazmus Shakib	01737122789	mdshuvobc@gmail.com	$2y$10$UlSWoCh4hKC6Utnfyx6TB.KH8.4NvS3d1D.2Ev00CI18RfFajhnRa	5du0rKaIz15MnFgXWlffJGaoedgZSADJbWW183yXNRwGc9TxpHm64D5XwBWV	2016-04-26 07:26:31	2016-04-26 11:15:00	t
\.


--
-- TOC entry 2029 (class 0 OID 0)
-- Dependencies: 172
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: acllar; Owner: knowmadic
--

SELECT pg_catalog.setval('users_id_seq', 6, true);


--
-- TOC entry 1901 (class 2606 OID 33074)
-- Name: pkey_email; Type: CONSTRAINT; Schema: acllar; Owner: knowmadic; Tablespace: 
--

ALTER TABLE ONLY password_resets
    ADD CONSTRAINT pkey_email PRIMARY KEY (email);


--
-- TOC entry 1896 (class 2606 OID 33042)
-- Name: roles_pkey; Type: CONSTRAINT; Schema: acllar; Owner: knowmadic; Tablespace: 
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- TOC entry 1898 (class 2606 OID 33050)
-- Name: user_role_pkey; Type: CONSTRAINT; Schema: acllar; Owner: knowmadic; Tablespace: 
--

ALTER TABLE ONLY user_role
    ADD CONSTRAINT user_role_pkey PRIMARY KEY (id);


--
-- TOC entry 1892 (class 2606 OID 33031)
-- Name: users_email_unique; Type: CONSTRAINT; Schema: acllar; Owner: knowmadic; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 1894 (class 2606 OID 33029)
-- Name: users_pkey; Type: CONSTRAINT; Schema: acllar; Owner: knowmadic; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 1899 (class 1259 OID 33054)
-- Name: user_activations_token_index; Type: INDEX; Schema: acllar; Owner: knowmadic; Tablespace: 
--

CREATE INDEX user_activations_token_index ON user_activations USING btree (token);


-- Completed on 2016-04-27 00:35:36 BDT

--
-- PostgreSQL database dump complete
--

