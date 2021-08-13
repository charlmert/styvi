## Standard location for python on debian and other linuxes

according to python docs:
/usr/local/bin/python3

(debian)
/usr/bin/python3

For dynamic shebang

```
#!/usr/bin/env python3
```

## The sys.argv variable

The length of the list is at least one; when no script and no arguments are given, sys.argv[0] is an empty string. When the script name is given as '-' (meaning standard input), sys.argv[0] is set to '-'. When -c command is used, sys.argv[0] is set to '-c'. When -m module is used, sys.argv[0] is set to the full name of the located module. Options found after -c command or -m module are not consumed by the Python interpreter’s option processing but left in sys.argv for the command or module to handle.

So the following module (remember __main__.py)
./mod1/__main__.py
```python
def main():
    print('in main of mod 1')

if __name__ == '__main__':
    main()
```

Can be run like this
```bash
python3 -m mod1
```

The Python Enhancement Proposal which introduced this:
https://www.python.org/dev/peps/pep-0338/

## Interactive mode

When commands are read from a tty, the interpreter is said to be in interactive mode

In this mode it prompts for the next command with the primary prompt (usually three greater-than signs (>>>):

```bash
# primary prompt
>>>
```

for continuation lines it prompts with the secondary prompt, by default three dots (...)

```bash
# secondary prompt
...
```

```bash
$ python3.9
Python 3.9 (default, June 4 2019, 09:25:04)
[GCC 4.8.2] on linux
Type "help", "copyright", "credits" or "license" for more information.
>>> the_world_is_flat = True
>>> if the_world_is_flat:
...     print("Be careful not to fall off!")
...
Be careful not to fall off!
```

Note that a secondary prompt on a line by itself in an example means you must type a blank line; this is used to end a multi-line command.

## Source code encoding

By default, Python source files are treated as encoded in UTF-8. In that encoding, characters of most languages in the world can be used simultaneously in string literals, identifiers and comments — although the standard library only uses ASCII characters for identifiers, a convention that any portable code should follow. To display all these characters properly, your editor must recognize that the file is UTF-8, and it must use a font that supports all the characters in the file.

Please note the standard library only uses ASCII chars

To declare an encoding other than the default one, a special comment line should be added as the first line of the file. The syntax is as follows:

where encoding is one of the valid codecs supported by Python.

https://docs.python.org/3/library/codecs.html#module-codecs

```bash
# -*- coding: encoding -*-
```

One exception to the first line rule is when the source code starts with a UNIX “shebang” line. In this case, the encoding declaration should be added as the second line of the file. For example:

```bash
#!/usr/bin/env python3
# -*- coding: cp1252 -*-
```

