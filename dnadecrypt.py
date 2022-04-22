
import base64
import os
import sys
from cryptography.fernet import Fernet
from cryptography.hazmat.primitives import hashes
from cryptography.hazmat.primitives.kdf.pbkdf2 import PBKDF2HMAC

def decrypt(filename1, filename2): 
    with open(filename1, "rb") as key_file: #filename1= public.key
        public_key=key_file.read()
    with open(filename2, "rb") as key_file: #filename2= code.key
        token=key_file.read()
    key =  Fernet(public_key)
    plaintext = key.decrypt(token)
    return plaintext

output_string= decrypt('public.key', 'datacode.key') 
print(output_string)
#datacode.key has the encrypted version of the outputted information: name, email etc 
#public.key is the shared key for the guest input
#filename should be public.key and sequence number, it will output the last name, 
# first name, email of the owner and institution 
