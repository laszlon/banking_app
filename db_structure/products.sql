CREATE TABLE products (
  ID INT IDENTITY(1,1) PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  productTypeID INT, 
  Deleted INT
)