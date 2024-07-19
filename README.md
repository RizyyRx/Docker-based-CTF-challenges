# Dockerized Vulnerable Web Application with CTF challenges
This is a vulnerable web application which will run entirely inside docker container
It comes with CTF challenges where flags are hidden inside every vulnerabilities.

You dont have to do any complex setups and it can run on any environment that supports docker

# Setup and Run Instructions
## Docker Download and Install
https://docs.docker.com/get-docker/
* You can get docker in the above link. It's available for Windows, Linux and MAC
* After installing docker, make sure to make create an account in https://hub.docker.com/
* It helps you to pull images from repositories
## Docker run
* Make sure docker is running in background. In windows and you can launch the desktop application
* In Linux, use this command to start docker -> sudo systemctl start docker
* use this command to verify docker running -> docker --version
* Docker commands are same on all platforms
## source code download
https://github.com/RizyyRx/Docker-based-CTF-challenges
* If you have git, you can clone the repository
* You can also download the source code as zip from the repository and extract them
## Docker setup
* Now launch up a terminal and change your directory to the source-code directory
* If you list the contents using "ls" in Linux and MAC or "dir" in windows, you must see 3 contents, build directory, docker-compose file and Readme file
* If you have trouble on changing directory, refer online for simple tutorials
* Now you have to login to docker hub from terminal
* Once you are on correct directory, type -> docker login
* you will be presented with userinput for username and passwords, use the credentials you used for registering on https://hub.docker.com/
* If done right, you will get "Login Succeeded" output
## Start container
* Type this command to start the docker container -> docker compose up --build
* It will take some time to pull the images and to start
* To verify the initialization has done, you may see "ready for connections" message from mysql and the output will stop
## Visiting the website
* Once docker container has been started, you can open up your browser and type "localhost" on the url bar
* You will be presented with CTF Arena website.
* You can see challenges, hints and a button to visit the vulnerable website
* There you have to find the vulnerabilities and sumbit the flags on CTF Arena website



