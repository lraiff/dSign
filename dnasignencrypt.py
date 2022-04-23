#importvaluesfromdatabase 

import json
import numpy as np

with open('C:\\xampp\\htdocs\\dSign\\signInfo.json', 'r') as f:
    inputs=json.load(f)

class data_info:
    #extracting the data from the website inputs 
    def __init__(self, fpath = None):
        #self.username= inputs[0]["username"]
        self.first_name= inputs["first_name"]
        self.last_name= inputs["last_name"]
        self.institution_type= inputs["institution_type"]
        self.institution_code= inputs["institution_code"]
        self.password= inputs["password"]
        #self.user_id =inputs[0]["user_id"]
        #self.doi= inputs[0]["doi"]
        #self.fileid= inputs[0]["file_id_list"][0]["ID"]
        self.country= inputs["country"]



def combine_array( last_name, first_name, institution_type, institution_code, password, country):
    passarr= list(password)
    passarr.sort()
    if institution_type == "Academia":
        insti_type= "UNI"
    elif institution_type == "Industry":
        insti_type= "IND"

    # make the data into an array 
    # the other information is fitted in the order of last name, first name, institution type, institution code, and country.
    str= last_name + first_name + insti_type + institution_code + country 
    arr = list(str)
    combarr= passarr + arr 
    row= int(len(combarr)/10)
    finalarr = np.reshape(np.array( combarr[0:row*10]), (row,10))
    # If in the last row, the entire information does not fit 10 columns, it will be filled with 0s. 
    rem= [0] * (10-len(combarr) %10)
    addition= np.array(combarr[row*10:len(combarr)] + rem )
    finalarr= np.r_[finalarr,[addition]] #append another row 
    return finalarr 

def convert_to_DNA(sum):
    # finding the ascii values of the nucleotides
    Nucleo=[ord('A'), ord('C'), ord('T'), ord('G')]
    minnum=100
    charindx=0
    for i in Nucleo:
        # finding the smalles remainder of the sum when its divided by the ASCII cocnversion of the nucleotides
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
        #finding the index to order the signature by matching it with the original password
        firstrow= list(processarr[0,:])
        num= firstrow.index(passarr[i]) 
        sum = 0
        for j in range(0, row):#row= len(arr); col= len(array[0])
            sum = sum + ord(finalarr[j,num]) #find the sum of each column of the array
        DNAnucleo= convert_to_DNA(sum)
        DNAsequence= DNAsequence + DNAnucleo
        linebyline= ''.join(processarr[:,num])
        completecode= linebyline + " " + completecode
        i += 1
        processarr=np.delete(processarr, num, axis=1)

    return DNAsequence, completecode



#test = data_info('filepathstring')
pdata = data_info()
final=combine_array( pdata.last_name, pdata.first_name, pdata.institution_type, pdata.institution_code, pdata.password, pdata.country)
DNA,code= signcode(pdata.password, final)
print(DNA)
#you can save the data and the code into a database! 