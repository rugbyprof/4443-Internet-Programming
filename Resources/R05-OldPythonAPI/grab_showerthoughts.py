import requests
import json
import os,sys
import time


#URL of the EarthPorn JSON
url = 'http://www.reddit.com/r/showerthoughts.json' 

def main():
    #initialize the object of the irl
    jobj = requests.get(url)

    #Get the JSON data
    data = json.loads(jobj.json)

    print(data)
    sys.exit()

    #Path for current PWD to save Images
    directory = "./showerthoughts_data/"

    #Check if Directory alredy exists, If not then create a NEW dir
    if not os.path.exists(directory):
        os.makedirs(directory)

    ts = time.time()

    f = open(directory+str(ts)+".json","w")
    f.write(data)

    #Loop through the JSON URLs
    for i in data["data"]["children"]:

        thought = i["data"]["title"]
        print(thought)



if __name__ == "__main__":
    main()