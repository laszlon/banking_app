CREATE TABLE users (
  ID INT IDENTITY(1,1) PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  Deleted int
)
--alkalmazottak tábla