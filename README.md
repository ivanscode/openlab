#OpenLab Project
The files here are the first iteration of the OpenLab framework.

The linux folder contains all of the necessary scripts that run in my case from a Raspberry PI 2. The pinger.py script could be launched in the same fashion as getinfo.py (from bash.bashrc in /etc), but I wanted to make the pinger a service hence the daemon.

The web_ui folder contains all of the necessary files to monitor and update any data to the database. 

Note that the linux scripts communicate with the web_ui's PHP scripts in order to handle the information exchange for the sake of simplicity, so any changes in the location of the files must be reflected in the scripts.

