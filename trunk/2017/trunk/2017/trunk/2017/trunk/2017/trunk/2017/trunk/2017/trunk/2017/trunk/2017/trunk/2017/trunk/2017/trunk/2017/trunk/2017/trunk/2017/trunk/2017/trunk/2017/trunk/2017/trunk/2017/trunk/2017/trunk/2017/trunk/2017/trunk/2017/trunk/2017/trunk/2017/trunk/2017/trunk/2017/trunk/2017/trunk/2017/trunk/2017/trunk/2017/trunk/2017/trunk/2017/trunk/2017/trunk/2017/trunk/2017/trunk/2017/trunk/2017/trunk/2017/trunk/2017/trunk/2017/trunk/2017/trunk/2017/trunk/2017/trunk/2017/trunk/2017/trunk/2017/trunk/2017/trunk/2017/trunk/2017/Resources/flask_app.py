from flask import Flask
app = Flask(__name__)

"""
$ export FLASK_APP=main.py
$ export FLASK_DEBUG=1
$ python -m flask run --host 0.0.0.0
"""

@app.route('/')
def hello():
    return "Hello World! This is aweseme!!"


@app.route('/<name>')
def hello_name(name):
    return "Hello {}!".format(name)

if __name__ == '__main__':
    app.run(host='0.0.0.0')
