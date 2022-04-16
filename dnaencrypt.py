import base64
import os
from cryptography.fernet import Fernet
from cryptography.hazmat.primitives import hashes
from cryptography.hazmat.primitives.kdf.pbkdf2 import PBKDF2HMAC

import json 
fpath= 'C:/Users/aurel/OneDrive/Desktop ASUS/BE 552/Project Encryption/'
with open(fpath+'/input_database.json', 'r') as f:
    inputs=json.load(f)
    
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
    message= "This sequence was made by " + inputs[0]["last_name"] + ", " + inputs[0]["first_name"] + " (" + inputs[0]["email"] + ") from " +  inputs[0]["institution_code"] + "\n" + inputs[0]["file_id_list"][0]["description"]
    #you can change the messages if you want by changing the name of the messages which is taken from the json file
    token = key.encrypt(bytes(message, 'utf-8'))
    #outputs the .key files
    with open("public.key", "wb") as key_file:
        key_file.write(public_key)
    with open("datacode.key", "wb") as key_file:
        key_file.write(token)


# # how to use the function 
genkeyandencrypt() # to generate the key, it will output a public.key file and a datacode.key file
