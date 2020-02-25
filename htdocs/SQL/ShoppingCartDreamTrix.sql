/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : SQL Server
 Source Server Version : 14001000
 Source Host           : localhost:1433
 Source Catalog        : newopennos
 Source Schema         : dbo

 Target Server Type    : SQL Server
 Target Server Version : 14001000
 File Encoding         : 65001

 Date: 22/03/2019 13:14:09
*/


-- ----------------------------
-- Table structure for ShoppingCartDreamTrix
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[ShoppingCartDreamTrix]') AND type IN ('U'))
	DROP TABLE [dbo].[ShoppingCartDreamTrix]
GO

CREATE TABLE [dbo].[ShoppingCartDreamTrix] (
  [CartId] int  IDENTITY(1,1) NOT NULL,
  [AccountId] bigint  NOT NULL,
  [ProductId] bigint  NOT NULL,
  [CharacterId] bigint  NOT NULL,
  [VNum] smallint  NOT NULL,
  [Price] bigint  NOT NULL,
  [Image] nvarchar(max) COLLATE French_CI_AS  NOT NULL,
  [Amount] bigint  NOT NULL,
  [TotalPrice] bigint  NULL
)
GO

ALTER TABLE [dbo].[ShoppingCartDreamTrix] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Primary Key structure for table ShoppingCartDreamTrix
-- ----------------------------
ALTER TABLE [dbo].[ShoppingCartDreamTrix] ADD CONSTRAINT [PK__Shopping__51BCD7B703937473] PRIMARY KEY CLUSTERED ([CartId])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO

