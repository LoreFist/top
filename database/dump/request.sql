CREATE TABLE request (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "name" text NOT NULL,
  "phone" text NOT NULL,
  "email" text,
  "direct" text,
  "optional" text,
  "date_departure_from" text,
  "date_departure_to" text,
  "day_stay_from" text,
  "day_stay_to" text,
  "guest" integer,
  "currency" integer,
  "priceTo" integer,
  "priceComfort" integer,
  "children" integer,
  "age1" integer,
  "age2" integer,
  "age3" integer,
  "created_at" integer,
  CONSTRAINT "fg_id" FOREIGN KEY ("id") REFERENCES "request_direct" ("request_id") ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE INDEX "i_i"
ON "request" (
  "id" COLLATE BINARY ASC
);