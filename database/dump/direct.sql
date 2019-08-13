CREATE TABLE direct (
  "id" INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  "country_id" integer,
  "city_id" integer,
  "city_departure_id" integer,
  CONSTRAINT "fg_id" FOREIGN KEY ("id") REFERENCES "request_direct" ("direct_id") ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE INDEX "i_c_i"
    ON "direct" (
                 "country_id" COLLATE BINARY ASC
        );

CREATE INDEX "i_c_d_i"
    ON "direct" (
                 "city_departure_id" COLLATE BINARY ASC
        );