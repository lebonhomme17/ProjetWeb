-- -----------------------------------------------------------------------------
--             G�n�ration d'une base de donn�es pour
--                      Oracle Version 9i
--                        (2/5/2018 16:49:02)
-- -----------------------------------------------------------------------------
--      Nom de la base : MLR4
--      Projet : Accueil Win'Design version 16
--      Auteur : Malika
--      Date de derni�re modification : 2/5/2018 16:46:38
-- -----------------------------------------------------------------------------

DROP TABLE FREE_TRICK CASCADE CONSTRAINTS;

DROP TABLE GAMER CASCADE CONSTRAINTS;

DROP TABLE DEV_PLATFORM CASCADE CONSTRAINTS;

DROP TABLE TRICK CASCADE CONSTRAINTS;

DROP TABLE GAME CASCADE CONSTRAINTS;

DROP TABLE GAME_SESSION CASCADE CONSTRAINTS;

DROP TABLE EDITOR CASCADE CONSTRAINTS;

DROP TABLE NOT_FREE CASCADE CONSTRAINTS;

DROP TABLE ACQUISITION CASCADE CONSTRAINTS;

DROP TABLE EXISTS_FOR CASCADE CONSTRAINTS;

DROP TABLE FAME CASCADE CONSTRAINTS;

DROP TABLE VOTES CASCADE CONSTRAINTS;



-- -----------------------------------------------------------------------------
--       TABLE : FREE_TRICK
-- -----------------------------------------------------------------------------

CREATE TABLE FREE_TRICK
   (
    ID NUMBER(30)  NOT NULL,
    TRICK_TEXT VARCHAR(4000)  NOT NULL
,   CONSTRAINT PK_FREE_TRICK PRIMARY KEY (ID)  
   ) ;

-- -----------------------------------------------------------------------------
--       TABLE : GAMER
-- -----------------------------------------------------------------------------

CREATE TABLE GAMER
   (
    PSEUDO VARCHAR(500)  NOT NULL,
    AVATAR VARCHAR(500) NULL,
    EMAIL   VARCHAR(200) NOT NULL,
    AMATEUR  CHAR(10) 
      DEFAULT 'True' NOT NULL   CHECK ( AMATEUR IN ('True', 'False')),
    GENDER CHAR 
      DEFAULT 'M' NOT NULL   CHECK (GENDER IN ('F', 'M')),
    AGE NUMBER(3)  NULL   CHECK (AGE BETWEEN 14 AND 99),
    EDUCATION_LEVEL CHAR(32)  NULL   CHECK (EDUCATION_LEVEL IN ('Bac', 'L', 'M', 'D')),
    SOCIAL_SCORE NUMBER(20)  NULL,
    GLOBAL_SCORE NUMBER(20)  NULL
,   CONSTRAINT PK_GAMER PRIMARY KEY (PSEUDO)  
   ) ;

-- -----------------------------------------------------------------------------
--       TABLE : DEV_PLATFORM
-- -----------------------------------------------------------------------------

CREATE TABLE DEV_PLATFORM
   (
    NAME VARCHAR(500)  NOT NULL,
    DESCRIPTION VARCHAR(1000)  NULL
,   CONSTRAINT PK_DEV_PLATFORM PRIMARY KEY (NAME)  
   ) ;

-- -----------------------------------------------------------------------------
--       TABLE : TRICK
-- -----------------------------------------------------------------------------

CREATE TABLE TRICK
   (
    ID NUMBER(30)  NOT NULL,
    GAME_NAME VARCHAR(500)  NOT NULL,
    GAME_LEVEL NUMBER(4) NOT NULL,
    PSEUDO VARCHAR(500)  NOT NULL
,   CONSTRAINT PK_TRICK PRIMARY KEY (ID)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE TRICK
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_TRICK_GAMER
     ON TRICK (PSEUDO ASC)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : GAME
-- -----------------------------------------------------------------------------

CREATE TABLE GAME
   (
    NAME VARCHAR(500)  NOT NULL,
    EDITOR_NAME VARCHAR(500)  NOT NULL,
    GENRE CHAR(32)  NOT NULL   CHECK (GENRE IN ('RPG', 'RTS', 'FPS', 'HandS')),
    OFF_LINE CHAR(10) 
      DEFAULT 'True' NOT NULL   CHECK (OFF_LINE IN ('True', 'False')),
    MULTIPLAYER CHAR(10) 
      DEFAULT 'True' NOT NULL   CHECK (MULTIPLAYER IN ('True', 'False')),
    RELEASED DATE  NOT NULL,
    NB_LEVELS NUMBER(4) 
      DEFAULT 1 NOT NULL   CHECK (NB_LEVELS BETWEEN 1 AND 1000)
,   CONSTRAINT PK_GAME PRIMARY KEY (NAME)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE GAME
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_GAME_EDITOR
     ON GAME (EDITOR_NAME ASC)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : GAME_SESSION
-- -----------------------------------------------------------------------------

CREATE TABLE GAME_SESSION
   (
    PSEUDO VARCHAR(500)  NOT NULL,
    START_TIME DATE  NOT NULL,
    GAME_NAME VARCHAR(500)  NOT NULL,
    END_TIME DATE  NOT NULL,
    LEVEL_START NUMBER(4)  NOT NULL   CHECK (LEVEL_START BETWEEN 1 AND 999),
    LEVEL_END NUMBER(4)  NOT NULL   CHECK (LEVEL_END BETWEEN 1 AND 1000)
,   CONSTRAINT PK_GAME_SESSION PRIMARY KEY (PSEUDO, START_TIME)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE GAME_SESSION
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_GAME_SESSION_GAME
     ON GAME_SESSION (GAME_NAME ASC)
    ;

CREATE  INDEX I_FK_GAME_SESSION_GAMER
     ON GAME_SESSION (PSEUDO ASC)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : EDITOR
-- -----------------------------------------------------------------------------

CREATE TABLE EDITOR
   (
    NAME VARCHAR(500)  NOT NULL
,   CONSTRAINT PK_EDITOR PRIMARY KEY (NAME)  
   ) ;

-- -----------------------------------------------------------------------------
--       TABLE : NOT_FREE
-- -----------------------------------------------------------------------------

CREATE TABLE NOT_FREE
   (
    ID NUMBER(30)  NOT NULL,
    DEAL VARCHAR (50)  NOT NULL   CHECK (DEAL IN ('money', 'exchange'))
,   CONSTRAINT PK_NOT_FREE PRIMARY KEY (ID)  
   ) ;

-- -----------------------------------------------------------------------------
--       TABLE : ACQUISITION
-- -----------------------------------------------------------------------------

CREATE TABLE ACQUISITION
   (
    PSEUDO VARCHAR(500)  NOT NULL,
    GAME_NAME VARCHAR(500)  NOT NULL,
    ACQUISITION_DATE DATE  NULL
,   CONSTRAINT PK_ACQUISITION PRIMARY KEY (PSEUDO, GAME_NAME)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE ACQUISITION
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_ACQUISITION_GAMER
     ON ACQUISITION (PSEUDO ASC)
    ;

CREATE  INDEX I_FK_ACQUISITION_GAME
     ON ACQUISITION (GAME_NAME ASC)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : EXISTS_FOR
-- -----------------------------------------------------------------------------

CREATE TABLE EXISTS_FOR
   (
    GAME_NAME VARCHAR(500)  NOT NULL,
    PF_NAME VARCHAR(500)  NOT NULL,
    PRICE NUMBER(6,2) NOT NULL
,   CONSTRAINT PK_EXISTS_FOR PRIMARY KEY (GAME_NAME, PF_NAME)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE EXISTS_FOR
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_EXISTS_FOR_DEV_PLATFORM
     ON EXISTS_FOR (GAME_NAME ASC)
    ;

CREATE  INDEX I_FK_EXISTS_FOR_GAME
     ON EXISTS_FOR (PF_NAME ASC)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : FAME
-- -----------------------------------------------------------------------------

CREATE TABLE FAME
   (
    EDITOR_NAME VARCHAR(500)  NOT NULL,
    PSEUDO VARCHAR (500)  NOT NULL,
    EDITOR_SCORE NUMBER(30)  NULL
,   CONSTRAINT PK_FAME PRIMARY KEY (EDITOR_NAME, PSEUDO)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE FAME
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_FAME_EDITOR
     ON FAME (EDITOR_NAME ASC)
    ;

CREATE  INDEX I_FK_FAME_GAMER
     ON FAME (PSEUDO ASC)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : VOTES
-- -----------------------------------------------------------------------------

CREATE TABLE VOTES
   (
    ID NUMBER(30)  NOT NULL,
    PSEUDO VARCHAR(500)  NOT NULL
,   CONSTRAINT PK_VOTES PRIMARY KEY (ID, PSEUDO)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE VOTES
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_VOTES_FREE_TRICK
     ON VOTES (ID ASC)
    ;

CREATE  INDEX I_FK_VOTES_GAMER
     ON VOTES (PSEUDO ASC)
    ;


-- -----------------------------------------------------------------------------
--       CREATION DES REFERENCES DE TABLE
-- -----------------------------------------------------------------------------


ALTER TABLE FREE_TRICK ADD (
     CONSTRAINT FK_FREE_TRICK_TRICK
          FOREIGN KEY (ID)
               REFERENCES TRICK (ID))   ;

ALTER TABLE TRICK ADD (
     CONSTRAINT FK_TRICK_GAMER
          FOREIGN KEY (PSEUDO)
               REFERENCES GAMER (PSEUDO))   ;

ALTER TABLE TRICK ADD (
     CONSTRAINT FK_TRICK_GAME
          FOREIGN KEY (GAME_NAME)
               REFERENCES GAME (NAME))   ;

ALTER TABLE GAME ADD (
     CONSTRAINT FK_GAME_EDITOR
          FOREIGN KEY (EDITOR_NAME)
               REFERENCES EDITOR (NAME))   ;

ALTER TABLE GAME_SESSION ADD (
     CONSTRAINT FK_GAME_SESSION_GAME
          FOREIGN KEY (GAME_NAME)
               REFERENCES GAME (NAME))   ;

ALTER TABLE GAME_SESSION ADD (
     CONSTRAINT FK_GAME_SESSION_GAMER
          FOREIGN KEY (PSEUDO)
               REFERENCES GAMER (PSEUDO))   ;

ALTER TABLE NOT_FREE ADD (
     CONSTRAINT FK_NOT_FREE_TRICK
          FOREIGN KEY (ID)
               REFERENCES TRICK (ID))   ;

ALTER TABLE ACQUISITION ADD (
     CONSTRAINT FK_ACQUISITION_GAMER
          FOREIGN KEY (PSEUDO)
               REFERENCES GAMER (PSEUDO))   ;

ALTER TABLE ACQUISITION ADD (
     CONSTRAINT FK_ACQUISITION_GAME
          FOREIGN KEY (GAME_NAME)
               REFERENCES GAME (NAME))   ;

ALTER TABLE EXISTS_FOR ADD (
     CONSTRAINT FK_EXISTS_FOR_DEV_PLATFORM
          FOREIGN KEY (PF_NAME)
               REFERENCES DEV_PLATFORM (NAME))   ;

ALTER TABLE EXISTS_FOR ADD (
     CONSTRAINT FK_EXISTS_FOR_GAME
          FOREIGN KEY (GAME_NAME)
               REFERENCES GAME (NAME))   ;

ALTER TABLE FAME ADD (
     CONSTRAINT FK_FAME_EDITOR
          FOREIGN KEY (EDITOR_NAME)
               REFERENCES EDITOR (NAME))   ;

ALTER TABLE FAME ADD (
     CONSTRAINT FK_FAME_GAMER
          FOREIGN KEY (PSEUDO)
               REFERENCES GAMER (PSEUDO))   ;

ALTER TABLE VOTES ADD (
     CONSTRAINT FK_VOTES_FREE_TRICK
          FOREIGN KEY (ID)
               REFERENCES FREE_TRICK (ID))   ;

ALTER TABLE VOTES ADD (
     CONSTRAINT FK_VOTES_GAMER
          FOREIGN KEY (PSEUDO)
               REFERENCES GAMER (PSEUDO))   ;


-- -----------------------------------------------------------------------------
--                FIN DE GENERATION
-- -----------------------------------------------------------------------------