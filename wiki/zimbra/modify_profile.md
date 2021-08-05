# Modify zimbra profile using zmsoap as admin

The issue: after logging in to zimbra you get a blank screen.

The commands here enable to inspect a working profile vs a broken profile.
In our case we found that the broken profile was due to the zimbra skin.
The user was unable to load the webmail interface after logging in.

So I compared the two profiles and found that I needed to change the skin or theme skin for the broken profile.

The -z to zmsoap enables logging in as admin

```bash
zmsoap -z -t account -m broken@website.tld -v GetInfoRequest > /tmp/broken.txt
zmsoap -z -t account -m working@website.tld -v GetInfoRequest > /tmp/working.txt
vimdiff /tmp/broken.txt /tmp/working.txt
zmsoap -z -t account -m kaylan@routenetworks.africa ModifyPrefsRequest pref/@name=zimbraPrefSkin @value=harmony
```
