import json
import numpy as np

def jsontostringDNA(DNA): 
    strDNA= ''.join([str(item) for item in DNA])
    strDNA= strDNA.replace(" ","")
    return strDNA

def reversiblesearch( DNA, locations):
	strDNA= jsontostringDNA(DNA)
	count =0; 
	# A loop to slide pat[] one by one */
	for i in locations:
		x=i-count
		#remove those at positoon i 
		del strDNA[x]
		count += 1
	return strDNA 

# Python3 program for Naive Pattern
# Searching algorithm
def nonreversiblesearch(signature, DNA):
	M = len(signature)
	strDNA= jsontostringDNA(DNA)
	N = len(strDNA)

	# A loop to slide pat[] one by one */
	for i in range(N - M + 1):
		j = 0

		# For current index i, check
		# for pattern match */
		while(j < M):
			if (strDNA[i + j] != signature[j]):
				break
			j += 1
		
		if (j == M):
			del strDNA[i:i+M-1]

	return strDNA 



# # Driver Code
# if __name__ == '__main__':
# 	DNA = "AABAACAADAABAAABAA"
# 	signature = "AABA"

