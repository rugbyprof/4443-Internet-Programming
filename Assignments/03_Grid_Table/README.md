## Assignment 3 - Using grid and stuff
#### Due: Monday July 15th by 10:10am

### Overview

Read the following overview about CSS `Grid`: https://css-tricks.com/snippets/css/complete-guide-grid/ and apply that to the code we discussed in class from: http://terrywgriffin.com/lessons/lesson_11/. Instead of using the table to display the colors from our JSON data, use the lessons learned from the `Grid` tutorial to create a layout that displays the colors in something other than a table with one color per row. 

### Warning
Since everyones pages are basically publically accessible, I will be looking to see if there is any stealing of someone elses work! This assignment is complex enough to make it a low probability that 2 solutions will be similar.

### Possibility

- Display your color data in the grid squares themselves like below:
<center><img src="http://cs.mwsu.edu/~griffin/zcloud/zcloud-files/color_card2.png"></center>

- Notice that the text is light or dark depending on the color. I will post some help on how to check for that.

### Color Contrast

Here is a function that I snagged from: https://stackoverflow.com/questions/11867545/change-text-color-based-on-brightness-of-the-covered-background-area

```js
/**
* Input: Some string hex value: #AA00FF
* Returns: string [black,white]
* 
* You could alter the function to return: #000000 or #FFFFFF
function getContrastYIQ(hexcolor){
    hexcolor = hexcolor.replace("#", "");
    var r = parseInt(hexcolor.substr(0,2),16);
    var g = parseInt(hexcolor.substr(2,2),16);
    var b = parseInt(hexcolor.substr(4,2),16);
    var yiq = ((r*299)+(g*587)+(b*114))/1000;
    return (yiq >= 128) ? 'black' : 'white';
}
```

### Deliverables

- Make sure all files end up on your github repository as well as your server.
- If I ask you to name a file a certian way, I expect it to be named exactly as asked.
- Create a folder called `Assignments` in your github repo. All of your assigments will go in this folder when being pushed to github. 
- Due to the nature of this class you will have files in two places. So I would work on your server, then push the completed files to github when you are done.
- Create a folder called `assignment_03`. This will be located at `/var/www/html` and in your github assignments folder.
- I should be able to see your grid creation by going to: `http://your.ip.address/assignment_03`
- For now place any additional `CSS` or `javascript` directly in the `index.html` file and not as an external resource. 
- Remember to comment your code! In fact place comments around any additions you make to the `index` file. 
