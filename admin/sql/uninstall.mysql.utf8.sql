	-- uninstall script for clubmanager module from v0.0.8

SET FOREIGN_KEY_CHECKS = 0;

-- -----------------------------------------------------
	-- Table `#__cmlocation`
	-- -----------------------------------------------------
	DROP TABLE IF EXISTS `#__cmlocation`;


	-- -----------------------------------------------------
	-- Table `#__cmattendance`
	-- -----------------------------------------------------
	DROP TABLE IF EXISTS `#__cmattendance`;


	-- -----------------------------------------------------
	-- Table `#__cmgrouproster`
	-- -----------------------------------------------------
	DROP TABLE IF EXISTS `#__cmgrouproster`;


	-- -----------------------------------------------------
	-- Table `#__cmrelationship`
	-- -----------------------------------------------------
	DROP TABLE IF EXISTS `#__cmrelationship` ;


	-- -----------------------------------------------------
	-- Table `#__cmevent`
	-- -----------------------------------------------------
	DROP TABLE IF EXISTS `#__cmevent`;


	-- -----------------------------------------------------
	-- Table `#__cmconsent`
	-- -----------------------------------------------------
	DROP TABLE IF EXISTS `#__cmconsent` ;


	-- -----------------------------------------------------
	-- Table `#__cmcertificates`
	-- -----------------------------------------------------
	DROP TABLE IF EXISTS `#__cmcertificates` ;

	-- -----------------------------------------------------
	-- Table `#__cmmatch`
	-- -----------------------------------------------------
	DROP TABLE IF  EXISTS `#__cmmatch` ;


	-- -----------------------------------------------------
	-- Table `#__cmgroup`
	-- -----------------------------------------------------
	DROP TABLE IF EXISTS `#__cmgroup`;


	-- -----------------------------------------------------
	-- Table `#__cmperson`
	-- -----------------------------------------------------
	DROP TABLE IF EXISTS `#__cmperson`;

	SET FOREIGN_KEY_CHECKS = 1;