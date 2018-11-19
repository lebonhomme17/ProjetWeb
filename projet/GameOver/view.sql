CREATE or REPLACE VIEW SCORE_SOCIAL
AS select pseudo, count(v.pseudo) as social_score
FROM GAMER JOIN TRICK T USING (PSEUDO) JOIN VOTES V USING(ID)
GROUP BY PSEUDO
order by social_score desc;
  
CREATE OR REPLACE VIEW NB_JEUX_JOUES
AS SELECT PSEUDO, count(game_name) nb_jeux_joue
from gamer join game_session using (pseudo)
group by pseudo;

CREATE OR REPLACE VIEW NB_Levels
AS SELECT PSEUDO, sum(level_end-level_start) as nb_levels
from gamer join game_session using (pseudo)
group by pseudo;

CREATE OR REPLACE VIEW NB_TIME
AS SELECT PSEUDO, sum(end_time-start_time) as nb_time
from gamer join game_session using (pseudo)
group by pseudo;

CREATE OR REPLACE VIEW GLOBAL_SCORE
AS SELECT PSEUDO, sum(nb_jeux_joue+nb_levels+nb_time) as global_score
from nb_jeux_joues join nb_levels using(pseudo) join nb_time using(pseudo)
group by pseudo
order by global_score desc;

