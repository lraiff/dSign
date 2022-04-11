import base64
import os
from cryptography.hazmat.primitives.ciphers.aead import ChaCha20Poly1305
from cryptography.hazmat.primitives import hashes
from cryptography.hazmat.primitives.kdf.pbkdf2 import PBKDF2HMAC

import json 
with open('path to json file/filename', 'r') as f:
    inputs=json.load(f)

sequence_number = bytes(inputs[0]["file_id_list"][0]["ID"], 'utf-8')

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
    key = ChaCha20Poly1305(public_key)
    nonce = os.urandom(12)
    message= inputs[0]["last_name"] + ", " + inputs[0]["first_name"] + ", " + inputs[0]["email"]
    ct = key.encrypt(nonce, bytes(message, 'utf-8'), sequence_number)
    with open("public.key", "wb") as key_file:
        key_file.write([public_key, nonce, ct])


def decrypt(filename, sequence_number): 
    with open(filename, "r") as key_file:
        public_key = key_file.readline(1)
        nonce = key_file.readline(2)
        ct = key_file.readline(3)
    key = ChaCha20Poly1305(public_key)
    plaintext = key.decrypt(nonce, ct, sequence_number)
    return plaintext

# # how to use the function 
# genkeyandencrypt() #to generate the key, it will output a public.key file 
# decrypt(filename, sequence_number) # filename should be public.key and sequence number, it will output the last name, first name and email of the owner 