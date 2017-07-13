-- MySQL Script generated by MySQL Workbench
-- Sat Jul  8 21:13:34 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema clubman
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `#__cmphoto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cmphoto` (
  `photoID` INT NOT NULL AUTO_INCREMENT,
  `filename` VARCHAR(45) NULL,
  `location` VARCHAR(45) NULL,
  `thumbname` VARCHAR(45) NULL,
  `thumblocation` VARCHAR(45) NULL,
  `ownerID` INT NULL,
  `description` VARCHAR(500) NULL,
  PRIMARY KEY (`photoID`),
  UNIQUE INDEX `photoID_UNIQUE` (`photoID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `#__cmperson`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cmperson` (
  `personID` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(50) NULL DEFAULT NULL,
  `memberID` INT NULL DEFAULT NULL,
  `surname` VARCHAR(50) NULL DEFAULT NULL,
  `status` VARCHAR(50) NULL DEFAULT NULL,
  `DOB` DATE NULL DEFAULT NULL,
  `phonenumber` VARCHAR(50) NULL DEFAULT NULL,
  `email` VARCHAR(50) NULL DEFAULT NULL,
  `shirtnumber` VARCHAR(45) NULL,
  `gender` VARCHAR(45) NULL,
  `consent` VARCHAR(45) NULL COMMENT 'Level of consent given for others to see their details - captain,team,club,public',
  `profilephotoID` INT NOT NULL,
  PRIMARY KEY (`personID`),
  INDEX `fk_#__cmperson_#__cmphoto1_idx` (`profilephotoID` ASC),
  CONSTRAINT `fk_#__cmperson_#__cmphoto1`
    FOREIGN KEY (`profilephotoID`)
    REFERENCES `#__cmphoto` (`photoID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `#__cmgroup`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cmgroup` (
  `groupID` INT NOT NULL AUTO_INCREMENT,
  `groupname` VARCHAR(256) NULL DEFAULT NULL,
  `grouplogo` VARCHAR(512) NULL DEFAULT NULL,
  `groupownerID` INT NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`groupID`),
  INDEX `fk_#__cmgroup_#__cmperson1_idx` (`groupownerID` ASC),
  CONSTRAINT `fk_#__cmgroup_#__cmperson1`
    FOREIGN KEY (`groupownerID`)
    REFERENCES `#__cmperson` (`personID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `#__cmlocation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cmlocation` (
  `locationID` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `shortname` VARCHAR(10) NULL,
  `latitude` VARCHAR(45) NULL,
  `longitude` VARCHAR(45) NULL,
  `description` VARCHAR(500) NULL,
  `directions` VARCHAR(500) NULL,
  `link` VARCHAR(100) NULL,
  PRIMARY KEY (`locationID`),
  UNIQUE INDEX `locationID_UNIQUE` (`locationID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `#__cmmatch`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cmmatch` (
  `matchID` INT NOT NULL AUTO_INCREMENT,
  `hometeamID` INT NULL DEFAULT NULL,
  `awayteamID` INT NULL DEFAULT NULL,
  `locationID` INT NULL,
  `latitude` MEDIUMTEXT NULL DEFAULT NULL,
  `longitude` MEDIUMTEXT NULL DEFAULT NULL,
  `postcode` VARCHAR(15) NULL DEFAULT NULL,
  `homescore` INT NULL DEFAULT NULL,
  `awayscore` INT NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `pushback` DATETIME NULL DEFAULT NULL,
  `meettime` DATETIME NULL DEFAULT NULL,
  `status` VARCHAR(45) NULL,
  `halftimehome` INT NULL,
  `halftimeaway` INT NULL,
  `#__cmmatchcol` VARCHAR(45) NULL,
  PRIMARY KEY (`matchID`),
  INDEX `fk_#__cmmatch_#__cmlocation1_idx` (`locationID` ASC),
  INDEX `fk_#__cmmatch_#__cmgroup1_idx` (`awayteamID` ASC),
  INDEX `fk_#__cmmatch_#__cmgroup2_idx` (`hometeamID` ASC),
  CONSTRAINT `fk_#__cmmatch_#__cmlocation1`
    FOREIGN KEY (`locationID`)
    REFERENCES `#__cmlocation` (`locationID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_#__cmmatch_#__cmgroup1`
    FOREIGN KEY (`awayteamID`)
    REFERENCES `#__cmgroup` (`groupID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_#__cmmatch_#__cmgroup2`
    FOREIGN KEY (`hometeamID`)
    REFERENCES `#__cmgroup` (`groupID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `#__cmevent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cmevent` (
  `eventID` INT NOT NULL AUTO_INCREMENT,
  `event_time` DATETIME NULL DEFAULT NULL,
  `actorID` INT NULL DEFAULT NULL,
  `eventtype` VARCHAR(50) NULL DEFAULT NULL,
  `source` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`eventID`));


-- -----------------------------------------------------
-- Table `#__cmattendance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cmattendance` (
  `attendanceID` INT NOT NULL AUTO_INCREMENT,
  `personID` INT NULL DEFAULT NULL,
  `eventID` INT NULL DEFAULT NULL,
  `status` VARCHAR(50) NULL DEFAULT NULL,
  `role` VARCHAR(50) NULL DEFAULT NULL,
  `matchID` INT NULL DEFAULT NULL,
  `shirtnumber` VARCHAR(45) NULL,
  PRIMARY KEY (`attendanceID`),
  INDEX `fk_#__cmattendance_#__cmperson1_idx` (`personID` ASC),
  INDEX `fk_#__cmattendance_#__cmmatch1_idx` (`matchID` ASC),
  INDEX `fk_#__cmattendance_#__cmevent1_idx` (`eventID` ASC),
  CONSTRAINT `fk_#__cmattendance_#__cmperson1`
    FOREIGN KEY (`personID`)
    REFERENCES `#__cmperson` (`personID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_#__cmattendance_#__cmmatch1`
    FOREIGN KEY (`matchID`)
    REFERENCES `#__cmmatch` (`matchID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_#__cmattendance_#__cmevent1`
    FOREIGN KEY (`eventID`)
    REFERENCES `#__cmevent` (`eventID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `#__cmgrouproster`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cmgrouproster` (
  `rosterID` INT NOT NULL AUTO_INCREMENT,
  `personID` INT NULL DEFAULT NULL,
  `groupID` INT NULL DEFAULT NULL,
  `status` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`rosterID`),
  INDEX `fk_#__cmgrouproster_#__cmperson1_idx` (`personID` ASC),
  INDEX `fk_#__cmgrouproster_#__cmgroup1_idx` (`groupID` ASC),
  CONSTRAINT `fk_#__cmgrouproster_#__cmperson1`
    FOREIGN KEY (`personID`)
    REFERENCES `#__cmperson` (`personID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_#__cmgrouproster_#__cmgroup1`
    FOREIGN KEY (`groupID`)
    REFERENCES `#__cmgroup` (`groupID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `#__cmrelationship`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cmrelationship` (
  `relationshipID` INT NOT NULL AUTO_INCREMENT,
  `person1ID` INT NULL DEFAULT NULL,
  `person2ID` INT NULL DEFAULT NULL,
  `relationshiptype` VARCHAR(50) NULL DEFAULT NULL,
  `status` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`relationshipID`),
  INDEX `fk_#__cmrelationship_#__cmperson_idx` (`person1ID` ASC),
  INDEX `fk_#__cmrelationship_#__cmperson1_idx` (`person2ID` ASC),
  CONSTRAINT `fk_#__cmrelationship_#__cmperson`
    FOREIGN KEY (`person1ID`)
    REFERENCES `#__cmperson` (`personID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_#__cmrelationship_#__cmperson1`
    FOREIGN KEY (`person2ID`)
    REFERENCES `#__cmperson` (`personID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `#__cmconsent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cmconsent` (
  `consentID` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(50) NULL DEFAULT NULL,
  `personID` INT NULL DEFAULT NULL,
  `cmsuserID` INT NULL DEFAULT NULL,
  `givendate` DATE NULL DEFAULT NULL,
  `expires` DATE NULL DEFAULT NULL,
  `comments` VARCHAR(2000) NULL DEFAULT NULL,
  `status` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`consentID`),
  INDEX `fk_#__cmconsent_#__cmperson1_idx` (`personID` ASC),
  INDEX `fk_#__cmconsent_#__cmperson2_idx` (`cmsuserID` ASC),
  CONSTRAINT `fk_#__cmconsent_#__cmperson1`
    FOREIGN KEY (`personID`)
    REFERENCES `#__cmperson` (`personID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_#__cmconsent_#__cmperson2`
    FOREIGN KEY (`cmsuserID`)
    REFERENCES `#__cmperson` (`personID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `#__cmcertificates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cmcertificates` (
  `certificateID` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(50) NULL DEFAULT NULL,
  `title` VARCHAR(200) NULL DEFAULT NULL,
  `awarded` DATE NULL DEFAULT NULL,
  `expires` DATE NULL DEFAULT NULL,
  `awardedby` INT NULL DEFAULT NULL,
  `awardedTo` INT NULL DEFAULT NULL,
  PRIMARY KEY (`certificateID`),
  INDEX `fk_#__cmcertificates_#__cmperson1_idx` (`awardedTo` ASC),
  CONSTRAINT `fk_#__cmcertificates_#__cmperson1`
    FOREIGN KEY (`awardedTo`)
    REFERENCES `#__cmperson` (`personID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `#__cmmatchstatus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cmmatchstatus` (
  `matchstatusID` INT NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(5) NULL,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(500) NULL,
  PRIMARY KEY (`matchstatusID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `#__cmscorer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cmscorer` (
  `scorerID` INT NOT NULL AUTO_INCREMENT,
  `matchID` INT NOT NULL,
  `personID` INT NOT NULL,
  `time` INT NULL,
  `description` VARCHAR(500) NULL,
  PRIMARY KEY (`scorerID`),
  INDEX `fk_#__cmscorer_#__cmmatch1_idx` (`matchID` ASC),
  INDEX `fk_#__cmscorer_#__cmperson1_idx` (`personID` ASC),
  CONSTRAINT `fk_#__cmscorer_#__cmmatch1`
    FOREIGN KEY (`matchID`)
    REFERENCES `#__cmmatch` (`matchID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_#__cmscorer_#__cmperson1`
    FOREIGN KEY (`personID`)
    REFERENCES `#__cmperson` (`personID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `#__cmleague`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cmleague` (
  `leagueID` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`leagueID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `#__cmpersonphoto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cmpersonphoto` (
  `personphotoID` INT NOT NULL AUTO_INCREMENT,
  `personID` INT NULL,
  `photoID` INT NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`personphotoID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `#__cmgroupconsent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `#__cmgroupconsent` (
  `groupconsentID` INT NOT NULL AUTO_INCREMENT,
  `cmsuserID` INT NULL,
  `groupID` INT NULL,
  `givendate` INT NULL,
  `expires` DATE NULL,
  `#__cmgroup_groupID` INT NOT NULL,
  PRIMARY KEY (`groupconsentID`),
  INDEX `fk_#__groupconsent_#__cmgroup1_idx` (`#__cmgroup_groupID` ASC),
  CONSTRAINT `fk_#__groupconsent_#__cmgroup1`
    FOREIGN KEY (`#__cmgroup_groupID`)
    REFERENCES `#__cmgroup` (`groupID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;