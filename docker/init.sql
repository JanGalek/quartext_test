CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

CREATE TABLE IF NOT EXISTS users (
     id UUID PRIMARY KEY DEFAULT uuid_generate_v4(),
    name VARCHAR(100),
    email VARCHAR(100),
    birthdate DATE
);
CREATE UNIQUE INDEX idx_users_email ON users (email);
CREATE INDEX idx_users_birthdate ON users (birthdate);
