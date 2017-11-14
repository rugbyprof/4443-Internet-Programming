Candy Store
===========

### Part 1 - Data Scraping
***Due: TBD

## Requirements

Use the given json file to grab further information to help stock our fake online candy store. More specifically:
- Copy the small images to your local server
- Copy large images to your local server
- Store the packaging size / type with each json object
- Add each product to a mongo database collection

#### Grab Images
Given a file containing over 1000 products in json format similar to the snippet below, write a script in either python or php to obtain all the images from the `candystore.com` server and save them locally.  

```json
    {
        "price": "$109.99",
        "type": "chocolate",
        "img": "https://media.candystore.com/catalog/product/ca ... /s/i/silver-chocolate-foil-hearts-bulk_1.jpg",
        "title": "Silver Foil Hearts - 10lb Bulk"
    }
```

#### Grab Large Images

Looking at the two links below, you can see that with a couple of changes, you can also grab a larger version of the one thats listed in the json file. 

```
https://media.candystore.com/catalog/product/cache/1/small_image/200x/9df78eab33525d08d6e5fb8d27136e95/h/e/hershey-mini-bars-small.jpg
https://media.candystore.com/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/h/e/hershey-mini-bars_1.jpg
```

#### Packaging

The title of our candy gives a little extra information. In the example above we see `10lb Bulk` as its size or packaging type. You will also see values like `120ct` or similar. Explode the title on the `-` and save the contents to the right of the `-` as `packaging` back in the json object and re-save the `title` key without the packaging info.

#### Mongo

Create a database called `candy_shop` and a collection called `candy_products` and store each of your knewly processed candy objects there.
