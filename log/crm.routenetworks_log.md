# a log on the attacks on my code

Hi, I'm Charl also known as Murdis

This is my log. On the 3rd of September 2021 Friday at about 12:00 I was attacked.
I was hit with some exploit while programming which left a script which would have otherwise worked
broken.

The Perfex crm software that I was enhancing admittently in a hacky way although I did add a module
broke when datatables made the query to the database.

The error can be seen here: (Screenshot from 2021-09-06 08-28-15.png)

I looked into it as it could have been an error on my part and as I was debugging the site just completely broke.
As in it was even defaced, css wouldn't load and it wasn't internet connectivity, all of the css is local or the parts
that would make it not defaced.

See (Screenshot from 2021-09-03 08-56-57.png) and (this_happened_while_debugging_ajax_calls_intel_ime_defenitely_exploited_must_be.png)

So I was debugging the ajax call http://crm.routenetworks.local:8080/admin/attendance/table and while debugging, the process being to 
right click and "Replay XHR" and the same error would return. The error was 

```bash
Unknown column 'tblattendance_status.id' in 'field list'
SELECT SQL_CALC_FOUND_ROWS tblattendance_status.id as id, tblattendance_status.name as name, tblattendance_status.updated as updated, tblattendance_status.created as created FROM tblattendance_status Array ORDER BY tblattendance_status.id ASC LIMIT 0, 25
```

The same error popped up for each refresh and then on about the 15th refresh it just stopped working completely with no intervention from me.
I popped over to the website and it just was defaced and I hadn't made any code changes myself. I was actually busy debugging by right clicking and replaying XHR
repeatedly (yes for no reason expecting change) but it just stopped working, it just broke all on it's own. It wouldn't return anything and when I looked at the site the css wouldn't load at all.

See (Screenshot from 2021-09-03 08-56-57.png) and (this_happened_while_debugging_ajax_calls_intel_ime_defenitely_exploited_must_be.png)

I came in this morning 6th September 2021 and it's reverted back to the point where I was debugging with the replay XHR. so it's not defaced anymore.
This all without any intervention from me at all.
