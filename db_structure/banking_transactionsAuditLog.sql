CREATE TABLE [dbo].[banking_transactionsAuditLog](
	[AuditID] [int] IDENTITY(1,1) NOT NULL,
	[TransactionID] [int] NULL,
	[Amount] [decimal](10, 2) NULL,
	[AuditTimestamp] [datetime] NULL,
)