create table consultant
(
    id    INTEGER not null,
    name  TEXT    not null,
    email TEXT    not null,
    primary key (id autoincrement)
);

create index i_con_i
    on consultant (id);

create table consultant_cat
(
    id            INTEGER not null,
    consultant_id INTEGER not null,
    cat_id        INTEGER not null,
    primary key (id autoincrement),
    constraint fg_con_i
        foreign key (consultant_id) references consultant
);

create index i_cos_cati
    on consultant_cat (cat_id);

create index i_cos_ci
    on consultant_cat (consultant_id);

create index i_cos_i
    on consultant_cat (id);

create table consultant_country
(
    id            INTEGER not null,
    consultant_id INTEGER not null,
    country_id    INTEGER not null,
    primary key (id autoincrement),
    constraint fg_con_i
        foreign key (consultant_id) references consultant
);

create index i_cosc_c
    on consultant_country (consultant_id);

create index i_cosc_ci
    on consultant_country (country_id);

create index i_cosc_i
    on consultant_country (id);

create table consultant_resort
(
    id            INTEGER not null,
    consultant_id INTEGER not null,
    resort_id     INTEGER not null,
    primary key (id autoincrement),
    constraint fg_con_i
        foreign key (consultant_id) references consultant
);

create index i_cos_r_ci
    on consultant_resort (consultant_id);

create index i_cos_r_i
    on consultant_resort (id);

create index i_cos_r_ri
    on consultant_resort (resort_id);

create table currency
(
    id         INTEGER not null,
    name       TEXT,
    short_name TEXT,
    primary key (id autoincrement)
);

create index i_cur_i
    on currency (id);

create table food
(
    id         INTEGER not null,
    name       text,
    short_name TEXT,
    primary key (id autoincrement)
);

create index i_f_i
    on food (id);

create table for_kids
(
    id     INTEGER not null,
    name   TEXT    not null,
    active TEXT    not null,
    weight INTEGER,
    primary key (id autoincrement)
);

create index i_fk_a
    on for_kids (active);

create index i_fk_i
    on for_kids (id);

create index i_fk_w
    on for_kids (weight);

create table other
(
    id     INTEGER not null,
    name   TEXT    not null,
    active TEXT    not null,
    weight INTEGER,
    primary key (id autoincrement)
);

create index i_o_a
    on other (active);

create index i_o_i
    on other (id);

create index i_o_w
    on other (weight);

create table rating
(
    id     INTEGER not null,
    name   TEXT    not null,
    active TEXT    not null,
    weight INTEGER,
    primary key (id autoincrement)
);

create index i_r_a
    on rating (active);

create index i_r_i
    on rating (id);

create table request
(
    id                  integer not null,
    city_tour_id        INTEGER not null,
    currency_id         integer,
    city_departure_id   INTEGER,
    name                text    not null,
    phone               text    not null,
    email               text,
    optional            text,
    date_departure_from text,
    date_departure_to   text,
    day_stay_from       text,
    day_stay_to         text,
    guest               integer,
    priceTo             integer,
    priceComfort        integer,
    children            integer,
    age1                integer,
    age2                integer,
    age3                integer,
    type                TEXT,
    created_at          integer,
    consultant_id       int,
    primary key (id autoincrement),
    constraint fg_cur_i
        foreign key (currency_id) references currency
);

create table direct
(
    id                INTEGER not null,
    request_id        INTEGER not null,
    country_id        integer,
    city_id           integer,
    city_departure_id integer,
    hotel_rating_id   INTEGER,
    primary key (id autoincrement),
    constraint fg_id
        foreign key (request_id) references request
            on update restrict on delete restrict
);

create index i_c_d_i
    on direct (city_departure_id);

create index i_c_i
    on direct (country_id);

create index i_h_ri
    on direct (hotel_rating_id);

create index i_ri
    on direct (request_id);

create table direct_category
(
    direct_id   INTEGER not null,
    category_id INTEGER not null,
    primary key (direct_id, category_id),
    constraint fg_ri_f
        foreign key (direct_id) references direct
);

create index i_ci_c
    on direct_category (direct_id);

create index i_ri_c
    on direct_category (category_id);

create table direct_food
(
    direct_id INTEGER not null,
    food_id   INTEGER not null,
    primary key (direct_id, food_id),
    constraint fg_fi_r
        foreign key (food_id) references food,
    constraint fg_ri_f
        foreign key (direct_id) references direct
);

create index i_df_di
    on direct_food (direct_id);

create index i_df_fi
    on direct_food (food_id);

create table direct_kids
(
    direct_id INTEGER not null,
    kids_id   INTEGER not null,
    primary key (direct_id, kids_id),
    constraint fg_ri_f
        foreign key (direct_id) references direct,
    constraint fg_rk_k
        foreign key (kids_id) references for_kids
);

create index i_dk_i
    on direct_kids (direct_id);

create index i_dk_k
    on direct_kids (kids_id);

create table direct_other
(
    direct_id INTEGER not null,
    other_id  INTEGER not null,
    primary key (direct_id, other_id),
    constraint fg_ri_f
        foreign key (direct_id) references direct,
    constraint fg_rk_k
        foreign key (other_id) references other
);

create index i_do_i
    on direct_other (direct_id);

create index i_do_o
    on direct_other (other_id);

create table direct_palace_value
(
    direct_id      INTEGER not null,
    palacevalue_id INTEGER not null,
    primary key (direct_id, palacevalue_id),
    constraint fg_ri_f
        foreign key (direct_id) references direct
);

create index i_dpt_di
    on direct_palace_value (direct_id);

create index i_dpt_pti
    on direct_palace_value (palacevalue_id);

create table mail_schedule
(
    id         INTEGER not null,
    request_id INTEGER not null,
    send       integer,
    created_at TEXT,
    TEXT,
    primary key (id autoincrement),
    constraint fg_req_id
        foreign key (request_id) references request
);

create index im_i
    on mail_schedule (id);

create index im_r
    on mail_schedule (request_id);

create index i_ct_i
    on request (city_tour_id);

create index i_i
    on request (id);

create table request_food
(
    request_id INTEGER not null,
    food_id    INTEGER not null,
    primary key (request_id, food_id),
    constraint fg_fi_r
        foreign key (food_id) references food,
    constraint fg_ri_f
        foreign key (request_id) references request
);

create index i_fi_rf
    on request_food (food_id);

create index i_ri_rf
    on request_food (request_id);

create table request_location
(
    id          INTEGER not null,
    location_id INTEGER,
    request_id  INTEGER,
    primary key (id autoincrement),
    constraint fg_rq_i
        foreign key (request_id) references request
);

create index i_l_i
    on request_location (id);

create index i_l_li
    on request_location (location_id);

create index i_l_r
    on request_location (request_id);


