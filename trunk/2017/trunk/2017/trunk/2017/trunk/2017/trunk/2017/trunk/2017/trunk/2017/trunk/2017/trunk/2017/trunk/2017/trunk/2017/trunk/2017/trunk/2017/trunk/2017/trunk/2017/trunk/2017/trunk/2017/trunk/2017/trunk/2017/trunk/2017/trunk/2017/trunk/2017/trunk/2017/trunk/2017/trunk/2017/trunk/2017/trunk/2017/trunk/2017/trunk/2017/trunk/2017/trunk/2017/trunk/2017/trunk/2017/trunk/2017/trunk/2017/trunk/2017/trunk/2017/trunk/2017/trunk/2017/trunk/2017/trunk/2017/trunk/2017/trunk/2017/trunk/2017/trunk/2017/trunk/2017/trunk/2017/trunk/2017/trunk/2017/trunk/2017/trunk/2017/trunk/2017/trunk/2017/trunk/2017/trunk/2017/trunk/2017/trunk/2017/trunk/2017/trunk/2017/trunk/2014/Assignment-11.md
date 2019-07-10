Still working on it.

### Simple Music Stripping

This isn't exactly what we discussed in class, but I was working on something that reminded me of this, and since it's really easy, I thought I would describe it.

### Basic Idea
- Find a video on youtube that has a music track you want.
- Strip the music off the video to add to your playlist.

I know there are websites that do this already, but ... what if you wanted an hour long concert or remix? Have fun waiting on that!

### Prelims

- Install youtube-dl (for youtube download) on your server
- Install ffmpeg (video encoding / decoding software) on your server

```
sudo apt-get install youtube-dl
sudo apt-get install ffmpeg
```

I just read that ffmpeg isn't available in the ubuntu repository, BUT you still need to know that it is the primary audio / video encoding library that is being used in many software packages. Below is an alternative, that supposedly uses the same libraries:

```
sudo apt-get install libav-tools
```

### Test

Go to Youtube and find a video with a song or soundtrack that you like and copy the url. Below is the link to 'Gangnam Style' (I couldn't resist).

```
youtube-dl https://www.youtube.com/watch?v=9bZkp7q19f0
ffmpeg -i Best_of_House_Music.mp4 -ab 160k -ac 2 -ar 44100 -vn Best_of_House_Music.mp3

https://github.com/rg3/youtube-dl/
