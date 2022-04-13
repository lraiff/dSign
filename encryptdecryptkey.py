import base64
import os
from cryptography.fernet import Fernet
from cryptography.hazmat.primitives import hashes
from cryptography.hazmat.primitives.kdf.pbkdf2 import PBKDF2HMAC

import json 
fpath= 'C:/Users/aurel/OneDrive/Desktop ASUS/BE 552/Project Encryption/'
with open(fpath+'/input_database.json', 'r') as f:
    inputs=json.load(f)

sequence_number = bytes(inputs[0]["file_id_list"][0]["ID"], 'utf-8')

# Generating the key and writing it to a file
def genkeyandencrypt():
    password= bytes(inputs[0]["password"], 'utf-8')
    salt = os.urandom(16)
    kdf = PBKDF2HMAC(
        algorithm=hashes.SHA256(),
        length=32,
        salt=salt,
        iterations=390000,
    )
    public_key = base64.urlsafe_b64encode(kdf.derive(password))
    key= Fernet(public_key)
    message= "This sequence was made by " + inputs[0]["last_name"] + ", " + inputs[0]["first_name"] + " (" + inputs[0]["email"] + ") from " +  inputs[0]["institution_code"]
    token = key.encrypt(bytes(message, 'utf-8'))
    with open("public.key", "wb") as key_file:
        key_file.write(public_key)
    with open("code.key", "wb") as key_file:
        key_file.write(token)

def decrypt(filename1, filename2, sequence_number): 
    with open(filename1, "rb") as key_file: #filename1= public.key
        public_key=key_file.read()
    with open(filename2, "rb") as key_file: #filename2= code.key
        token=key_file.read()
    key =  Fernet(public_key)
    plaintext = key.decrypt(token)
    return plaintext

# # how to use the function 
genkeyandencrypt() #to generate the key, it will output a public.key file 
output_string= decrypt("public.key", "code.key", sequence_number) 
print(output_string)
#filename should be public.key and sequence number, it will output the last name, 
# first name, email of the owner and institution 