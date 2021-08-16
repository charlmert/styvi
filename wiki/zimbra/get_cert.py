import socket, ssl

host = 'mail.acesafrica.com'

s = socket.socket()
s.connect((host, 993))
s.send(b"TLS\n")
s.recv(1000)
ss = ssl.wrap_socket(s)
certificate_der = ss.getpeercert(True)

print(certificate_der)
