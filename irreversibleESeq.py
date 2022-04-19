#this script places the signature into an irreversible sequence
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
# please input the string of the signature because this code is separated from the generating signature code
# you can take it from the database? 
pdata = data_info(fpath) 
CodedDNA, locations= nonreversibleplacing(pdata.DNAsequence, pdata.signature, pdata.signlocation)
print(CodedDNA.upper())



