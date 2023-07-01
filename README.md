WORKAROUD
The easiest way to work around the issue is to use a local webserver.
For example, suppose to have a file called /tmp/pyscript-test/foo.html which uses <py-env> paths: ....
If you open foo.html inside chrome, it will not work.
To start a local webserver you can do the following:

$ cd /tmp/pyscript-test/
$ python3 -m http.server
Serving HTTP on 0.0.0.0 port 8000 (http://0.0.0.0:8000/) ...
Now you can open http://0.0.0.0:8000 and select foo.html from there, and it should work.
