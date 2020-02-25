/*
 Navicat SQL Server Data Transfer

 Source Server         : localhost
 Source Server Type    : SQL Server
 Source Server Version : 14001000
 Source Host           : localhost:1433
 Source Catalog        : newopennos
 Source Schema         : dbo

 Target Server Type    : SQL Server
 Target Server Version : 14001000
 File Encoding         : 65001

 Date: 18/04/2019 13:01:26
*/


-- ----------------------------
-- Table structure for NosmallItemDreamTrix
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[NosmallItemDreamTrix]') AND type IN ('U'))
	DROP TABLE [dbo].[NosmallItemDreamTrix]
GO

CREATE TABLE [dbo].[NosmallItemDreamTrix] (
  [ProductId] bigint  IDENTITY(1, 1) NOT NULL,
  [VNum] smallint  NOT NULL,
  [Amount] int  NOT NULL,
  [Price] bigint  NOT NULL,
  [Description] nvarchar(max) COLLATE French_CI_AS  NULL,
  [Upgrade] tinyint  NOT NULL,
  [Image] nvarchar(max) COLLATE French_CI_AS  NOT NULL,
  [Rare] tinyint  NOT NULL,
  [Number_p] int  NOT NULL,
  [CategoriesId] int  NOT NULL,
  [SecondCategoriesId] int  NULL,
  [ChooseAmount] bit  NULL,
  [Level] int DEFAULT ((0)) NOT NULL
)
GO

ALTER TABLE [dbo].[NosmallItemDreamTrix] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of NosmallItemDreamTrix
-- ----------------------------
SET IDENTITY_INSERT [dbo].[NosmallItemDreamTrix] ON
GO

INSERT INTO [dbo].[NosmallItemDreamTrix] ([ProductId], [VNum], [Amount], [Price], [Description], [Upgrade], [Image], [Rare], [Number_p], [CategoriesId], [SecondCategoriesId], [ChooseAmount], [Level]) VALUES (N'1', N'1', N'1', N'200', N'test', N'0', N'http://blog.nostale.fr/wp-content/uploads/2016/05/JericoNosTaleFR.jpg', N'0', N'0', N'0', NULL, N'1', N'0')
GO

INSERT INTO [dbo].[NosmallItemDreamTrix] ([ProductId], [VNum], [Amount], [Price], [Description], [Upgrade], [Image], [Rare], [Number_p], [CategoriesId], [SecondCategoriesId], [ChooseAmount], [Level]) VALUES (N'2', N'2', N'1', N'200', N'test', N'0', N'http://blog.nostale.fr/wp-content/uploads/2016/05/JericoNosTaleFR.jpg', N'0', N'0', N'0', NULL, N'0', N'0')
GO

SET IDENTITY_INSERT [dbo].[NosmallItemDreamTrix] OFF
GO


-- ----------------------------
-- Primary Key structure for table NosmallItemDreamTrix
-- ----------------------------
ALTER TABLE [dbo].[NosmallItemDreamTrix] ADD CONSTRAINT [PK__NosmallI__B40CC6CD5D6ACCCA] PRIMARY KEY CLUSTERED ([ProductId])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO

