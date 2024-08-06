CREATE TABLE banking_transactions (
  ID INT IDENTITY(1,1) PRIMARY KEY,
  user_id INT NOT NULL,
  product_id INT NOT NULL,
  amount DECIMAL(10, 2) NOT NULL,
  transaction_date DATETIME2(3) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (product_id) REFERENCES products(id),
  Deleted INT
)