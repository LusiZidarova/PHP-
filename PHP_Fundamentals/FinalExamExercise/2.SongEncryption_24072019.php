<?php
$string = readline();
while($string !== 'end'){
    if(preg_match("/(^[A-Z][a-z]+):([A-Z ]{1,})|((^[A-Z][a-z]+[* ][a-z][*\ \'{0,}[a-z]+){1,}):([A-Z ]{1,})/",$string,$matches)){
        $strings = explode(':',$matches[0]);

        $artist = $strings[0];
        $lengthArtist = strlen($artist);
        $song = $strings[1];
        for ($j=0;$j<$lengthArtist;$j++){
          if(ctype_alpha($artist[$j]))  {
            if((ord($artist[$j])+$lengthArtist)>122){
                $cryptArtist.= chr(96+(ord($artist[$j])+$lengthArtist-122));
            }else{
                $cryptArtist.=chr(ord($artist[$j])+$lengthArtist);
            }
          }else{
              $cryptArtist.=$artist[$j];
          }
        }
        for ($i=0;$i<strlen($song);$i++){
           if(ctype_alpha($song[$i])) {
               if((ord($song[$i])+$lengthArtist)>90){
                    $cryptString.= chr(64+(ord($song[$i])+$lengthArtist-90));
               }else{
                   $cryptString.=chr(ord($song[$i])+$lengthArtist);
               }
           }else{
               $cryptString.=$song[$i];
           }
        }
        echo 'Successful encryption: '.$cryptArtist.'@'.$cryptString.PHP_EOL;
        $cryptString='';
        $cryptArtist='';


    }else{
        echo 'Invalid input!'.PHP_EOL;
    }

    $string = readline();
}

/*
2.Song Encryption -Programming Fundamentals Final Exam Preparation - 24 July 2019 - 80%
Now that you've helped Mandy to accept the group applications it's time to assist her with a security problem.
You are tasked to encrypt all songs from the set list so that if someone steals it they won't be able to leak it online.
Your task is to write a program that encrypts information about artists and their songs.
Until you receive the command "end" you should read lines in following format :"{artist}:{song}", and check if it's valid,
 considering the following rules:
Artist – starts with capital letter, followed by lowercase letters.
 It can also contains apostrophe ( ' ), and whitespace " ";
Valid group name: Red hot chili peppers, Eminem, Guns n' roses
Invalid group name: ReD Hot CiLly PePers, sLipKnot, guns n'roses
Song – contains only capital letters, and whitespaces.
Valid songs: BACK IN BLACK, BLEED IT OUT, KILLSHOT
Invalid songs: #BaCk IN black, BLEED $IT$ OUTt, &KILLSHoT
After you validate the lines of an input, you should encrypt the information. In order to do that, you have to follow
 the rules below:
First you need to find a key for encryption.
Your key is the length of the artist (e.g. "Eminem" –  key: 6)
You have to increment the ASCII value of each symbol of the input, with the key length
(e.g. "char" 'a' -> 'g')
Be careful if your key length is bigger than the ASCII value of a letter 'z' or 'Z'. In this case you should start
from a letter 'a'. (e.g. key:6 letter – 'x', encrypted letter – 'd')
You should NOT ENCRYPT the following characters: whitespaces, and apostrophes
You also should replace ':' with the sign '@'
Input / Constraints
Until you receive "end" command you should read from the console.
Line of input – Artist name and song, separated by ":", containing only ASCII symbols.
Allowed working time for your program: 0.1 seconds.
Allowed memory: 16 MB.
Output
After every line of input, you should print:
If line is valid – encrypted information in following format:
"Successful encryption: {encryptedArtist}@{encryptedSong}".
If line is not valid – print the following message: "Invalid input!"

Examples
Input	Output	Comments
Eminem:VENOM
Linkin park:NUMB
Drake:NONSTOP
Adele:HELLO
end

Output
Successful encryption: Ksotks@BKTUS
Successful encryption: Wtyvty alcv@YFXM
Successful encryption: Iwfpj@STSXYTU
Successful encryption: Fijqj@MJQQT

Comments
All lines of input are valid, so we
encrypt the information, change the charracter ":" with the sign "@", and print the output of encription.
Example: Eminem-> key 6, adding a key to the ASCII value of each charracter except the whitespace, apostrophe,
and our delimiter(":") and receive an encrypted name – Ksotks@BKTUS, then we do the same with the song.

Input
Michael Jackson:ANOTHER PART OF ME
Adele:ONE AND ONLY
Guns n'roses:NOVEMBER RAIN
Christina Aguilera: HuRt
end

Output
Invalid input!
Successful encryption: Fijqj@TSJ FSI TSQD
Successful encryption: Sgze z'daeqe@ZAHQYNQD DMUZ
Invalid input!
Comments
First line in not valid, because in the name of Michael Jackson we have more than one capital letter.
Next two are valid, and the last is not valid, because the song does not  contain only capital letters.

Eminem:VENOM
Linkin park:NUMB
Drake:NONSTOP
Adele:HELLO
Michael Jackson:ANOTHER PART OF ME
Adele:ONE AND ONLY
Guns n'roses:NOVEMBER RAIN
Christina Aguilera: HuRt
end
 */