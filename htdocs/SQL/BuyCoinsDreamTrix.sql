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

 Date: 21/03/2019 22:38:33
*/


-- ----------------------------
-- Table structure for BuyCoinsDreamTrix
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[BuyCoinsDreamTrix]') AND type IN ('U'))
	DROP TABLE [dbo].[BuyCoinsDreamTrix]
GO

CREATE TABLE [dbo].[BuyCoinsDreamTrix] (
  [CoinsId] int  IDENTITY(1,1) NOT NULL,
  [Coins] bigint  NOT NULL,
  [Price] bigint  NOT NULL,
  [Description] text COLLATE French_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[BuyCoinsDreamTrix] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of BuyCoinsDreamTrix
-- ----------------------------
SET IDENTITY_INSERT [dbo].[BuyCoinsDreamTrix] ON
GO

INSERT INTO [dbo].[BuyCoinsDreamTrix] ([CoinsId], [Coins], [Price], [Description]) VALUES (N'1', N'500', N'25', N'This is a description test')
GO

INSERT INTO [dbo].[BuyCoinsDreamTrix] ([CoinsId], [Coins], [Price], [Description]) VALUES (N'2', N'200', N'10', N'This is a description test')
GO

SET IDENTITY_INSERT [dbo].[BuyCoinsDreamTrix] OFF
GO


-- ----------------------------
-- Primary Key structure for table BuyCoinsDreamTrix
-- ----------------------------
ALTER TABLE [dbo].[BuyCoinsDreamTrix] ADD CONSTRAINT [PK__BuyCoins__0093873F7C0A2B5C] PRIMARY KEY CLUSTERED ([CoinsId])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO

