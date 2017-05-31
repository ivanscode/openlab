# OpenLab Project

## Introduction

The files here are the _first_ iteration of the OpenLab framework.

The linux folder contains all the necessary scripts to gather information from the RFID-enabled card and pass that information to the database along with the status of the linux module itself (in my case, a Raspberry PI 2 running Raspbian Jessie). The scripts are automatically launched from the `/etc/bash.bashrc` file when the PI logs in. The pinger is launched as a service, and the `getinfo.py` script is launched as is.

**Note:** the `getinfo.py` script relies on `evdev`, a python library not included with Raspbian.

The web_ui folder contains all the necessary files to monitor and manage some elements of a MySQL database. Take note that the PI communicates with the web_ui and its PHP scripts in order to update values to the database.

## Table of Contents

1. [Introduction](https://github.com/ivanscode/openlab#introduction)
2. [Table of Contents](https://github.com/ivanscode/openlab#table-of-contents)
3. [Linux](https://github.com/ivanscode/openlab#linux)
    1. [Setup](https://github.com/ivanscode/openlab#setup)
    2. [Running](https://github.com/ivanscode/openlab#running)
4. [Web UI](https://github.com/ivanscode/openlab#web-ui)
    1. [Setup](https://github.com/ivanscode/openlab#setup-1)
    2. [Running](https://github.com/ivanscode/openlab#running-1)
5. [MySQL](https://github.com/ivanscode/openlab#mysql)
    1. [Log](https://github.com/ivanscode/openlab#log)
    2. [People](https://github.com/ivanscode/openlab#people)
    3. [Login](https://github.com/ivanscode/openlab#login)
    4. [Status](https://github.com/ivanscode/openlab#status)

## Linux
### Setup
In the case of this project, I used a Raspberry PI 2 running Raspbian Jessie. Any Linux machine with internet connectivity and a USB port or two will be able to support the framework. The project utilizes a [RFIdeas pcProx Plus](https://www.rfideas.com/products/readers/pcprox-plus-enroll) module to read a RFID-enabled card. Because of it, I needed to pull information directly from it rather than from `TTY0` or something along the lines of that. Here, the `evdev` module helps read the specific input. Make sure to edit the `getinfo.py` file to match the device you're monitoring. You can find your attached inputs in `/dev/input/by-id/`. Also, make sure to edit the domain in both the `pinger.py` and `getinfo.py` scripts.

**Note:** `evdev` is a python library easily found on the internet. Simply install the library and make sure the import on the `getinfo.py` file is right.

As an experiment, I setup the pinger script as a service and used a custom Daemon to run it in the background, so it is included with the framework.

Once everything is in order, simply edit the `/etc/bash.bashrc` file to run the scripts upon login automatically.

**Note:** depending on the environment, automatic login varies across the distros, so I am not including instructions on how to set that up. Similarly, the `bash.bashrc` file is included on Raspbian Jessie, but may not be included on other distros.

### Running
If everything was setup correctly, and automatic login was enabled, the module with the scanner attached should be able to read and send data to the database automatically.

## Web UI
### Setup
To connect to your own database, simply edit the file `/php/dbconnect.php`.

Everything else should be a copy-paste job without any issues.

To setup the database, refer to the [MySQL]() section.

### Running
The setup is a bit inefficient due to the Web UI constantly calling the database to query for data, but a more efficient setup would require much more development time, something I did not have. Otherwise, the Web UI enables the user to monitor the status of the scanner module as well as edit all current entries.

## MySQL
The setup relies on 4 separate tables to work properly:

### Log
The log tracks all current and previous sign-ins, but it does not have the names of the people in it, rather their ID numbers.

To set it up, simply execute this SQL code to create the table `log`:
```SQL
CREATE TABLE IF NOT EXISTS `log` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `room` int(11) NOT NULL,
  `description` varchar(144) COLLATE utf8_unicode_ci NOT NULL,
  `tin` datetime NOT NULL,
  `tout` datetime NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `signout` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT ;
```
### People
The people table stores associated ID numbers to names.

To set it up, simply execute this SQL code to create the table `people`:
```SQL
CREATE TABLE IF NOT EXISTS `people` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `violations` int(1) NOT NULL DEFAULT '0',
  `violation_date` date DEFAULT NULL,
  `violation_description` varchar(144) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `ia` (`number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT ;
```
### Login
The login table stores the login information for teachers and admins to access the faculty section of the project.

To set it up, simply execute this SQL code to create the table `login`:
```SQL
CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```
### Status
The status table stores flags for various components of the framework such as the scanner module.

To set it up, simply execute this SQL code to create the table `status`:
```SQL
CREATE TABLE IF NOT EXISTS `status` (
  `state` int(1) NOT NULL,
  `new_id` int(1) NOT NULL,
  `last_id_scanned` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```
