CREATE TABLE customer (
  ID INT IDENTITY(1,1) PRIMARY KEY,
  firstname VARCHAR(50) NOT NULL,
  lastname VARCHAR(50) NOT NULL,
  address VARCHAR(550) NOT NULL,
  email VARCHAR(50) NOT NULL,
  deleted int
)