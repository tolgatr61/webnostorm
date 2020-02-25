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

 Date: 06/04/2019 12:14:48
*/


-- ----------------------------
-- Table structure for SecondsCategoriesDreamTrix
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[SecondsCategoriesDreamTrix]') AND type IN ('U'))
	DROP TABLE [dbo].[SecondsCategoriesDreamTrix]
GO

CREATE TABLE [dbo].[SecondsCategoriesDreamTrix] (
  [SecondsCategoriesId] int  IDENTITY(1,1) NOT NULL,
  [SecondsName] varchar(255) COLLATE French_CI_AS  NOT NULL,
  [CategoriesId] int  NOT NULL
)
GO

ALTER TABLE [dbo].[SecondsCategoriesDreamTrix] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Primary Key structure for table SecondsCategoriesDreamTrix
-- ----------------------------
ALTER TABLE [dbo].[SecondsCategoriesDreamTrix] ADD CONSTRAINT [PK__SecondsC__EB8D39C75B20B73D] PRIMARY KEY CLUSTERED ([SecondsCategoriesId])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Foreign Keys structure for table SecondsCategoriesDreamTrix
-- ----------------------------
ALTER TABLE [dbo].[SecondsCategoriesDreamTrix] ADD CONSTRAINT [fk_SecondsCategoriesDreamTrix] FOREIGN KEY ([CategoriesId]) REFERENCES [dbo].[CategoriesDreamTrix] ([CategoriesId]) ON DELETE NO ACTION ON UPDATE NO ACTION
GO

