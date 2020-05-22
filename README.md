# UBUNTU 18.04
## update 
sudo apt-get update
sudo apt-get upgrade
sudo apt-get install python3-pip

## python proxy install 
git clone https://github.com/abhinavsingh/proxy.py.git
cd proxy.py
sudo pip3 install -r requirements.txt
sudo pip3 install -r requirements-testing.txt
sudo setup.py install 
python -m proxy

## Proxy Server
source venv/bin/activatev
python -m proxy --hostname 192.168.0.196

## Ubuntu sys hosts
sudo nano /etc/hosts 
### add
127.0.0.1 api1.mcddailyapp.com
127.0.0.1 api2.mcddailyapp.com

## install apache2
sudo apt-get install apache2
sudo chmod 777 * -R /var/www/html
sudo chmod 777 * -R /var/www/html/image/output.json 
