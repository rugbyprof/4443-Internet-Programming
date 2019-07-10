## Existing Scripts


#### meme-creator.py

In the scripts folder there is a python script that will generate a meme. It uses the PIL library, and it
doesn't provide a huge amount of functionality, but it will get the job done.

- ***Command:*** `python meme.py -t "If your gonna eat my froot loops" -b "Your gonna pay the consequences" -f ./images -i firestarter.jpg`

```sh
    parser.add_argument('-t', action="store", dest="top", help='The top text in the meme',required=True)
    parser.add_argument('-b', action="store", dest="bottom", help='The Bottom text in the meme.')
    parser.add_argument('-i', action="store", dest="image", help='The image name.')
    parser.add_argument('-f', action="store", dest="folder", help='Folder to write output to.')
```

The functionality of `meme.py`'s meme generation capabilities are limited. Here are things that it does:
- Allows you to create a meme on an existing image, or will create a black canvas 
- Allows you to place text at the top of your meme and optionally at the bottom
- Will save the output image to a specified folder 

What it doesn't do:
- Doesn't allow for easy font size adjusting.
- Doesn't auto wrap text.
- Doesn't allow for configurable input folder. 

#### meme-api.py

- Basic flask API. See actual file for more details. [meme_api.py](./html/scripts/meme_api.py) 

#### compare-image.py

Does a rudimentary check to see if two images are exactly the same. It counts the number of pixels different. 

- ***Command:*** `python compare_image.py path/image1.jpg path/image2.jpg`


#### seed_db.py

This script will seed your `memes_db`. It creates the following collections and adds some documents as well:
- users
- images
- memes

- ***Command:*** `python seed_db.py`
