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
        #if (not line.startswith('chrome') and not line.startswith('firefox')) and ('COMMAND' in line or 'UDP' in line or 'TCP' in line):
        if (not line.startswith('firefox')) and ('UDP' in line or 'TCP' in line):
            lineBuf.add(line)

    with open('net.log', 'w') as fp:
        fp.write('COMMAND\tPID\tUSER\tFD\tTYPE\tDEVICE\tSIZE/OFF\tNODE\tNAME')
        fp.write('\n'.join(lineBuf))

    time.sleep(2)
