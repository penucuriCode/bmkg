#!/usr/bin/env python3
# use python3

'''
Gempa - Info gempa from bmkg.go.id
This project was writted by Meow404
Copyright 24 - 02 - 2k21
'''

import requests, xml.dom.minidom as xmlget, os, time

# Color
a='\033[1;30m'
r='\033[1;31m'
g='\033[32;1m' 
y='\033[1;33m'
c='\033[1;36m' 
w='\033[1;37m' 
n='\033[0;00m' 

def banner():
    os.system('clear')
    print (y+"  _____  "+r+"{ "+a+"Python script "+r+"}                                   ")
    print (y+" |   __|___ _____ ___ ___  "+w+"Author "+r+": "+w+"PenencuriCode - Meow404                  ")
    print (y+" |  |  | -_|     | . | .'| "+w+"Team   "+r+": "+w+"IndoXploit        ")
    print (y+" |_____|___|_|_|_|  _|__,| "+w+"Github "+r+": "+w+"https://github.com/penecuriCode ")
    print (y+"                 |_| "+r+"* "+a+"Check info gempa dari bmkg.go.id           ")
    print (r+'\n Loading please wait..from bmkg.go.id..')
    time.sleep(3)

def main():
    response  = requests.get('https://data.bmkg.go.id/DataMKG/TEWS/autogempa.xml')
    result    = response.text
    save      = open('result.xml', 'w')
    save.write('%s' % result)
    save.close()
    rxml      = xmlget.parse('result.xml')    
    tanggal   = rxml.getElementsByTagName('Tanggal')[0].firstChild.data
    jam       = rxml.getElementsByTagName('Jam')[0].firstChild.data
    lintang   = rxml.getElementsByTagName('Lintang')[0].firstChild.data
    bujur     = rxml.getElementsByTagName('Bujur')[0].firstChild.data
    magnitude = rxml.getElementsByTagName('Magnitude')[0].firstChild.data
    kedalaman = rxml.getElementsByTagName('Kedalaman')[0].firstChild.data
    wilayah   = rxml.getElementsByTagName('Wilayah1')[0].firstChild.data
    potensi   = rxml.getElementsByTagName('Potensi')[0].firstChild.data
    print (r+"\n { "+w+"Gempa Information "+r+"} ")
    print (y+' Tanggal     '+r+': '+y+tanggal+'')
    print (y+' Jam         '+r+': '+y+jam+'')
    print (y+' Lintang     '+r+': '+y+lintang+'')
    print (y+' Bujur       '+r+': '+y+bujur+'')
    print (y+' Magnitude   '+r+': '+y+magnitude+'')
    print (y+' Kedalaman   '+r+': '+y+kedalaman+'')
    print (y+' Wilayah     '+r+': '+y+wilayah+'')
    print (y+' Potensi     '+r+': '+y+potensi+'')


if __name__ == '__main__':
    banner()
    main()
    if os.path.exists('result.xml'):
        os.remove('result.xml')
    else:
        print (r+'The file does not exists')
