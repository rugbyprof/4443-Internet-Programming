plain_text = "hug everyone"
cipher_text = ""

letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"

key = 3

frequency = {"A":0,"B":0,"C":0,"D":0,"E":0,"F":0,"G":0,"H":0,"I":0,"J":0,"K":0,"L":0,"M":0,"N":0,"O":0,"P":0,"Q":0,"R":0,"S":0,"T":0,"U":0,"V":0,"W":0,"X":0,"Y":0,"Z":0}

def caesar(letter , key):
    
    letter = letter.upper()
    
    if(letter in letters):
        letter = ord(letter) - 65
        letter = (letter + key) % 26
        letter = chr(letter+65)
        return letter
    return letter

for i in range(len(plain_text)):
   
    cipher_text = cipher_text + caesar(plain_text[i],key)

print(cipher_text)

for i in range(len(plain_text)):
    u = plain_text[i].upper()
    if(u in letters):
        frequency[u] = frequency[plain_text[i].upper()] + 1

print(frequency)
