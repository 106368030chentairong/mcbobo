# Welcom to McBoBo

## What is this about?
每次都抽不到麥當勞報報的優惠卷？該是時候用原版麥當勞報報來選擇自己想要的優惠卷，使用原版ＡＰＰ不管重新下載或是沒有帳號都可以經由proxy代理方式替換掉官方伺服器，讓原版ＡＰＰ收到你所設定的優惠卷。

![image](./demo.png)

## update 
```
sudo apt-get update  
sudo apt-get upgrade  
sudo apt-get install python3-pip  
```
## python proxy install 
```
git clone https://github.com/abhinavsingh/proxy.py.git  
cd proxy.py  
sudo pip3 install -r requirements.txt  
sudo pip3 install -r requirements-testing.txt  
sudo setup.py install   
python -m proxy  
```
## Proxy Server 
``` 
source venv/bin/activatev  
python -m proxy --hostname [youhostlanip]  
```
## Ubuntu sys hostname add
#### add to /etc/hosts
```
sudo nano /etc/hosts 
```
#### add domain name
```
127.0.0.1 api1.mcddailyapp.com  
127.0.0.1 api2.mcddailyapp.com
```

## Install apache2
```
sudo apt-get install apache2  
sudo chmod 777 * -R /var/www/html  
sudo chmod 777 * -R /var/www/html/image/output.json  
```
## Install PHP
```
sudo apt install php libapache2-mod-php php-mysql  
sudo apt install php-cli php-curl php-mbstring php-gd php-json php-xml php-pear
```

## Restart apache2
```
sudo systemctl restart apache2
```

## Background main process
```
nohup sudo python3 main_v2.py >&log& 
```

```
tail -f log
```
