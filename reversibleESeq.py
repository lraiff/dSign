#importvaluesfromdatabase 
from textwrap import wrap
import random
import json
import numpy as np

fpath= 'C:\\xampp\\htdocs\\dSign\\seqInfo.json'
with open(fpath, 'r') as f:
    inputs=json.load(f)

class data_info:
    def __init__(self, fpath = None ):
        self.DNAsequence=inputs["sequence"]
        self.signlocation= inputs["location"]
        self.signature = inputs["signature"]

def jsontostringDNA(DNA): 
    strDNA= ''.join([str(item) for item in DNA])
    strDNA= strDNA.replace(" ","")
    return strDNA


def reversibleplacing( DNA, signature):
    num=[]
    primer = "AAGCTT"
    stringDNA= jsontostringDNA(DNA)
    signature= primer + signature
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

def DNAformatting(sequence):
    split_strings=[]
    for index in range(0, len(sequence), 10):
            split_strings.append(sequence[index : index + 10])
    split_strings=" ".join(split_strings)
    data= wrap(split_strings, 65)
    return data 


## below is a sample on how to call the function 
# please input the string of the signature because this code is separated from the generating signature code
# you can take it from the database? 
pdata = data_info(fpath)
CodedDNA, locations= reversibleplacing( pdata.DNAsequence, pdata.signature)
print(CodedDNA.upper())


