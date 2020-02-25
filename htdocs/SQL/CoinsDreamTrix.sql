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

 Date: 05/04/2019 19:38:44
*/


-- ----------------------------
-- Table structure for CoinsDreamTrix
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[CoinsDreamTrix]') AND type IN ('U'))
	DROP TABLE [dbo].[CoinsDreamTrix]
GO

CREATE TABLE [dbo].[CoinsDreamTrix] (
  [CoinsId] int  IDENTITY NOT NULL,
  [AccountId] bigint  NOT NULL,
  [Coins] int  NULL
)
GO

ALTER TABLE [dbo].[CoinsDreamTrix] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of CoinsDreamTrix
-- ----------------------------
SET IDENTITY_INSERT [dbo].[CoinsDreamTrix] ON
GO

INSERT INTO [dbo].[CoinsDreamTrix] ([CoinsId], [AccountId], [Coins]) VALUES (N'6', N'1', N'5')
GO

SET IDENTITY_INSERT [dbo].[CoinsDreamTrix] OFF
GO


-- ----------------------------
-- Primary Key structure for table CoinsDreamTrix
-- ----------------------------
ALTER TABLE [dbo].[CoinsDreamTrix] ADD CONSTRAINT [PK__CoinsDre__0093873FB558C41E] PRIMARY KEY CLUSTERED ([CoinsId])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO

