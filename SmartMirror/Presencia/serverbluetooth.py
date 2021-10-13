from bluetooth import *
import string
import commands
import subprocess

server_socket=BluetoothSocket( RFCOMM )

server_socket.bind(("", 3 ))


server_socket.listen(1)

client_socket, address = server_socket.accept()

data = client_socket.recv(1024)

command="python /home/pi/Desktop/Presencia/ultrasonic_distance.py &"
command2="python /home/pi/desktop/Acel/aceler.py &"
command3="python /home/pi/serverbluetooth.py &"
	
subprocess.call(command.split())
subprocess.call(command2.split())

client_socket.close()
server_socket.close()
subprocess.call(command3.split())
