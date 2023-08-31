# This project is not ready to use!

WebBotDC will enable you to run your own discord bot on a website using Docker. There you can manage your bot etc.

> This project is open source and 100% free to use.

## how to install
### Ubuntu 20.04 using nginx:
This installation assumes that you already configured a domain with nginx.
1. Make sure you have nodejs `v16.19.0` and npm installed on your system. If that is not the case?

Instalation nodejs:
```
sudo apt update
cd ~
curl -sL https://deb.nodesource.com/setup_16.x -o /tmp/nodesource_setup.sh
sudo bash /tmp/nodesource_setup.sh
sudo apt install nodejs
```
Instalation npm:
```
sudo apt install npm
```

2. Download the files by releases. Make sure its unziped. Paste the files as a normal website in the `/var/www/<your_website>`.

3. The discord bot files use discord.js. The node_modules of discord.js are not installed so you must do that.
Make sure you are in de directory `/var/www/<your_website>/botData`.
```
npm install discord.js
```

4. Update permissions of your `/var/www/<your_website>`.
```
sudo chmod -R 755 /var/www/<your_website>
sudo chown -R www-data:www-data /var/www/<your_website>
```
