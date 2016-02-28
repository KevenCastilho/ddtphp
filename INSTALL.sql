USE Db_Tank
IF NOT EXISTS (SELECT * FROM INFORMATION_SCHEMA.Columns WHERE TABLE_NAME = 'Sys_Users_Detail' AND COLUMN_NAME = 'IsAdmin') ALTER TABLE Sys_Users_Detail ADD IsAdmin int
GO
IF NOT EXISTS (SELECT * FROM sys.databases WHERE name = 'Db_web') CREATE DATABASE Db_Web
GO
USE [Db_Web]
IF EXISTS (SELECT * FROM sys.objects where type = 'U' and name = 'Pages') DROP TABLE Pages
IF EXISTS (SELECT * FROM sys.objects where type = 'U' and name = 'WebSettings') DROP TABLE WebSettings
IF EXISTS (SELECT * FROM sys.objects where type = 'U' and name = 'News') DROP TABLE News
GO

/****** Object:  Table [dbo].[Pages]    Script Date: 08/25/2012 19:11:03 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Pages](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[Name] [text] NOT NULL,
	[Page] [text] NOT NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
USE [Db_Web]
GO

/****** Object:  Table [dbo].[Settings]    Script Date: 08/25/2012 20:12:33 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[WebSettings](
	[ID] [int] NOT NULL IDENTITY(0,1),
	[ServerID] [int] NOT NULL,
	[ServerName] [text] NOT NULL,
	[TitleSeparator] [text] NOT NULL,
	[RegisterGold] [int] NOT NULL,
	[RegisterMoney] [int] NOT NULL,
	[RegisterFreeMoney] [int] NOT NULL,
	[PlayersInRanking] [int] NOT NULL,
	[DonateText] [text] NOT NULL,
	[GameLink] [text] NOT NULL,
	[BackgroundID] [text] NOT NULL,
	[ForumLink] [text] NOT NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[News]    Script Date: 08/25/2012 21:07:51 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[News](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[NewsTitle] [text] NOT NULL,
	[NewsText] [text] NOT NULL,
	[NewsAuthor] [text] NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
INSERT INTO Pages(Name,Page) VALUES ('Registro','!Registro'),('Donate','!Donate'),('Ranking','!Ranking')

