import json
from datetime import datetime, timedelta

class Mcbobo():
    def __init__(self, config_array, time):
        self.coupon_id = config_array["coupon_id"]
        self.coupon_name = config_array["coupon_name"]
        self.status = config_array["status"]
        self.day = config_array["day"]
        self.current_datetime = time

    def get_sample_coupon(self, object_id):
        sample_coupon = {
            "coupon_id": self.coupon_id,
            "type": "coupon",
            "status": self.status,
            "object_info": {
                "object_id": object_id, # 451
                "image": {
                    "url": "https://mcdapp1.azureedge.net/"+self.coupon_name+".jpg",
                    "width": 1080,
                    "height": 1920
                },
                "title": "",
                "redeem_end_datetime": (self.current_datetime + timedelta(days=1)).strftime(r'%Y/%m/%d') + " 23:59:59",
            }
        }
        return sample_coupon

    def get_coupon_list(self, coupon_json):
        sample_get_list = {
            "rc": 1,
            "rm": "\u6210\u529f",
            "results": {
                "coupons":"",
                "current_datetime": (self.current_datetime).strftime(r'%Y/%m/%d %H:%M:%S')
            }
        }
        sample_get_list["results"]["coupons"] = coupon_json
        return sample_get_list

    def get_coupon_redeem(self, object_id, status):
        sample_coupon_redeem = {
            "rc": 1,
            "results": {
                "coupon": {
                    "coupon_id": self.coupon_id,
                    "object_info": {
                        "image": {
                            "height": 1920,
                            "width": 1080,
                            "url": "https://mcdapp1.azureedge.net/"+self.coupon_name+".jpg"
                        },
                        "object_id": object_id, #440
                        "redeem_end_datetime": (self.current_datetime + timedelta(days=1)).strftime(r'%Y/%m/%d') + " 23:59:59",
                        "title": ""
                    },
                    "redeem_datetime": (self.current_datetime).strftime(r'%Y/%m/%d %H:%M:%S'),
                    "status": status, # 1 or 2
                    "type": "coupon"
                },
                "current_datetime": (self.current_datetime).strftime(r'%Y/%m/%d %H:%M:%S')
            },
            "rm": "\u6210\u529f"
        }
        return sample_coupon_redeem
