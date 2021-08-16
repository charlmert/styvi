import ssl
from imapclient import IMAPClient
import imaplib

login = 'francois@acesafrica.com'
password = 'E2&P~=E9z{m^TAc*'

#login = 'test123@acesafrica.com'
#password = 'E2&P~=E9z{m^TAc*'

host = 'admin.acesafrica.com'
#server = IMAPClient(host, use_uid=True, ssl=True)

ssl_context = ssl.create_default_context()

# don't check if certificate hostname doesn't match target hostname
#ssl_context.check_hostname = False

# don't check if the certificate is trusted by a certificate authority
#ssl_context.verify_mode = ssl.CERT_NONE

#context = ssl.SSLContext(ssl.PROTOCOL_TLS_SERVER)
#context = ssl.create_default_context(ssl.Purpose.CLIENT_AUTH)
#context.verify_mode = ssl.CERT_REQUIRED
#context.load_cert_chain('/etc/ssl/certs/ssl-cert-snakeoil.pem')
#ssl_context.load_cert_chain('/home/charl/tmp/certs/acesafrica.com.pem')

#host = "mail.acesafrica.com"
#port = 993

#my_socket = socket(AF_INET, SOCK_STREAM)
#my_socket.bind((host, port))
#my_socket.listen(1)
#my_socket = context.wrap_socket(my_socket, server_side=True)
#conn, addr = my_socket.accept()

#print("Connection from: " + str(addr))
#data = conn.recv(1024).decode()
#print(data)
#print("from connected user: " + str(data))
#data = str(data).upper()
#print("sending: " + str(data))
#conn.send(data.encode())
#conn.close()

#with IMAPClient(host, ssl_context=ssl_context) as server:
#    server.login(login, password)

while True:
    imap = imaplib.IMAP4_SSL(host)
    r, d = imap.login(login, password)
    assert r == 'OK', 'login failed'
    try:
        None
        # do things with imap
    except imap.abort as e:
        continue
    imap.logout()
    break
