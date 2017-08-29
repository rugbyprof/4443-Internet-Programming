## Assignment 1 - Getting Started
#### Due: Wed Aug 30th by 2:30pm

### Intructors Note:
>
>This is an important step to getting your semester off on the right foot. **It's so important that:**
>- If you don't complete it, drop the course because you will fail.
>- If you complete it late, you will lose 1 letter grade off of your final grade.
>- If you complete it wrong, you will lose 1/2 of one letter grade off of your final grade.
>- Having said that, feel free to ask for help from me at anytime.

## Getting Setup

Setting up your dev environment is going to be mostly up to you. We will discuss this more the first week of this course, 
but for now try and get `python` and `pygame` installed and working on your home machine.

### Editor

You can use whatever editor you like, but if your looking for some direction, I would recommend `Visual Studio Code`. This is NOT
the regular visual studio that is installed in the labs, it is an ascii editor that provides some project management, integration 
with Git and github, syntax highlighting, and will let you run your code within the environment. When I put it like that, it does 
sound a lot like the regular visual studio, but its not. 

![](https://pbs.twimg.com/profile_images/839220246690975744/zlVaaEoG_normal.jpg)
Get it [here](https://code.visualstudio.com/?utm_medium=paid&utm_content=9&utm_campaign=SEM-Branded&wt.mc_id=dx_880722&utm_source=google&WT.srch=1&gclid=CjwKEAjwgtTJBRDRmd6ZtLrGyxwSJAA7Fy-hcWuvGscXTffhilKBJYFUv1hGXNPW__8nDZfuvp0CEhoCqqPw_wcB#alt-downloads).

You may also want to install the following extensions:
- [Python](https://marketplace.visualstudio.com/items?itemName=donjayamanne.python)
- [Code Runner](https://marketplace.visualstudio.com/items?itemName=formulahendry.code-runner)

### Team Chat
---

![](https://d3vv6lp55qjaqc.cloudfront.net/items/1J3A0f36402p2r1K1u0L/slack-2014.png?X-CloudApp-Visitor-Id=1094421)

[Join Slack](https://join.slack.com/t/5443-data-mining/shared_invite/MjMyMzAwODQ2MDAxLTE1MDM5NDc1NzctNjhiMTc2MzI2Mw)

The first step in doing well in any of my courses is establishing a base of communication. Why? Not everything can be done while we are in class. 

Otherwise: 

1. I would lecture
2. give an assignment
3. you would complete said assignment
4. then you would go home
5. communication not necessary

That's so highschool. Assignments will (and should) be challenging. Therefore you will need help from me and your classmates. Since the labs are only open 9-5 with limited help, we need to alleviate that problem. So we will use a chat client built for developers called [Slack](https://slack.com)<sup>2</sup>. You should have gotten an invite already from me. Accept it. If you didn't, ask me for another invite. [Here](https://get.slack.help/hc/en-us/articles/218080037-Getting-started-for-new-users) is a getting started guide to help you use slack. 

#### Slack provides:

- Team chat (class members and myself).
- Code highlighting for snippets so we can share code and read it better.
- File sharing simply by dragging and dropping.
- Private channels so you can discuss things without everyone seeing (even I can't see).
- Polls so we can vote on things (mainly for me).


So, **NO email!** Unless I specifically ask. Slack is your communication conduit for this class.

Here is a link to allow you access to our course Slack channel: https://join.slack.com/msu-cs-spatial-ds/shared_invite/MTkzNzIxODc5NjM4LTE0OTY2ODcxNjYtZmU3MmU3ZjhlNg

Now that we have our communication client set up, we probably need to start getting the actual programming environment ready! We will be doing many things from the command line this semester. Windows is not know for it's 
command line prowess, so we need to give it some assistance.


### Code Repository
---

![](https://d17oy1vhnax1f7.cloudfront.net/items/1J3p2j221s2q2q1G100T/elmah.io.apps.github.hGP6.png)


In addition to our team chat, we need a place where we can store / retreive our code base. A `code base` is a collection of source code that is used to build a particular software system. Where `software system` in the context of class is basically our programs. Github is where you will get all of your starter code (code base) for each of your assignments, and it's also where you will store all of your assignments when completed. 


#### What is Git?

>Git is a distributed revision control and source code management (SCM) system with an emphasis on speed,data integrity,and support for distributed, non-linear workflows. Git was initially designed and developed by Linus Torvalds for Linux kernel development in 2005, and has since become the most widely adopted version control system for software development.<br><br>
As with most other distributed revision control systems, and unlike most client–server systems, every Git working directory is a full-fledged repository with complete history and full version-tracking capabilities, independent of network access or a central server. Like the Linux kernel, Git is free software distributed under the terms of the GNU General Public License  [[1]](http://en.wikipedia.org/wiki/Git_(software)).

`Git != Github`

`Github` is a social site that allows programmers to share code with other programmers. It's also a great place to discover projects to work on, discover code to use in your own projects, and a great place to start a portfolio. Whereas `Git` is simply the revision control system that can be installed anywhere, and only used locally if that's the users choice. 

#### Why github for this course?

We will be using github this semester as a means of communicating, storing documents (assignments and programs), as well as 
a means to push your files to a central repository. So if your using a lab or personal machine, there's a centralized location that we both have access to.

---

#### Create a Github account. 
- When you create a Github account, you must choose a `username`. 
- This is very important to remember, because you will update the class roster with this username so I know where to find all your assignments.
- Create a repository named:
    - `DataMining-yourlastname`
    - replace the `yourlastname` with your last name to make it unique.
- Check the box that says: "Add a README.md file"

#### Edit the README.md 

- Edit the readme file on github and place your contact information inside along with a picture of YOU. NOT an avatar. NOT a thumbnail. But an easily identifiable picture of you.
- Your readme should include:
    - An image of you
    - Your first and last name
    - Your email address
    - Your website (if you have one)

### Update Class Roster
---
![](https://d3vv6lp55qjaqc.cloudfront.net/items/220B0V0H3c041K2p251Z/google-sheets-16.png?X-CloudApp-Visitor-Id=1094421) [Class Roster](https://docs.google.com/spreadsheets/d/1Aee_kNGtBTf7KNVqZ-JldKoIxh-zfgW1euI0UHf678s/edit?usp=sharing)
#### Update the Class Roster:

- Here is a link to our class roster on google docs: ![](https://d3vv6lp55qjaqc.cloudfront.net/items/220B0V0H3c041K2p251Z/google-sheets-16.png?X-CloudApp-Visitor-Id=1094421) [Class Roster](https://docs.google.com/spreadsheets/d/1Aee_kNGtBTf7KNVqZ-JldKoIxh-zfgW1euI0UHf678s/edit?usp=sharing)

- Update the roster by adding your information to it. 

Add:

1. Your name (last, first)
2. Your email
3. Your github username<sup>*</sup>
4. A link to your Spatial-DS repository<sup>*</sup>

*Your repository name and your github username are NOT the same thing.

---

#### Rules for emailing me:

Every email must have a minimum of two items included:

- The course number and title in the subject:
    - `Spatial DS`
- Your name

I can't promise an answer if you don't provide those two pieces of information.


Sources:
- <sub>[1] http://en.wikipedia.org/wiki/Git_(software)</sub>
- <sub>[2] https://slack.com</sub>
- <sub>[3] http://www.openbookproject.net/courses/webappdev/units/softwaredesign/resources/install_python_win7.html </sub>
- <sub>[4] https://code.visualstudio.com/</sub>
- <sub>[5] https://git-for-windows.github.io/</sub>
- <sub>[6] https://www.python.org/</sub>
