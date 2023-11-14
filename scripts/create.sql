CREATE TYPE "RoleEnum" AS ENUM (
  'client',
  'employee',
  'admin'
);

CREATE TYPE "ItemType" AS ENUM (
  'product',
  'service'
);

CREATE TABLE "users" (
  "id" serial PRIMARY KEY,
  "name" varchar(255),
  "address" varchar(255),
  "contact_number" varchar(20),
  "username" varchar(50) UNIQUE,
  "password" varchar(255),
  "role" RoleEnum NOT NULL
);

CREATE TABLE "services" (
  "id" serial PRIMARY KEY,
  "name" varchar(255) UNIQUE,
  "price" int,
  "description" text
);

CREATE TABLE "appointments" (
  "id" serial PRIMARY KEY,
  "user_id" int,
  "service_id" int,
  "details" varchar(255),
  "appointment_date" date,
  "appointment_time" time,
  "amount" int
);

CREATE TABLE "providers" (
  "id" serial PRIMARY KEY,
  "name" varchar(255),
  "contact_number" varchar(20),
  "industry" varchar(255)
);

CREATE TABLE "purchase_orders" (
  "id" serial PRIMARY KEY,
  "provider_id" int,
  "order_date" date
);

CREATE TABLE "purchase_items" (
  "id" serial PRIMARY KEY,
  "order_id" int,
  "product_or_service_id" int,
  "quantity" int,
  "amount" int,
  "item_type" ItemType
);

CREATE TABLE "products" (
  "id" serial PRIMARY KEY,
  "name" varchar(255)
);

CREATE TABLE "user_purchases" (
  "id" serial PRIMARY KEY,
  "user_id" int,
  "order_id" int,
  "purchase_date" date,
  "total_amount" int
);

ALTER TABLE "appointments" ADD FOREIGN KEY ("user_id") REFERENCES "users" ("id");

ALTER TABLE "appointments" ADD FOREIGN KEY ("service_id") REFERENCES "services" ("id");

ALTER TABLE "purchase_orders" ADD FOREIGN KEY ("provider_id") REFERENCES "providers" ("id");

ALTER TABLE "purchase_items" ADD FOREIGN KEY ("order_id") REFERENCES "purchase_orders" ("id");

ALTER TABLE "user_purchases" ADD FOREIGN KEY ("user_id") REFERENCES "users" ("id");

ALTER TABLE "user_purchases" ADD FOREIGN KEY ("order_id") REFERENCES "purchase_orders" ("id");
