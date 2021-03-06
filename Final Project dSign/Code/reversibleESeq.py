#this script places the signature into a reversible sequence
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
        self.signature = inputs["signature"]

def jsontostringDNA(DNA): 
    # converting the DNA from a json file to a string 
    strDNA= ''.join([str(item) for item in DNA])
    strDNA= strDNA.replace(" ","")
    return strDNA


def reversibleplacing( DNA, signature):
    #the signature is ordered in different randomized locations in the original sequence
    num=[] #locations for each character in the signature 
    stringDNA= jsontostringDNA(DNA)
    print(stringDNA)
    signature= signature
    M= len(stringDNA)
    N= len(signature)
    final= list(stringDNA)
    largest_div= 0 
    for j in range(2, M): 
        # find the largest divisor that is bigger than 2
        if M % j == 0:
            largest_div= j
    for i in range(0,N):
        val= int(random.randint(0,int(M/largest_div))) 
        # so that there will be a larger spread in the actual values 
        num.append(val) #find the randomized location
        maxnum= max(num)
        if not num: 
            maxnum= 0
        while num[i] in num[0: i] or num[i] <= maxnum : 
            #check if the newly generated number is inside the locations vector or if is less than the largest numbers in the list 
            num.pop(i)
            indnum= maxnum + 1; 
            num.append(int(random.randint(indnum,M)))
            if num[i] not in num[0: i-1]:  #it would not generate the same position 
                break
        final.insert(num[i], signature[i])
        M += 1 #increase the total length of the sequence as each character of the signature is added in
    final="".join(final)
    return final, num 

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
CodedDNA, locations= reversibleplacing( pdata.DNAsequence, pdata.signature)
print(CodedDNA.upper())


