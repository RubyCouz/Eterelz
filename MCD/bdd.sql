CREATE DATABASE IF NOT EXISTS `eterelz`;
USE `eterelz`;

# CREATE TABLE eter_role(
#                           role_id INT,
#                           role_name VARCHAR(50) UNIQUE,
#                           PRIMARY KEY(role_id)
# );

# CREATE TABLE eter_clan(
#                           clan_id INT,
#                           clan_name VARCHAR(100) NOT NULL UNIQUE,
#                           clan_members INT NOT NULL,
#                           clan_desc VARCHAR(255) NOT NULL,
#                           clan_ban VARCHAR(6) NOT NULL,
#                           clan_discord VARCHAR(150),
#                           clan_recrut LOGICAL,
#                           clan_activity LOGICAL,
#                           clan_gameplay LOGICAL,
#                           PRIMARY KEY(clan_id)
# );

# CREATE TABLE eter_categorie(
#                                cat_id INT,
#                                cat_name VARCHAR(50) NOT NULL,
#                                cat_id_name INT NOT NULL,
#                                PRIMARY KEY(cat_id),
#                                FOREIGN KEY(cat_id_name) REFERENCES eter_categorie(cat_id)
# );

# CREATE TABLE eter_statut(
#                             id INT,
#                             statut_state VARCHAR(50) NOT NULL,
#                             PRIMARY KEY(id)
# );



# CREATE TABLE eter_type(
#                           type_id INT,
#                           type_name VARCHAR(150),
#                           PRIMARY KEY(type_id)
# );

# CREATE TABLE eter_event(
#                            event_id INT,
#                            event_date DATETIME NOT NULL,
#                            event_score VARCHAR(50),
#                            event_winner VARCHAR(50),
#                            event_creation DATETIME NOT NULL,
#                            PRIMARY KEY(event_id)
# );

# CREATE TABLE eter_user(
#                           user_id INT,
#                           user_login VARCHAR(50) NOT NULL UNIQUE,
#                           user_date DATE NOT NULL,
#                           user_mail VARCHAR(150) NOT NULL UNIQUE,
#                           user_password VARCHAR(150) NOT NULL,
#                           user_address VARCHAR(150),
#                           user_zip CHAR(5),
#                           user_city VARCHAR(50),
#                           user_discord VARCHAR(150),
#                           user_sexe VARCHAR(50) NOT NULL,
#                           role_id INT NOT NULL,
#                           PRIMARY KEY(user_id),
#                           FOREIGN KEY(id) REFERENCES eter_statut(id),
#                           FOREIGN KEY(role_id) REFERENCES eter_role(role_id)
# );

# CREATE TABLE eter_content(
#                              content_id INT,
#                              content_text TEXT NOT NULL,
#                              content_date DATETIME NOT NULL,
#                              content_extension VARCHAR(5),
#                              id INT NOT NULL,
#                              cat_id INT NOT NULL,
#                              user_id INT NOT NULL,
#                              PRIMARY KEY(content_id),
#                              FOREIGN KEY(id) REFERENCES eter_statut(id),
#                              FOREIGN KEY(cat_id) REFERENCES eter_categorie(cat_id),
#                              FOREIGN KEY(user_id) REFERENCES eter_user(user_id)
# );

# CREATE TABLE eter_streamer(
#                               stream_id INT,
#                               stream_url VARCHAR(150) NOT NULL,
#                               Stream_support VARCHAR(50) NOT NULL,
#                               user_id INT NOT NULL,
#                               PRIMARY KEY(stream_id),
#                               FOREIGN KEY(user_id) REFERENCES eter_user(user_id)
# );

# CREATE TABLE eter_comment(
#                              comment_id INT,
#                              comment_content TEXT,
#                              comment_date DATETIME NOT NULL,
#                              user_id INT NOT NULL,
#                              content_id INT NOT NULL,
#                              PRIMARY KEY(comment_id),
#                              FOREIGN KEY(user_id) REFERENCES eter_user(user_id),
#                              FOREIGN KEY(content_id) REFERENCES eter_content(content_id)
# );

# CREATE TABLE eter_affiliation(
#                                  user_id INT,
#                                  clan_id INT,
#                                  aff_date DATE NOT NULL,
#                                  PRIMARY KEY(user_id, clan_id),
#                                  FOREIGN KEY(user_id) REFERENCES eter_user(user_id),
#                                  FOREIGN KEY(clan_id) REFERENCES eter_clan(clan_id)
# );
#

# CREATE TABLE eter_own(
#                          game_id INT,
#                          type_id INT,
#                          PRIMARY KEY(game_id, type_id),
#                          FOREIGN KEY(game_id) REFERENCES eter_game(game_id),
#                          FOREIGN KEY(type_id) REFERENCES eter_typr(type_id)
# );

# CREATE TABLE eter_participation(
#                                    clan_id INT,
#                                    event_id INT,
#                                    PRIMARY KEY(clan_id, event_id),
#                                    FOREIGN KEY(clan_id) REFERENCES eter_clan(clan_id),
#                                    FOREIGN KEY(event_id) REFERENCES eter_event(event_id)
# );


# CREATE TABLE eter_contribution(
#                                   user_id INT,
#                                   event_id INT,
#                                   PRIMARY KEY(user_id, event_id),
#                                   FOREIGN KEY(user_id) REFERENCES eter_user(user_id),
#                                   FOREIGN KEY(event_id) REFERENCES eter_event(event_id)
# );

CREATE TABLE eter_repond(
                            comment_id INT,
                            comment_id_1 INT,
                            answer_date DATETIME NOT NULL,
                            PRIMARY KEY(comment_id, comment_id_1),
                            FOREIGN KEY(comment_id) REFERENCES eter_comment(comment_id),
                            FOREIGN KEY(comment_id_1) REFERENCES eter_comment(comment_id)

);
