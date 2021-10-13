from bluetooth import *
import string
import time
import json
#import commands
#import subprocess
server_socket = BluetoothSocket( RFCOMM )

server_socket.bind(("", 4 ))

server_socket.listen(1)

client_socket, address = server_socket.accept()

dataJSON = {}
dataJSON['datapresence']= []
#print(data)
i = 0
while i<10:
	data = client_socket.recv(1024)
	print(type(data))
	print("the value is: %s" % data)

	dataJSON['datapresence'].append({
		'dato' : float(data)
	})
	with open('/var/www/html/chartsP/data.json', 'w') as outfile:
		json.dump(dataJSON, outfile)
	time.sleep(1)
	i = i+1
	

client_socket.close()
#server_socket.close()
#subprocess.call(command3.split())
