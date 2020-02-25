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

 Date: 17/04/2019 23:27:47
*/


-- ----------------------------
-- Table structure for PackDreamTrix
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[PackDreamTrix]') AND type IN ('U'))
	DROP TABLE [dbo].[PackDreamTrix]
GO

CREATE TABLE [dbo].[PackDreamTrix] (
  [PackItemId] int  IDENTITY(1,1) NOT NULL,
  [PackId] int  NOT NULL,
  [Amount] int  NOT NULL,
  [Rare] int  NOT NULL,
  [Upgrade] int  NOT NULL,
  [VNum] int DEFAULT ((0)) NOT NULL
)
GO

ALTER TABLE [dbo].[PackDreamTrix] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of PackDreamTrix
-- ----------------------------
SET IDENTITY_INSERT [dbo].[PackDreamTrix] ON
GO

INSERT INTO [dbo].[PackDreamTrix] ([PackItemId], [PackId], [Amount], [Rare], [Upgrade], [VNum]) VALUES (N'2', N'1', N'1', N'0', N'0', N'1')
GO

INSERT INTO [dbo].[PackDreamTrix] ([PackItemId], [PackId], [Amount], [Rare], [Upgrade], [VNum]) VALUES (N'3', N'1', N'1', N'0', N'0', N'2')
GO

INSERT INTO [dbo].[PackDreamTrix] ([PackItemId], [PackId], [Amount], [Rare], [Upgrade], [VNum]) VALUES (N'4', N'2', N'1', N'0', N'0', N'1')
GO

INSERT INTO [dbo].[PackDreamTrix] ([PackItemId], [PackId], [Amount], [Rare], [Upgrade], [VNum]) VALUES (N'5', N'2', N'1', N'0', N'0', N'1')
GO

SET IDENTITY_INSERT [dbo].[PackDreamTrix] OFF
GO


-- ----------------------------
-- Primary Key structure for table PackDreamTrix
-- ----------------------------
ALTER TABLE [dbo].[PackDreamTrix] ADD CONSTRAINT [PK__PackDrea__EBC31F36786A46BA] PRIMARY KEY CLUSTERED ([PackItemId])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO

