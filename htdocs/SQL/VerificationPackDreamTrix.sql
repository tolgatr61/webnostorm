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

 Date: 17/04/2019 19:25:25
*/


-- ----------------------------
-- Table structure for VerificationPackDreamTrix
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[VerificationPackDreamTrix]') AND type IN ('U'))
	DROP TABLE [dbo].[VerificationPackDreamTrix]
GO

CREATE TABLE [dbo].[VerificationPackDreamTrix] (
  [AccountId] int  NOT NULL,
  [PackId] int  NOT NULL
)
GO

ALTER TABLE [dbo].[VerificationPackDreamTrix] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of VerificationPackDreamTrix
-- ----------------------------
INSERT INTO [dbo].[VerificationPackDreamTrix] ([AccountId], [PackId]) VALUES (N'1', N'1')
GO


-- ----------------------------
-- Primary Key structure for table VerificationPackDreamTrix
-- ----------------------------
ALTER TABLE [dbo].[VerificationPackDreamTrix] ADD CONSTRAINT [PK__Verifica__245490A360929D1E] PRIMARY KEY CLUSTERED ([AccountId])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO

