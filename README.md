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
    1. [Setup](https://github.com/ivanscode/openlab#web-ui)
    2. [Running](https://github.com/ivanscode/openlab#web-ui)

## Linux
### Setup
In the case of this project, I used a Raspberry PI 2 running Raspbian Jessie. Any Linux machine with internet connectivity and a USB port or two will be able to support the framework. The project utilizes a [RFIdeas pcProx Plus](https://www.rfideas.com/products/readers/pcprox-plus-enroll) module to read a RFID-enabled card. Because of it, I needed to pull information directly from it rather than from `TTY0` or something along the lines of that. Here, the `evdev` module helps read the specific input. Make sure to edit the `getinfo.py` file to match the device you're monitoring. You can find your attached inputs in `/dev/input/by-id/`. 

**Note:** `evdev` is a pythin library easily found on the internet. Simply install the library and make sure the import on the `getinfo.py` file is right. 

As an experiment, I setup the pinger script as a service and used a custom Daemon to run it in the background, so it is included with the framework.

Once everything is in order, simply edit the `/etc/bash.bashrc` file to run the scripts upon login automatically. 

**Note:** depending on the environment, automatic login varies across the distros, so I am not including instructions on how to set that up. Similarly, the `bash.bashrc` file is included on Raspbian Jessie, but may not be included on other distros.

### Running
If everything was setup correctly, and automatic login was enabled, the module with the scanner attached should be able to read and send data to the database automatically.

## Web UI
### Setup
To connect to your own database, simply edit the file `/php/dbconnect.php`.

### Running
