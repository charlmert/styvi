## Standard location for python on debian and other linuxes?
Classes provide a means of bundling data and functionality together. Creating a new class creates a new type of object, allowing new instances of that type to be made.

a derived class can override any methods of its base class or classes, and a method can call the method of a base class with the same name. Objects can contain arbitrary amounts and kinds of data. As is true for modules, classes partake of the dynamic nature of Python: they are created at runtime, and can be modified further after creation.

## Representing objects

The repr() method returns a string containing a printable representation of an object

```python
class student:
	name=''

std = student()
repr(std)
```

```bash
Output
'<main.student object at 0x0000000003B1FF98>'
```

Override the __repr__() method to change this default behaviour, as shown below.

### Please note:

If object does not have a __str__() method, then str() falls back to returning repr(object)

str(object) returns object.__str__(), so override __str__ in that case.

