import string
import urllib2

from evdev import InputDevice
from select import select

keys = "X^1234567890XXXXqwertzuiopXXXXasdfghjklXXXXXyxcvbnmXXXXXXXXXXXXXXXXXXXXXXX"
dev = InputDevice('/dev/input/by-id/usb-RFIDeas_USB_Keyboard-event-kbd')
counter = 0
id = ''

while True:
   print("loop")
   r,w,x = select([dev], [], [])
   for event in dev.read():
        if event.type==1 and event.value==1:
            counter=counter+1
            print(counter)
            if(counter==21):
                print("the file contents: "+id)
                urllib2.urlopen("http://openlab.ma1geek.org/addinfo.php?id="+id).read()
            if(counter>21):
                counter=1
                id=''
                print('erased')
            x = keys[event.code]
            print(x)
            id+=x
