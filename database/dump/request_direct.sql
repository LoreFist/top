CREATE TABLE request_direct (
  "request_id" INTEGER NOT NULL,
  "direct_id" INTEGER NOT NULL,
  PRIMARY KEY ("request_id", "direct_id"),
  CONSTRAINT "fg_r" FOREIGN KEY ("request_id") REFERENCES "request" ("id") ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT "fg_d" FOREIGN KEY ("direct_id") REFERENCES "direct" ("id") ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE INDEX "i_d_b"
ON "request_direct" (
  "direct_id" COLLATE BINARY ASC
);

CREATE "i_r_b"
ON "request_direct" (
  "request_id" COLLATE BINARY ASC
);