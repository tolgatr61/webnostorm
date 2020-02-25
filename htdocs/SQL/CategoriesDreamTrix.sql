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

 Date: 05/04/2019 19:38:33
*/


-- ----------------------------
-- Table structure for CategoriesDreamTrix
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[CategoriesDreamTrix]') AND type IN ('U'))
	DROP TABLE [dbo].[CategoriesDreamTrix]
GO

CREATE TABLE [dbo].[CategoriesDreamTrix] (
  [CategoriesId] int  IDENTITY NOT NULL,
  [Name] varchar(255) COLLATE French_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[CategoriesDreamTrix] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of CategoriesDreamTrix
-- ----------------------------
SET IDENTITY_INSERT [dbo].[CategoriesDreamTrix] ON
GO

INSERT INTO [dbo].[CategoriesDreamTrix] ([CategoriesId], [Name]) VALUES (N'0', N'Spécialiste')
GO

SET IDENTITY_INSERT [dbo].[CategoriesDreamTrix] OFF
GO


-- ----------------------------
-- Primary Key structure for table CategoriesDreamTrix
-- ----------------------------
ALTER TABLE [dbo].[CategoriesDreamTrix] ADD CONSTRAINT [PK__Categori__EFF9079067D36C72] PRIMARY KEY CLUSTERED ([CategoriesId])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO

