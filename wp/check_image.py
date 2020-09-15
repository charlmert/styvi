#!/usr/local/bin/python3

import urllib.parse
#print(urllib.parse.unquote('%20%51'))

with (open('eb6dcdd7.ico', 'r')) as fp:
    print(urllib.parse.unquote('\n'.join(fp.readlines())))
