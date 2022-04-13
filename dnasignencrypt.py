#importvaluesfromdatabase 
from textwrap import wrap
import random
import json
import numpy as np

fpath= 'C:/Users/aurel/OneDrive/Desktop ASUS/BE 552/Project Encryption/'
with open(fpath+'/input_database.json', 'r') as f:
    inputs=json.load(f)

class data_info:
    def __init__(self, fpath = None):
        self.username= inputs[0]["username"]
        self.last_name= inputs[0]["last_name"]
        self.first_name= inputs[0]["first_name"]
        self.institution_type= inputs[0]["institution_type"]
        self.institution_code= inputs[0]["institution_code"]
        self.password= inputs[0]["password"]
        self.doi= inputs[0]["doi"]
        self.fileid= inputs[0]["file_id_list"][0]["ID"]
        self.country= inputs[0]["country"]
        self.DNAsequence=inputs[0]["file_id_list"][0]["sequence"]
        self.signstate= inputs[0]["file_id_list"][0]["signature"]["state"]
        self.signlocation= inputs[0]["file_id_list"][0]["signature"]["location"]

def combine_array( last_name, first_name, institution_type, institution_code, password, country):
    passarr= list(password)
    passarr.sort()
    if institution_type == "University":
        insti_type= "UNI"
    elif institution_type == "Research":
        insti_type= "RSCH"

    # make the data into an array 
    str= last_name + first_name + insti_type + institution_code + country 
    arr = list(str)
    combarr= passarr + arr
    row= int(len(combarr)/10)
    finalarr = np.reshape(np.array( combarr[0:row*10]), (row,10))
    rem= [0] * (10-len(combarr) %10)
    addition= np.array(combarr[row*10:len(combarr)] + rem )
    finalarr= np.r_[finalarr,[addition]] #append another row 
    return finalarr 

def convert_to_DNA(sum):
    Nucleo=[ord('A'), ord('C'), ord('T'), ord('G')]
    minnum=100
    charindx=0
    for i in Nucleo: 
        num1= sum % i 
        if minnum >= num1:
            minnum = num1
            charindx= i
        elif num1==0:
            minnum = num1
            charindx= i


    DNAnucleo= chr(charindx)
    return DNAnucleo

def signcode(password, finalarr): 
    passarr= list(password)
    completecode=[]
    processarr= finalarr
    row=len(finalarr)
    i=0
    DNAsequence= ""
    completecode= ""
    while len(processarr[0]) > 0 & i < 10:
        firstrow= list(processarr[0,:])
        num= firstrow.index(passarr[i])
        sum = 0
        for j in range(0, row):#row= len(arr); col= len(array[0])
            sum = sum + ord(finalarr[j,num])
        DNAnucleo= convert_to_DNA(sum)
        DNAsequence= DNAsequence + DNAnucleo
        linebyline= ''.join(processarr[:,num])
        completecode= linebyline + " " + completecode
        i += 1
        processarr=np.delete(processarr, num, axis=1)

    return DNAsequence, completecode

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
    

pdata = data_info()
final=combine_array( pdata.last_name, pdata.first_name, pdata.institution_type, pdata.institution_code, pdata.password, pdata.country)
signatureinDNA,code= signcode(pdata.password, final)
#you can save the data and the code into a database! 
if pdata.signstate == "non-reversible": 
    CodedDNA, locations= nonreversibleplacing( pdata.DNAsequence, signatureinDNA, pdata.signlocation)
    print(CodedDNA)
    print(locations)
elif pdata.signstate == "reversible": 
    CodedDNA, locations= reversibleplacing( pdata.DNAsequence, signatureinDNA)
    print(CodedDNA)
    print(locations)

Dict = {"Coded_Sequence": DNAformatting(CodedDNA), "signature": signatureinDNA,"locations":locations}


json_object= json.dumps(Dict, indent=4)
open(fpath + '/signandcode.json', 'w').write(json_object)
