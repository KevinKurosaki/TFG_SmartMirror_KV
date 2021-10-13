from bluetooth import *
import string
import time
import json
#import commands
#import subprocess
server_socket = BluetoothSocket( RFCOMM )

server_socket.bind(("", 3 ))

server_socket.listen(2)

client_socket, address = server_socket.accept()

dataJSON = {}
dataJSON['datacel']= []
#print(data)
i = 0
while i<5:
	data = client_socket.recv(1024)
	print(type(data))
	print("the value is: %s" % data)
	dataJSON['datacel'].append({
		'dato': float(data)
	})
	with open('/var/www/html/chartsM/data.json', 'w') as outfile:
		json.dump(dataJSON, outfile)
	time.sleep(1)
	i = i+1
	

client_socket.close()
#server_socket.close()
#subprocess.call(command3.split())
