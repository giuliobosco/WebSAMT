
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- consultant
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `consultant`;

CREATE TABLE `consultant`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `lastname` VARCHAR(64) NOT NULL,
    `email` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- client
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `lastname` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- consulting
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `consulting`;

CREATE TABLE `consulting`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `consultant_k` INTEGER NOT NULL,
    `client_k` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `consulting_fi_707f1d` (`consultant_k`),
    INDEX `consulting_fi_a0a60b` (`client_k`),
    CONSTRAINT `consulting_fk_707f1d`
        FOREIGN KEY (`consultant_k`)
        REFERENCES `consultant` (`id`),
    CONSTRAINT `consulting_fk_a0a60b`
        FOREIGN KEY (`client_k`)
        REFERENCES `client` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
