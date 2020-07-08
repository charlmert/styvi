#!/usr/bin/python3

usage = """
Usage:
    ./copy_bin_to_chroot.py command_binary chroot_path  
"""

import os
import sys
import stat
import subprocess
from shutil import copyfile

if len(sys.argv) < 2:
    print(usage)
    sys.exit(1)

def run(command):
    process = subprocess.Popen(command.split(),
                stdout=subprocess.PIPE, 
                stderr=subprocess.PIPE
              )

    stdout, stderr = process.communicate()
    return (stdout.decode('utf8'), stderr.decode('utf8'))

def copyLibs(libs, chrootHome):
    for fileName in libs.keys():
        libPath = '%s%s' % (chrootHome.rstrip('/'), '/'.join(libs[fileName].split('/')[:-1]))
        try:
            os.makedirs(libPath)
        except Exception:
            None

        copyfile(libs[fileName], '%s/%s' % (libPath, fileName))

def copyBin(fullCommand, chrootHome):
        commandPath = '%s%s' % (chrootHome.rstrip('/'), '/'.join(fullCommand.split('/')[:-1]))

        try:
            os.makedirs(commandPath)
        except Exception:
            None

        destFile = '%s/%s' % (commandPath, fullCommand.split('/')[-1])

        copyfile(fullCommand, destFile)
        st = os.stat(destFile)
        os.chmod(destFile, st.st_mode | stat.S_IEXEC)

command = str(sys.argv[1])
chrootHome = str(sys.argv[2])

print('copying "%s" command to chroot "%s"' % (command, chrootHome))
stdout, stderr = run('which %s' % command)
fullCommand = stdout.replace('\n', '')
print('full command path is "%s"' % (fullCommand))

stdout, stderr = run('ldd %s' % fullCommand)
lines = stdout.split('\n')
libs = {}
for line in lines:
    parts = line.split('=>')
    if len(parts) > 1:
        left = parts[0].strip()
        right = parts[1].strip()
        libs[left] = right.split(' ')[0]

copyLibs(libs, chrootHome)
copyBin(fullCommand, chrootHome)

