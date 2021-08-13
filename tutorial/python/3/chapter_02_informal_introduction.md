## Comments in python

Comments in Python start with the hash character, #, and extend to the end of the physical line

```python
#
```

Comment examples

```bash
# this is the first comment
spam = 1  # and this is the second comment
          # ... and now a third!
text = "# This is not a comment because it's inside quotes."
```

## Numbers

Division always returns a floating point number

```bash
>>> 2 + 2
4
>>> 50 - 5*6
20
>>> (50 - 5*6) / 4
5.0
>>> 8 / 5  # division always returns a floating point number unless // is used
1.6
```

The integer numbers (e.g. 2, 4, 20) have type int, the ones with a fractional part (e.g. 5.0, 1.6) have type float.

Division (/) always returns a float. To do floor division and get an integer result (discarding any fractional result) you can use the (//) operator; to calculate the remainder you can use %

```bash
>>> 17 / 3  # classic division returns a float
5.666666666666667
>>>
>>> 17 // 3  # floor division discards the fractional part
5
>>> 17 % 3  # the % operator returns the remainder of the division
2
>>> 5 * 3 + 2  # floored quotient * divisor + remainder
17
```

With Python, it is possible to use the ** operator to calculate powers

```bash
>>> 5 ** 2  # 5 squared
25
>>> 2 ** 7  # 2 to the power of 7
128
```

In interactive mode, the last printed expression is assigned to the variable _.

```bash
>>> tax = 12.5 / 100
>>> price = 100.50
>>> price * tax
12.5625
>>> price + _
113.0625
>>> round(_, 2)
113.06
```

In addition to int and float, Python supports other types of numbers, such as Decimal and Fraction. Python also has built-in support for complex numbers, and uses the j or J suffix to indicate the imaginary part (e.g. 3+5j).

# Operators 

| Operation       | Result                                                                      | Notes  | Full documentation |
|-----------------|-----------------------------------------------------------------------------|--------|--------------------|
| x + y           | sum of x and y                                                              |        |                    |
| x - y           | difference of x and y                                                       |        |                    |
| x * y           | product of x and y                                                          |        |                    |
| x / y           | quotient of x and y                                                         |        |                    |
| x // y          | floored quotient of x and
y                                                 | (1)    |                    |
| x % y           | remainder of x / y                                                          | (2)    |                    |
| -x              | x negated                                                                   |        |                    |
| +x              | x unchanged                                                                 |        |                    |
| abs(x)          | absolute value or magnitude of
x                                            |        | abs()              |
| int(x)          | x converted to integer                                                      | (3)(6) | int()              |
| float(x)        | x converted to floating point                                               | (4)(6) | float()            |
| complex(re, im) | a complex number with real part
re, imaginary part im.
im defaults to zero. | (6)    | complex()          |
| c.conjugate()   | conjugate of the complex number
c                                           |        |                    |
| divmod(x, y)    | the pair (x // y, x % y)                                                    | (2)    | divmod()           |
| pow(x, y)       | x to the power y                                                            | (5)    | pow()              |
| x ** y          | x to the power y                                                            | (5)    |                    |


## Strings

Besides numbers, Python can also manipulate strings, which can be expressed in several ways. They can be enclosed in single quotes ('...') or double quotes ("...") with the same result 2. \ can be used to escape quotes:

```bash
>>> 'spam eggs'  # single quotes
'spam eggs'
>>> 'doesn\'t'  # use \' to escape the single quote...
"doesn't"
>>> "doesn't"  # ...or use double quotes instead
"doesn't"
>>> '"Yes," they said.'
'"Yes," they said.'
>>> "\"Yes,\" they said."
'"Yes," they said.'
>>> '"Isn\'t," they said.'
'"Isn\'t," they said.'
```

The print() function produces a more readable output, by omitting the enclosing quotes and by printing escaped and special characters:

```bash
>>> '"Isn\'t," they said.'
'"Isn\'t," they said.'
>>> print('"Isn\'t," they said.')
"Isn't," they said.
>>> s = 'First line.\nSecond line.'  # \n means newline
>>> s  # without print(), \n is included in the output
'First line.\nSecond line.'
>>> print(s)  # with print(), \n produces a new line
First line.
Second line.
```

If you don’t want characters prefaced by \ to be interpreted as special characters, you can use raw strings by adding an r before the first quote:

Basically, parse raw string without escaping.

r prefix that disables most escape sequence processing.
https://docs.python.org/3/library/stdtypes.html#textseq

```bash
>>> print('C:\some\name')  # here \n means newline!
C:\some
ame
>>> print(r'C:\some\name')  # note the r before the quote
C:\some\name
```

String literals can span multiple lines. One way is using triple-quotes: """...""" or '''...'''. End of lines are automatically included in the string, but it’s possible to prevent this by adding a \ at the end of the line. The following example:

Basically \ skips an end of line in a multi line string.

```python
print("""\
Usage: thingy [OPTIONS]
     -h                        Display this usage message
     -H hostname               Hostname to connect to
""")
```

Strings can be concatenated (glued together) with the + operator, and repeated with *

```bash
>>> # 3 times 'un', followed by 'ium'
>>> 3 * 'un' + 'ium'
'unununium'
```

Two or more string literals (i.e. the ones enclosed between quotes) next to each other are automatically concatenated.

Basically, automatic concatenation

```bash
>>> 'Py' 'thon'
'Python'
```

This feature is particularly useful when you want to break long strings:

```bash
>>> text = ('Put several strings within parentheses '
...         'to have them joined together.')
>>> text
'Put several strings within parentheses to have them joined together.'
```

This only works with two literals though, not with variables or expressions:

```bash
>>> prefix = 'Py'
>>> prefix 'thon'  # can't concatenate a variable and a string literal
  File "<stdin>", line 1
    prefix 'thon'
                ^
SyntaxError: invalid syntax
>>> ('un' * 3) 'ium'
  File "<stdin>", line 1
    ('un' * 3) 'ium'
                   ^
SyntaxError: invalid syntax
```

If you want to concatenate variables or a variable and a literal, use +

```bash
>>> prefix + 'thon'
'Python'
```

Strings can be indexed (subscripted), with the first character having index 0. There is no separate character type; a character is simply a string of size one

```bash
>>> word = 'Python'
>>> word[0]  # character in position 0
'P'
>>> word[5]  # character in position 5
'n'
```

Indices may also be negative numbers, to start counting from the right

```bash
>>> word[-1]  # last character
'n'
>>> word[-2]  # second-last character
'o'
>>> word[-6]
'P'
```

Note that since -0 is the same as 0, negative indices start from -1.

In addition to indexing, slicing is also supported. While indexing is used to obtain individual characters, slicing allows you to obtain substring

```bash
>>> word[0:2]  # characters from position 0 (included) to 2 (excluded)
'Py'
>>> word[2:5]  # characters from position 2 (included) to 5 (excluded)
'tho'
```

Note how the start is always included, and the end always excluded. This makes sure that s[:i] + s[i:] is always equal to s

```bash
>>> word[:2] + word[2:]
'Python'
>>> word[:4] + word[4:]
'Python'
```

Slice indices have useful defaults; an omitted first index defaults to zero, an omitted second index defaults to the size of the string being sliced.

```bash
>>> word[:2]   # character from the beginning to position 2 (excluded)
'Py'
>>> word[4:]   # characters from position 4 (included) to the end
'on'
>>> word[-2:]  # characters from the second-last (included) to the end
'on'
```

For non-negative indices, the length of a slice is the difference of the indices, if both are within bounds. For example, the length of word[1:3] is 2.

Attempting to use an index that is too large will result in an error (IndexError):

```bash
>>> word[42]  # the word only has 6 characters
Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
IndexError: string index out of range
```

However, out of range slice indexes are handled gracefully when used for slicing:

```bash
>>> word[4:42]
'on'
>>> word[42:]
''
```

Python strings cannot be changed — they are immutable

```bash
>>> word[0] = 'J'
Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
TypeError: 'str' object does not support item assignment
>>> word[2:] = 'py'
Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
TypeError: 'str' object does not support item assignment
```

If you need a different string, you should create a new one:

```bash
>>> 'J' + word[1:]
'Jython'
>>> word[:2] + 'py'
'Pypy'
```

The built-in function len() returns the length of a string:

```bash
>>> s = 'supercalifragilisticexpialidocious'
>>> len(s)
34
```

Strings are examples of sequence types, and support the common operations supported by such types.

# Cool string types

str.maketrans(x, [y, [z]]) to create a mapping table for use to replace template strings

```bash
>>> txt = 'Hello {}'
>>> table = txt.maketrans('{}', 'HI')
>>> txt.translate(table)
'Hello HI'
>>> 
```

When specifying 1 argument to maketrans as a dict to say what to replace the keys must be 1 char only

```bash
table = txt.maketrans({'{}': 'HI', '[]': 'Yo'})
Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
ValueError: string keys in translate table must be of length 1
```

str.partition(sep)

Split the string at the first occurrence of sep, and return a 3-tuple containing the part before the separator, the separator itself, and the part after the separator. If the separator is not found, return a 3-tuple containing the string itself, followed by two empty strings.

```bash
>>> url = 'http://www.example.com'
>>> url.partition('://')
('http', '://', 'www.example.com')
>>> url.partition('://')[0]
'http'
>>> url.partition('://')[1]
'://'
>>> url.partition('://')[2]
'www.example.com'
>>> 
```

str.removeprefix(prefix, /) (new in version 3.9)

```bash
>>> 'TestHook'.removeprefix('Test')
'Hook'
>>> 'BaseTestCase'.removeprefix('Test')
'BaseTestCase'
```

str.removesuffix(suffix, /) (new in version 3.9)

```bash
>>> 'MiscTests'.removesuffix('Tests')
'Misc'
>>> 'TmpDirMixin'.removesuffix('Tests')
'TmpDirMixin'
```

str.replace(old, new[, count])

Return a copy of the string with all occurrences of substring old replaced by new. If the optional argument count is given, only the first count occurrences are replaced.

```bash
>>> txt = 'hello kitty'
>>> txt.replace('ki', '')
'hello tty'
```

str.rfind(sub[, start[, end]])

Return the highest index in the string where substring sub is found, such that sub is contained within s[start:end]. Optional arguments start and end are interpreted as in slice notation. Return -1 on failure.

```bash
>>> txt = 'helo chopper'
>>> txt.rfind('o')
7
>>> txt[7]
'o'
>>> txt[4]
' '
>>> txt[3]
'o'
```

str.rindex(sub[, start[, end]])

Like rfind() but raises ValueError when the substring sub is not found.

```bash
>>> txt = 'helo chopper'
>>> txt.rindex('hello')
Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
ValueError: substring not found
```

str.rpartition(sep)

Split the string at the last occurrence of sep

```bash
>>> url = 'http://www.example.com://me.com'
>>> url.rpartition('://')
('http://www.example.com', '://', 'me.com')
>>> 
```

