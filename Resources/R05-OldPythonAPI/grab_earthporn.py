import requests
import json
import os,sys
import time
import pprint as pp


"""
Based on: https://github.com/aloksteel/Earthporn
"""

#URL of the EarthPorn JSON
url = 'http://www.reddit.com/r/earthporn.json' 

def main():
    #initialize the object of the irl
    # jobj = requests.get(url)
    # data = jobj.json 

    #Get the JSON data
    data = json.loads(open('earthporn.json','r').read())

    #Counter for counting the number of links
    count = 0

    #Path for current PWD to save Images
    directory = "./earthporn_images/"

    #Check if Directory alredy exists, If not then create a NEW dir
    if not os.path.exists(directory):
        os.makedirs(directory)

    #Loop through the JSON URLs
    for i in data["data"]["children"]:

        imurl = i["data"]["url"]

        file_name = i["data"]["title"].replace(' ','_')
        print(imurl)
        print(file_name)

        if not imurl[-4:] == '.jpg':
            imurl += '.jpg'

        #Request the Full URL.
        req = requests.get(imurl)
 
        #Create a new image file and write to it
        fp = open(directory + file_name+".jpg","wb")
        fp.write(req.content)
        fp.close()
        #time.sleep(.05)

        count = count + 1

    print(count)


if __name__ == "__main__":
    main()