#!/usr/bin/python
# coding=utf-8
import API
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

def coupon_redeem(request_json_ID, status):
    with open('/var/www/html/image/output.json') as f:
        config = json.load(f)
    data = API.Mcbobo(config["coupon_info"][str(request_json_ID)],datetime.now())
    return data.get_coupon_redeem(440, status)

def get_list():
    with open('/var/www/html/image/output.json') as f:
        config = json.load(f)
    tmp = []
    for x in range(1,len(config["coupon_info"])+1):
        data = API.Mcbobo(config["coupon_info"][str(x)],datetime.now())
        tmp.append(data.get_sample_coupon(451))
    return data.get_coupon_list(tmp)

# ==================================================
# API post
# ==================================================

@app.route('/config/get_list', methods=['post'])
def config_get_list():
    return jsonify(read_json('./json/config-get_list'))

@app.route('/coupon/get_list', methods=['post'])
def coupon_get_list():
    return jsonify(get_list())

@app.route('/sticker/get_list', methods=['post'])
def sticker_get_detail():
    return jsonify(read_json('./json/sticker_get_list'))

@app.route('/coupon/get_detail', methods=['post'])
def get_detail():
    return jsonify(coupon_redeem(request.json["coupon_id"],1))

@app.route('/coupon/redeem', methods=['post'])
def redeem():
    return jsonify(coupon_redeem(request.json["coupon_id"], 2))

@app.route('/other_coupon/get_list', methods=['post'])
def other_coupon():
    return jsonify(read_json('./json/other_coupon-get_list'))

@app.route('/weather/get_status', methods=['post'])
def weather_get_status():
    return jsonify(read_json('./json/get_status'))

# ==================================================
# main
# ==================================================

def main():
    get_list()
    app.run('127.0.0.1', debug=True, port=443, ssl_context=('./ssl/server.crt', './ssl/server.key')) 

def proxy_main():
    try:
        proxy.main(['--hostname', '10.140.0.3','--port', '7896','--basic-auth','s321790:s22648949','--client-recvbuf-size','500','--server-recvbuf-size','500'])
    except Exception:
        print("Exception !")

if __name__ == '__main__':
    threads = threading.Thread(target = proxy_main)
    threads.start()
    main()

