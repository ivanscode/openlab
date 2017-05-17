# OpenLab Project

The files here are the _first_ iteration of the OpenLab framework.

The linux folder contains all the necessary scripts to gather information from the RFID-enabled card and pass that information to the database along with the status of the linux module itself (in my case, a Raspberry PI 2 running Raspbian Jessie). The scripts are automatically launched from the `/etc/bash.bashrc` file when the PI logs in. The pinger is launched as a service, and the `getinfo.py` script is launched as is.

**Note:** the `getinfo.py` script relies on `evdev`, a python library not included with Raspbian.

The web_ui folder contains all the necessary files to monitor and manage some elements of a MySQL database. Take note that the PI communicates with the web_ui and its PHP scripts in order to update values to the database.
