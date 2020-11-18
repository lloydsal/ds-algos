# Given a sentence, find all anagram words in the sentence

def find_anagrams(s):
    words = s.split()

    anag = {}
    for w in words:
        sortedWord = "".join(sorted(w))
        if(sortedWord in anag):
            anag[sortedWord].append(w)
        else:
            anag[sortedWord] = [w]

    anagrams = []
    for key in anag:
        if(len(anag[key]) > 1):
            anagrams.extend(anag[key])

    return anagrams


s = 'night study dusty act cat save tac vase'
print(find_anagrams(s))