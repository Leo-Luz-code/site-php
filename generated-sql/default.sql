
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- tb_specialty
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tb_specialty`;

CREATE TABLE `tb_specialty`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `tb_specialty_name` VARCHAR(255),
    `tb_specialty_description` VARCHAR(255),
    `tb_specialty_icon` VARCHAR(255),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tb_admin
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `tb_admin_name` VARCHAR(128),
    `tb_admin_email` VARCHAR(128),
    `tb_admin_password` VARCHAR(128),
    `tb_admin_salt` VARCHAR(128),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tb_news
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tb_news`;

CREATE TABLE `tb_news`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `tb_news_title` VARCHAR(128),
    `tb_news_text` VARCHAR(128),
    `tb_news_date` TIMESTAMP NULL,
    `tb_news_author` VARCHAR(128),
    `tb_news_slug` VARCHAR(128),
    `tb_news_pic` BLOB,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tb_project
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tb_project`;

CREATE TABLE `tb_project`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `tb_project_name` VARCHAR(128),
    `tb_project_description` VARCHAR(255),
    `tb_project_pic` BLOB,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
