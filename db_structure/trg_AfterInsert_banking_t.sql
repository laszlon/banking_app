CREATE TRIGGER trg_AfterInsert_banking_transactions
ON banking_transactions
AFTER INSERT
AS
BEGIN
    SET NOCOUNT ON;

    INSERT INTO banking_transactionsAuditLog (TransactionID, Amount, AuditTimestamp)
    SELECT 
        i.ID,
        i.Amount,
        GETDATE()
    FROM 
        inserted i;
END