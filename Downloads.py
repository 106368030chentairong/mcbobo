import os,sys
import urllib2

lable = ["G","S","Q"]
other = ["","_1","_2"]

if sys.argv[1] == "1":
    for l in lable:
        for i in range(300):
            for x in other:
                url = "https://mcdapp1.azureedge.net/"
                name = "P_" + l + str(i).zfill(3) + x
                try: 
                    filedata = urllib2.urlopen(url + name + ".jpg")
                    datatowrite = filedata.read()
                    with open('./image/'+name+".jpg", 'wb') as f:
                        f.write(datatowrite)
                    print('Beginning file download with urll... : ', url + name)
                except Exception:
                    print('NULL : ', url + name)

lable_2 = ["Q","S","Q"]
if sys.argv[1] == "2":
    for l in lable_2:
        try:
            os.makedirs('image_'+l)
        except Exception:
            print('image_'+ l )
        for x in range(1,6):
            for y in range(50):
                amount = 0
                for z in range(99):
                    url = "https://mcdapp1.azureedge.net/"
                    name = "P_"+ l + str(x) + (str(y)).zfill(2) + (str(z)).zfill(2)
                    try: 
                        filedata = urllib2.urlopen(url + name + ".jpg")
                        datatowrite = filedata.read()
                        with open('./'+'image_'+l+'/'+name+".jpg", 'wb') as f:
                            f.write(datatowrite)
                        print('Beginning file download with urll... : ', url + name)
                    except Exception:
                        amount +=1 
                        print('NULL : ', url + name)
                    if amount >= 3:
                        break
