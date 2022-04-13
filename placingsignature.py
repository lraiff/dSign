#importvaluesfromdatabase 
from textwrap import wrap
import random
import json
import numpy as np

fpath= 'C:/Users/aurel/OneDrive/Desktop ASUS/BE 552/Project Encryption/'
with open(fpath+'/input_database.json', 'r') as f:
    inputs=json.load(f)

class data_info:
    def __init__(self, fpath = None ):
        self.password= inputs[0]["password"]
        self.DNAsequence=inputs[0]["file_id_list"][0]["sequence"]
        self.signstate= inputs[0]["file_id_list"][0]["signature"]["state"]
        self.signlocation= inputs[0]["file_id_list"][0]["signature"]["location"]

def jsontostringDNA(DNA): 
    strDNA= ''.join([str(item) for item in DNA])
    strDNA= strDNA.replace(" ","")
    return strDNA


def reversibleplacing( DNA, signature):
    num=[]
    stringDNA= jsontostringDNA(DNA)
    M= len(stringDNA)
    N= len(signature)
    final= list(stringDNA)
    for i in range(0,N-1):
        num.append(int(random.randint(1,M)))
        while num[i] in num[0: i-1]:
            num.remove(num[i])
            num.append(int(random.randint(1,M)))
            if num[i] not in num[0: i-1]: 
                break
        final.insert(num[i], signature[i])
        M += 1
    final="".join(final)
    return final, num 

def nonreversibleplacing( DNA, signature, location):
    stringDNA= jsontostringDNA(DNA)
    CodedDNA= stringDNA[:location] + signature + stringDNA[location:]

    return CodedDNA, location

def DNAformatting(sequence):
    split_strings=[]
    for index in range(0, len(sequence), 10):
            split_strings.append(sequence[index : index + 10])
    split_strings=" ".join(split_strings)
    data= wrap(split_strings, 65)
    return data 


## below is a sample on how to call the function 
pdata = data_info(fpath + '/input_database.json')
if pdata.signstate == "non-reversible": 
    CodedDNA, locations= nonreversibleplacing( pdata.DNAsequence, signatureinDNA, pdata.signlocation)
elif pdata.signstate == "reversible": 
    CodedDNA, locations= reversibleplacing( pdata.DNAsequence, signatureinDNA)

