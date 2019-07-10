# Primary file
import requests
from random import randint, shuffle
from time import sleep
import datetime,time 
import sys
#sys.path.append("/usr/local/lib/python2.7/site-packages/bs4")
import bs4
from bs4 import BeautifulSoup
import json
import pprint as pp
import glob
import collections
from pymongo import MongoClient
from os import chdir

def get_candy(key):
    products = []
    try:
        url = "https://www.candystore.com/candy-types/%s/" % (key)
        r = requests.get(url)
    except (urllib2.HTTPError, e):
        #print(e.code)
        pass
    except (urllib2.URLError, e):
        #print(e.args)
        pass
    else:
        soup = BeautifulSoup(r.text,'html.parser')
        prods = soup.findAll("li", { "class" : "item" })
        
        for prod in prods:
            pdict = {'type':key}
            for p in prod:
                if type(p) == bs4.element.NavigableString:
                    pass
                if type(p) == bs4.element.Tag:
                    if p['class'][0] == 'image-wrap':
                        print(p.a['title'])
                        pdict['title'] = p.a['title']
                        print(p.img['src'])
                        pdict['img'] = p.img['src']
                    if p['class'][0] == 'product-info':
                        for d in p:
                            if type(d) != bs4.element.NavigableString:
                                myspan = d.find("span", { "class" : "price" })
                                if myspan:
                                    print(myspan.text)
                                    pdict['price'] = myspan.text
            products.append(pdict)
    return products

types = ['individually-wrapped',
'unwrapped-loose',
'gummy',
'old-fashioned',
'chocolate',
'salt-water-taffy',
'lollipops-suckers',
'hard-candy',
'bagged-candy',
'candy-bars',
'caramel',
'cinnamon-red-hot',
'coated',
'foil-wrapped',
'gum-bubblegum',
'jawbreakers',
'jelly-beans',
'jewelry-edible',
'kosher',
'licorice',
'liquid-gel',
'marshmallow',
'mini-sized',
'mints',
'novelty',
'nuts',
'powder',
'retro',
'rock-candy',
'scoops-containers-displays',
'soft',
'sour',
'sports-candy',
'sugar-free',
'theater-king-size',
'toppings-sprinkles',
'toys',
'wax',
'fundraising',
'vending-machines']

all_products = []
for t in types:
    print(t)
    all_products.extend(get_candy(t))
    sleep(.8)
    print(len(all_products))
    f = open('candy.json','w')
    f.write(json.dumps(all_products))
    f.close()       


