#!/usr/bin/python
# coding=utf-8
import proxy
import threading
import sys
import time
import json
import threading
import flask
from flask import jsonify, request, redirect, url_for
from datetime import datetime, timedelta

app = flask.Flask(__name__)
app.config["DEBUG"] = True

def read_json(name):
    with open(name+'.json') as json_file:
        data = json.load(json_file)
    return data

def coupon_get_detail_json(request_json_ID):
    with open('./json/config.json') as f:
        config = json.load(f)
    with open('./json/get_detail.json', 'r') as f:
        get_detail = json.loads(f.read())
    image = "https://"+config["images"]["address"]+"/" + config["coupon_info"][str(request_json_ID)]["coupon_ID"] + ".jpg"
    get_detail["results"]["coupon"]["object_info"]["image"]["url"] = image
    with open('./de_json/get_detail.json', 'w') as f:
        f.write(json.dumps(get_detail))
    return get_detail

def coupon_redeem(request_json_ID):
    now = datetime.now()
    with open('./json/config.json') as f:
        config = json.load(f)
    with open('./de_json/get_detail.json', 'r') as f:
        get_detail = json.loads(f.read())
    get_detail["results"]["coupon"]["status"] = 2
    get_detail["results"]["coupon"]["object_info"]["redeem_end_datetime"] = (now + timedelta(days=1)).strftime(r'%Y/%m/%d') + " 23:59:59" 
    get_detail["results"]["coupon"]["redeem_datetime"] = (now).strftime(r'%Y/%m/%d %H:%M:%S')
    get_detail["results"]["current_datetime"] = (now).strftime(r'%Y/%m/%d %H:%M:%S')

    config["coupon_info"][str(get_detail["results"]["coupon"]["coupon_id"])]["status"] = 2

    return get_detail

# ==================================================
# Replacer
# ==================================================

def Replacer():
    with open('./json/config.json') as f:
        config = json.load(f)
    coupon_len = int(len(config["coupon_info"]))-1
    now = datetime.now()
    tmp = []
    with open('./json/coupon-get_list.json', 'r') as f:
        get_list = json.loads(f.read())
    for x in range(coupon_len):
        with open('./json/coupons_sample.json', 'r') as f:
            coupons_sample = json.loads(f.read())
        days = config["coupon_info"][str(x+1)]["day"]
        first_datetime = (now + timedelta(days=days)).strftime(r'%Y/%m/%d') + " 23:59:59"
        coupons_sample["coupon_id"] = x+1
        coupons_sample["status"] = config["coupon_info"][str(x+1)]["status"]
        coupons_sample["object_info"]["image"]["url"] = "https://"+config["images"]["address"]+"/" + config["coupon_info"][str(x+1)]["coupon_ID"] + ".jpg"
        coupons_sample["object_info"]["redeem_end_datetime"] = first_datetime
        coupons_sample["object_info"]["object_id"] = x+1
        tmp.append(coupons_sample)

    get_list["results"]["coupons"] = tmp 
    get_list["results"]["current_datetime"] = (now).strftime(r'%Y/%m/%d %H:%M:%S')

    with open('./de_json/get_list.json', 'w') as f:
        f.write(json.dumps(get_list))

# ==================================================
# API post 
# ==================================================

@app.route('/config/get_list', methods=['post'])
def config_get_list():
    return jsonify(read_json('./json/config-get_list'))

@app.route('/coupon/get_list', methods=['post'])
def coupon_get_list():
    Replacer()
    return jsonify(read_json('./de_json/get_list'))

@app.route('/sticker/get_list', methods=['post'])
def sticker_get_detail():
    return jsonify(read_json('./json/sticker_get_list'))

@app.route('/coupon/get_detail', methods=['post'])
def get_detail():
    return jsonify(coupon_get_detail_json(str(request.json["coupon_id"])))

@app.route('/coupon/redeem', methods=['post'])
def redeem():
    return jsonify(coupon_redeem(str(request.json["coupon_id"])))

@app.route('/other_coupon/get_list', methods=['post'])
def other_coupon():
    return jsonify(read_json('./json/other_coupon-get_list'))

@app.route('/weather/get_status', methods=['post'])
def weather_get_status():
    return jsonify(read_json('./json/get_status'))
    #return redirect(url_for('https://api2.mcddailyapp.com/weather/get_status'))

# ==================================================
# main
# ==================================================

def main():
    try:
        Replacer()
        app.run('127.0.0.1', debug=True, port=443, ssl_context=('./ssl/server.crt', './ssl/server.key')) 
    except Exception:
        print("Exception !")

def proxy＿main():  
    try:
        proxy.main(['--hostname', '10.146.0.2','--port', '7896'])
    except Exception:
        print("Exception !")

if __name__ == '__main__':
    threads = threading.Thread(target = proxy＿main)
    threads.start()
    main()

