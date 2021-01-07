<<<<<<< HEAD
#!/usr/bin/python3
=======
>>>>>>> eef1d94b1dceb576e16041d3bab9ad8d47dce938
"""
This script will track all non browser (firefox or chrome) based outgoing traffic over a period of time
"""

import smashi.cmd
import time

lineBuf = set()

while (True):

    output = smashi.cmd.output('lsof -i -n ')
    #| egrep "COMMAND|UDP|TCP" | grep -Ev "^chrome" | grep -Ev  "^firefox"
    output = output[1].replace('\\n', '\n')

    for line in output.split('\n'):
<<<<<<< HEAD
        if (not line.startswith('chrome') and not line.startswith('firefox')) and ('UDP' in line or 'TCP' in line):
        #if (not line.startswith('firefox')) and ('UDP' in line or 'TCP' in line):
            lineBuf.add(line)
            processOutput = smashi.cmd.output('/usr/bin/ps f -g %s' % line.split()[1])
            processOutput = output[1].replace('\\n', '\n')
            for psLine in output.split('\n'):
                lineBuf.add(psLine)

    with open('/home/charl/projects/styvi/net/sniff/net.log', 'w') as fp:
        fp.write('COMMAND\tPID\tUSER\tFD\tTYPE\tDEVICE\tSIZE/OFF\tNODE\tNAME')
        fp.write('\n'.join(lineBuf))

    #time.sleep(2)
=======
        #if (not line.startswith('chrome') and not line.startswith('firefox')) and ('COMMAND' in line or 'UDP' in line or 'TCP' in line):
        if (not line.startswith('firefox')) and ('UDP' in line or 'TCP' in line):
            lineBuf.add(line)

    with open('net.log', 'w') as fp:
        fp.write('COMMAND\tPID\tUSER\tFD\tTYPE\tDEVICE\tSIZE/OFF\tNODE\tNAME')
        fp.write('\n'.join(lineBuf))

    time.sleep(2)
>>>>>>> eef1d94b1dceb576e16041d3bab9ad8d47dce938
