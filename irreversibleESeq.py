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
    # converting the DNA from a json file to a string 
    strDNA= ''.join([str(item) for item in DNA])
    strDNA= strDNA.replace(" ","")
    return strDNA


def nonreversibleplacing( DNA, signature, location):
    # the signature is placed as a whole with a primer for the Type II restriction 
    # enzyme in front of it and is placed in the location indicated by the user. 
    primer = "AAGCTT" #primer
    sign = primer + signature
    stringDNA= jsontostringDNA(DNA)
    CodedDNA= stringDNA[:int(location)] + sign + stringDNA[int(location):]

    return CodedDNA, location

def DNAformatting(sequence):
    # converting the encrypted sequence from a string to json file format
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



